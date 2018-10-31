<?php
	include ('../php/config.php');
	include_once '../common.php';
	if(isset($_SESSION['login_user'])){
	$username=$_SESSION['login_user'];
	}
	$comment = nl2br(addslashes($_POST['sub_desc']));
	$cid = $_GET['cid'];
	$scid = $_GET['scid'];
	$tid = $_GET['tid'];
	$insert = mysqli_query($conn, "INSERT INTO reply (`category_id`, `subcategory_id`, `topics_id`, `author`, `comment`, `date`)
								  VALUES ('".$cid."', '".$scid."', '".$tid."', '".$username."', '".$comment."', NOW());");
	 
	if ($insert) {
		header("Location: /schooljournal/Forum/readtopic.php?cid=".$cid."&scid=".$scid."&tid=".$tid."");
	}
?>