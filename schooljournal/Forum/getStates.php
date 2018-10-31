<?php
    include ('../php/config.php');
    global $result;
    if(!empty($_GET['q']))
    {
        $i=0;
        $q=$_GET['q'];
          $query = "SELECT * FROM categories JOIN subcategories ON `categories`.`cat_id` = `subcategories`.`parent_id` JOIN topics ON `categories`.`cat_id` = `topics`.`category_id`
          WHERE `categories`.`category_title` LIKE '%$q%' OR `subcategories`.`subcategory_title` LIKE '%$q%' OR `topics`.`title` LIKE '%$q%'";
        $result=mysqli_query($conn,$query);

        while($row=mysqli_fetch_assoc($result))
            {
                  $topic_title=$row['title'];
                  $idtopic=$row['topics_id'];

                  $sub_title=$row['subcategory_title'];
                  $idsub=$row['subcat_id'];

                  $cat_title=$row['category_title'];
                  $idcat=$row['cat_id'];

      if(!empty($_GET['option'])) {
        $searchOp=$_GET['option'];

        if($searchOp=='cat'){
          $outputcat="<a href='/schooljournal/Forum/subcategories.php?cid=".$row['cat_id']."'>".$cat_title."</a><br>";
          echo $outputcat;
      }

        if($searchOp=='sub'){
          $outputsub="<a href='/schooljournal/Forum/topics.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."'>".$cat_title." ".$sub_title."</a><br>";
          echo $outputsub;
      }

        if($searchOp=='top'){
          $outputtop="<a href='/schooljournal/Forum/readtopic.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."&tid=".$row['topics_id']."'>".$cat_title." ".$sub_title." ".$topic_title."</a><br>";
          echo $outputtop;
      }

        if($searchOp=='all'){
          $outall="<a href='/schooljournal/Forum/readtopic.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."&tid=".$row['topics_id']."'>".$cat_title." ".$sub_title." ".$topic_title."</a><br>";
          echo $outall;
      }
    }

      else{
          $outputall="<a href='/schooljournal/Forum1/readtopic.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."&tid=".$row['topics_id']."'>".$cat_title." ".$sub_title." ".$topic_title."</a><br>";
            echo $outputall;
      }
    }
  }
?>
