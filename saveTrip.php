<?php
require_once 'config.php';
$name = $_REQUEST['tripname'];
$rating = $_REQUEST['rating'];
$cost = $_REQUEST['cost'];

//print ($cost);
//print ($rating);
//print ($name);

$sql = "INSERT INTO Trip (cost, rating, trip_name) VALUES ('".$cost."', '".$rating."', '".$name."')"; //--insert a Trip entity given the user input

if(mysqli_query($link, $sql)){

  $sql = "INSERT INTO takes_a (traveller_ID, trip_ID) VALUES (1, (SELECT LAST_INSERT_ID()))";

  if (mysqli_query($link,$sql)){

    print("Trip Saved");
  } else{
    print("Failed");
  }
} else {
  print("Failed");
}

echo "<script>location.href='AddTrip.php'</script>";

 ?>
