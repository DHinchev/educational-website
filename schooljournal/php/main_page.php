<?php
include 'common.php';
include ('../php/config.php');
include ('content_function_main.php');
include ('search_engine_main.php');

if(isset($_SESSION['login_user'])){
$username=$_SESSION['login_user'];
}
if(isset($_SESSION['permission'])){
	$separated=$_SESSION["permission"];
}
?>

<!DOCTYPE html>
<html>
<head>
<title id="title">School-Journal</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<link rel="shortcut icon" type="image/x-icon" href="../media/favicon.ico" />
<link href="../styles/index.css" rel="stylesheet" type="text/css"/>
<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="../assets/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<header>
	<div id="header-container">
		<div id="logo" class="upper-menu"><a href="main_page.php"><img src="../media/logo1.png" alt="logo"></a></div>
		<div id="logout" class="upper-menu"><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i></a></div>
		<div id="dropdown" class="upper-menu"><button id="search" class="fa fa-search fa-2x" onclick="showSearchBar()"></button></div>	
		
		<div id="language" class="upper-menu">
		<h4><?php echo $lang['LANGUAGE_MENU']; ?></h4>
			<div id="select" >
			    <div class="language-select"><a href="main_page.php?lang=en"><p>English</p></a></div>
			    <div class="language-select"><a href="main_page.php?lang=bg"><p>Български</p></a></div>
			    <div class="language-select"><a href="main_page.php?lang=rus"><p>Русский</p></a></div>
			</div>
		</div>
		<div id="welcome"><p><?php echo $lang['WELCOME'];?> <?php echo $username;?></p></div>

			<div id="search-bar">
				<div id="search-form-wrapper">
					<form id="search-form" action="result_main.php" method="POST">
						<button type="submit" class="fa fa-search fa"></button>
						<input type="search" autocomplete="off" name="search" placeholder="<?php echo $lang['SEARCH']; ?>"  class="search-input"></input>
						<br>
						<p>Search by:</p>
						<div class="box"><input  type="radio" name="option" value="sub">Subject<br></div>
						<div class="box"><input  type="radio" name="option" value="top">Topic<br></div>
						<div class="box"><input  type="radio" name="option" value="user">Author<br></div>
					</form> 
				</div>
			</div>
	</div>
</header>

<div id="container-bg">
  <img src="../media/1.jpg" id="img" alt="background image number one" >
</div>
<aside>
 <input id="toggle" type="checkbox">
  <div class="slide-menu">
    
    <nav class="menu">
      <form id="mini_search" action="result_main.php" method="POST"><label id="icons-menu-search" name="Search bar" ><button class="fa fa-search"></button></label>
      <input type="search" autocomplete="off" name="search" placeholder="<?php echo $lang['SEARCH']; ?>"  class="search-input"></input>
      	<br>
		<div class="box"><input  type="radio" name="option" value="sub">Subject<br></div>
		<div class="box"><input  type="radio" name="option" value="top">Topic<br></div>
		<div class="box"><input  type="radio" name="option" value="user">Author<br></div>
      </form>
      
      <li><label for="toggle"><i class="fa fa-bars"></i></label><a href="main_page.php"><?php echo $lang['MENU_HOME']; ?></a></li>

      <li><label id="icons-menu-profile" name="Profile"><a class="icon-link" href="myprofile.php"><i class="fa fa-user"></i></label></a><a href="myprofile.php"><?php echo $lang['MENU_PROFILE']; ?></a></li>

      <li><label id="icons-menu-questions" name="FAQ" ><a class="icon-link" href="FAQ.php"><i class="fa fa-question"></i></a></label><a href="FAQ.php"><?php echo $lang['MENU_FAQ']; ?></a></li>

      <li><label id="icons-menu-forum" name="Forum"><a class="icon-link" href="../Forum/index.php"><i class="fa fa-folder-open"></i></a></label><a href="../Forum/index.php"><?php echo $lang['MENU_FORUM']; ?></a></li>

      <li><label id="icons-menu-forum" name="Request_new_subject"><a class="icon-link" href="request.php"><i class="fa fa-check"></i></a></label><a href="request.php"><?php echo $lang['MENU_REQUEST']; ?></a></li>

        <?php if($separated == 'teacher'){
      	echo " <li><label id='icons-menu-forum' name='MyLessons'><a class='icon-link' href='mylessons.php'><i class='fa fa-bookmark'></i></label></a><a href='mylessons.php'>".$lang['MY_LESSONS']."</a></li>";
      	} ?>

      <li id="custom"><label id="icons-menu-custom" name="custom"><i class="fa fa-angle-right"></i></label><a><?php echo $lang['CHOOSE_CUSTOM_SUBJECTS']; ?></a><div id="sub_side_menu"><form action="show_subjects.php" method="POST"><input id = "subjects_button" name="subjects_button" type="submit" value="Make your choices and click here">
      	<input id = "subjects_button_reset" name="subjects_button_reset" type="submit" value="Reset your choices"><?php dispcategories(); ?></form></div></li>

      <li><label id="icons-menu-exit" name="Exit" ><a class="icon-link" href="../index.php"><i class="fa fa-sign-out"></a></i></label><a href="../index.php"><?php echo $lang['MENU_SIGN_OUT']; ?></a></li>
    </nav>
  </div>
</aside>
<main type="context">
	<div id="main-container">
		<div id="choose-list">
			<h2><?php echo $lang['CHOOSE_SUBJECT']; ?></h2>
		</div>
		<?php dispcategoriescustom(); ?>

	</div>
</main>
<footer>
	<div id="footer">
		<div id="footer-options">
			 <a href="main_page.php"><p><?php echo $lang['MENU_HOME']; ?></p></a>
			 <a href="mylessons.php"><p><?php echo $lang['MY_LESSONS']; ?></p></a>
			 <a href="FAQ.php"><p><?php echo $lang['MENU_FAQ']; ?></p></a>
			 <a href="#"><p><?php echo $lang['ABOUT']; ?></p></a>
			 <a href="support.php"><p><?php echo $lang['SUPPORT']; ?></p></a>
		 </div>
	</div>
</footer>

<script src="../scripts/index.js" type="text/javascript"></script>
</body>
</html>