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
        <title>Travel Tracker User</title>
    </head>
<body>

    <h1 class="logo">Select User</h1>

    <div class="container" >
        <form action='Home.php'>
        <label for="user"> Select a Traveller </label>
        <select name="usrid" id="usr">
        <?php
         require_once 'config.php';
         $sql = "SELECT traveller_name, traveller_ID FROM Traveller";
         $result = mysqli_query($link, $sql);
         while ($row = mysqli_fetch_array($result)){
           echo '<option value="'.$row['traveller_ID'].'"> ' . $row['traveller_name'];
           echo ", ID = ";
           echo $row['traveller_ID'];
           echo '</option>';
         }


         echo '</div>';

         // $myID = $_POST['usr'];
         // echo '<div class="container">';
         // print("my id is:");
         // print($myID);
         // echo '</div>';
         ?>
        </select>
        <input type='submit' value="Submit">
        </form>

</body>
</html>
