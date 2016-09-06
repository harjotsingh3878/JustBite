<?php
session_start();
if(isset($_SESSION['user']))
{
	header("Location: ../view/account.php");
}
include_once '../model/dbconnect.php';

include '../model/processlogin.php';

include '../model/seller.php';
if(isset($_POST['btn-signup']))
{
	$users = new User();
	$seller = new Seller();
	$processlogin = new ProcessLogin();
	
	$users->setFullname(mysql_real_escape_string($_POST['fname']));
	$users->setUsername(mysql_real_escape_string($_POST['uname']));
	$users->setEmail(mysql_real_escape_string($_POST['email']));
	$users->setPhone(mysql_real_escape_string($_POST['phone']));
	$users->setPassword(md5(mysql_real_escape_string($_POST['pass'])));
	$users->setConfirm(md5(mysql_real_escape_string($_POST['confirm'])));
	$seller->setCompany(mysql_real_escape_string($_POST['company']));
	$seller->setAddress(mysql_real_escape_string($_POST['address']));
	$seller->setCity(mysql_real_escape_string($_POST['city']));
	$seller->setPostalcode(mysql_real_escape_string($_POST['postalcode']));
	$seller->setDescription(mysql_real_escape_string($_POST['description']));

	
	$objs = array();
	$objs[] = $users;
	$objs[] = $seller;
	
	$msg_register = $processlogin->checkUsername($users);
	
	if($msg_register != 4)
	{
		$msg_register = $processlogin->adminsignup($objs);
	}
	
}
if(isset($_POST['btn-login']))
{
	$users = new User();
	$processlogin = new ProcessLogin();
	$users->setUsername(mysql_real_escape_string($_POST['uname']));
	$users->setPassword(md5(mysql_real_escape_string($_POST['password'])));
	
	$msg_register = $processlogin->adminlogin($users);
	
	if($msg_register==0)
	{
    	header("Location: adminaccount.php");
	}
	
	
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
      
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
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
							<a class="navbar-brand" href="../view/index.php">JUSTBITE</a>
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
					if($msg_register==3)
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
						<h2>Login as a Chef</h2>
						<form action="adminlogin.php" method="post" onsubmit="return isLoginFormValid();">
							<input type="text" placeholder="User Name" name="uname" id="userlogin"/>
							<input type="password" placeholder="Passwrod" name="password" id="passwordlogin"/>
							
							<button type="submit" name="btn-login" class="btn btn-default">Login</button>
						
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Register to Become a Chef!</h2>
						<form action="adminlogin.php" method="post" onsubmit="return isRegistrationFormValid();">
							<input type="text" placeholder="Full Name" name="fname" id="fullname"/>
							<input type="text" placeholder="User Name" name="uname" id="username"/>
							<input type="email" placeholder="Email Address" name="email" id="mail"/>
							<input type="number" placeholder="Phone Number" name="phone" id="phone" maxlength="10"/>
							<input type="password" placeholder="Password" name="pass" id="pass"/>
							<input type="password" placeholder="Confirm Password" name="confirm" id="confirm"/>
							<input type="text" placeholder="Company" name="company" id="company"/>
							<input type="text" placeholder="Address" name="address" id="address"/>
							<input type="text" placeholder="City" name="city" id="city"/>
							<input type="text" placeholder="Postal Code" name="postalcode" id="postalcode"/>
							<input type="text" placeholder="Description" name="description" id="description"/>
							
							<button type="submit" class="btn btn-default" name="btn-signup">Signup</button>
					
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	<?php
	include '../include/footer.php'
	?>

  
    <script src="../js/jquery.js"></script>

    <script src="../js/adminscript.js"></script>
</body>
</html>