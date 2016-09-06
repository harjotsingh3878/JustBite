<?php
include '../include/adminheader.php';
include '../model/processfood.php';
include '../view/food.php';
$id=0;
$row="";
$processfood= new Processfood();
$food = new Foods();
if(isset($_GET['id']))
{
	$fid = $_GET['id'];
	$food = $processfood->getFoods($fid);

}
if(isset($_POST['id']))
{
	$fid = $_GET['id'];
	$food = $processfood->getFoods($fid);
}
if(isset($_POST['btn-submit']))
{
	include_once 'dbconnect.php';
	if(isset($_FILES['file']['name']))
    {
        $file_name_all=$row."*";
        for($i=0; $i<count($_FILES['file']['name']); $i++) 
        {
               $tmpFilePath = $_FILES['file']['tmp_name'][$i];    
               if ($tmpFilePath != "")
               {    
                   $path = "../uploads/"; // create folder 
                   $name = $_FILES['file']['name'][$i];
                  $size = $_FILES['file']['size'][$i];
   
                   list($txt, $ext) = explode(".", $name);
                   $file= time().substr(str_replace(" ", "_", $txt), 0);
                   $info = pathinfo($file);
                   $filename = $file.".".$ext;
                   if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $path.$filename)) 
                   { 
                      date_default_timezone_set ("Asia/Calcutta");
                      $currentdate=date("d M Y");
                      $file_name_all.=$filename."*";
                   }
             }
        }
        $filepath = rtrim($file_name_all, '*');    
    }
    else
    {
        $filepath="";
    }
    echo $filepath;
    /*$query=mysql_query("INSERT into image (`image`) VALUES('".addslashes($filepath)."'); ");
    if($query)
    {
        header("location:".$_SERVER['PHP_SELF']);
    }*/
	
	
	$food = new Foods();
	$food->setId($_POST['id']);
	$food->setFood(mysql_real_escape_string($_POST['food']));
	$food->setPrice(mysql_real_escape_string($_POST['price']));
	$food->setIngredients(mysql_real_escape_string($_POST['ingredients']));
	$food->setDescription(mysql_real_escape_string($_POST['description']));
	$food->setType(mysql_real_escape_string($_POST['types']));
	$food->setMeal(mysql_real_escape_string($_POST['meal']));
	$food->setStock(mysql_real_escape_string($_POST['stock']));
	$food->setVeg(mysql_real_escape_string($_POST['veg']));
	$food->setSpicy(mysql_real_escape_string($_POST['spicy']));
	$food->setDelivery(mysql_real_escape_string($_POST['delivery']));
	$food->setDtime(mysql_real_escape_string($_POST['dtime']));
	$food->setImgs($filepath);
	
	$processfood = new Processfood();
	$msg_register = $processfood->updateFood($food);
	
	if($msg_register == 0)
	{
	//	header("Location: myfood.php");
	}

}
?>

	
	<section id="form" style="margin-top: 0px"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-form" ><!--login form-->
						<h2>Edit food item</h2>
						<form enctype="multipart/form-data" action="editFood.php" method="post" onsubmit="return addFoodisValid();">
							<label class="error-label col-xs-12" id="error"></label>
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
							<table class="col-sm-10 account" >
								<tr>
									<td>Food Name : </td><td><input type="text" value="<?=$food->getFood()?>" placeholder="Food Name" name="food" id="food"/></td>
								</tr>
								
								
							
								
								<tr>
									<td>Price :</td><td><input type="number" value="<?=$food->getPrice()?>" placeholder="Price" name="price" id="price"/></td>
								</tr>
								<tr>
									<td>Ingredients : </td><td><input type="text" value="<?=$food->getIngredients()?>" placeholder="Ingredients" name="ingredients" id="ingredients"/></td>
								</tr>
								<tr>
									<td>Food Description : </td><td><textarea type="text" placeholder="Description" name="description"  id="description"/><?=$food->getDescription()?></textarea></td>
								</tr>
								<tr>
									<td>Type</td><td><select type="select" name="types">
													<option <?=($food->getType() == 'Meat')? ' selected="selected"':''?> value="Meat"/>Meat</option>
													<option <?=($food->getType() == 'Turkey')? ' selected="selected"':''?> value="Turkey"/>Turkey</option>
													<option <?=($food->getType() == 'Chicken')? ' selected="selected"':''?> value="Chicken"/>Chicken</option>
													<option <?=($food->getType() == 'Seafood')? ' selected="selected"':''?> value="Seafood"/>Seafood</option>
													<option <?=($food->getType() == 'Milk and Cheese Products')? ' selected="selected"':''?> value="Milk and Cheese Products"/>Milk and Cheese Products</option>
													<option <?=($food->getType() == 'Egg and Egg Products')? ' selected="selected"':''?> value="Egg and Egg Products"/>Egg and Egg Products</option>
												</select></td>
								</tr>
								<tr>
									<td>Meal</td><td><select type="select" name="meal">
													<option <?=($food->getMeal() == 'Breakfast')? ' selected="selected"':''?> value="Breakfast"/>Breakfast</option>
													<option <?=($food->getMeal() == 'Brunch')? ' selected="selected"':''?> value="Brunch"/>Brunch</option>
													<option <?=($food->getMeal() == 'Lunch')? ' selected="selected"':''?> value="Lunch"/>Lunch</option>
													<option <?=($food->getMeal() == 'Tea')? ' selected="selected"':''?> value="Tea"/>Tea</option>
													<option <?=($food->getMeal() == 'Dinner')? ' selected="selected"':''?> value="Dinner"/>Dinner</option>
												</select></td>
								</tr>
								<tr>
									<td>In Stock</td><td><select name="stock">
													<option <?=($food->getStock() == '0')? ' selected="selected"':''?> value="0"/>Yes</option>
													<option <?=($food->getStock() == '1')? ' selected="selected"':''?> value="1"/>No</option>
												</select></td>
								</tr>
								<tr>
									<td>Vegetarian</td><td><select type="select" name="veg">
													<option <?=($food->getVeg() == 'Veg')? ' selected="selected"':''?> value="Veg"/>Veg</option>
													<option <?=($food->getVeg() == 'Non-Veg')? ' selected="selected"':''?> value="Non-Veg"/>Non-Veg</option>						
												</select></td>
								</tr>
								<tr>
									<td>Spices</td><td><select name="spicy">
													<option <?=($food->getSpicy() == 'Mild')? ' selected="selected"':''?> value="Mild"/>Mild</option>
													<option <?=($food->getSpicy() == 'Medium')? ' selected="selected"':''?> value="Medium"/>Medium</option>
													<option <?=($food->getSpicy() == 'Hot')? ' selected="selected"':''?> value="Hot"/>Hot</option>								
												</select></td>
								</tr>
								<tr>
									<td>Home Delivery</td><td><select name="delivery">
													<option <?=($food->getDelivery() == '0')? ' selected="selected"':''?> value="0"/>Yes</option>
													<option <?=($food->getDelivery() == '1')? ' selected="selected"':''?> value="1"/>No</option>						
												</select></td>
								</tr>
								<tr>
									<td>Time To Deliver</td><td><input type="number" value="<?=$food->getDtime()?>" placeholder="Delivery Time(In minutes)" name="dtime" id="dtime"/></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="hidden" value="<?=$food->getId()?>" name="id">
										<button type="submit" class="btn btn-default" id="submit" name="btn-submit">Submit</button>
									</td>
								</tr>
							</table>
							
							 
							
							
							
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</section><!--/form-->
	
<?php include '../include/footer.php' ?>
    <script src="../js/jquery.js"></script>
    <script src="../js/upload2.js"></script>
    <script src="../js/adminscript.js"></script>
</body>
</html>