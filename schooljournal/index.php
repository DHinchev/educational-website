<?php
include_once 'common.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>School-Journal</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="media/favicon.ico" />
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
</head>
<body class="login" onload="hideForgetForm()" id="<?php echo $lang['LANGUAGE']; ?>">

<div id="container-bg">
<img src="media/1.jpg" id="img" alt="background image number one" >
</div>
	<div id="containerId" class="container">
		<form id="hide-login-form" class="login-form" action="php/login.php" method="post">

			<h3 id="loginTitle" class="form-title"><?php echo $lang['LOGIN']; ?></h3>

			<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-user fa"></i>
				<input class="form-control input placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" />
				<span id='messageUsername'></span>
				<div class="result" id="result"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-lock fa"></i>
				<input id="Loginpassword" class="form-control input placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-actions">
		<button type="submit" class="btn btn-primary pull-right btn-lg" name="submit">
			<?php echo $lang['LOGIN']; ?> <i class="m-icon-swapright m-icon-white"></i></button>
			<label class="checkbox">
			<input type="checkbox" class="checkbox style-2 pull-right" name="remember" value="1"/> <?php echo $lang['REMEMBER']; ?> </label>
		</div>
		<div class="forget-password">
			<p id="forget-password"><a href="index.php#forgotten_pass" onclick="showForgetForm()"><?php echo $lang['FORGOTTEN_PASSWORD']; ?> ?</a></p>
			<p class="create-account"><a id="register-btn" href="#hideRegisterForm" onclick="showRegisterForm()"><?php echo $lang['CREATE_ACCOUNT']; ?> </a></p>
		</div>

			<div id="language" class="upper-menu">
		<h5><?php echo $lang['LANGUAGE_MENU'];?></h5>
		<div id="select" >
		    <div id="english" class="language-select"><a href="index.php?lang=en"><p>English</p></a></div>
		    <div id="spanish" class="language-select"><a href="index.php?lang=bg"><p>Български</p></a></div>
		    <div id="spanish" class="language-select"><a href="index.php?lang=rus"><p>Русский</p></a></div>
		</div>

	</div>
		</form>
		<form id="hideForfottenForm" class="forget-form" action="php/forgotten.php" method="post">
		<i id="exit_forg" class="fa fa-times fa-2x" onclick="goBackLogin();"></i> 
		<h3><?php echo $lang['FORGOTTEN_PASSWORD']; ?></h3>
		<p>
			 Enter your e-mail address below and we will send you your username and password.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope fa"></i>
				<input class="form-control input placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" name="submit_forgotten_pass" class="btn btn-primary btn-md">Submit</button>
		</div>
	</form>

		<form id="hideRegisterForm" class="register-form" action="php/register.php" method="post">
		<i id="exit_reg" class="fa fa-times fa-2x" onclick="goBackLoginFromReg()"></i>
		<h3 id="registerTitle"><?php echo $lang['SIGN_UP']; ?></h3>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo $lang['USERNAME']; ?></label>
			<div class="input-icon">
				<i class="fa fa-user fa"></i>
				<input class="form-control input placeholder-no-fix" type="text" autocomplete="off" placeholder="<?php echo $lang['USERNAME']; ?>" name="username" id="username" />
				<span id='messageUsr'></span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo $lang['PASSWORD']; ?></label>
			<div class="input-icon">
				<i class="fa fa-lock fa"></i>
				<input class="form-control input placeholder-no-fix" type="password" autocomplete="off" id="password" placeholder="<?php echo $lang['PASSWORD']; ?>" name="password"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo $lang['REPASSWORD']; ?></label>
			<div class="controls">
				<div class="input-icon">
					<i class="fa fa-check fa"></i>
					<input class="form-control input placeholder-no-fix" type="password" autocomplete="off" placeholder="<?php echo $lang['REPASSWORD']; ?>" name="rpassword" id="rpassword" />
					<span id='messagePass'></span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo $lang['EMAIL']; ?></label>
			<div class="input-icon">
				<i class="fa fa-envelope fa"></i>
				<input class="form-control input placeholder-no-fix" type="text" placeholder="<?php echo $lang['EMAIL']; ?>" name="email" id="email" />
				<span id='messageEmail'></span>
			</div>
		</div>
		<div id="TorS">
			<div class="form-group">
				<label><input type="radio" name="registeras" value="teacher" /> <?php echo $lang['ASTEACHER']; ?></label>
				<div id="register_asTeacher_error"></div>
				<label><input type="radio" name="registeras" value="student" /> <?php echo $lang['ASSTUDENT']; ?></label>
				<div id="register_asStudent_error"></div>
			</div>
		</div>
		<div class="form-group">
			<label>
			<input type="checkbox" name="agreement" value="accepted" /> <?php echo $lang['AGREE']; ?> <a href="#">
			<?php echo $lang['TERMOFSERVICE']; ?> </a>
			<?php echo $lang['AND']; ?> <a href="#">
			<?php echo $lang['PRIVATEPOLICY']; ?> </a>
			</label>
			<div id="register_tnc_error">
			</div>
		</div>
		<div class="form-actions">
			<button name="submit" type="submit" id="register-submit-btn" class="btn btn-primary btn-md"><?php echo $lang['SIGN_UP']; ?> </button>
		</div>
	</form>
	</div>

<script src="scripts/jquery.min.js"></script>
<script src="scripts/jquery.validate.min.js"></script>
<script src="scripts/Login.js" type="text/javascript"></script>
<script src="scripts/LoginValidation.js" type="text/javascript"></script>
</body>
</html>