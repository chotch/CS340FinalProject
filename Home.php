<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Home.css">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@500&display=swap" rel="stylesheet">
        <title>Travel Tracker</title>
    </head>
<body>

    <h1 class="logo">Travel Tracker</h1>

<div class="container" >
<!-- action to new page? after submission -->
<!-- must adjust the href location so that it changes to the new html page -->
  <button onclick="window.location.href= 'ViewTrips.html'"> View Trips </button>
  <button onclick="window.location.href = 'AddTrip.html'"> Add Trip </button>
  <button onclick="window.location.href = 'QuickStats.html'"> Quick Stats </button>

</div>




<script>
function myFunction() {
    var Uname = document.getElementById("frm1")[0].value;
    var Pass = document.getElementById("frm1")[1].value;
    var CPass = document.getElementById("frm1")[2].value;
    var Phone = document.getElementById("frm1")[3].value;

    var checkBox = document.getElementById("tos");

    if(Pass != CPass){
        alert("You entered two different passwords.");
    }else if(Pass.length < 7){
        alert("Your password is not long enough.");
    }else if(Uname.length < 6){
        alert("Your username is not long enough.");
    }else if(!checkBox.checked){
        alert("You need to accept our Terms of Service.");
    }else{
        alert("Creating account with \nUsername: " + Uname + "\nPassword: " + Pass);
    }


	    //var element = document.getElementById("p1");
    //element.innerHTML = fname;

}
</script>

</body>
</html>
