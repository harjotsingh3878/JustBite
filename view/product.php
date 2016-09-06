<?php
include '../include/header.php';
include '../model/processitems.php';
include '../model/food.php';
include '../model/seller.php';
include '../model/review.php';
include '../model/carts.php';
$processitems = new Processitems();


if(isset($_POST['btn-review']))
{
	$review = new Review();
	$review->setName($_POST['rname']);
	$review->setComment($_POST['comment']);
	$review->setEmail($_POST['rmail']);
	$review->setId($_POST['rid']);

	$mydate = getdate(date("U"));
	$rday =  $mydate[month]." ".$mydate[mday]. ", ". $mydate[year];
	$rtime = date(" H:i", time());
	
	$review->setRday($rday);
	$review->setRtime($rtime);

	$msg = $processitems->addReview($review);	

}

if(isset($_GET['id']))
{
	$food = new Foods();
	$food->setId($_GET['id']);
	$objs = $processitems->getProduct($food);
	$f = $objs[0];
	$s = $objs[1];
	$r = $objs[2];

}
else if(isset($_POST['id']))
{
	$c = new Cart();
	$c->setFood_id(mysql_real_escape_string($_POST['id']));
	$c->setQuantity(mysql_real_escape_string($_POST['quantity']));
	$processitems->addToCart($c);
}
else
{
	header("Location: productList.php");
}



?>

	
	<section>
		<div class="container">
			<?php
					if($msg==1)
					{
						?>
							<div class="alert alert-success">
							  <strong>Oh Sanp!</strong> Error while updating data.
							</div>
						<?php
					}

				?>
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Location
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="productList.php?search=Kitchener">Kitchener </a></li>
											<li><a href="productList.php?search=Waterloo">Waterloo </a></li>
											<li><a href="productList.php?search=Cambridge">Cambridge </a></li>
											<li><a href="productList.php?search=Guelph">Guelph</a></li>
											<li><a href="productList.php?search=Hamilton">Hamilton</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Types
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="productList.php?search=Meat">Meat</a></li>
											<li><a href="productList.php?search=Turkey">Turkey</a></li>
											<li><a href="productList.php?search=Chicken">Chicken</a></li>
											<li><a href="productList.php?search=Seafood">Seafood</a></li>
											<li><a href="productList.php?search=Milk and Cheese Products">Milk and Cheese Products</a></li>
											<li><a href="productList.php?search=Egg and Egg Products">Egg and Egg Products</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#meal">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Meals
										</a>
									</h4>
								</div>
								<div id="meal" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="productList.php?search=Breakfast">Breakfast</a></li>
											<li><a href="productList.php?search=Brunch">Brunch</a></li>
											<li><a href="productList.php?search=Lunch">Lunch</a></li>
											<li><a href="productList.php?search=Tea">Tea</a></li>
											<li><a href="productList.php?search=Dinner">Dinner</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#taste">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Taste of Food
										</a>
									</h4>
								</div>
								<div id="taste" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="productList.php?search=Company()">Company()</a></li>
											<li><a href="productList.php?search=Medium">Medium</a></li>
											<li><a href="productList.php?search=Mild">Mild</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="productList.php?search=Veg">Vegetarian</a></h4>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="productList.php?search=Non-Veg">Non-Vegetarian</a></h4>
								</div>
							</div>
							
						</div><!--/category-productsr-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php
										$res2=mysql_query("SELECT * FROM seller");
										while($userRow2=mysql_fetch_array($res2))
										{
									?>
										<li><a href="productList.php?search=<?=$userRow2['seller_id']?>"><?=$userRow2['company']?></a></li>
									<?php
										}
									?>
									
								</ul>
							</div>
						</div><!--/brands_products-->
			
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<?php
									$imgArray = explode('*', $f->getImgs());
								?>
								<img src="../uploads/<?=$imgArray[0]?>" alt="" />
								
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2><?=$f->getFood()?></h2>
								<p></p>
								<form action="product.php" method="post">
								<span>
									<span>$<?=$f->getPrice?> CAD</span>
									<label>Quantity:</label>
									<input type="text" name="quantity" value="1" />
									<input type="hidden" name="id" value="<?=$f->getId()?>"/>
									<input type="hidden" name="user" value="1"/>
									<?php
										$fid = $food->getId();
										$cart = $processitems->getQuantity($fid);
										$quantity = $cart->getQuantity();
									
										if($quantity==0)
										{
											?>
												<a><button type="submit" class="btn btn-fefault cart">
													<i class="fa fa-shopping-cart"></i>
													Add to cart
												</button></a>
											<?php
										}
										else
										{
											?>
												<a><button type="button" class="btn btn-fefault cart">
													<i class="fa fa-shopping-cart"></i>
													Added
												</button></a>
											<?php
										}
									?>
									
								</span></form>
								<p><b>Availability:</b>
								<?php
									if($f->getStock()==0)
									{
										?>
											In Stock
										<?php
									}
									else
									{
										?>
											Out of Stock
										<?php
									}
								?>
								
								
								</p>
								<p><b>Ingredients:</b><?=$f->getIngredients()?></p>
								<p><b>Brand:</b><?=$s->getCompany()?></p>
								<p><b>Type:</b><?=$f->getType()?></p>
								<p><b>Meal:</b><?=$f->getMeal()?></p>
								<p><b>Spicy:</b><?=$f->getType()?></p>
								<p><b><?=$userRow['veg']?></b></p>
								<p><b>Delivery:</b>
								<?php
									if($f->getDelivery()!=0)
									{
										echo 'Yes';
									}
									else
									{
										echo 'No';
									}
								?>
								<p>
								<?php
									if($f->getDelivery()!=0)
									{
										?>
										<b>Delivery Time:</b><?=$f->getDtime()?></p>
										<?php
									}
								?>	
									
								<?=$f->getDescription()?>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-1">
									</div>
								<div class="col-sm-6" style>
									<table>
										
									<tr><td><b>Comapany Name:</b></td><td><?=$s->getCompany()?></td></tr>
									<tr><td><b>Description:</b></td><td><?=$s->getDescription()?></td></tr>
									<tr><td><b>Address:</b></td><td><?=$s->getAddress()?></td></tr>
									<tr><td><b>City:</b></td><td><?=$s->getCity()?></td></tr>
									<tr><td><b>Postal Code:</b></td><td><?=$s->getPostalCode()?></td></tr>
									</table>
								</div>
								
							</div>
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
								<?php
									if(isset($r))
									{
										?>
											<ul>
												<li><a href=""><i class="fa fa-user"></i><?=$r->getName()?></a></li>
												<li><a href=""><i class="fa fa-clock-o"></i><?=$r->getRtime()?></a></li>
												<li><a href=""><i class="fa fa-calendar-o"></i><?=$r->getRday()?></a></li>
											</ul>
											<p><?=$r->getComment()?></p>
											
										<?php
									}

								?>
									<p><b>Write Your Review</b></p>
									<form action="product.php" method="post">
										<span>
											<input type="text" placeholder="Your Name" name="rname"/>
											<input type="hidden" value="<?=$f->getId()?>" name="rid"/>
											<input type="email" placeholder="Email Address" name="rmail"/>
										</span>
										<textarea name="comment" ></textarea>
										
										<button type="submit" class="btn btn-default pull-right" name="btn-review">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
	
				</div>
			</div>
		</div>
	</section>
	
<?php 
	include '../include/footer.php';
?>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>