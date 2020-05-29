<?php
define('DB_SERVER', 'classmysql.engr.oregonstate.edu');
define('DB_USERNAME', 'cs340_whitbeyc');
define('DB_PASSWORD', 'cs340database');
define('DB_NAME', 'cs340_whitbeyc');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($link == false){
	die("ERROR: Could not connect. " .mysqli_connect_error());
}
?>
