<?php
session_start();
require_once 'config.php';
$c = $_REQUEST['city'];
$s = $_REQUEST['state'];
$count = $_REQUEST['country'];
$d = $_REQUEST['date'];
$id = $_SESSION["usrid"];

//print($c);
//print("IM HERE");

if ($count != ''){
  $sql = "INSERT INTO Location (city, state, country, date) VALUES ('".$c."', '".$s."', '".$count."', '".$d."')";
  if (mysqli_query($link, $sql)){
    $sql = "INSERT INTO travels_to (trip_ID, location_ID) VALUES ((SELECT MAX(trip_ID) from Trip), (SELECT LAST_INSERT_ID()))";
    if (mysqli_query($link,$sql)){
      echo '<script>alert("Success, saving your location")</script>';
      print("Location Saved");
    } else{
      echo '<script>alert("Error, could not handle request to save location")</script>';
      print("Failed");
    }
  } else{
    echo '<script>alert("Error, could not handle request to save location")</script>';
    print("Failed");
  }
}
else{
  echo '<script>alert("Error, you must enter a value for the country field")</script>';
}


// echo "<script>location.href='AddTrip.php'</script>";

$url = "AddTrip.php?usrid=".$id;
echo '<script>location.href="'.$url.'"</script>';
 ?>
