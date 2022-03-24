<?php

session_start();

require_once './dbh-inc.php';


$error = true;
$executed = true;

if (isset($_POST['id']) && isset($_POST['status'])) {
  $error = false;
  $tx_id = $_POST['id'];
  $status = $_POST['status'];

  $sql = "UPDATE transactions SET status = '$status' WHERE id = $tx_id;";
  if ($result = mysqli_query($conn, $sql)) {
    $executed = true;
  }
  else {
    $executed = false;
  }

}
else {
  $error = true;
}

?>

<script>
  var error = "<?php echo $error; ?>";
  var executed = "<?php echo $executed; ?>";
  var status = "<?php echo $status; ?>";


  if(!executed){
    $(".form-message").html("<i class='fi fi-rr-cross mx-1'></i> CHANGES HAD ISSUES!! ");
    $(".form-message").removeClass("success-inf");
    $(".form-message").addClass("error-inf");
  }
  else{
    $(".form-message").html("<i class='fi fi-rr-check mx-1'></i>  CHANGES MADE SUCCESSFULLY");
    $(".form-message").addClass("success-inf");
    $(".form-message").removeClass("error-inf");
  }
  if(error){
    $(".form-message").html("<i class='fi fi-rr-cross mx-1'></i> SOMETHING WENT WRONG!!");
    $(".form-message").removeClass("success-inf");
    $(".form-message").addClass("error-inf");
  }
  
</script>