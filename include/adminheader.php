<?php
session_start();
$userid=0;
if(!isset($_SESSION['user']))
{
    header("Location: ../admin/adminlogin.php");
}
else
{
    $userid = $_SESSION['user'];
    $sellerid = $_SESSION['sellerid'];
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
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
    <link href="../css/upload.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
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
				    <div class="col-sm-8">
							<div class="shop-menu pull-right">
								<ul class="nav navbar-nav">
									<li><a href="../admin/myfood.php"><i class="fa fa-crosshairs"></i> MyFood</a></li>
									<li><a href="../admin/addfood.php"><i class="fa fa-shopping-cart"></i> Add Food</a></li>
									<?php
									    if($userid!=0)
									    {
									        ?>
									            <li><a href="../admin/adminaccount.php"><i class="fa fa-user"></i> Account</a></li>
									            <li><a href="../admin/adminlogout.php"><i class="fa fa-lock"></i> Logout</a></li>
									        <?php
									    }
									    else
									    {
									        ?>
									            <li><a href="../admin/adminlogin.php"><i class="fa fa-user"></i> Signup</a></li>
									            <li><a href="../admin/adminlogin.php"><i class="fa fa-lock"></i> Login</a></li>
									        <?php
									    }
									?>
									
								</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
		</div>
	</header>