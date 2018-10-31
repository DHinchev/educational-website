<?php
	include_once '../common.php';
	if(isset($_SESSION['login_user'])){
	$username=$_SESSION['login_user'];
	}
	
	include ('../php/config.php');
	$topic = addslashes($_POST['topic']);
	$content = nl2br(addslashes($_POST['content']));
	$cid = $_GET['cid'];
	$scid = $_GET['scid'];
	
	$sqlcheck = "SELECT * FROM `topics` WHERE `title` = '$topic'";
	$result = mysqli_query($conn, $sqlcheck) or die(mysqli_error());
	if ($topic !='' && mysqli_num_rows($result)==0) 
	{
		$sql = "INSERT INTO topics (`category_id`, `subcategory_id`, `author`, `title`, `content`, `date_post`) 
								  VALUES ('".$cid."', '".$scid."', '".$_SESSION['login_user']."', '".$topic."', '".$content."', NOW())";	

		$insert = mysqli_query($conn,$sql) or die(mysqli_error());

		if ($insert) 
		{	
			header("Location: /schooljournal/Forum/topics/".$cid."/".$scid."");
		}
	}
	else
	{
		header("Location: /schooljournal/Forum/topics/".$cid."/".$scid."");
	}


?>