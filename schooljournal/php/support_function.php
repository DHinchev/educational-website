<?php
require 'common.php';

if(isset($_POST['submit_request'])){
if(isset($_SESSION['login_user'])){
$username=$_SESSION['login_user'];
}

	$content = mysqli_real_escape_string($conn, $_POST["content"]);
	if($content != ""){
				$to='daniel.hinchev@outlook.com';
				$subject = "Problem query from $username";
				$subject = "Problem query from $username";
				$headers =  'From: daniel.hinchev@outlook.com' . "\r\n" .
	    					'Reply-To: daniel.hinchev@outlook.com' . "\r\n" .
	    					'X-Mailer: PHP/' . phpversion();
				$message=$content;
				$send = mail($to, $subject, $message, $headers);
				if($send){
					header("location: support.php");
					printf("Your query have been sent succesfully!");
				}	
	}else{
		header("location: support.php");
	}
}
?>