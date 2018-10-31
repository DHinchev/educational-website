<?php
	include ('../php/config.php');
	include ('content_function.php');
	include_once '../common.php';
	include ('search_engine.php');

	if(isset($_SESSION['login_user'])){
	$username=$_SESSION['login_user'];
	}
	$searchOp = $_SESSION['searchtype'];
?>

<!DOCTYPE html>
<head>

<title>School-Journal Forum</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</head>
<link rel="shortcut icon" type="image/x-icon" href="../media/favicon.ico" />
<link href="/schooljournal/styles/forum.css" type="text/css" rel="stylesheet" />
<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="../assets/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<body>

	<div class="container_page_result">
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
	<div id="welcome"><p><?php echo "Welcome ".$_SESSION['login_user'].""?></p></div>

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
		<?php

		echo "<div class='results'>";

		if ($searchOp =='cat'){
			foreach($_SESSION['outputcat'] as $valuecat){
    			echo $valuecat;
			}
		}

		if ($searchOp =='sub'){
			foreach($_SESSION['outputsub'] as $valuesub){
			    echo $valuesub;
			}
		}
		
		if ($searchOp =='top'){	
			foreach($_SESSION['outputtop'] as $valuetop){
			    echo $valuetop;
			}
		}

		if ($searchOp =='all'){	
			foreach($_SESSION['all'] as $valueall){
			    echo $valueall;
			}
		}

		if($searchOp ==''){
			foreach($_SESSION['outputall'] as $valueall){
			    echo $valueall;
			}
		}
		echo "</div>";


		?>
	</div>

	<script src="../scripts/forum.js" type="text/javascript"></script>

</body>
</html>