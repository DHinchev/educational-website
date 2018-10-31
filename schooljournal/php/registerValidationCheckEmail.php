<?php
require 'config.php';

$registeruseremail = mysqli_real_escape_string($conn, $_POST["email"]);
$sql = "SELECT * FROM `register` WHERE `email` = '$registeruseremail'";
$result = mysqli_query($conn, $sql) or die(mysqli_error());

if(mysqli_num_rows($result)>0){  
    echo 0;
}else{  
    echo 1;  
}
?>