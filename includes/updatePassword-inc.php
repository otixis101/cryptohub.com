<?php
session_start();

require_once "../includes/dbh-inc.php";
require_once "../includes/functions-inc.php";


if (isset($_POST['submit'])) 
{
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $confPass = $_POST['confPass'];

    $executed = false;
    $checkPass = true;
    $pwdDontMatch = false;

    $temp_id = $_SESSION["userid"];


    $sel_sql = "SELECT password FROM users WHERE id = $temp_id;";
    $result = mysqli_query($conn, $sel_sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $pwd_data = mysqli_fetch_assoc($result);
        $hashed = $pwd_data['password'];
        $checkPass = password_verify($oldPass, $hashed);
    }

    if ($checkPass) {

        $pwdDontMatch = pwdMatch($newPass, $confPass);


        if (!$pwdDontMatch) {
            $sql = "UPDATE users SET password = ? WHERE id = $temp_id;";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "PREPARATION ERROR";
            }

            $newPass = password_hash($newPass, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "s", $newPass);


            if (mysqli_execute($stmt)) {
                $executed = true;
            }
            else {
                $executed = false;
            }
        }

    }


}
else {
    echo "There was an error";
}


?>


<script>
    var checkPass = "<?php echo $checkPass; ?>";
    var pwdDontMatch = "<?php echo $pwdDontMatch; ?>";
    var executed = "<?php echo $executed; ?>";

    if(!checkPass){
        executed = false;
        $("#prf-oldPass").removeClass("input-success");
        $("#prf-oldPass").addClass("input-error");
        $(".form-message").html("<i class='fi fi-rr-cross mx-1'></i> INCORRECT PASSWORD");
        $(".form-message").removeClass("success-inf");
        $(".form-message").addClass("error-inf");
    }
    
    if(pwdDontMatch){
        executed = false;
        $("#prf-newPass").removeClass("input-success");
        $("#prf-newPass").addClass("input-error");
        $("#prf-confPass").removeClass("input-success");
        $("#prf-confPass").addClass("input-error");
        $(".form-message").html("<i class='fi fi-rr-cross mx-1'></i> PASSWORDS DON'T MATCH");
        $(".form-message").removeClass("success-inf");
        $(".form-message").addClass("error-inf");
    }


    if(executed){
        $("#prf-oldPass").addClass("input-success");
        $("#prf-oldPass").removeClass("input-error");
        $("#prf-newPass").addClass("input-success");
        $("#prf-newPass").removeClass("input-error");
        $("#prf-confPass").addClass("input-success");
        $("#prf-confPass").removeClass("input-error");
        $("#prf-oldPass").val("");
        $("#prf-newPass").val("");
        $("#prf-confPass").val("");

        $(".form-message").html("<i class='fi fi-rr-check mx-1'></i>  UPDATED SUCCESSFULLY");
        $(".form-message").addClass("success-inf");
        $(".form-message").removeClass("error-inf");
    }
</script>
