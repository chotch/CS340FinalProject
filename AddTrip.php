
<!DOCTYPE html>
<html>
    <head>
        <style><?php include 'Home.css'; ?></style>
        <title>Add Trip</title>
    </head>
<body>

    <h1 class="logo">Add Trip</h1>


<div id = "frm1" class="formReg">

<div id = "frm1" div class="container">
<form action="saveTrip.php" method="post">
  <label for="name"> <b> Trip Name: </b></label>
  <input type="text" name="tripname" id="service" placeholder="Enter Name" name="service">

  <label for="rating"> <b> Rating: </b></label>
  <input type="text" name="rating" id="service" placeholder="Enter Rating" name="service">

  <label for="cost"> <b> Cost: </b></label>
  <input type="text" name="cost" id="service" placeholder="Enter Cost" name="service">

  <button type="submit"> Save Trip </button>
</form>

</div>

<div id = "frm1" div class="container">
  <label for="enterMywn"> <b> Date: </b></label>
  <input type="text" id="service" placeholder="Enter Date" name="service">

  <label for="enterMyOwn"> <b> Location(s): </b></label>
  <input type="text" id="service" placeholder="Enter Location(s)" name="service">

  <label for="enterMyOwn"> <b> Lodging: </b></label>
  <input type="text" id="service" placeholder="Enter Lodging" name="service">


  <label for="enterMyOwn"> <b> Food: </b></label>
  <input type="text" id="service" placeholder="Enter Food" name="service">

  <label for="enterMyOwn"> <b> Activity: </b></label>
  <input type="text" id="service" placeholder="Enter Activity" name="service">
<!-- action to new page? after submission -->
<button onclick="window.location.href = 'ViewTrips.php'"> Submit - Add Trip </button>

<button onclick="window.location.href = 'Home.php'"> Return to Home Page </button>

</div>
