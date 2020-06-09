<?php
session_start();
require_once 'config.php';
$name = $_REQUEST['tripname'];
$rating = $_REQUEST['rating'];
$cost = $_REQUEST['cost'];
$id = $_SESSION["usrid"];

//print ($cost);
//print ($rating);
//print ($name);

if($name != '' && $rating != '' && $cost != ''){
  $sql = "INSERT INTO Trip (cost, rating, trip_name) VALUES ('".$cost."', '".$rating."', '".$name."')"; //--insert a Trip entity given the user input

  if(mysqli_query($link, $sql)){

    $sql = "INSERT INTO takes_a (traveller_ID, trip_ID) VALUES ($id, (SELECT LAST_INSERT_ID()))";

    if (mysqli_query($link,$sql)){
      echo '<script>alert("Success, saving you trip!")</script>';
      print("Trip Saved");
    } else{
      echo '<script>alert("Error, could not handle request to Save Trip")</script>';
      print("Failed");
    }
  } else {
    echo '<script>alert("Error, could not handle request to Save Trip")</script>';
    print("Failed");
  }
}
else{
  echo '<script>alert("Error, you must enter a value for each field in a trip")</script>';
}



// echo "<script>location.href='AddTrip.php'</script>";
$url = "AddTrip.php?usrid=".$id;
echo '<script>location.href="'.$url.'"</script>';
 ?>

