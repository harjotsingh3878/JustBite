<?php
include '../include/header.php';

//include_once 'dbconnect.php';
include '../model/processitems.php';
include '../model/food.php';
include '../model/seller.php';
include '../model/carts.php';
$processitem = new Processitems();

$foods = array();

if(isset($_GET['home_search']))
{
	$foods = $processitem->getFoodFromIndex($_GET['home_search']);
}
else if(isset($_GET['search']))
{
	$foods = $processitem->getFoodFromFilters($_GET['search']);
}
else if(isset($_GET['input-search']))
{
	$foods = $processitem->getFoodFromSearchBox($_GET['input-search']);
}
else
{
	$foods = $processitem->getFood();
}
if(isset($_GET['cart']))
{
	$cart=new Cart();
	$cart->setFood_id($_GET['cart']);
	$cart->setQuantity('1');
	$processitem->addToCart($cart);
}

?>
						
	
	<section>
		<div class="container">
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
											<li><a href="productList.php?search=Hot">Hot</a></li>
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
										$sellers = $processitem->getSeller();
										foreach($sellers as $s)
										{
									?>
										<li><a href="productList.php?search=<?=$s->getCompany()?>"><?=$s->getCompany()?></a></li>
									<?php
										}
									?>
									
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php 
							if(count($foods)>0)
							{
								$i=0;
									foreach($foods as $food)
									{
									//	$food=$f;

										$i++;
										
										$imgArray = explode('*', $food->getImgs());
									?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product.php?id=<?=$food->getFood_id()?>"><img src="../uploads/<?=$imgArray[0]?>" alt="Image Not Found" height="250"/></a>
													<h2>$<?=$food->getPrice()?> CAD</h2>
													<p><?=$food->getFood()?></p>
													<?php
														$fid = $food->getFood_id();
														$cart = $processitem->getQuantity($fid);
														$quantity = $cart->getQuantity();
													
														if($quantity==0)
														{
															?>
																<a href="productList.php?cart=<?=$food->getFood_id()?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
															<?php
														}
														else
														{
															?>
																<a class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Added</a>
															<?php
														}
													?>
													
												</div>
												
											</div>
										
										</div>
									</div>
									
									<?php
										} 
							}
							else
							{
								echo 'No results';
							}
						
							
							
							
							
						
						?>
						
						
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
<?php include '../include/footer.php'; ?>
	

  
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>