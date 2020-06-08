<?php session_start(); ?>

<?php
require_once 'config.php';


$locationid = $_SESSION["locationid"];


$lodging = $_REQUEST['lodging'];

if($lodging!=''){
  $sql = "UPDATE Location_lodging
          SET lodging = '".$lodging."'
          WHERE location_ID = '".$locationid."'";
          if(mysqli_query($link, $sql)){
            echo '<script>alert("Success, updating lodging")</script>';
          }
          else{
            echo '<script>alert("Error, could not update lodging")</script>';
          }
}
else{
  echo '<script>alert("Error, you must enter into the field to update")</script>';
}

 echo "<script>location.href='ViewTrips.php'</script>";

?>
