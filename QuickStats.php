
<!DOCTYPE html>
<html>
    <head>
        <style><?php include 'Home.css'; ?></style>
        <title>Quick Stats</title>
    </head>
<body>

    <h1 class="logo">Quick Stats</h1>

<!-- <div id = "frm1" div class="container">
  <label for="enterMyOwn"> <b> Total Trips: number of trips from SQL query </b></label>

 </div>
<div id = "frm1" div class="container">
  <label for="enterMyOwn"> <b> Highest Rated Trip: trip name from SQL query </b></label>
</div>

<div id = "frm1" div class="container">
  <label for="enterMyOwn"> <b> Lowest Rated Trip: trip name from SQL query </b></label>
</div>

<div id = "frm1" div class="container">
  <label for="enterMyOwn"> <b> Most Expensive Trip: trip name from SQL query: </b></label>
</div>

<div id = "frm1" div class="container">

  <label for="enterMyOwn"> <b> Least Expensive Trip: trip name from SQL query:  </b></label>
</div> -->

<?php
    require_once 'config.php';

    $userID = 1;
    // this returns the total number of trips that a user with travellerID equal to $usersID has taken
    $sql1 = "SELECT COUNT(*) AS 'count' FROM takes_a WHERE traveller_ID = $userID";

    // this returns total number of trips regardless of traveller
    $sql2 = "SELECT COUNT(*) AS 'count' FROM Trip";

    // finds maxRating of all Trips in database
    $sql3 = "SELECT B.* FROM
            (SELECT max(rating) as maxRating FROM Trip) A
            JOIN
            (SELECT trip_name, rating as maxRating FROM Trip) B
            on A.maxRating = B.maxRating";

    // finds minimum rating of all Trips in database
    $sql4 = "SELECT B.* FROM
            (SELECT min(rating) as minRating FROM Trip) A
            JOIN
            (SELECT trip_name, rating as minRating FROM Trip) B
            on A.minRating = B.minRating";

    // finds maximum cost of all trips in database
    $sql5 = "SELECT B.* FROM
            (SELECT max(cost) as maxCost FROM Trip) A
            JOIN
            (SELECT trip_name, cost as maxCost FROM Trip) B
            on A.maxCost = B.maxCost";

    // finds minimum cost of all trips in database
    $sql6 = "SELECT B.* FROM
            (SELECT min(cost) as minCost FROM Trip) A
            JOIN
            (SELECT trip_name, cost as minCost FROM Trip) B
            on A.minCost = B.minCost";

    // finds maxRating of all Trips taken by user whos traveller_ID is specified as $userID
    $sql7 = "SELECT B.* FROM
            (SELECT max(rating) as maxRating FROM Trip) A
            JOIN
            (SELECT trip_ID, trip_name, rating as maxRating FROM Trip) B
            on A.maxRating = B.maxRating
            JOIN
            (SELECT trip_ID, traveller_ID from takes_a WHERE traveller_ID = $userID) C
            on B.trip_ID = C.trip_ID";

    // finds minRating of all Trips taken by user whos traveller_ID is specified as $userID
    $sql8 = "SELECT B.* FROM
            (SELECT min(rating) as minRating FROM Trip) A
            JOIN
            (SELECT trip_ID, trip_name, rating as minRating FROM Trip) B
            on A.minRating = B.minRating
            JOIN
            (SELECT trip_ID, traveller_ID from takes_a WHERE traveller_ID = $userID) C
            on B.trip_ID = C.trip_ID";

    // finds maxCost of all Trips taken by user whos traveller_ID is specified as $userID
    $sql9 = "SELECT trip_name, cost
            FROM Trip
            WHERE trip_ID IN (SELECT trip_ID FROM takes_a WHERE traveller_ID = $userID)
            ORDER BY cost DESC limit 1";

    // finds minCost of all Trips taken by user whos traveller_ID is specified as $userID
    $sql10 = "SELECT trip_name, cost
            FROM Trip
            WHERE trip_ID IN (SELECT trip_ID FROM takes_a WHERE traveller_ID = $userID)
            ORDER BY cost limit 1";

    $result1 = mysqli_query($link, $sql1);
    $result2 = mysqli_query($link, $sql2);
    $result3 = mysqli_query($link, $sql3);
    $result4 = mysqli_query($link, $sql4);
    $result5 = mysqli_query($link, $sql5);
    $result6 = mysqli_query($link, $sql6);
    $result7 = mysqli_query($link, $sql7);
    $result8 = mysqli_query($link, $sql8);
    $result9 = mysqli_query($link, $sql9);
    $result10 = mysqli_query($link, $sql10);

    echo "<div id = 'frm2'>";
    echo "Your Facts: ";
    echo "</div>";

    while ($row = mysqli_fetch_array($result1)){
        echo "<div id = 'frm1' div class='container'>";
        echo "Total Trips You Have Taken: " . $row['count'];
        echo "</div>";
    }

    echo "<div id = 'frm1' div class='container'>";
    echo "Your Highest Rated Trip: ";
    echo "</div>";
    while ($row = mysqli_fetch_array($result7)){
        echo "<div class='container2'>";
        echo $row['trip_name'] . ": " . $row['maxRating'];
        echo "</div>";
    }

    echo "<div id = 'frm1' div class='container'>";
    echo "Your Lowest Rated Trip: ";
    echo "</div>";
    while ($row = mysqli_fetch_array($result8)){
        echo "<div class='container2'>";
        echo $row['trip_name'] . ": " . $row['minRating'];
        echo "</div>";
    }

    echo "<div id = 'frm1' div class='container'>";
    echo "Your Most Expensive Trip: ";
    echo "</div>";
    while ($row = mysqli_fetch_array($result9)){
        echo "<div class='container2'>";
        echo $row['trip_name'] . ": " . $row['cost'];
        echo "</div>";
    }

    echo "<div id = 'frm1' div class='container'>";
    echo "Your Least Expensive Trip: ";
    echo "</div>";
    while ($row = mysqli_fetch_array($result10)){
        echo "<div class='container2'>";
        echo $row['trip_name'] . ": " . $row['cost'];
        echo "</div>";
    }

    echo "<div id = 'frm2'>";
    echo "Database Facts: ";
    echo "</div>";

    while ($row = mysqli_fetch_array($result2)){
        echo "<div id = 'frm1' div class='container'>";
        echo "Total Trips In Database: " . $row['count'];
        echo "</div>";
    }

    echo "<div id = 'frm1' div class='container'>";
    echo "Highest Rated Trips In Database: ";
    echo "</div>";
    while ($row = mysqli_fetch_array($result3)){
        echo "<div class='container2'>";
        echo $row['trip_name'] . ": " . $row['maxRating'];
        echo "</div>";
    }

    echo "<div id = 'frm1' div class='container'>";
    echo "Lowest Rated Trips In Database: ";
    echo "</div>";
    while ($row = mysqli_fetch_array($result4)){
        echo "<div class='container2'>";
        echo $row['trip_name'] . ": " . $row['minRating'];
        echo "</div>";
    }

    echo "<div id = 'frm1' div class='container'>";
    echo "Most Expensive Trip In Database: ";
    echo "</div>";
    while ($row = mysqli_fetch_array($result5)){
        echo "<div class='container2'>";
        echo $row['trip_name'] . ": " . $row['maxCost'];
        echo "</div>";
    }

    echo "<div id = 'frm1' div class='container'>";
    echo "Least Expensive Trip In Database: ";
    echo "</div>";
    while ($row = mysqli_fetch_array($result6)){
        echo "<div class='container2'>";
        echo $row['trip_name'] . ": " . $row['minCost'];
        echo "</div>";
    }
?>

<!-- action to new page? after submission -->
<button onclick="window.location.href = 'Home.php'"> Return to Home Page </button>

</div>


