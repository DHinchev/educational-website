<?php
	include ('../php/config.php');
	include ('content_function.php');
  include ('search_engine.php');
	include_once '../common.php';
	if(isset($_SESSION['login_user'])){
	$username=$_SESSION['login_user'];
	}	
?>

<!DOCTYPE html>
<head>

<title>School-Journal Forum</title>
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
          data:'q='+x,
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
<link rel="shortcut icon" type="image/x-icon" href="../media/favicon.ico" />
<link href="/schooljournal/styles/forum.css" type="text/css" rel="stylesheet" />
<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="../assets/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<body>

	<div class="container_page">

	<div id="header-container">

	<div id="logout" class="upper-menu"><a href="../php/logout.php"><i class="glyphicon glyphicon-log-out"></i></a></div>
	<div id="dropdown" class="upper-menu"><button id="search" class="fa fa-search fa-2x" onclick="showSearchBar()"></button></div>	
	
	<div id="language" class="upper-menu">
	<h4><?php echo $lang['LANGUAGE_MENU']; ?></h4>
		<div id="select" >
		    <div class="language-select"><a href="index.php?lang=en"><p>English</p></a></div>
		    <div class="language-select"><a href="index.php?lang=bg"><p>Български</p></a></div>
		    <div class="language-select"><a href="index.php?lang=rus"><p>Русский</p></a></div>
		</div>
	</div>
	<div id="welcome"><p><?php echo $lang['WELCOME'];?> <?php echo $username;?></p></div>

		<div id="search-bar">
			<div id="search-form-wrapper">
				<form id="search-form" action="index.php" method="POST">
					<button type="submit" class="fa fa-search fa"></button>
					<input type="search" autocomplete="off" name="search" placeholder="<?php echo $lang['SEARCH']; ?>"  class="search-input"></input>
					<br>
					<p>Search by:</p>
					<div class="box"><input  type="radio" name="option" value="cat">Category<br></div>
					<div class="box"><input  type="radio" name="option" value="sub">Subcategory<br></div>
					<div class="box"><input  type="radio" name="option" value="top">Topics<br></div>
					<div class="box"><input  type="radio" name="option" value="all">All<br></div>
				</form> 
			</div>
		</div>
			<div id="main_page" class="upper-menu"><a href="../php/main_page.php"><i class="fa fa-home fa-2x"></i></a></div>
</div>
		<div class="header"><h1><a href="/schooljournal/Forum">School-Journal Forum</a></h1></div>

		<div class="content_add">
			<?php 
				if (isset($_SESSION['login_user'])) {
					echo "<form action='/schooljournal/Forum/addnewcategory.php'
						  method='POST'>
						  <p>Add category: </p>
						  <input type='text' id='topic' name='category' size='100' />
						  <input type='submit' value='Add new category' /></form>";
				}else {
					echo "<p>Please login first or <a href='/schooljournal/index.php'>click here</a> to register.</p>";
				}
			?>
		</div>

		<div class="content">
			<h3>Categories</h3>
				<?php dispcategories(); ?>
		</div>

	</div>

	<script src="../scripts/forum.js" type="text/javascript"></script>

</body>
</html>