<?php
	session_start();
	
	include ('../php/config.php');

	$subcategory = nl2br(addslashes($_POST['sub_title']));
	$subcategory_desc = nl2br(addslashes($_POST['sub_desc']));
	$cid = $_GET['cid'];

	$sqlcheck = "SELECT * FROM `subcategories` WHERE `subcategory_title` = '$subcategory'";
	$result = mysqli_query($conn, $sqlcheck) or die(mysqli_error());

	if ($subcategory!='' && mysqli_num_rows($result)==0) {
		
		$sql="INSERT INTO subcategories (`parent_id`, `subcategory_title`, `subcategory_desc`) 
		VALUES ('$cid', '$subcategory','$subcategory_desc')";
		$insert = mysqli_query($conn,$sql) or die(mysqli_error());

		if ($insert) 
		{
			header("Location: /schooljournal/Forum/subcategories.php?cid=".$cid."");
		}
	}
		else
		{
			header("Location: /schooljournal/Forum/subcategories.php?cid=".$cid."");
		}


?>