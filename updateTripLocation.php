<?php session_start(); ?>

<?php
require_once 'config.php';


$locationid = $_SESSION["locationid"];


$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$country = $_REQUEST['country'];
$date = $_REQUEST['date'];


if ($city != ''){
  $sql = "UPDATE Location
          SET city = '".$city."'
          WHERE location_ID = '".$locationid."'";
          if(mysqli_query($link, $sql)){
            echo '<script>alert("Success, updating city")</script>';
          }
          else{
            echo '<script>alert("Error, could not update city")</script>';
          }
}

if ($state != ''){
  $sql = "UPDATE Location
          SET  state = '".$state."'
          WHERE location_ID = '".$locationid."'";
          if(mysqli_query($link, $sql)){
            echo '<script>alert("Success, updating state")</script>';
          }
          else{
            echo '<script>alert("Error, could not update state")</script>';
          }

}

if ($country != ''){
  $sql = "UPDATE Location
          SET country = '".$country."'
          WHERE location_ID = '".$locationid."'";
          if(mysqli_query($link, $sql)){
            echo '<script>alert("Success, updating country")</script>';
          }
          else{
            echo '<script>alert("Error, could not update country")</script>';
          }

}

if ($date != ''){
  $sql = "UPDATE Location
          SET date = '".$date."'
          WHERE location_ID = '".$locationid."'";
          if(mysqli_query($link, $sql)){
            echo '<script>alert("Success, updating date")</script>';
          }
          else{
            echo '<script>alert("Error, could not update date")</script>';
          }

}

 echo "<script>location.href='ViewTrips.php'</script>";

?>
