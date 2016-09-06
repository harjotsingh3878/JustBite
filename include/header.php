<?php
session_start();
$userid=0;
if(isset($_SESSION['user']))
{
    $userid = $_SESSION['user'];
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
      
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
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
					<div class="col-sm-8">
							<div class="shop-menu pull-right">
								<ul class="nav navbar-nav">
									<li><a href="../view/productList.php"><i class="fa fa-star"></i> Products</a></li>
									<li><a href="../view/myorder.php"><i class="fa fa-crosshairs"></i> Orders</a></li>
									<li><a href="../view/cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
									<?php
									    if($userid!=0)
									    {
									        ?>
									            <li><a href="../admin/account.php"><i class="fa fa-user"></i> Account</a></li>
									            <li><a href="../view/logout.php"><i class="fa fa-lock"></i> Logout</a></li>
									        <?php
									    }
									    else
									    {
									        ?>
									            <li><a href="../view/login.php"><i class="fa fa-user"></i> Signup</a></li>
									            <li><a href="../view/login.php"><i class="fa fa-lock"></i> Login</a></li>
									        <?php
									    }
									?>
									<li class="dropdown"><a style="color:red; border:1px black solid; padding:5px;margin-top:-1px;" href="../admin/adminlogin.php" role="button">Become a Chef</a></li>
								</ul>
						</div>
						<div class="search_box pull-right">
							<form action="../view/productList.php">
								<input type="text" placeholder="Search" name="input-search"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
		</div>
	</header>