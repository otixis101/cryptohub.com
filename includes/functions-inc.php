<?php
use LDAP\Result;

function emptyInputSignup($firstname, $lastname, $email, $username, $pwd, $pwdRepeat)
{
    $result;

    if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;

}
function invalidUid($username)
{
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;

}
function invalidEmail($email)
{
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;

}
function pwdMatch($pwd, $pwdRepeat)
{
    $result;

    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;

}

function UidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;

    }
    mysqli_stmt_close($stmt);
    return $result;

}
function createUser($conn, $firstname, $lastname, $email, $username, $pwd, $country, $phone, $referral)
{
    $sql = "INSERT INTO users (firstname, lastname, email, username, password, country, phone, referral) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=createFailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $firstname, $lastname, $email, $username, $hashedPwd, $country, $phone, $referral);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();

}

///////
////Login Functions

function emptyInputLogin($username, $pwd)
{
    $result;

    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;

}

function loginUser($conn, $username, $pwd)
{
    $uidExists = UidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wrongUser");
        exit();
    }

    $pwdHashed = $uidExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);


    if ($checkPwd === false) {
        header("location: ../login.php?error=wrongPass");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["useruid"] = $uidExists["username"];
        $_SESSION["balance"] = 0;
        $_SESSION["firstname"] = $uidExists["firstname"];
        $_SESSION["lastname"] = $uidExists["lastname"];

        header("location: ../main/dashboard.php");
        exit();
    }

}


///Get Assets Table Data
function getAsset($conn, $user_id)
{

    $sql = "SELECT * FROM asset WHERE user_id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }


}


///Update User Assets
function updateAsset($conn, $user_id)
{
    //get success deposits, invested and withdrawns from transactions
    $sel_sql = "SELECT * FROM transactions WHERE user_id = $user_id AND status = 'success';";
    $sel_result = mysqli_query($conn, $sel_sql);

    $amnt_dep = 0;
    $amnt_with = 0;
    $amnt_inv = 0;
    $amnt_bonus = 0;

    //update query
    if (mysqli_num_rows($sel_result) > 0) {

        while ($sel_row = mysqli_fetch_assoc($sel_result)) {
            //update deposits
            if ($sel_row['type'] == 'deposit') {
                $amnt_dep += $sel_row['amount'];
            }
            //update withdrawal
            if ($sel_row['type'] == 'withdrawal') {
                $amnt_with += $sel_row['amount'];
            }
            //update Invested
            if ($sel_row['type'] == 'invest') {
                $amnt_inv += $sel_row['amount'];
            }
        }
    }



    //Get Users with your referral id       

    //$temp_id = $_SESSION["userid"];
    $ref_sql = "SELECT * FROM users WHERE referral = $user_id;";
    $result = mysqli_query($conn, $ref_sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ref_id = $row["id"];

            //get first successful investment amount from those users
            $inv_sql = "SELECT * FROM transactions WHERE type = 'invest' AND status = 'success' AND user_id = $ref_id LIMIT 1;";
            $inv_result = mysqli_query($conn, $inv_sql);

            if (mysqli_num_rows($inv_result) > 0) {
                while ($row = mysqli_fetch_assoc($inv_result)) {
                    $amnt_bonus += ($row['amount'] / 100) * 5;
                }

            }


        }
    }



    //check if asset doesn't ot exist
    $sel_asst_sql = "SELECT * FROM asset WHERE user_id = $user_id;";
    $sel_asst_result = mysqli_query($conn, $sel_asst_sql);
    if (mysqli_num_rows($sel_asst_result) < 1) {
        //Insert New Tranaction Details
        $ins_dep_sql = "INSERT INTO asset (user_id, deposit, withdrawn, invested, ROI, bonus) VALUES ($user_id, $amnt_dep, $amnt_with, $amnt_inv, 0, 0);";
        $ins_result = mysqli_query($conn, $ins_dep_sql);
    }
    //Update Total Deposits
    $upd_dep_sql = "UPDATE asset SET deposit = $amnt_dep WHERE user_id = $user_id;";
    $upd_dep_result = mysqli_query($conn, $upd_dep_sql);

    //Update Total Withdrawn
    $upd_with_sql = "UPDATE asset SET withdrawn = $amnt_with WHERE user_id = $user_id;";
    $upd_with_result = mysqli_query($conn, $upd_with_sql);

    //Update Total Invested
    $upd_inv_sql = "UPDATE asset SET invested = $amnt_inv WHERE user_id = $user_id;";
    $upd_inv_result = mysqli_query($conn, $upd_inv_sql);

    //Update Total ROI
    $upd_roi_sql = "UPDATE asset SET bonus = $amnt_bonus WHERE user_id = $user_id;";
    $upd_roi_result = mysqli_query($conn, $upd_roi_sql);









}


///Get User Table Data
function getUser($conn, $acc_id)
{

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $acc_id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }


}

function getPlan($conn, $acc_id)
{
    $sql = "SELECT * FROM plans WHERE user_id = $acc_id AND status = 'active'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_assoc($result)) {
            return $row;
        }
    }



}


function updatePlan($conn, $acc_id)
{
    $sql = "SELECT * FROM plans WHERE user_id = $acc_id AND status = 'active' OR status = 'expired';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (date($row['end_date']) > date("Y-m-d H:i:s")) {
            //$diff = date($row['end_date']) - date("Y-m-d H:i:s");
            //return $diff;
            //return "ACTIVE " . date("Y-m-d H:i:s") . " " . date($row['end_date']);
            }
            else {
                $upd_sql = "UPDATE plans SET status = 'expired' WHERE user_id = $acc_id AND status = 'active';";
                $upd_result = mysqli_query($conn, $upd_sql);
            //return 'EXPIRED ' . date("Y-m-d H:i:s") . " " . date($row['end_date']);
            }
        }
    }
}

function updateNotif($conn, $acc_id, $type, $title, $msg, $time, $seen)
{
    $sql = "INSERT INTO notifications (user_id, type, title, message, time, seen) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../main/dashboard.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $acc_id, $type, $title, $msg, $time, $seen);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}