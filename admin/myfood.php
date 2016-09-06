<?php

include '../include/adminheader.php';

include_once '../model/dbconnect.php';
include '../model/processfood.php';
include '../view/food.php';
if(!isset($_POST['btn-submit']))
{
	$processfood = new Processfood();
	$foods = $processfood->getFood();
}
if(isset($_GET['delete']))
{
	$delete = $_GET['delete'];
	$processfood = new Processfood();
	$msg = $processfood->deleteFood($delete);
	if($msg==1)
	{
		header("Location: myfood.php");
	}
}
?>

	
	<section id="cart_items">
		<div class="container">
			<h4>My Food</h4>
			<?php
				if($msg==1)
				{
					?>
						<div class="alert alert-success">
						  <strong>Success!</strong> Food item was deleted.
						</div>
					<?php
				}
				else if($msg==2)
				{
					?>
						<div class="alert alert-success">
						  <strong>Oh Sanp!</strong> Error while deleting data.
						</div>
					<?php
				}
			?>
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
						if(count($foods)>0)
						{
							foreach($foods as $food)
							{
							$i++;
					?>
							
						<tr>
							<td class="cart_id">
								<?=$i?>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$food->getFood()?></a></h4>
								<p><?=$food->getIngredients?></p>
							</td>
							<td class="cart_price">
								<p><?=$food->getSpicy()?></p>
							</td>
							<td class="cart_price">
								<p><?=$food->getVeg()?></p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?=$food->getPrice()." "?>CAD</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="editFood.php?id=<?=$food->getId()?>"><i class="glyphicon glyphicon-edit"></i></a>
								<a class="cart_quantity_delete" href="myfood.php?delete=<?=$food->getId()?>"><i class="glyphicon glyphicon-remove"></i></a>
							</td>
						</tr>
					<?php
							}
						}
						else
						{
							echo '<tr><td>No results</td></tr>';
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	
<?php include '../include/footer.php' ?>

</body>
</html>