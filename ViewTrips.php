
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Home.css">
        <title>View Trips</title>
    </head>
    <body>

    <h1 class="logo">View Trips for User with id = 1</h1>

<?php
require_once 'config.php';
$sql = "SELECT B.trip_ID, B.trip_name, B.rating, B.cost, E.location_ID, E.city, E.date, H.restaurants, H.street_venues, I.indoor, I.outdoor, E2.lodging FROM

(SELECT trip_ID, traveller_ID from takes_a WHERE traveller_ID = 1) C
LEFT JOIN
(SELECT trip_ID, trip_name, rating, cost FROM Trip) B
on B.trip_ID = C.trip_ID
LEFT JOIN
(SELECT trip_ID, location_ID from travels_to) D
on D.trip_ID = C.trip_ID
LEFT JOIN
(SELECT location_ID, city, date from Location) E
on D.location_ID = E.location_ID
LEFT JOIN
(SELECT location_ID, lodging from Location_lodging) E2
on E.location_ID = E2.location_ID
LEFT JOIN
(SELECT location_ID, food_ID from eats_at) F
ON D.location_ID = F.location_ID
LEFT JOIN
(SELECT location_ID, activity_ID from does) G
ON D.location_ID = G.location_ID
LEFT JOIN
(SELECT food_ID, restaurants, street_venues from Food) H
ON F.food_ID = H.food_ID
LEFT JOIN
(SELECT activity_ID, indoor, outdoor from Activity) I
ON G.activity_ID = I.activity_ID";
$result = mysqli_query($link, $sql);
$currName = "";

while ($row = mysqli_fetch_array($result)){

  if ($row['trip_name'] != $currName){
    echo "<div class='container'>";
    echo $row['trip_name'];
    echo "<div id = 'frm1' div class='container'>";
  //  echo "<label for='enterMyOwn'> <b>";
    echo "Date: " . $row['date'];
    //echo "</b> </label>";
    //echo "Date: " . $row['date'];
    echo "</div>";

    echo "<div id = 'frm1' div class='container'>";
    echo "Location(s): " .$row['city'];
    echo "</div>";

    echo "<div id = 'frm1' div class='container'>";
    echo "Lodging: " . $row['lodging'];
    echo "</div>";

    echo "<div id = 'frm1' div class='container'>";
    echo "Rating: " . $row['rating'];
    echo "</div>";

    echo "<div id = 'frm1' div class='container'>";
    echo "Cost: " .$row['cost'];
    echo "</div>";

    echo "<div id = 'frm1' div class='container'>";
    echo "Food: " . $row['restaurants'];
    echo "</div>";

    echo "<div id = 'frm1' div class='container'>";
    echo "Activity: " . $row['indoor'];
    echo "</div>";

    echo "</div>";
    echo "<a href='deleteTrip.php?id=" . $row['trip_ID'] . "' ><button class='delete_button'>Delete</button></a>";
    echo "</div>";
    echo "</div>";

    $currName = $row['trip_name'];

    //<button onclick="window.location.href = 'Home.php'" class = "delete_button"> Delete this Trip </button>
  }

}
?>


    <!-- action to new page? after submission -->
    <button onclick="window.location.href = 'Home.php'"> Return to Home Page </button>

    </div>
    </body>
</html>
