
<!DOCTYPE html>
<html>
    <head>
        <style><?php include 'Home.css'; ?></style>
        <title>View Trips</title>
    </head>
    <body>
<?php
require_once 'config.php';

//trying to figure out how to send usrid from Home page to each page
$usrid = $_REQUEST['usrid'];
$sql = "SELECT traveller_name FROM Traveller WHERE traveller_ID = $usrid";
$result = mysqli_query($link, $sql);
$row=mysqli_fetch_array($result);
$n=$row['traveller_name'];
    echo '<h1 class="logo">View Trips for '; // User with id = ';
    //print($usrid);
    print($n);
    echo '</h1>';


$sql = "SELECT B.trip_ID, B.trip_name, B.rating, B.cost, E.location_ID, E.city, E.date, H.restaurants, H.street_venues, I.indoor, I.outdoor, E2.lodging FROM

(SELECT trip_ID, traveller_ID from takes_a WHERE traveller_ID = $usrid) C
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

//new version
$tripNames = "SELECT DISTINCT trip_name, trip_ID FROM (SELECT B.trip_ID, B.trip_name, B.rating, B.cost, E.location_ID, E.city, E.date, E2.lodging FROM

(SELECT trip_ID, traveller_ID from takes_a WHERE traveller_ID = $usrid) C
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
on E.location_ID = E2.location_ID) AS BigTable";
$tripRes = mysqli_query($link, $tripNames);


while ($row = mysqli_fetch_array($tripRes)){
  echo "<div id = 'frm3' class='container' >";
  echo "Trip Name: " .$row['trip_name'];
  echo "</div>";
  $goalTrip = $row['trip_name'];

  $cityNames = "SELECT DISTINCT city, date FROM (SELECT B.trip_ID, B.trip_name, B.rating, B.cost, E.location_ID, E.city, E.date, E2.lodging FROM

  (SELECT trip_ID, traveller_ID from takes_a WHERE traveller_ID = $usrid) C
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
  on E.location_ID = E2.location_ID) AS BigTable
  WHERE trip_name = '$goalTrip'";
//  $stmt = $mysqli->prepare($cityNames);
//  $stmt->bind_param("ss", $goalTrip);
//  $stmt->execute();

  $cityRes = mysqli_query($link, $cityNames);
//  $testSql = "SELECT city FROM Location";
//  $testSqlRes = mysqli_query($link, $testSql);
  echo "<div id = 'frm1' div class='container'>";
  echo nl2br("Location(s): \r\n");
  while ($rowC = mysqli_fetch_array($cityRes)){
    //echo "Location(s): "; //.$rowC['city'];
    print($rowC['city']);
    echo ", Date Visited: ";
    print($rowC['date']);
    echo nl2br("\r\n");
  }
  echo "</div>";

  $lodgingNames = "SELECT DISTINCT lodging FROM (SELECT B.trip_ID, B.trip_name, B.rating, B.cost, E.location_ID, E.city, E.date, E2.lodging FROM

  (SELECT trip_ID, traveller_ID from takes_a WHERE traveller_ID = $usrid) C
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
  on E.location_ID = E2.location_ID) AS BigTable
  WHERE trip_name = '$goalTrip'";

  $lodgeRes = mysqli_query($link, $lodgingNames);
  echo "<div id = 'frm1' div class='container'>";
  echo nl2br("Lodging: \r\n");
  while ($rowL = mysqli_fetch_array($lodgeRes)){
    print($rowL['lodging']);
    echo nl2br("\r\n");
  }
  echo "</div>";

  $costRating = "SELECT DISTINCT rating, cost FROM (SELECT B.trip_ID, B.trip_name, B.rating, B.cost, E.location_ID, E.city, E.date, E2.lodging FROM

  (SELECT trip_ID, traveller_ID from takes_a WHERE traveller_ID = $usrid) C
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
  on E.location_ID = E2.location_ID) AS BigTable
  WHERE trip_name = '$goalTrip'";

  $crRes = mysqli_query($link, $costRating);
  $rowCR = mysqli_fetch_array($crRes);
  echo "<div id = 'frm1' div class='container'>";
  echo "Rating: " . $rowCR['rating'];
  echo "</div>";

   echo "<div id = 'frm1' div class='container'>";
   echo "Cost: " .$rowCR['cost'];
   echo "</div>";

   //do restaurants
   $foodSql = "SELECT DISTINCT restaurants, street_venues FROM (SELECT B.trip_ID, B.trip_name, B.rating, B.cost, E.location_ID, E.city, E.date, H.restaurants, H.street_venues  FROM

(SELECT trip_ID, traveller_ID from takes_a WHERE traveller_ID = $usrid) C
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
(SELECT location_ID, food_ID from eats_at) F
ON D.location_ID = F.location_ID
LEFT JOIN
(SELECT food_ID, restaurants, street_venues from Food) H
ON F.food_ID = H.food_ID) AS BigTable
WHERE trip_name = '$goalTrip'";

  $foodRes = mysqli_query($link, $foodSql);
  echo "<div id = 'frm1' div class='container'>";
  echo nl2br("Food: \r\n");
  while ($rowF = mysqli_fetch_array($foodRes)){
    if ($rowF['restaurants'] == $rowF['street_venues']){
      print($rowF['restaurants']);
      echo nl2br("\r\n");
    }
    else {
      print($rowF['street_venues']);
      echo nl2br("\r\n");
      print($rowF['restaurants']);
      echo nl2br("\r\n");
    }
  }
  echo "</div>";

  //do activities
  $actSql = "SELECT DISTINCT indoor, outdoor FROM (SELECT B.trip_ID, B.trip_name, B.rating, B.cost, E.location_ID, E.city, E.date, I.indoor, I.outdoor FROM

