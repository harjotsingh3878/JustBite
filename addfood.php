<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: login.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-submit']))
{
	$food = mysql_real_escape_string($_POST['food']);
	$price = mysql_real_escape_string($_POST['price']);
	$ingredients = mysql_real_escape_string($_POST['ingredients']);
	$description = mysql_real_escape_string($_POST['description']);
	$veg = mysql_real_escape_string($_POST['veg']);
	$spicy = mysql_real_escape_string($_POST['spicy']);
	$deliver = mysql_real_escape_string($_POST['deliver']);
	$dtime = mysql_real_escape_string($_POST['dtime']);
	
	if(mysql_query("INSERT INTO food(name, price, ingredients, description, veg, spicy, delivery, dtime)
		VALUES('$food','$price','$ingredients','$description','$veg','$spicy','$deliver','$dtime')"))
	{		
		?>
        <script>alert('data enetered registered ');</script>
        <?php
		header("Location: myfood.php");
	}
	else
	{
		?>
        <script>alert('error while entering data...');</script>
        <?php
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
	
	<section id="form" style="margin-top: 0px"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-form" ><!--login form-->
						<h2>Add food item</h2>
						<form action="addfood.php" method="post">
							<table class="col-sm-10" >
								<tr>
									<td>Food Name : </td><td><input type="text" placeholder="Food Name" name="food"/></td>
								</tr>
								<tr>
									<td>Price :</td><td><input type="number" placeholder="Price" name="price"/></td>
								</tr>
								<tr>
									<td>Ingredients : </td><td><input type="text" placeholder="Ingredients" name="ingredients"/></td>
								</tr>
								<tr>
									<td>Food Description : </td><td><textarea type="text" placeholder="Description" name="description"/></textarea></td>
								</tr>
								<tr>
									<td>Vegetarian</td><td><select type="select" name="veg">
													<option value="Veg"/>Veg</option>
													<option value="Non-Veg"/>Non-Veg</option>						
												</select></td>
								</tr>
								<tr>
									<td>Spices</td><td><select name="spicy">
													<option value="Mild"/>Mild</option>
													<option value="Medium"/>Medium</option>
													<option value="Hot"/>Hot</option>								
												</select></td>
								</tr>
								<tr>
									<td>Home Delivery</td><td><select name="deliver">
													<option value="1"/>Yes</option>
													<option value="0"/>No</option>						
												</select></td>
								</tr>
								<tr>
									<td>Time To Deliver</td><td><input type="number" placeholder="Delivery Time(In minutes)" name="dtime"/></td>
								</tr>
								<tr colspan="2">
									<td>
										<button type="submit" class="btn btn-default" name="btn-submit">Submit</button>
									</td>
								</tr>
							</table>
							
							 
							
							
							
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</section><!--/form-->
	
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