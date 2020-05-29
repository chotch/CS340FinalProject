<?php
require_once 'config.php';
$l = $_REQUEST['lodging'];
$f = $_REQUEST['food'];
$a = $_REQUEST['activity'];

if ($l != ''){
  $sql = "INSERT INTO Location_lodging (lodging, location_ID) VALUES ('".$l."', (SELECT MAX(location_ID) from Location))"; //-- use built in to find last auto increment ID and insert -- into Location_lodging table the Location_ID and the lodging value"
  if (mysqli_query($link, $sql)){
    print("Lodging Saved");
  } else{
    print("Failed");
  }
}


if ($a != ''){
  $sql = "INSERT INTO Activity (indoor, outdoor, other_activity) VALUES ('".$a."', '".$a."', '".$a."')";
  if (mysqli_query($link, $sql)){
    $sql = "INSERT INTO does (location_ID, activity_ID) VALUES ((SELECT MAX(location_ID) FROM Location), (SELECT LAST_INSERT_ID()))";
    if (mysqli_query($link, $sql)){
      print("Activity Saved");
    } else{
      print("Failed");
    }
  } else {
    print("Failed");
  }
}

if ($f != ''){
  $sql = "INSERT INTO Food (restaurants, street_venues, other_food) VALUES ('".$f."', '".$f."', '".$f."')";
  if (mysqli_query($link, $sql)){
    $sql = "INSERT INTO eats_at (location_ID, food_ID) VALUES ((SELECT MAX(location_ID) FROM Location), (SELECT LAST_INSERT_ID()))";
    if (mysqli_query($link, $sql)){
      print("Food Saved");
    } else{
      print("Failed");
    }
  } else {
    print("Failed");
  }
}

echo "<script>location.href='AddTrip.php'</script>";
//INSERT INTO Food (other_food) VALUES ($foodInput); -- insert string into Food -- table

//INSERT INTO eats_at(location_ID, food_ID) VALUES ((SELECT location_ID FROM Location WHERE city = $locationInput AND date = $dateInput), (SELECT LAST_INSERT_ID())); -- use users input to gather location id value and insert -- food_id into eats_at table

 ?>
