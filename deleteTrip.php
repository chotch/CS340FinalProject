<?php
require_once 'config.php';
$id = $_REQUEST['id'];

$sql = "DELETE FROM takes_a WHERE trip_id = '".$id."'";
if(mysqli_query($link, $sql)){
  $sql = "DELETE FROM travels_to WHERE trip_id = '".$id."'";
  if (mysqli_query($link, $sql)){
    $sql = "DELETE FROM Trip WHERE trip_id = '".$id."'";
    if (mysqli_query($link, $sql)){
      echo '<script>alert("Success, deleted your trip")</script>';
    }
    else{
      echo '<script>alert("Error, could not delete your trip")</script>';
    }
  }
  else{
    echo '<script>alert("Error, could not delete your trip")</script>';
  }
} else {
  echo '<script>alert("Error, could not delete your trip")</script>';
}

$usrid = $_REQUEST['usrid'];
$url = "ViewTrips.php?usrid=".$usrid;
echo '<script>location.href="'.$url.'"</script>';

 ?>
