<?php
session_start();

require_once "./dbh-inc.php";
require_once "./functions-inc.php";

$expired = false;
$expired = true;


if (isset($_POST['userid'])) {

    $temp_id = $_POST['userid'];

    $sql = "SELECT * FROM plans WHERE status = 'active' AND user_id = $temp_id;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $pp = $row['percentage'];
        $amount = $row['amount'];
        $duration = $row['duration'];
        $plan_start = $row['start_date'];
        $plan_end = $row['end_date'];

        $cur_prf = ($pp / 100) * $amount;

        $now = time();

        $total_gain = (100 * $cur_prf) / $amount *  (($now/86400) - (strtotime($plan_start)/86400));
         

        echo "Mining Gains: <span> $ " . number_format((float)$total_gain, 5, '.', ',') . "</span>";

        //Check if Plan has Expired and Update Notification is true
        if ($now >= $plan_end) {
            $upd_sql = "UPDATE plans SET status = 'expired' WHERE user_id = $temp_id;";
            
            if ($upd_result = mysqli_query($conn, $upd_sql)) {

                $upd_ass = "UPDATE asset SET ROI = $total_gain WHERE user_id = $temp_id;";
                $ass_result = mysqli_real_query($conn, $upd_ass);

                ////Upate Notifiation
                $notif_type = "error";
                $notif_title = "Mining Plan Expired";
                $notif_msg = "Your " . strtoupper($row['plan_name']). " Mining Contract has been completed and your ROI updated.. Renew old Plan or Upgrade.";
                $notif_time = date("Y-m-d H:i:s");
                $seen = false;
                updateNotif($conn, $temp_id, $notif_type, $notif_title, $notif_msg, $notif_time, $seen);
            }

            $expired = true;
            $displayed = false;
        }

    }


}



?>

<script>
    var expired = "<?php echo $expired ?>";
    var displayed = "<?php echo $displayed ?>";

    if(expired && !displayed){
        //Pop Up Modal for Completion
        $('#complete-modal').css({
            'display': 'flex'
        })
    }
    else{

    }
</script>
