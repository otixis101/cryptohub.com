<?php
session_start();

require_once "./dbh-inc.php";
require_once "./functions-inc.php";

if (isset($_POST['name'])) 
{
    $temp_id = $_SESSION['userid'];
    $plan_name = $_POST['name'];
    $amount = $_POST['amount'];
    $duration = $_POST['duration'];
    $percentage = $_POST['percentage'];
    $status = "pending";
    $start_date = date("Y-m-d H:i:s");
    $end_date = date("Y-m-d H:i:s", strtotime("+" . $duration . " days"));

    //$plans_sql = "INSERT INTO plans (user_id, plan_name, amount, percentage, duration, status, start_date, end_date) VALUES ($temp_id, $plan_name, $amount, $percentage, $duration, $status, $start_date, $end_date);";
    $sql = "INSERT INTO plans (user_id, plan_name, amount, percentage, duration, status, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "error";
    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $temp_id, $plan_name, $amount, $percentage, $duration, $status, $start_date, $end_date);
    if (mysqli_execute($stmt)) {
        echo $plan_name;
    }
    else {
        echo "error";
    }


    $type = "invest";
    $details = "MINING";
    $dep_amount = $amount;
    $dep_token = 'asset';
    $transact_id = "TX-" . $temp_id . "-" . mt_rand();
    $date = date("Y-m-d H:i:s");
    $status = "pending";


    if (!is_numeric($amount)) {
        echo "NOT NUMBER " . $errorNumeric;
    }
    else {

        $sql = "INSERT INTO transactions (user_id, type, details, amount, token, tx_id, date, status ) VALUES( ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "PREPARATION ERROR";
        }

        mysqli_stmt_bind_param($stmt, "ississss", $temp_id, $type, $details, $dep_amount, $dep_token, $transact_id, $date, $status);


        if (mysqli_execute($stmt)) {
            $executed = true;

            $notif_type = "info";
            $notif_title = "Mining Plan Request";
            $notif_msg = "You made a Mining Contract Request of $" . $amount . " for a " . strtoupper($plan_name) . " Plan.. Awaiting Approval";
            $notif_time = date("Y-m-d H:i:s");
            $seen = false;
            updateNotif($conn, $temp_id, $notif_type, $notif_title, $notif_msg, $notif_time, $seen);
        }
        else {
            $executed = false;
        }
    }
}