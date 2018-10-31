<?php
	include ('content_function.php');
	include_once '../common.php';

	if(isset($_SESSION['login_user'])){
	$username=$_SESSION['login_user'];
	}
	addview($_GET['cid'], $_GET['scid'], $_GET['tid']);
?>

<html>
<head><title>School-Journal Forum</title></head>
<link href="/forum-tutorial/styles/main.css" type="text/css" rel="stylesheet" />
<body>
	<div class="pane">
	<div id="welcome"><p><?php echo "Welcome ".$_SESSION['login_user'].""?></p></div>
		<div class="header"><h1><a href="/schooljournal/Forum1">School-Journal Forum</a></h1></div>

		<div class="forumdesc">
			<?php
				if (!isset($_SESSION['login_user'])) {
					echo "<p>please login first  <a href='/schooljournal/index.php'>click here</a> to register.</p>";
				}
			?>
		</div>

		<?php
			if (isset($_SESSION['login_user'])) {
				replytopost($_GET['cid'], $_GET['scid'], $_GET['tid']);
			}
		?>

		<div class="content">
			<?php disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']); ?>
		</div>
	</div>
</body>
</html>