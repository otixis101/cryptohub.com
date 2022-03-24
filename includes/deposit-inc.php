<?php
session_start();

require_once "../includes/dbh-inc.php";
//require_once "../includes/functions-inc.php";


if (isset($_POST['submit'])) 
{
    $wallet = $_POST['wallet'];
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];
    $tx_id = $_POST['tx_id'];

    $errorNumeric = false;
    $executed = false;
    
    
    $temp_id = $_SESSION["userid"];
    $type = "deposit";
    $details = $wallet;
    $dep_amount = $amount;
    $dep_token = $currency;
    $transact_id = $tx_id;
    $date = date("Y-m-d H:i:s");
    $status = "pending";
    
    
    if (!is_numeric($amount)) {
        $errorNumeric = true;
        $executed = false;
        echo "NOT NUMBER ". $errorNumeric;
    }
    else{
        //$address = filter_var($address, FILTER_SANITIZE_SPECIAL_CHARS);
        $errorNumeric = false;


        $sql = "INSERT INTO transactions (user_id, type, details, amount, token, tx_id, date, status ) VALUES( ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "PREPARATION ERROR";
        }

        mysqli_stmt_bind_param($stmt, "ississss", $temp_id, $type, $details, $dep_amount, $dep_token, $transact_id, $date, $status);


        if(mysqli_execute($stmt))
        {
            $executed = true;
        }
        else{
            $executed = false;
        }
    }

}
else {
    echo "There was an error";
}


?>


<script>

    var errorNumeric = "<?php echo $errorNumeric ?>";
    var executed = "<?php echo $executed; ?>";
    

    //if amount is not in numbers
    if(errorNumeric){
        executed = false;
        $("#inp-amount").removeClass("input-success");
        $("#inp-amount").addClass("input-error");
        $(".form-message").html("<i class='fi fi-rr-cross mx-1'></i> AMOUNT SHOULD BE IN NUMBERS ONLY");
        $(".form-message").addClass("error-inf");
    }
    else{
        $("#inp-amount").addClass("input-success");
        $("#inp-amount").removeClass("input-error");
    }

    if(executed){
        
        $("#m-transaction").text( "<?php echo strtoupper($type) ?>" );
        $("#m-account").text( "<?php echo strtoupper($details); ?>" );
        $("#m-amount").text( "<?php echo strtoupper($dep_amount); ?>" );
        $("#m-wallet").text( "<?php echo strtoupper($dep_token); ?>" );
        $("#m-tid").text( "<?php echo strtoupper($transact_id); ?>" );
        $("#m-date").text("<?php echo strtoupper($date); ?>");
        $("#m-status").text( "<?php echo strtoupper($status); ?>" );


        $("#deposit-modal").css({
            'display' : 'flex'
        });

    }

    
</script>