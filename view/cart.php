<?php
include '../include/header2.php';
include '../model/processcart.php';
include_once '../model/dbconnect.php';
$msg_delete=0;
$processcart = new Processcart();
$ct = new Cart();
if(isset($_GET['quantity']))
{
	$ct->setFood_id($_GET['food']);
	$ct->setQuantity($_GET['quantity']);
	$processcart->changeQuantity($ct);


	//$userRow=mysql_fetch_array($res);
	
}

if(isset($_GET['delete']))
{
	$ct->setId($_GET['delete']);
	$msg_delete = $processcart->deleteCart($ct);
}

if(isset($_POST['pay_now'])){
	$total = $_POST['total'];
	
	$rcart1=mysql_query("SELECT * FROM cart INNER JOIN food ON cart.food_id=food.id WHERE cart.user_id='".$user."'");
	$rcart1Row = mysql_fetch_array($rcart1);
	$food="";
	while(mysql_fetch_array($rcart1))
	{
		$food=$rcart1Row['food'].",";
	}
	$food=rtrim($food,",");
	
	$rcart=mysql_query("DELETE FROM cart WHERE user_id='".$user."'");
	
	$rorder=mysql_query("INSERT into order(foods, user_id, total) VALUES('$food', '$user', '$total') ");
	
	
	$data=array(
		'merchant_email'=>'hss2612@yahoo.com',
		'product_name'=>'Order',
		'amount'=>$total,
		'currency_code'=>'CAD',
		'thanks_page'=>"http://".$_SERVER['HTTP_HOST'].'paypal/thank.php',
		'notify_url'=>"http://".$_SERVER['HTTP_HOST'].'paypal/ipn.php',
		'cancel_url'=>"http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
		'paypal_mode'=>true,
	);
	echo Paypal($data);
}

function Paypal($data) {

	define( 'SSL_URL', 'https://www.paypal.com/cgi-bin/webscr' );
	define( 'SSL_SAND_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr' );

	$action = '';
	//Is this a test transaction? 
	$action = ($data['paypal_mode']) ? SSL_SAND_URL : SSL_URL;

	$form = '';

	$form .= '<form name="frm_payment_method" action="' . $action . '" method="post">';
	$form .= '<input type="hidden" name="business" value="' . $data['merchant_email'] . '" />';
	// Instant Payment Notification & Return Page Details /
	$form .= '<input type="hidden" name="notify_url" value="' . $data['notify_url'] . '" />';
	$form .= '<input type="hidden" name="cancel_return" value="' . $data['cancel_url'] . '" />';
	$form .= '<input type="hidden" name="return" value="' . $data['thanks_page'] . '" />';
	$form .= '<input type="hidden" name="rm" value="2" />';
	// Configures Basic Checkout Fields -->
	$form .= '<input type="hidden" name="lc" value="" />';
	$form .= '<input type="hidden" name="no_shipping" value="1" />';
	$form .= '<input type="hidden" name="no_note" value="1" />';

	$form .= '<input type="hidden" name="currency_code" value="' . $data['currency_code'] . '" />';
	$form .= '<input type="hidden" name="page_style" value="paypal" />';
	$form .= '<input type="hidden" name="charset" value="utf-8" />';
	$form .= '<input type="hidden" name="item_name" value="' . $data['product_name'] . '" />';
	$form .= '<input type="hidden" value="_xclick" name="cmd"/>';
	$form .= '<input type="hidden" name="amount" value="' . $data['amount'] . '" />';
	$form .= '<script>';
	$form .= 'setTimeout("document.frm_payment_method.submit()", 2);';
	$form .= '</script>';
	$form .= '</form>';
	return $form;
}
?>

	
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
				<?php
					if($msg_delete==1)
					{
						?>
							<div class="alert alert-success">
							  <strong>Success!</strong> Product deleted from cart.
							</div>
						<?php
					}
					else if($msg_delete==2)
					{
						?>
							<div class="alert alert-danger">
							  <strong>Oh Snap!</strong> Product could not be deleted.
							</div>
						<?php
					}
					else
					{
						
					}
				?>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">#</td>
							<td class="description">Item</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
							$amount=0;
							$carts = $processcart->getCart();
							if(count($carts)>0)
							{
								$i=0;
								foreach($carts as $c)
								{
									$i++;
								?>
									<tr>
										<td class="cart_product"><?=$i?></td>
										<td class="cart_description">
											<h4><a href=""><?=$c->getFood()?></a></h4>
											<p></p>
										</td>
										<td class="cart_price">
											<p>$<?=$c->getPrice()?> CAD</p>
										</td>
										<td class="cart_quantity" style="width:150px">
											<div class="cart_quantity_button">
												<a class="cart_quantity_up" href="cart.php?quantity=1&&food=<?=$c->getFood_id()?>"> + </a>
												<input class="cart_quantity_input" type="text" name="quantity" value="<?=$c->getQuantity()?>" disabled="disabled" autocomplete="off" size="2">
												<a class="cart_quantity_down" href="cart.php?quantity=0&&food=<?=$c->getFood_id()?>"> - </a>
											</div>
										</td>
										<?php
											$amt = $c->getPrice()*$c->getQuantity();
											$amount=$amount + $amt;
										?>
										<td class="cart_total">
											<p class="cart_total_price">$<?=$amt?> CAD</p>
										</td>
										<td class="cart_delete">
											<a class="cart_quantity_delete" href="cart.php?delete=<?=$c->getId()?>"><i class="fa fa-times"></i></a>
										</td>
									</tr>
								<?php
								}
							}
							else
							{
								echo '<tr><td>No results</td></tr>';
							}

							$tax=$amount*0.13;
							$total=$amount+$tax;
						?>
			
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<?php
	 if(count($carts)>0)
	 {
	?>
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Estimate delivery cost.</h3>
			
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<form id='paypal-info' method='post' action='cart.php'>
						<ul>
							<li>Cart Sub Total <span>$<input name="amount" disabled="disabled" style="width: 40px; padding: 2px;border: 0;" value="<?=$amount?>" name="amount"/>CAD</span></li>
							<li>Service Tax <span>$<input name="amount" disabled="disabled" style="width: 40px; padding: 2px;border: 0;" value="<?=$tax?>" name="tax"/>CAD</span></li>
							<li>Shipping Cost <span>$<input name="amount" disabled="disabled" style="width: 40px; padding: 2px;border: 0;" value="Free" name="total"/>CAD</span></li>
							<li>Total <span>$<input name="amount" disabled="disabled" style="width: 40px; padding: 2px;border: 0;" value="<?=$total?>"/>CAD</span></li>
						</ul>
							<button type="submit" class="btn btn-default check_out" name="pay_now" >Check Out</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	
<?php
}
	include '../include/footer.php';
?>
</body>
</html>