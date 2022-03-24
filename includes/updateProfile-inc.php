<?php
session_start();

require_once "../includes/dbh-inc.php";
require_once "../includes/functions-inc.php";


if (isset($_POST['submit'])) 
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];

    $errorNumeric = false;
    $emptyField = false;
    $executed = false;
    $userExists = false;
    $invalidUser = false;

    $temp_id = $_SESSION["userid"];

    if(UidExists($conn, $username, $username) !== false && $username !== $_SESSION['useruid']){
        $userExists = true;
    }

    if(invalidUid($username) !== false)
    {
        $invalidUser = true;
    }
    
    
    if(empty($firstname) || empty($lastname) || empty($username) || empty($phone) || empty($country)){
        $emptyField = true;
    }

    if(!$userExists && !$invalidUser){
        if (!is_numeric($phone)) {
            $errorNumeric = true;
            
        }
        else{
            $errorNumeric = false;


            $sql = "UPDATE users SET firstname = ?, lastname = ?, username = ?, country = ?, phone = ? WHERE id = $temp_id;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                echo "PREPARATION ERROR";
            }

            mysqli_stmt_bind_param($stmt, "ssssi", $firstname, $lastname, $username, $country, $phone);


            if(mysqli_execute($stmt))
            {
                $executed = true;
                $_SESSION['useruid'] = $username;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
            }
            else{
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

    var errorNumeric = "<?php echo $errorNumeric ?>";
    var userExists = "<?php echo $userExists ?>";
    var invalidUser = "<?php echo $invalidUser ?>";
    var executed = "<?php echo $executed; ?>";

    

    //if amount is not in numbers
    if(errorNumeric){
        executed = false;
        $("#prf-phone").removeClass("input-success");
        $("#prf-phone").addClass("input-error");
        $(".form-message").html("<i class='fi fi-rr-cross mx-1'></i> PHONE NUMBER SHOULD BE IN NUMBERS ONLY");
        $(".form-message").removeClass("success-inf");
        $(".form-message").addClass("error-inf");
    }
    
    //if User Exists
    if(userExists){
        executed = false;
        $("#prf-username").removeClass("input-success");
        $("#prf-username").addClass("input-error");
        $(".form-message").html("<i class='fi fi-rr-cross mx-1'></i> USERNAME ALREADY EXISTS");
        $(".form-message").removeClass("success-inf");
        $(".form-message").addClass("error-inf");
    }
    
    //if Username is Inalid
    if(invalidUser){
        executed = false;
        $("#prf-username").removeClass("input-success");
        $("#prf-username").addClass("input-error");
        $(".form-message").html("<i class='fi fi-rr-cross mx-1'></i> INVALID USERNAME");
        $(".form-message").removeClass("success-inf");
        $(".form-message").addClass("error-inf");
    }

    if(executed){
        $("#prf-phone").addClass("input-success");
        $("#prf-phone").removeClass("input-error");
        $("#prf-first").addClass("input-success");
        $("#prf-first").removeClass("input-error");
        $("#prf-last").addClass("input-success");
        $("#prf-last").removeClass("input-error");
        $("#prf-username").addClass("input-success");
        $("#prf-username").removeClass("input-error");
        $("#prf-country").addClass("input-success");
        $("#prf-country").removeClass("input-error");

        $(".form-message").html("<i class='fi fi-rr-check mx-1'></i>  UPDATED SUCCESSFULLY");
        $(".form-message").addClass("success-inf");
        $(".form-message").removeClass("error-inf");
    }
    
</script>
