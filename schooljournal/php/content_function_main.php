
 	<?php
 	/*Display every single subject from the database in "Choose personal subjects" option and order them alphabetically*/
	function dispcategories() {
		include ('config.php');

		$sql =  "SELECT * FROM subjects ORDER BY subject_title";
		$select = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$i=0;
		while ($row = mysqli_fetch_assoc($select)) {
			$i++;
			echo "<div class='subjects'>";
			echo "<label for='check".$i."'><h4>".$row['subject_title']."</h4></label><input type='checkbox' id='check".$i."' name='custom_sub[]' value=".$row['id'].">";
			echo "</div>";
			}
		}

		/*Display the custom choices of the user on the main content of the page and order them alphabetically*/
		function dispcategoriescustom() {
		include ('config.php');
		if(isset($_SESSION['login_user'])){
		$username=$_SESSION['login_user'];
		}
		$sql =  "SELECT subjects.id,subjects.subject_title FROM subjects,user_subjects WHERE user_subjects.subjects_parent_id=subjects.id ORDER BY subjects.subject_title ";
		$select = mysqli_query($conn,$sql) or die(mysqli_error($conn));

		while ($row = mysqli_fetch_assoc($select)) {
			echo "<div class='subjects'>";
			echo "<a href = 'show_result.php?cat=".$row['id']."''><h3>".$row['subject_title']."</h3></a>";
			echo "</div>";
			}
		}

		//Display the custom subjects from which the user is allowed to publish lessons and are available when submitting the content
		//in the text editor
		function dispselectcat() {
		include ('config.php');

		$sql ="SELECT subjects.id,subjects.subject_title FROM subjects,user_subjects WHERE user_subjects.subjects_parent_id=subjects.id";
		$select = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		echo "<select id='subjects' name='categories'>";
		echo "<option value='0'></option>";
		while ($row = mysqli_fetch_assoc($select)) {
			echo $row['id'];
			echo "<option value=".$row['id'].">".$row['subject_title']."</option>";
		}
		echo "</select>";
		}
		//display the results from search
		function showcat($cat){
		include ('config.php');
		$sql =  "SELECT upload_title,file_location,type,date_subject,subject,upload_author,id FROM upload,subjects WHERE (upload.subject=subjects.id AND $cat=subjects.id)";
		$select=mysqli_query($conn, $sql) or die(mysqli_error($conn));

		$sqlget_title =  "SELECT subject_title FROM subjects WHERE $cat=subjects.id";
		$select_title=mysqli_query($conn, $sqlget_title) or die(mysqli_error($conn));

		while ($row = mysqli_fetch_assoc($select_title)) {
			$_SESSION['title'] = $row['subject_title'];
		}

		echo "<div class='category-table'>";
		echo "<table >";
		echo "<tr><th>Files</th><th>Date published</th><th>Author</th></tr>";
		while ($row = mysqli_fetch_assoc($select)) {
			echo "<tr><td><p><a href='".$row['file_location']."".$row['upload_title'].".".$row['type']."'>".$row['upload_title']."</p></a></td><td><p>".$row['date_subject']."</p></td><td><p>".$row['upload_author']."</p></td></tr>";
		}
		echo "</table>";
		echo "</div>";
		}


		/*Display the user personal lessons in the My lessons option*/
		function mylessons(){
		include ('config.php');
		$username=$_SESSION['login_user'];
		$sql =  "SELECT upload_title,file_location,type,date_subject,subject,upload_author FROM upload WHERE ('$username'=upload_author)";
		$select=mysqli_query($conn, $sql) or die(mysqli_error($conn));
		echo "<h2>Your publications</h2>";
		echo "<div class='category-table'>";
		echo "<table >";
		echo "<tr><th>Files</th><th>Date published</th><th>Author</th><th>Edit</th></tr>";
		while ($row = mysqli_fetch_assoc($select)) {
			echo "<tr><td><p><a href='".$row['file_location']."".$row['upload_title'].".".$row['type']."'>".$row['upload_title']."</p></a></td><td><p>".$row['date_subject']."</p></td><td><p>You</p></td><td><p><a href='".$row['file_location']."".$row['upload_title'].".".$row['type']."'>".$row['upload_title']."</p></a></td></tr>";
			//this line here get the content of every file created by the user individually and displays it on the page
			// echo file_get_contents("".$row['file_location']."".$row['upload_title'].".".$row['type']."");
		}
		echo "</table>";
		echo "</div>";

			
		}
		/*Displays the user personal data inside the Profile page.*/
		function mylprofile(){
		include ('config.php');
		$username=$_SESSION['login_user'];
		global $Username,$Email;
		$sql =  "SELECT * FROM register WHERE '$username'=username";
		$select=mysqli_query($conn, $sql) or die(mysqli_error($conn));
		echo "<h2>Your Profile</h2>";

		while ($row = mysqli_fetch_assoc($select)) {
			echo "<p>".$row['username']."</p><p>Type your new username here:</p><input type='text' name='change_username'><input type='submit' name='change_username_submit'>";
			echo "<p>".$row['email']."</p><p>Change your email here:</p><input type='text' name='change_email'><input type='submit' name='change_email_submit'> ";
			echo "<p>".$row['permissions']."</p>";
			}
		}
	?> 