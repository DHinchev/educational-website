<?php
	include ('config.php');
	if(isset($_SESSION['login_user'])){
	$username=$_SESSION['login_user'];
	}

if(isset($_POST['search'])){
  $searchq = mysqli_real_escape_string($conn,$_POST['search']);
  $sqlforsub = "SELECT * FROM subjects WHERE subject_title LIKE '%$searchq%'";
  $sqlfortop = "SELECT upload_title,file_location,type,date_subject,subject,subject_title,upload_author  FROM upload  WHERE upload_title LIKE '%$searchq%'";
  $sqlforuser = "SELECT upload_title,file_location,type,date_subject,subject,subject_title,upload_author FROM upload WHERE upload_author  LIKE '%$searchq%'";
  $sqlforall=$sqlfortop;

  $selectsub=mysqli_query($conn, $sqlforsub) or die(mysqli_error());
  $selecttop=mysqli_query($conn, $sqlfortop) or die(mysqli_error());
  $selectuser=mysqli_query($conn, $sqlforuser) or die(mysqli_error());
  $selectall=mysqli_query($conn, $sqlfortop) or die(mysqli_error());

  if(mysqli_num_rows($selectsub) == 0 ||mysqli_num_rows($selectsubsub) == 0 || mysqli_num_rows($selectuser) == 0 || mysqli_num_rows($selectall) == 0){
   echo "Sorry";
    $output="There was no match";
  }
 if($_POST['search']==''){
 echo "Sorry there were no matches";
 }

  if(mysqli_num_rows($selecttop) != 0){

      while ($row = mysqli_fetch_assoc($selecttop)) {

      if(!empty($_POST['option'])) {
      $searchOpMain=$_POST['option'];
        
      if($searchOpMain=='top'){
        $outputtop="<div class='row'><p><a href='".$row['file_location']."".$row['upload_title'].".".$row['type']."'>".$row['upload_title']."</p></a><p>".$row['date_subject']."</p><p>".$row['subject_title']."</p><p>".$row['upload_author']."</p></div>";

        $queryArray[]=$outputtop;
        $i++;
        $_SESSION['searchtypemain'] = $searchOpMain;
        $_SESSION['outputtop'] = $queryArray;

      }
    }
  }

 header("Location: result_main.php");


 }

   if(mysqli_num_rows($selectuser) != 0){
      while ($row = mysqli_fetch_assoc($selectuser)) {


      if(!empty($_POST['option'])) {
        $searchOpMain=$_POST['option'];

      if($searchOpMain=='user'){
         $outputuser="<div class='row'><p><a href='".$row['file_location']."".$row['upload_title'].".".$row['type']."'>".$row['upload_title']."</p></a><p>".$row['date_subject']."</p><p>".$row['subject_title']."</p><p>".$row['upload_author']."</p></div>";

        $queryArray[]=$outputuser;
        $i++;
        $_SESSION['searchtypemain'] = $searchOpMain;
        $_SESSION['outputuser'] = $queryArray;
      }
    }
  }
   header("Location: result_main.php");
 }

  if(mysqli_num_rows($selectsub) != 0){
    while ($row = mysqli_fetch_assoc($selectsub)) {
    if(!empty($_POST['option'])) {
        $searchOpMain=$_POST['option'];

      if($searchOpMain=='sub'){
         $outputsub="<div class='subjects'><a href = 'show_result.php?cat=".$row['id']."''><h3>".$row['subject_title']."</h3></a></div>";

        $queryArray[]=$outputsub;
        $i++;
        $_SESSION['searchtypemain'] = $searchOpMain;
        $_SESSION['outputsub'] = $queryArray;
        }
      }
    }   
    header("Location: result_main.php");
    }

      if(mysqli_num_rows($selectall) != 0) {
          while ($row = mysqli_fetch_assoc($selectall)) {

      if($searchOpMain==''){
         $outputall="<div class='row'><p><a href='".$row['file_location']."".$row['upload_title'].".".$row['type']."'>".$row['upload_title']."</p></a><p>".$row['date_subject']."</p><p>".$row['upload_author']."</p></div>";

        $queryArray[]=$outputall;
        $i++;
        $_SESSION['searchtypemain'] = $searchOpMain;
        $_SESSION['outputall'] = $queryArray;
        }
       }
        header("Location: result_main.php");
     }
   }
?>