<?php

session_start();


if (isset($_POST["submit"])) {

    $firstname = trim($_POST["f_name"]);
    $lastname = trim($_POST["l_name"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["uid"]);
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwd_rep"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $referral = $_SESSION["ref"];


    require_once "dbh-inc.php";
    require_once "functions-inc.php";


    //Error Handling
    if (emptyInputSignup($firstname, $lastname, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyInput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invalidUid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=pwdUnMatch");
        exit();
    }
    if (UidExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=userExists");
        exit();
    }

    createUser($conn, $firstname, $lastname, $email, $username, $pwd, $country, $phone, $referral);

}
else {
    header("location:../signup.php");
}