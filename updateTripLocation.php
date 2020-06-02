<?php session_start(); ?>

<?php
require_once 'config.php';


$locationid = $_SESSION["locationid"];


$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$country = $_REQUEST['country'];
$date = $_REQUEST['date'];


$sql = "UPDATE Location
        SET city = '".$city."', state = '".$state."', country = '".$country."', date = '".$date."'
        WHERE location_ID = '".$locationid."'";
mysqli_query($link, $sql);

 echo "<script>location.href='ViewTrips.php'</script>";

?>