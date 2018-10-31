
<?php

function searchengine(){
session_start();
include ('../config.php');
global $output,$outputcat,$outputsub,$queryArray,$i;
    $queryArray= array();
    $goodQuery = true;
    $search_output = "";
    $i=0;
if(isset($_POST['search'])){
  $searchq = mysqli_real_escape_string($conn,$_POST['search']);

  $sqlforcat = "SELECT * FROM categories WHERE `categories`.`category_title` LIKE '%$searchq%'";
  $sqlforsub = "SELECT * FROM categories JOIN subcategories ON `categories`.`cat_id` = `subcategories`.`parent_id`
          WHERE `subcategories`.`subcategory_title` LIKE '%$searchq%'";
  $sqlfortop = $sql = "SELECT * FROM categories JOIN subcategories ON `categories`.`cat_id` = `subcategories`.`parent_id` JOIN topics ON `categories`.`cat_id` = `topics`.`category_id`
          WHERE `categories`.`category_title` LIKE '%$searchq%' OR `subcategories`.`subcategory_title` LIKE '%$searchq%' OR `topics`.`title` LIKE '%$searchq%'";
  $sqlforall=$sqlfortop;

  $selectcat=mysqli_query($conn, $sqlforcat) or die(mysqli_error());
  $selectsub=mysqli_query($conn, $sqlforsub) or die(mysqli_error());
  $selecttop=mysqli_query($conn, $sqlfortop) or die(mysqli_error());
  $selectall=mysqli_query($conn, $sqlforall) or die(mysqli_error());

  if(mysqli_num_rows($selectcat) == 0 ||mysqli_num_rows($selectsub) == 0 || mysqli_num_rows($selecttop) == 0 || mysqli_num_rows($selectall) == 0){
   echo "Sorry";
    $output="There was no match";
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
        $outputsub="<a href='/schooljournal/Forum1/topics.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."'>".$cat_title." ".$sub_title."</a><br>";
        $queryArray[]=$outputsub;
        $i++;
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
         $outputtop="<a href='/schooljournal/Forum1/readtopic.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."&tid=".$row['topics_id']."'>".$cat_title." ".$sub_title." ".$topic_title."</a><br>";
        $queryArray[]=$outputtop;
        $i++;
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
        $outputcat="<a href='/schooljournal/Forum1/subcategories.php?cid=".$row['cat_id']."'>".$cat_title."</a><br>";
        $queryArray[]=$outputcat;
        $i++;
        $_SESSION['outputcat'] = $queryArray;
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

          $outputall="<a href='/schooljournal/Forum1/readtopic.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."&tid=".$row['topics_id']."'>".$cat_title." ".$sub_title." ".$topic_title."</a><br>";
        $queryArray[]=$outputall;
        $i++;
        $_SESSION['outputall'] = $queryArray;
       }
        header("Location: result.php");
     }
  }
}
?>  

<!DOCTYPE html>
<html>
<head>
	<title>TestSearch</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script>
  
  $(document).ready(function(e){
    $("#search").keyup(function()
    {
      $("#here").show();
      var x =$(this).val();
      $.ajax(
        {
          type:'GET',
          url:'getStates.php',
          data:'q=' +x,
          success:function(data)
          {
            $("#here").html(data);
          }
        ,
      });
    });
  });
</script>

</head>

<style>
  input{
    width: 400px;
    font-size: 24px;
  }
  #here{
    width: 400px;
    height: auto;
    border: 1px solid grey;
    display: none;
  }
  #here a{
    display: block;
    width: 98%;
    padding: 1%;
    font-size: 20px;
    border-bottom: 1px solid black;
    height: auto;
  }

  .box{
    width:50px;
  }

</style>

<body>

<form action="testsearch.php" method="post">
	<input type="search" name="search" id="search" autocomplete="off"></input>
  <div id="here"></div><br>
<p>Search by:</p>
<input class="box" type="radio" name="option" value="cat"><p>Category</p>
<input class="box" type="radio" name="option" value="sub"><p>Subcategory</p>
<input class="box" type="radio" name="option" value="top"><p>Topics</p>
</form> 
		<?php
   searchengine();
		?>   
</body>
</html>