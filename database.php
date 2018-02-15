<?php
$servername = "localhost";
$username = "root";
$password = "2015096";
$databasename = "student";

// Create connection
$conn=mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if (!$conn) {
    die("Connection failed");
} 

?>