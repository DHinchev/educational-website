<?php
require 'config.php';
/*This script is for the forgotten password feature.*/
if(isset($_POST['submit_forgotten_pass'])){

	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	if($email != ""){
		$sql= "SELECT email,username,password,activation FROM register WHERE email = '$email'";
		$result = mysqli_query($conn,$sql);
		if(($result) && mysqli_num_rows($result)){
			while($row = mysqli_fetch_assoc($result)){
				$username = $row["username"];
				$password = $row["password"];
				$activation = $row["activation"];
			}
				if($activation==""){
				$to=$email;
				$subject = 'School-Journal forgotten password or username';
				// Your subject
				$subject="School-journal forgotten password or username";

				// From
				$headers =  'From: daniel.hinchev@outlook.com' . "\r\n" .
	    					'Reply-To: daniel.hinchev@outlook.com' . "\r\n" .
	    					'X-Mailer: PHP/' . phpversion();

				// Your message
				$message="Your forgotten credentials are: \r\n";
				$message.="username:$username\r\n";
				$message.="password:$password";

				// send email
				$send = mail($to, $subject, $message, $headers);
				if($send){
					header("location: ../index.php");
					mysqli_close($conn);
				}
			}
		}

	}else{
		header("location: ../index.php#forgotten_pass");
	}
}
?>