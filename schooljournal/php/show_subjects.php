<?php
session_start();
include ('config.php');

if(isset($_SESSION['login_user'])){
$username=$_SESSION['login_user'];
}

if(isset($_POST['subjects_button'])){
if(isset($_POST['custom_sub'])){

  foreach( $_POST['custom_sub'] as $get ) {
    if( is_array( $get ) ) {
        foreach( $get as $put ) {
            echo $put;
        }
    } else {
    		 $sqlcheck = "SELECT * FROM user_subjects WHERE user = '$username' AND subjects_parent_id = '$get'";
    		 $selectcheck = mysqli_query($conn,$sqlcheck) or die(mysqli_error($conn));
    		 if(mysqli_num_rows($selectcheck) == 0){
    		 	$sql = "INSERT INTO user_subjects (user,subjects_parent_id) VALUES ('$username','$get')";
		        $select = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		        echo "it works";
    		 }
    	}
	}

}
	 header("Location: main_page.php");
}

if(isset($_POST['subjects_button_reset'])){
	$sql="DELETE FROM user_subjects WHERE user = '$username'";
	$select = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	 header("Location: main_page.php");
	}
?>

