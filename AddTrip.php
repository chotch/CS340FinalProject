<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <style><?php include 'Home.css'; ?></style>
        <title>Add Trip</title>
    </head>
<body>

    <?php
    $usrid = $_GET['usrid'];

    $_SESSION["usrid"] = $usrid;
    if ($usrid == ''){
      echo '<script>alert("You must use User Select to pick a traveler.")</script>';
echo '<script>location.href="Home.php"</script>';
    }
    ?>

    <h1 class="logo">Add Trip</h1>


<div id = "frm1" class="formReg">

<div id = "frm1" div class="container">
<form action="saveTrip.php" method="post">
  <label for="name"> <b> Trip Name: </b></label>
  <input type="text" name="tripname" id="service" placeholder="Enter Name">

  <label for="rating"> <b> Rating: </b></label>
  <input type="text" name="rating" id="service" placeholder="Enter Rating">

  <label for="cost"> <b> Cost: </b></label>
  <input type="text" name="cost" id="service" placeholder="Enter Cost">

  <button type="submit"> Save Trip </button>
</form>

</div>
  <h1 class="logo">Add Location to My Trip</h1>

<div id = "frm1" div class="container">
  <form action="saveLocation.php" method="post">
    <label for="city"> <b> City: </b> </label>
    <input type="text" name="city" id="service" placeholder="Enter City">

    <label for="state"> <b> State: </b> </label>
    <input type="text" name="state" id="service" placeholder="Enter State">

    <label for="country"> <b> Country: </b> </label>
    <input type="text" name="country" id="service" placeholder="Enter Country">

    <label for="date"> <b> Date: </b> </label>
    <input type="text" name="date" id="service" placeholder="Enter Date (yyyy-mm-dd)">
    <button type="submit"> Save Location to my Trip </button>
  </form>
</div>

  <h1 class="logo">Add Information about my Location</h1>
<div id = "frm1" div class="container">
  <form action="saveInfo.php" method="post">
    <label for="lodging"> <b> Lodging: </b> </label>
    <input type="text" name="lodging" id="service" placeholder="Enter lodging (can be left empty)">

    <label for="food"> <b> Food: </b> </label>
    <input type="text" name="food" id="service" placeholder="Enter food (can be left empty)">

    <label for="activity"> <b> Activity: </b> </label>
    <input type="text" name="activity" id="service" placeholder="Enter activity (can be left empty)">

    <button type="submit"> Save Information to my Location </button>
  </form>
</div>

<?php

    $usrid = $_GET['usrid'];

    echo "<a href='ViewTrips.php?usrid=" . $usrid . "' ><button> View my Trips </button></a>";

    echo "<a href='Home.php?usrid=" . $usrid . "' ><button> Return to Home Page </button></a>";

?>

<!-- action to new page? after submission -->
<!-- <button onclick="window.location.href = 'ViewTrips.php'"> View my Trips </button>

<button onclick="window.location.href = 'Home.php'"> Return to Home Page </button> -->

</div>
