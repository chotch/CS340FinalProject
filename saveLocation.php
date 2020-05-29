<?php
require_once 'config.php';
$c = $_REQUEST['city'];
$s = $_REQUEST['state'];
$count = $_REQUEST['country'];
$d = $_REQUEST['date'];

//print($c);
//print("IM HERE");

$sql = "INSERT INTO Location (city, state, country, date) VALUES ('".$c."', '".$s."', '".$count."', '".$d."')";
if (mysqli_query($link, $sql)){
  $sql = "INSERT INTO travels_to (trip_ID, location_ID) VALUES ((SELECT MAX(trip_ID) from Trip), (SELECT LAST_INSERT_ID()))";
  if (mysqli_query($link,$sql)){
    print("Location Saved");
  } else{
    print("Failed");
  }
} else{
  print("Failed");
}

echo "<script>location.href='AddTrip.php'</script>";
 ?>
