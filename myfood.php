<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: login.php");
}
include_once 'dbconnect.php';

if(!isset($_POST['btn-submit']))
{
	include_once 'dbconnect.php';
	$res=mysql_query("SELECT * FROM food");
	//$userRow=mysql_fetch_array($res);
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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
      
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
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
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> My Food</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Add Food</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		
	</header>
	
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">My Food</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="id">#</td>
							<td class="image">Item</td>							
							<td class="quantity">Spices</td>
							<td class="total">Veg</td>
							<td class="price">Price</td>							
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>
					<?php 
						$i=0;
						while($userRow=mysql_fetch_array($res))
						{
							$i++;
					?>
							
						<tr>
							<td class="cart_id">
								<?=$i?>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$userRow['name']?></a></h4>
								<p><?=$userRow['ingredients']?></p>
							</td>
							<td class="cart_price">
								<p><?=$userRow['spicy']?></p>
							</td>
							<td class="cart_price">
								<p><?=$userRow['veg']?></p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?=$userRow['price']." "?>CAD</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="glyphicon glyphicon-edit"></i></a>
								<a class="cart_quantity_delete" href=""><i class="glyphicon glyphicon-remove"></i></a>
							</td>
						</tr>
					<?php
						
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	
	<footer id="footer"><!--Footer-->

	<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 JustBite. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Us</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>