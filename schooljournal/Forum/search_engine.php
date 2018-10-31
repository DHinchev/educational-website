<?php
	include ('../php/config.php');
  include_once '../common.php';
  
	if(isset($_SESSION['login_user'])){
	$username=$_SESSION['login_user'];
	}

if(isset($_POST['search'])){
  $searchq = mysqli_real_escape_string($conn,$_POST['search']);

  $sqlforcat = "SELECT * FROM categories WHERE `categories`.`category_title` LIKE '%$searchq%'";
  $sqlforsub = "SELECT * FROM categories JOIN subcategories ON `categories`.`cat_id` = `subcategories`.`parent_id`
          WHERE `subcategories`.`subcategory_title` LIKE '%$searchq%'";
  $sqlfortop = "SELECT * FROM categories JOIN subcategories ON `categories`.`cat_id` = `subcategories`.`parent_id` JOIN topics ON `categories`.`cat_id` = `topics`.`category_id`
          WHERE `categories`.`category_title` LIKE '%$searchq%' OR `subcategories`.`subcategory_title` LIKE '%$searchq%' OR `topics`.`title` LIKE '%$searchq%'";
  $sqlforall=$sqlfortop;
  $all=$sqlfortop;

  $selectcat=mysqli_query($conn, $sqlforcat) or die(mysqli_error());
  $selectsub=mysqli_query($conn, $sqlforsub) or die(mysqli_error());
  $selecttop=mysqli_query($conn, $sqlfortop) or die(mysqli_error());
  $all=mysqli_query($conn, $all) or die(mysqli_error());
  $selectall=mysqli_query($conn, $sqlforall) or die(mysqli_error());

  if(mysqli_num_rows($selectcat) == 0 ||mysqli_num_rows($selectsub) == 0 || mysqli_num_rows($selecttop) == 0 || mysqli_num_rows($selectall) == 0 || mysqli_num_rows($all) == 0){
   echo "Sorry, there was no match";
  }
 if($_POST['search']==''){
 echo "Sorry there were no matches";
 }

  if(mysqli_num_rows($selectsub) != 0){

      while ($row = mysqli_fetch_assoc($selectsub)) {

      $cat_title=$row['category_title'];
      $sub_title=$row['subcategory_title'];
      $idsub=$row['subcat_id'];

      if(!empty($_POST['option'])) {
        $searchOp=$_POST['option'];

      if($searchOp=='sub'){
        $outputsub="<a href='/schooljournal/Forum/topics.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."'>".$cat_title." ".$sub_title."</a><br>";
        $queryArray[]=$outputsub;
        $i++;
        $_SESSION['searchtype'] = $searchOp;
        $_SESSION['outputsub'] = $queryArray;

      }
    }
  }
 header("Location: result.php");

 }

   if(mysqli_num_rows($selecttop) != 0){
      while ($row = mysqli_fetch_assoc($selecttop)) {
      $topic_title=$row['title'];
      $idtopic=$row['topics_id'];

      $sub_title=$row['subcategory_title'];
      $idsub=$row['subcat_id'];

      $cat_title=$row['category_title'];
      $idcat=$row['cat_id'];
      if(!empty($_POST['option'])) {
        $searchOp=$_POST['option'];

      if($searchOp=='top'){
         $outputtop="<a href='/schooljournal/Forum/readtopic.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."&tid=".$row['topics_id']."'>".$cat_title." ".$sub_title." ".$topic_title."</a><br>";

        $queryArray[]=$outputtop;
        $i++;
        $_SESSION['searchtype'] = $searchOp;
        $_SESSION['outputtop'] = $queryArray;
      }
    }
  }
   header("Location: result.php");
 }

  if(mysqli_num_rows($selectcat) != 0){
    while ($row = mysqli_fetch_assoc($selectcat)) {
      $cat_title=$row['category_title'];
      $idcat=$row['cat_id'];

      if(!empty($_POST['option'])) {
        $searchOp=$_POST['option'];

      if($searchOp=='cat'){
        $outputcat="<a href='/schooljournal/Forum/subcategories.php?cid=".$row['cat_id']."'>".$cat_title."</a><br>";

        $queryArray[]=$outputcat;
        $i++;
        $_SESSION['searchtype'] = $searchOp;
        $_SESSION['outputcat'] = $queryArray;
      }
    }   
    }
     header("Location: result.php");
   }

   if(mysqli_num_rows($all) != 0){
      while ($row = mysqli_fetch_assoc($all)) {
      $topic_title=$row['title'];
      $idtopic=$row['topics_id'];

      $sub_title=$row['subcategory_title'];
      $idsub=$row['subcat_id'];

      $cat_title=$row['category_title'];
      $idcat=$row['cat_id'];
      if(!empty($_POST['option'])) {
        $searchOp=$_POST['option'];

      if($searchOp=='all'){
         $outputall="<a href='/schooljournal/Forum/readtopic.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."&tid=".$row['topics_id']."'>".$cat_title." ".$sub_title." ".$topic_title."</a><br>";

        $queryArray[]=$outputall;
        $i++;
        $_SESSION['searchtype'] = $searchOp;
        $_SESSION['all'] = $queryArray;
      }
    }
  }
   header("Location: result.php");
 }

      if(mysqli_num_rows($selectall) != 0) {
          while ($row = mysqli_fetch_assoc($selectall)) {
          $topic_title=$row['title'];
          $idtopic=$row['topics_id'];

          $sub_title=$row['subcategory_title'];
          $idsub=$row['subcat_id'];

          $cat_title=$row['category_title'];
          $idcat=$row['cat_id'];

          $outputall="<a href='/schooljournal/Forum/readtopic.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."&tid=".$row['topics_id']."'>".$cat_title." ".$sub_title." ".$topic_title."</a><br>";

        $queryArray[]=$outputall;
        $i++;
        $_SESSION['searchtype'] = $searchOp;
        $_SESSION['outputall'] = $queryArray;
       }
        header("Location: result.php");
     }
  }
?>