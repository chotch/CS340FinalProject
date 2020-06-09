<?php session_start(); ?>

<?php
require_once 'config.php';


$id = $_SESSION["id"];

$name = $_REQUEST['tripname'];
$rating = $_REQUEST['rating'];
$cost = $_REQUEST['cost'];

if ($name != ''){
  $sql = "UPDATE Trip
          SET trip_name = '".$name."'
          WHERE trip_id = '".$id."'";
  if(mysqli_query($link, $sql)){
    echo '<script>alert("Success, updating trip name")</script>';
  }
  else{
    echo '<script>alert("Error, could not update your trip name")</script>';
  }
}

if ($rating != ''){
  $sql = "UPDATE Trip
          SET  rating = $rating
          WHERE trip_id = '".$id."'";
          if(mysqli_query($link, $sql)){
            echo '<script>alert("Success, updating trip rating")</script>';
          }
          else{
            echo '<script>alert("Error, could not update your trip rating")</script>';
          }
}

if ($cost != ''){
  $sql = "UPDATE Trip
          SET cost = $cost
          WHERE trip_id = '".$id."'";
          if(mysqli_query($link, $sql)){
            echo '<script>alert("Success, updating trip cost")</script>';
          }
          else{
            echo '<script>alert("Error, could not update your trip cost")</script>';
          }
}

//$sql = "UPDATE Trip
  //      SET cost = $cost, rating = $rating, trip_name = '".$name."'
    //    WHERE trip_id = '".$id."'";
//mysqli_query($link, $sql);

 // echo "<script>location.href='ViewTrips.php'</script>";
 $usrid = $_SESSION['usrid'];
 $url = "ViewTrips.php?usrid=".$usrid;
 echo '<script>location.href="'.$url.'"</script>';
?>
