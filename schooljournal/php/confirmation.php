<?php
require 'config.php';

// Passkey that got from link 
if (isset($_GET['passkey'])){
	$passkey=$_GET['passkey'];
	$email = $_GET['email'];
}

$sql="SELECT * FROM register WHERE email = '$email'";
$result=mysqli_query($conn,$sql);

if(($result) && mysqli_num_rows($result)){

$sql_activation = "UPDATE register SET activation = NULL WHERE(email ='$email' AND activation='$passkey')";
$result_activate = mysqli_query($conn,$sql_activation);
$res = mysqli_affected_rows($conn);
echo $res;
if ($result_activate){
		header("location: ../index.php");
}else {
 	echo '<div>There was a problem with your conformation.Please reload the page, we are sorry for the inconvenience</div>';
 }
}
?>