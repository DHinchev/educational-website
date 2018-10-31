<?php
require '../php/config.php';
$Username = mysqli_real_escape_string($conn, $_POST["username"]);
$Password = mysqli_real_escape_string($conn, $_POST["password"]);
$Rpassword = mysqli_real_escape_string($conn, $_POST["rpassword"]);
$Email = mysqli_real_escape_string($conn, $_POST["email"]);
$permissions = 0;
$Agreement = 0;
$output = '';
$username_check = preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/', $Username);
$password_check = preg_match('/^([1-zA-Z0-1@.\s]{1,12})$/', $Password);
$email_check = preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD', $Email);

    if(isset($_POST['submit'])) {
    	$errors = array();
    	global $Username, $conn, $Password, $Permission,$Email,$Agreement,$Rpassword;
			 if ($_POST['password']!=$_POST['rpassword'] || empty($_POST["password"])==true || empty($_POST["rpassword"])==true || strlen($Password) < 5 || strlen($Rpassword) < 5 )
    	     {
    			array_push($errors, "passwords don't match or empty");
			 }
			 
    		 if (empty($_POST["username"])==true && ($username_check)) {
    		 	array_push($errors, "username field is empty or incorrect");
    		 }

    		if (empty($_POST["email"])==true && !filter_var($Email, FILTER_VALIDATE_EMAIL)===false && ($username_check)) {
    		 	array_push($errors, "email field is empty or incorrect");
    		 }

    		 if (empty($_POST["registeras"])==true) {
    		 	array_push($errors, "you haven't selected user type");
    		 }

    		 if (empty($_POST["agreement"])==true) {
    		 	array_push($errors, "you haven't agreed on the terms");
    		 }	

    		 if (!empty($_POST['registeras'])) {
    		 	$Permission=mysqli_real_escape_string($conn, $_POST["registeras"]);
    		 }

    		 if (!empty($_POST['agreement'])) {
    		 	$Agreement=mysqli_real_escape_string($conn, $_POST["agreement"]);
    		 }

    		   $output = '';
  				foreach($errors as $val) 
  				{
    				$output .= "<div class='output'>$val</div>";
  				}

					$sqluser = "SELECT * FROM register  WHERE username ='$Username'";
					$queryuser = mysqli_query($conn, $sqluser);

					$sqlemail = "SELECT * FROM register  WHERE email ='$Email'";
					$queryemail = mysqli_query($conn, $sqlemail);

							if (!$queryuser || !$queryemail) 
					        {
            				echo ' Database Error Occured ';
        					}

								if (mysqli_num_rows($queryuser) == 0 && mysqli_num_rows($queryemail) == 0 && ($email_check) && ($username_check) && $password_check)
								{
									$Activation = md5(uniqid(rand(), true));
									$sql = "INSERT INTO register (username, password, email, permissions, agreement, activation) VALUES ('$Username', '$Password', '$Email', '$Permission', '$Agreement','$Activation')";
									$query = mysqli_query($conn, $sql);
									
									if($query){
										$to=$Email;
										$subject = 'School-Journal conformation email';
										$subject="School-journal confirmation link here";
										$headers =  'From: daniel.hinchev@outlook.com' . "\r\n" .
    												'Reply-To: daniel.hinchev@outlook.com' . "\r\n" .
    												'X-Mailer: PHP/' . phpversion();

										$message="Your Comfirmation link \r\n";
										$message.="Click on this link to activate your account \r\n";
										$message.='http://localhost/schooljournal/php/confirmation.php?passkey='.$Activation.'&email='.$Email.'';
										$send = mail($to, $subject, $message, $headers);
										}

										else {
												echo "Not found your email in our database";
											 }

												if($send){
																echo "Your Confirmation link Has Been Sent To Your Email Address.";
															 }
												else {
														echo "Cannot send Confirmation link to your e-mail address";
													 }

										header("location: ../index.php#hideRegisterForm");
								}  
								 mysqli_close($conn);
				
				header("location: ../index.php#hideRegisterForm");
    }
?>