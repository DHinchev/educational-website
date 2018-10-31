<?php
		session_start();
		$user_name = $_SESSION['login_user'];
		$titlesub = $_SESSION['title'];
		$title = $_POST['title'];
		$content = $_POST['input'];
		$selectcat = $_POST['categories'];
		include ('config.php');

		if($_POST['submit'] && $title !='' && $selectcat != '' && !empty($content)){
			$title = $_POST['title'];
			$selectcat = $_POST['categories'];
			$type = "html";
			$location = "../lessons/$user_name/";
			$name = "../lessons/$user_name/$title.$type";
			$css = "../lessons/$user_name/content.css";
			$css_content = "body{background-color:#008B8B};";

			//check if the user personal folder exits
			if(!file_exists('../lessons/'.$user_name.'/')){
				$directory = mkdir('../lessons/'.$user_name.'/');
				file_put_contents($name, $_POST['input']);
				file_put_contents($css,$css_content);
				$size = filesize($name);
				if($_GET){
		      		$ro = $_SERVER['QUERY_STRING'];
		      		$x = explode("=",$ro);
		      	    $q = $x[0];
		      	    $n = $x[1];
      	
 					}
				//Set the form information insede the database
				$sql = "INSERT INTO upload (`parent_id_cat`,`upload_title`,`file_location`,`type`,`size`,`date_subject`,`subject`,`upload_author`,`subject_title`) VALUES ('".$n."','".$title."','".$location."','".$type."','".$size."',NOW(),'".$selectcat."','".$user_name."','".$titlesub."')";
				$select=mysqli_query($conn, $sql) or die(mysqli_error($conn));
				mysqli_close($conn);
				header("Location:editor.php?cat=".$n);
			}else{
				if($_POST['submit'] && $title !='' && !empty($selectcat) && !empty($content)){
				file_put_contents($name, $_POST['input']);
				$size = filesize($name);
				if($_GET){
		      		$ro = $_SERVER['QUERY_STRING'];
		      		$x = explode("=",$ro);
		      	    $q = $x[0];
		      	    $n = $x[1];
 					}

 					$array = array();
					$array = $_POST['input'];

 					$sqlcheck = "SELECT upload_title FROM upload WHERE upload_title = '$title' AND upload_author = '$user_name'";
 					$selectcheck=mysqli_query($conn, $sqlcheck) or die(mysqli_error($conn));
 					if (mysqli_num_rows($selectcheck) !=0) {
 						$delete = "DELETE FROM upload WHERE upload_title = '$title' AND upload_author = '$user_name'";
 						$selecdelete=mysqli_query($conn, $delete) or die(mysqli_error($conn));
 					}
				//Set the form information inside the database
				$sql = "INSERT INTO upload (`parent_id_cat`,`upload_title`,`file_location`,`type`,`size`,`date_subject`,`subject`,`upload_author`,`subject_title`) VALUES ('".$n."','".$title."','".$location."','".$type."','".$size."',NOW(),'".$selectcat."','".$user_name."','".$titlesub."')";
				$select=mysqli_query($conn, $sql) or die(mysqli_error($conn));
				mysqli_close($conn);
				header("Location:editor.php?cat=".$n);
				}
				header("Location:editor.php?cat=".$n);
			}
}
else{
	header("Location:editor.php?cat=".$n);
}

?>