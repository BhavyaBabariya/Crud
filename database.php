<?php
$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "crud";

// Create connection
$connection = mysqli_connect($hostname, $username, $password,$databasename);
// Check connection
if (!$connection) {
    die("Unable to Connect database: " . mysqli_connect_error());
}
?>