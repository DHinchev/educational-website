<?php
include 'common.php';
include ('../php/config.php');
include ('content_function_main.php');
include ('search_engine_main.php');

if(isset($_SESSION['login_user'])){
$username=$_SESSION['login_user'];
}
if(isset($_SESSION['permission'])){
	$separated=$_SESSION['permission'];
}
if(isset($_SESSION['title'])){
  $title=$_SESSION['title'];
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

<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
tinymce.init({
  selector: '#mytextarea',
  height: '600px',
  skin:'custom',
  toolbar1: ' fullpage | insertfile undo redo | styleselect | fontsizeselect fontselect',
  toolbar2: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media | fullscreen | forecolor backcolor',
  plugins: [
    'fullpage advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code',
    'wordcount fullscreen imagetools save textcolor'
  ],
  menubar: 'file, edit, insert, view, table',
  fullpage_default_doctype: "<!DOCTYPE html>",
  fullpage_default_encoding: "UTF-8",
  fullpage_default_langcode: "en-US",
  save_enablewhendirty : true,
  save_onsavecallback : "MySave",
  advlist_number_styles: 'lower-alpha,lower-roman,upper-alpha,upper-roman',
  resize: false,
  image_caption: true,
  image_advtab: true,
  media_live_embeds: true,
  media_alt_source: false,
  paste_data_images: true,
  paste_as_text: true,
  font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n;Arial Black=arial black;Agency FB=Agency FB;Aharoni=Aharoni;Algerian=Algerian;Andalus=Andalus;Angsana New=Angsana New;Aparajita=Aparajita;Batang=Batang;BatangChe=BatangChe;Blackadder ITC=Blackadder ITC;Bodoni MT Black=Bodoni MT Black;Bookman Old Style=Bookman Old Style;Bookshelf Symbol 7=Bookshelf Symbol 7;Bradley Hand ITC=Bradley Hand ITC;Broadway=Broadway;BrowalliaUPC=BrowalliaUPC;Brush Script MT=Brush Script MT;Calibri=Calibri;Cambria=Cambria;Century=Century;Century Gothic=Century Gothic;Consolas=Consolas;Constantia=Constantia;Copperplate Gothic Light=Copperplate Gothic Light;Courier=Courier;Edwardian Script ITC=Edwardian Script ITC;Euphemia=Euphemia;FangSong=FangSong;Forte=Forte;Gabriola=Gabriola;Garamond=Garamond;Georgia=Georgia;Kokila=Kokila;Lucida Bright=Lucida Bright;Lucida Calligraphy=Lucida Calligraphy;Lucida Sans Unicode=Lucida Sans Unicode;Mangal=Mangal;Miriam Fixed=Miriam Fixed;MS Reference Specialty=MS Reference Specialty;Playbill=Playbill;Rod=Rod;Showcard Gothic=Showcard Gothic;Vivaldi=Vivaldi;Verdana=Verdana;',
  imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
   fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt 72pt",
    video_template_callback: function(data) {
   return '<video width="' + data.width + '" height="' + data.height + '"' + (data.poster ? ' poster="' + data.poster + '"' : '') + ' controls="controls">\n' + '<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + (data.source2 ? '<source src="' + data.source2 + '"' + (data.source2mime ? ' type="' + data.source2mime + '"' : '') + ' />\n' : '') + '</video>';
 }
});
</script>

</head>
<body id="<?php echo $lang['LANGUAGE']; ?>">

<header>
  <div id="header-container">
    <div id="logo" class="upper-menu"><a href="main_page.php"><img src="../media/logo1.png" alt="logo"></a></div>
  	<div id="logout" class="upper-menu"><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i></a></div>
  	<div id="dropdown" class="upper-menu"><button id="search" class="fa fa-search fa-2x" onclick="showSearchBar()"></button></div>	
  	
  	<div id="language" class="upper-menu">
  	<h4><?php echo $lang['LANGUAGE_MENU']; ?></h4>
  		<div id="select" >
  		    <div class="language-select"><a href="show_result.php?lang=en"><p>English</p></a></div>
  		    <div class="language-select"><a href="show_result.php?lang=bg"><p>Български</p></a></div>
  		    <div class="language-select"><a href="show_result.php?lang=rus"><p>Русский</p></a></div>
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
  					<div class="box"><input  type="radio" name="option" value="top">Topics<br></div>
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

      <li><label name="Profile"><a class="icon-link" href="myprofile.php"><i class="fa fa-user"></i></label></a><a href="myprofile.php"><?php echo $lang['MENU_PROFILE']; ?></a></li>

      <li><label name="FAQ" ><a class="icon-link" href="FAQ.php"><i class="fa fa-question"></i></a></label><a href="FAQ.php"><?php echo $lang['MENU_FAQ']; ?></a></li>

      <li><label name="Forum"><a class="icon-link" href="../Forum/index.php"><i class="fa fa-folder-open"></i></a></label><a href="../Forum/index.php"><?php echo $lang['MENU_FORUM']; ?></a></li>

      <li><label name="Request_new_subject"><a class="icon-link" href="request.php"><i class="fa fa-check"></i></a></label><a href="request.php"><?php echo $lang['MENU_REQUEST']; ?></a></li>

        <?php if($separated == 'teacher'){
        echo " <li><label id='icons-menu-forum' name='MyLessons'><a class='icon-link' href='mylessons.php'><i class='fa fa-bookmark'></i></label></a><a href='mylessons.php'>".$lang['MY_LESSONS']."</a></li>";
        } ?>
        <li id="custom"><label name="custom"><i class="fa fa-angle-right"></i></label><a><?php echo $lang['CHOOSE_CUSTOM_SUBJECTS']; ?></a><div id="sub_side_menu"><form action="show_subjects.php" method="POST"><input id = "subjects_button" name="subjects_button" type="submit" value="Make your choices and click here">
        <input name="subjects_button_reset" type="submit" value="Reset your choices"><?php dispcategories(); ?></form></div></li>

      <li><label name="Favourites"><a class="icon-link" href="mylessons.php"><i class="fa fa-bookmark"></i></label><a href="mylessons.php"><?php echo $lang['MENU_FAVOURITES']; ?></a></li>

      <li><label name="Exit" ><a class="icon-link" href="../index.php"><i class="fa fa-sign-out"></a></i></label><a href="../index.php"><?php echo $lang['MENU_SIGN_OUT']; ?></a></li>
    </nav>
  </div>
</aside>

<main>
<div id="main_container_editor">
<?php

if($separated == 'teacher'){
      	if($_GET){
      		$ro = $_SERVER['QUERY_STRING'];
      		$x = explode("=",$ro);
      	    $q = $x[0];
      	    $n = $x[1];
      	
 	}
	 echo "<form action='postcontent.php?".$q."=".$n."' method='POST'>";
	 }
	  ?>
		<?php 
			dispselectcat();
		 ?>

		<input id="lesson_title" type="text" name="title" placeholder="Set lesson title"></input>
          <textarea name="input" id="mytextarea"></textarea>
          <input id="but" type="submit" name="submit" value="<?php echo $lang['SAVE/UPDATE'] ?>"/>
	</form>

</div>
</main>


<div id="footer">
	<div id="footer-options">
		 <a href="main_page.php"><p><?php echo $lang['MENU_HOME']; ?></p></a>
		 <a href="#"><p><?php echo $lang['MENU_FAVOURITES']; ?></p></a>
		 <a href="FAQ.php"><p><?php echo $lang['MENU_FAQ']; ?></p></a>
		 <a href="#"><p><?php echo $lang['ABOUT']; ?></p></a>
     <a href="support.php"><p><?php echo $lang['SUPPORT']; ?></p></a>
	 </div>
</div>

<script src="../scripts/index.js" type="text/javascript"></script>
<script src="../scripts/jquery.min.js"></script>

</body>
</html>