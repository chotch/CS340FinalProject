<?php session_start(); ?>

<?php
require_once 'config.php';


$locationid = $_SESSION["locationid"];
$id = $_REQUEST['id']


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

$usrid = $_SESSION['usrid'];
$url = "ViewTrips.php?usrid=".$usrid;
echo '<script>location.href="'.$url.'"</script>';
 // echo "<script>location.href='ViewTrips.php'</script>";

?>
