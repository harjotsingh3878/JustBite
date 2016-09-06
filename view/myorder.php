<?php
include '../include/header2.php';
include '../model/processorder.php';
$processorder = new Processorder();
if(isset($_GET['delete']))
{
	$order = new Order();
	$order->setId($_GET['delete']);
	$processorder->deleteOrder($order);
}

?>
	
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">My Orders</li>
				</ol>
			</div>
			<?php
					if($msg_register==1)
					{
						?>
							<div class="alert alert-success">
							  <strong>Success!</strong> Order deleted successfully.
							</div>
						<?php
					}
					else if($msg_register==2)
					{
						?>
							<div class="alert alert-danger">
							  <strong>Oh Snap!</strong> Order cannot be deleted.
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
							<td class="quantity">Delivery Time</td>
							<td class="total">Total Payment</td>
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>
					<?php 
						$order = $processorder->getOrder();
						if(count($order)>0)
						{
						$i=0;
						foreach($order as $o)
						{
							$i++;
					?>
							
						<tr>
							<td class="cart_id">
								<?=$i?>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$o->getFoodname()?></a></h4>
								<p><?=$userRow['food']?></p>
							</td>
							<td class="cart_price">
								<p><?=$o->getDtime()?></p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?=$o->getTotal()." "?>CAD</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="myorder.php?delete=<?=$o->getId()?>"><i class="glyphicon glyphicon-remove"></i></a>
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
	
<?php include '../include/footer.php'; ?>
	

  
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>