<?php
require_once 'config.php';
$id = $_REQUEST['id'];
print($id);
$sql = "DELETE FROM takes_a WHERE trip_id = '".$id."'";
if(mysqli_query($link, $sql)){
  $sql = "DELETE FROM travels_to WHERE trip_id = '".$id."'";
  if (mysqli_query($link, $sql)){
    $sql = "DELETE FROM Trip WHERE trip_id = '".$id."'";
    if (mysqli_query($link, $sql)){
      print("Deleted");
    }
  }
} else {
  print ("Failed");
}

echo "<script>location.href='Home.php'</script>";

 ?>
