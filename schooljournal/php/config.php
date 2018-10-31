<?php
/*Establish connection with the database*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schooljournal";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>