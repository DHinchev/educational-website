<?php
	function dispcategories() {
		include ('../php/config.php');
		$sql = "SELECT * FROM categories ORDER BY category_title";
		$select=mysqli_query($conn, $sql) or die(mysqli_error());
		echo "<table class='category-table'>";
		echo "<tr><th>Category</th><th>Posted By</th><th>Date Posted</th></tr>";
		while ($row = mysqli_fetch_assoc($select)) {
			echo "<tr><td><p><a href='/schooljournal/Forum/subcategories.php?cid=".$row['cat_id']."'>".$row['category_title']."</p></a></td><td><p>".$row['cat_author']."</p></td><td><p>".$row['date']."</p></td></tr>";
		}
		echo "</table>";
	}
	
	function dispsubcategories($parent_id) {
		include ('../php/config.php');
		$sql =  "SELECT cat_id, subcat_id, subcategory_title, subcategory_desc FROM categories, subcategories 
									  WHERE ($parent_id = categories.cat_id) AND ($parent_id = subcategories.parent_id) ORDER BY subcategory_title";
		$select=mysqli_query($conn, $sql) or die(mysqli_error());
		echo "<table class='category-table'>";
		echo "<tr><th>Subcategory</th><th>Description</th><th>Topics</th></tr>";
		while ($row = mysqli_fetch_assoc($select)) {
			echo "<tr><td class='category_title'><a href='/schooljournal/Forum/topics.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."'>
				  <p>".$row['subcategory_title']."</p></a></td><td><p>".$row['subcategory_desc']."</p></td><td class='num-topics'><p>".getnumtopics($parent_id, $row['subcat_id'])."</p></td></tr>";
		}
		echo "</table>";
	}

	function getnumtopics($cat_id, $subcat_id) {
		include ('../php/config.php');
		$sql = "SELECT category_id, subcategory_id FROM topics WHERE ".$cat_id." = category_id 
									  AND ".$subcat_id." = subcategory_id";
		$select=mysqli_query($conn, $sql) or die(mysqli_error());
		return mysqli_num_rows($select);
	}

	function disptopics($cid, $scid) {
		include ('../php/config.php');
		$sql = "SELECT topics_id, author, title, date_post, views, replies FROM categories, subcategories, topics 
									  WHERE ($cid = topics.category_id) AND ($scid = topics.subcategory_id) AND ($cid = categories.cat_id)
									  AND ($scid = subcategories.subcat_id) ORDER BY topics_id DESC";
		$select=mysqli_query($conn, $sql) or die(mysqli_error());
			echo "<table class='category-table'>";
			echo "<tr><th>Title</th><th>Posted By</th><th>Date Posted</th><th>Views</th><th>Replies</th></tr>";
			while ($row = mysqli_fetch_assoc($select)) {
				echo "<tr><td><a href='/schooljournal/Forum/readtopic.php?cid=".$cid."&scid=".$scid."&tid=".$row['topics_id']."'>
					 <p>".$row['title']."</a></p></td><td><p>".$row['author']."</p></td><td><p>".$row['date_post']."</p></td><td><p>".$row['views']."</p></td>
					 <td><p>".$row['replies']."</p></td></tr>";
			}
			echo "</table>";

		}
	
	function disptopic($cid, $scid, $tid) {
		include ('../php/config.php');
		$sql =  "SELECT cat_id, subcat_id, topics_id, author, title, content, date_post FROM 
									  categories, subcategories, topics WHERE ($cid = categories.cat_id) AND
									  ($scid = subcategories.subcat_id) AND ($tid = topics.topics_id)";
		$select=mysqli_query($conn, $sql) or die(mysqli_error());
		echo "<table class='category-table'>";
		$row = mysqli_fetch_assoc($select);
		echo nl2br("<div class='content'><h3>".$row['title']."</h3><p>".$row['author']."".$row['date_post']."</p></br><p>".$row['content']."</p></div>");
		echo "</table>";
	}
	
	function addview($cid, $scid, $tid) {
		include ('../php/config.php');
		$update =  "UPDATE topics SET views = views + 1 WHERE category_id = ".$cid." AND
									  subcategory_id = ".$scid." AND topics_id = ".$tid."";
		$select=mysqli_query($conn, $update) or die(mysqli_error());
	}
	
	function replylink($cid, $scid, $tid) {
		echo "<p><a href='/schooljournal/Forum/replyto.php?cid=".$cid."&scid=".$scid."&tid=".$tid."'>Reply to this post</a></p>";
	}
	
	function replytopost($cid, $scid, $tid) {
		echo "<div class='content'><form action='/schooljournal/Forum/addreply.php?cid=".$cid."&scid=".$scid."&tid=".$tid."' method='POST'>
			  <p>Comment: </p>
			  <textarea cols='80' rows='5' id='comment' name='comment'></textarea><br />
			  <input type='submit' value='add comment' />
			  </form></div>";
	}
	
	function dispreplies($cid, $scid, $tid) {
		include ('../php/config.php');
		$sql =  "SELECT reply.author, comment, reply.date FROM categories, subcategories, 
									  topics, reply WHERE ($cid = reply.category_id) AND ($scid = reply.subcategory_id)
									  AND ($tid = reply.topics_id) AND ($cid = categories.cat_id) AND 
									  ($scid = subcategories.subcat_id) AND ($tid = topics.topics_id) ORDER BY reply_id DESC";
		$select=mysqli_query($conn, $sql) or die(mysqli_error());
		if (mysqli_num_rows($select) != 0) {
			echo "<div class='content'><table class='category-table'>";
			while ($row = mysqli_fetch_assoc($select)) {
				echo nl2br("<tr><p width='15%'>".$row['author']."</p><p id='date'>".$row['date']."</p><p id='comment'>".$row['comment']."\n\n</p></tr>");
			}
			echo "</table></div>";
		}
	}

	function countReplies($cid, $scid, $tid) {
		include ('../php/config.php');
		$sql = "SELECT category_id, subcategory_id, topics_id FROM reply WHERE ".$cid." = category_id AND 
									  ".$scid." = subcategory_id AND ".$tid." = topics_id";
		$select=mysqli_query($conn, $sql) or die(mysqli_error());
		return mysqli_num_rows($select);
	}
?>
