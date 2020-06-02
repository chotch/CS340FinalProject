<?php session_start(); ?>

<?php
require_once 'config.php';


$locationid = $_SESSION["locationid"];


$lodging = $_REQUEST['lodging'];


$sql = "UPDATE Location_lodging
        SET lodging = '".$lodging."'
        WHERE location_ID = '".$locationid."'";
mysqli_query($link, $sql);

 echo "<script>location.href='ViewTrips.php'</script>";

?>