<!DOCTYPE html>
<html>
    <head>
      <script src="js/jquery-3.1.1.min.js"></script>
      <script>
      $(document).ready(function (){
        $("#usr").change(function (){
          var selectedOption = $("#usr option:selected").val();
          alert("Hi, " + selectedOption);
        });
      });
      </script>
        <style><?php include 'Home.css'; ?></style>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@500&display=swap" rel="stylesheet">
        <title>Travel Tracker</title>
    </head>
<body>

    <h1 class="logo">Travel Tracker</h1>

    <div class="container" >
      <!-- <label for="user"> Select a Traveller </label> -->

      <!-- <select name="usr" id="usr"> -->
        <?php
      //    require_once 'config.php';
      //    $sql = "SELECT traveller_name, traveller_ID FROM Traveller";
      //    $result = mysqli_query($link, $sql);
      //    while ($row = mysqli_fetch_array($result)){
      //      echo '<option value="'.$row['traveller_ID'].'"> ' . $row['traveller_name'];
      //      echo '</option>';
      //    }
      //
      //    echo '</select>';
      //
      //   // $newUSRID=$_GET['usr'];
      //   // print($newUSRID);
      //
      //    echo '</div>';
        $myID = $_GET['usrid'];
        echo '<div class="container">';

      //
      //  //echo " <button onclick="window.location.href= 'ViewTrips.php'"> View Trips </button>";
      // //  echo ' <button onclick="window.location.href = 'AddTrip.php'"> Add Trip </button>';
      // //  echo ' <button onclick="window.location.href = 'QuickStats.php'"> Quick Stats </button>';
        echo "<a href='ViewTrips.php?usrid=" . $myID . "' ><button> View Trips</button></a>";
        echo "<a href='AddTrip.php?usrid=" . $myID . "' ><button>Add Trip</button></a>";
        echo "<a href='QuickStats.php?usrid=" . $myID . "' ><button>Quick Stats</button></a>";
        echo "<a href='user.php'><button>User Select</button></a>";
      //
      //   echo '</div>';
         ?>
      <!-- </select>
     </div>
     <div class="container">
     action to new page? after submission -->
    <!-- must adjust the href location so that it changes to the new html page -->

      <!-- <button onclick="window.location.href= 'ViewTrips.php'"> View Trips </button>
      <button onclick="window.location.href = 'AddTrip.php'"> Add Trip </button>
      <button onclick="window.location.href = 'QuickStats.php'"> Quick Stats </button> -->

    </div>


</body>
</html>
