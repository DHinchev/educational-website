<?php
require 'config.php';
session_start();
global $Password,$Email;

//If the user has logged in the website, remember his username gloably
if(isset($_SESSION['login_user'])){
$username=$_SESSION['login_user'];
}
//if the user has decided to change his/her password
if(isset($_POST['change_password_submit'])) {
	$Password = mysqli_real_escape_string($conn, $_POST["change_password"]);
	//check the inputted password for dangerous for the database symbols
	$password_check = preg_match('/^([1-zA-Z0-1@.\s]{1,12})$/', $Password);
	//if the password that is dubmitted is not empty string and is bigger than 6 characters, uptate the user password.
	if($Password !='' && strlen($Password)>=6 && ($password_check)){
  					$sqluser = "UPDATE register SET password='$Password'  WHERE username ='$username'";
					$queryuser = mysqli_query($conn, $sqluser);

					header("location: myprofile.php");
	}else{
		header("location: myprofile.php");
	}
}
//if the user decided to change his email address
if(isset($_POST['change_email_submit'])) {
	$Email = mysqli_real_escape_string($conn, $_POST["change_email"]);
		//check the inputted email for dangerous for the database symbols
	$email_check = preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD', $Email);
	//if the input filed is not empty and the email is valid, update the user email
	if(!empty($Email) && $email_check){

	$sqlcheck = "SELECT email FROM register WHERE email ='$Email'";
	$querycheck = mysqli_query($conn, $sqlcheck);
			if(mysqli_num_rows($querycheck) == 0){
		  		$sqlemail = "UPDATE register SET email='$Email'  WHERE username ='$username'";
				$queryemail = mysqli_query($conn, $sqlemail);
				header("location: myprofile.php");
			}			
		}else{
			header("location: myprofile.php");
		}
	}
	//just in case to avoid errors I have set the user to be resended to the profile page on submission of new data
	if(isset($_POST['change_email_submit']) || isset($_POST['change_password_submit'])){
		header("location: myprofile.php");
	}
?>