<?php
session_start();
if(isset($_SESSION['user']))
{
	header("Location: index.php");
}
//include_once 'dbconnect.php';
$msg_register = 0;

include '../model/processlogin.php';
if(isset($_POST['btn-signup']))
{
	$users = new User();
	$processlogin = new ProcessLogin();
/*
	$fname = mysql_real_escape_string($_POST['fname']);
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$phone = mysql_real_escape_string($_POST['phone']);
	$pass = md5(mysql_real_escape_string($_POST['pass']));
	$confirm = md5(mysql_real_escape_string($_POST['confirm']));*/
	
	$users->setFullname(mysql_real_escape_string($_POST['fname']));
	$users->setUsername(mysql_real_escape_string($_POST['uname']));
	$users->setEmail(mysql_real_escape_string($_POST['email']));
	$users->setPhone(mysql_real_escape_string($_POST['phone']));
	$users->setPassword(md5(mysql_real_escape_string($_POST['pass'])));
	$users->setConfirm(md5(mysql_real_escape_string($_POST['confirm'])));
	
	$msg_register = $processlogin->checkUsername($users);
	
	if($msg_register != 4)
	{
		$msg_register = $processlogin->signup($users);
		
	}
	
	
	/*$res=mysql_query("SELECT * FROM user WHERE username='".$uname."'");
	if(mysql_num_rows($res)>0)
	{
		$msg_register = 4;
	}
	else
	{
		if(mysql_query("INSERT INTO user(fullname, username, email, password, phone) VALUES('$fname','$uname','$email','$pass','$phone')"))
		{
			$msg_register = 1;
		}
		else
		{
			$msg_register = 2;
		}
	}*/
}
if(isset($_POST['btn-login']))
{
	$users = new User();
	$processlogin = new ProcessLogin();
	
/*	$uname = mysql_real_escape_string($_POST['uname']);
	$password = md5(mysql_real_escape_string($_POST['password']));
	$res=mysql_query("SELECT * FROM user WHERE username='".$uname."' AND password='".$password."'");*/
	
	$users->setUsername(mysql_real_escape_string($_POST['uname']));
	$users->setPassword(md5(mysql_real_escape_string($_POST['password'])));
	
	$msg_register = $processlogin->login($users);
	
	if($msg_register==0)
	{
    	header("Location: index.php");
	}
	
/*	if(mysql_num_rows($res)>0)
	{
		$userRow=mysql_fetch_array($res);
		$user_id=$userRow['id'];
		$res2=mysql_query("SELECT * FROM seller WHERE userid='".$user_id."'");
		if(!mysql_num_rows($res2)>0)
		{
			$userRow=mysql_fetch_array($res);
			$_SESSION['user'] = $userRow['id'];
			header("Location: index.php");
		}
		else
		{
			$msg_register = 3;
		}
	}
	else
		$msg_register = 3;*/
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>JUSTBITE</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
      
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a class="navbar-brand" href="#">JUSTBITE</a>
						</div>
						
					</div>

				</div>
			</div>
		</div><!--/header-middle-->
	
		
	</header>
	
	<section id="form" style="margin-top: 0px"><!--form-->
		<div class="container">
			<label class="error-label col-xs-12" id="error"></label>
			<?php
					if($msg_register==4)
					{
						?>
							<div class="alert alert-danger">
							  <strong>Oh Snap!</strong>Username is already taken.
							</div>
						<?php
					}
					else if($msg_register==3)
					{
						?>
							<div class="alert alert-danger">
							  <strong>Oh Snap!</strong> Login failed.
							</div>
						<?php
					}
					else if($msg_register==1)
					{
						?>
							<div class="alert alert-success">
							  <strong>Success!</strong> User registeres successfully.
							</div>
						<?php
					}
					else if($msg_register==2)
					{
						?>
							<div class="alert alert-danger">
							  <strong>Oh Snap!</strong> User cannot be registered.
							</div>
						<?php
					}
					else
					{
						
					}
				?>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="login.php" method="post" onsubmit="return isLoginFormValid();">
							<input type="text" placeholder="User Name" name="uname" id="userlogin"/>
							<input type="password" placeholder="Passwrod" name="password" id="passwordlogin"/>
							
							<button type="submit" class="btn btn-default" name="btn-login">Login</button>
						
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="login.php" method="post" onsubmit="return isRegistrationFormValid();">
							<input type="text" placeholder="Full Name" name="fname" id="fullname"/>
							<input type="text" placeholder="User Name" name="uname" id="username"/>
							<input type="email" placeholder="Email Address" name="email" id="mail"/>
							<input type="number" placeholder="Phone Number" name="phone" id="phone" maxlength="10"/>
							<input type="password" placeholder="Password" name="pass" id="pass"/>
							<input type="password" placeholder="Confirm Password" name="confirm" id="confirm"/>
							<button type="submit" class="btn btn-default" name="btn-signup">Signup</button>
					
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
<?php include '../include/footer.php' ?>
    <script src="../js/jquery.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>