<?php
	include_once '../common.php';
	if(isset($_SESSION['login_user'])){
	$username=$_SESSION['login_user'];
	}
	include ('../php/config.php');
	$category = nl2br(addslashes($_POST['category']));

	$sqlcheck = "SELECT * FROM `categories` WHERE `category_title` = '$category'";
	$result = mysqli_query($conn, $sqlcheck) or die(mysqli_error());
	if ($category!='' && mysqli_num_rows($result)==0) 
	{
		
		$sql = "INSERT INTO categories (`category_title`,`cat_author`,`date`) VALUES ('".$category."','".$_SESSION['login_user']."',NOW())";
		$insert = mysqli_query($conn,$sql) or die(mysqli_error());
		if ($insert)
		{
			header("Location: /schooljournal/Forum/index.php");
		}
	}

	else
	{
		header("Location: /schooljournal/Forum/index.php");
	}


?>