(SELECT trip_ID, traveller_ID from takes_a WHERE traveller_ID = $usrid) C
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
(SELECT location_ID, activity_ID from does) G
ON D.location_ID = G.location_ID
LEFT JOIN
(SELECT activity_ID, indoor, outdoor from Activity) I
ON G.activity_ID = I.activity_ID) AS BigTable
WHERE trip_name = '$goalTrip'";

$actRes = mysqli_query($link, $actSql);
echo "<div id = 'frm1' div class='container'>";
echo nl2br("Activities: \r\n");
while ($rowA = mysqli_fetch_array($actRes)){
  if ($rowA['indoor'] == $rowA['outdoor']){
    print($rowA['indoor']);
    echo nl2br("\r\n");
  }
  else {
    print($rowA['indoor']);
    echo nl2br("\r\n");
    print($rowA['outdoor']);
    echo nl2br("\r\n");
  }
}
echo "</div>";

   //do buttons
   //get location_ID
   $sqlLoc = "SELECT MAX(location_ID) as max FROM (SELECT B.trip_ID, B.trip_name, B.rating, B.cost, E.location_ID, E.city, E.date, E2.lodging FROM

(SELECT trip_ID, traveller_ID from takes_a WHERE traveller_ID = $usrid) C
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
on E.location_ID = E2.location_ID) AS BigTable
WHERE trip_name = '$goalTrip'";

  $locRes = mysqli_query($link, $sqlLoc);
  $rowL = mysqli_fetch_array($locRes);

    echo "</div>";
    echo "<a href='UpdateTrip.php?usrid=" . $usrid . "&id=" . $row['trip_ID'] . "&locationid=" . $rowL['max'] . "' ><button class='update_button'>Update</button></a>";
    echo "</div>";
    echo "</div>";

    echo "</div>";
    echo "<a href='deleteTrip.php?usrid=" . $usrid . "&id=" . $row['trip_ID'] . "' ><button class='delete_button'>Delete</button></a>";
    echo "</div>";
    echo "</div>";

   //  $currName = $row['trip_name'];

     //<button onclick="window.location.href = 'Home.php'" class = "delete_button"> Delete this Trip </button>
}
//start comment
//while ($row = mysqli_fetch_array($result)){

  //did $this->
  //if ($row['trip_name'] != $currName){
  //  echo "<div id = 'frm3' class='container'>";
  //  echo "Trip Name: " . $row['trip_name'];
  //  echo "</div>";

  //did
  //  echo "<div id = 'frm1' div class='container'>";
  //  echo "Date: " . $row['date'];
  //  echo "</div>";

  //did
  //  echo "<div id = 'frm1' div class='container'>";
  //  echo "Location(s): " .$row['city'];
  //  echo "</div>";

  //did
  //  echo "<div id = 'frm1' div class='container'>";
  //  echo "Lodging: " . $row['lodging'];
  //  echo "</div>";

  //did
  //  echo "<div id = 'frm1' div class='container'>";
  //  echo "Rating: " . $row['rating'];
  //  echo "</div>";
  //did
  //  echo "<div id = 'frm1' div class='container'>";
  //  echo "Cost: " .$row['cost'];
  //  echo "</div>";

  //did
  //  echo "<div id = 'frm1' div class='container'>";
  //  echo "Food: " . $row['restaurants'];
  //  echo "</div>";

  //did
  //  echo "<div id = 'frm1' div class='container'>";
  //  echo "Activity: " . $row['indoor'];
  //  echo "</div>";

  //  echo "</div>";
  //  echo "<a href='UpdateTrip.php?usrid=" . $usrid . "&id=" . $row['trip_ID'] . "&locationid=" . $row['location_ID'] . "' ><button class='update_button'>Update</button></a>";
  //  echo "</div>";
  //  echo "</div>";

  //  echo "</div>";
  //  echo "<a href='deleteTrip.php?usrid=" . $usrid . "&id=" . $row['trip_ID'] . "' ><button class='delete_button'>Delete</button></a>";
  //  echo "</div>";
  //  echo "</div>";

  //  $currName = $row['trip_name'];

    //<button onclick="window.location.href = 'Home.php'" class = "delete_button"> Delete this Trip </button>
  //}
//}
//end comment
if ($result == ''){
  print("You must select a user first. Return to home page and click User Select.");
}



echo "<a href='Home.php?usrid=" . $usrid . "' ><button> Return to Home Page </button></a>";
?>


    <!-- action to new page? after submission -->
    <!-- <button onclick="window.location.href = 'Home.php'"> Return to Home Page </button> -->

    </div>
    </body>
</html>
