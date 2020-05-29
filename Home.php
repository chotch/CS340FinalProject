<!DOCTYPE html>
<html>
    <head>
        <style><?php include 'Home.css'; ?></style>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@500&display=swap" rel="stylesheet">
        <title>Travel Tracker</title>
    </head>
<body>

    <h1 class="logo">Travel Tracker</h1>

    <div class="container" >
    <!-- action to new page? after submission -->
    <!-- must adjust the href location so that it changes to the new html page -->
      <button onclick="window.location.href= 'ViewTrips.php'"> View Trips </button>
      <button onclick="window.location.href = 'AddTrip.php'"> Add Trip </button>
      <button onclick="window.location.href = 'QuickStats.php'"> Quick Stats </button>

    </div>

</body>
</html>
