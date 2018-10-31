<?php
require 'config.php';
$registerusername = mysqli_real_escape_string($conn, $_POST["username"]);

$sql = "SELECT * FROM `register` WHERE `username` = '$registerusername'";

$result = mysqli_query($conn, $sql) or die(mysqli_error());
if(mysqli_num_rows($result)>0){  
    echo 0;
}else{  
    echo 1;  
}
?>