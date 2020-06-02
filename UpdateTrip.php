<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <style><?php include 'Home.css'; ?></style>
        <title>Update Trip</title>
    </head>
<body>

    <?php
    $id = $_GET['id'];
    $locationid = $_GET['locationid'];

    $_SESSION["id"] = $id;
    $_SESSION["locationid"] = $locationid;

    ?>


    <h1 class="logo">Update Trip</h1>

    <div id = "frm1" class="formReg">
        <div id = "frm1" div class="container">
        <form action="updateTripName.php" method="post">
          <label for="name"> <b> Trip Name: </b></label>
          <input type="text" name="tripname" id="service" placeholder="Enter Name">

          <label for="rating"> <b> Rating: </b></label>
          <input type="text" name="rating" id="service" placeholder="Enter Rating">

          <label for="cost"> <b> Cost: </b></label>
          <input type="text" name="cost" id="service" placeholder="Enter Cost">

          <button type="submit"> Save Updated Trip Name </button>
        </form>

        </div>

    <h1 class="logo">Save Updated Location</h1>

        <div id = "frm1" div class="container">
          <form action="updateTripLocation.php" method="post">
            <label for="city"> <b> City: </b> </label>
            <input type="text" name="city" id="service" placeholder="Enter City">

            <label for="state"> <b> State: </b> </label>
            <input type="text" name="state" id="service" placeholder="Enter State">

            <label for="country"> <b> Country: </b> </label>
            <input type="text" name="country" id="service" placeholder="Enter Country">

            <label for="date"> <b> Date: </b> </label>
            <input type="text" name="date" id="service" placeholder="Enter Date (yyyy-mm-dd)">
            <button type="submit"> Save Updated Location to my Trip </button>
          </form>
        </div>

    <h1 class="logo">Save Updated Information</h1>
        <div id = "frm1" div class="container">
          <form action="updateTripInfo.php" method="post">
            <label for="lodging"> <b> Lodging: </b> </label>
            <input type="text" name="lodging" id="service" placeholder="Enter lodging (can be left empty)">

            <!-- <label for="food"> <b> Food: </b> </label>
            <input type="text" name="food" id="service" placeholder="Enter food (can be left empty)">

            <label for="activity"> <b> Activity: </b> </label>
            <input type="text" name="activity" id="service" placeholder="Enter activity (can be left empty)"> -->

            <button type="submit"> Save Information to my Location </button>
          </form>

        </div>

        <button onclick="window.location.href = 'ViewTrips.php'"> View my Trips </button>
        <button onclick="window.location.href = 'Home.php'"> Return to Home Page </button>
</body>
</html>

