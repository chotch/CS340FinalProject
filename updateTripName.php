<?php session_start(); ?>

<?php
require_once 'config.php';


$id = $_SESSION["id"];

$name = $_REQUEST['tripname'];
$rating = $_REQUEST['rating'];
$cost = $_REQUEST['cost'];



$sql = "UPDATE Trip
        SET cost = $cost, rating = $rating, trip_name = '".$name."'
        WHERE trip_id = '".$id."'";
mysqli_query($link, $sql);

 echo "<script>location.href='ViewTrips.php'</script>";

?>
