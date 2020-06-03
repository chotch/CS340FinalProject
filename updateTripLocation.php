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
  mysqli_query($link, $sql);
}

if ($state != ''){
  $sql = "UPDATE Location
          SET  state = '".$state."'
          WHERE location_ID = '".$locationid."'";
  mysqli_query($link, $sql);

}

if ($country != ''){
  $sql = "UPDATE Location
          SET country = '".$country."'
          WHERE location_ID = '".$locationid."'";
  mysqli_query($link, $sql);

}

if ($date != ''){
  $sql = "UPDATE Location
          SET date = '".$date."'
          WHERE location_ID = '".$locationid."'";
  mysqli_query($link, $sql);

}

 echo "<script>location.href='ViewTrips.php'</script>";

?>
