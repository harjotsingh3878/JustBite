<?php
include '../include/adminheader.php';
include_once '../model/dbconnect.php';
include '../model/food.php';
include '../model/processfood.php';

if(isset($_POST['btn-submit']))
{
	if(isset($_FILES['file']['name']))
    {
        $file_name_all="";
        for($i=0; $i<count($_FILES['file']['name']); $i++) 
        {
               $tmpFilePath = $_FILES['file']['tmp_name'][$i];    
               if ($tmpFilePath != "")
               {    
                   $path = "uploads/"; // create folder 
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
	
	$food = new Foods();
	$food->setFood(mysql_real_escape_string($_POST['food']));
	$food->setPrice(mysql_real_escape_string($_POST['price']));
	$food->setIngredients(mysql_real_escape_string($_POST['ingredients']));
	$food->setDescription(mysql_real_escape_string($_POST['description']));
	$food->setType(mysql_real_escape_string($_POST['types']));
	$food->setMeal(mysql_real_escape_string($_POST['meal']));
	$food->setVeg(mysql_real_escape_string($_POST['veg']));
	$food->setSpicy(mysql_real_escape_string($_POST['spicy']));
	$food->setDelivery(mysql_real_escape_string($_POST['deliver']));
	$food->setDtime(mysql_real_escape_string($_POST['dtime']));
	$food->setImgs($filepath);
	
	$processfood = new Processfood();
	$msg_register = $processfood->addFood($food);
	
	if($msg_register == 0)
	{
		header("Location: myfood.php");
	}
	
}
?>

	
	<section id="form" style="margin-top: 0px"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-form" ><!--login form-->
						<h2>Add food item</h2>
						<form enctype="multipart/form-data" action="addfood.php" method="post" onsubmit="return addFoodisValid()">
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
							<table class="col-sm-10 account">
								<tr>
									<td>Food Name : </td><td><input type="text" placeholder="Food Name" name="food" id="food"/></td>
								</tr>
								
								<tr>
									<td>Upload Photos</td>
									<td>
										<div id="filediv"><input name="file[]" type="file" id="file"/></div>
									
									</td>
								</tr>
							
								
								<tr>
									<td>Price :</td><td><input type="number" placeholder="Price" name="price" id="price"/></td>
								</tr>
								<tr>
									<td>Ingredients : </td><td><input type="text" placeholder="Ingredients" name="ingredients" id="ingredients"/></td>
								</tr>
								<tr>
									<td>Food Description : </td><td><textarea type="text" placeholder="Description" name="description" id="description"/></textarea></td>
								</tr>
								<tr>
									<td>Type</td><td><select type="select" name="types">
													<option value="Meat"/>Meat</option>
													<option value="Turkey"/>Turkey</option>
													<option value="Chicken"/>Chicken</option>
													<option value="Seafood"/>Seafood</option>
													<option value="Milk and Cheese Products"/>Milk and Cheese Products</option>
													<option value="Egg and Egg Products"/>Egg and Egg Products</option>
												</select></td>
								</tr>
								<tr>
									<td>Meal</td><td><select type="select" name="meal">
													<option value="Breakfast"/>Breakfast</option>
													<option value="Brunch"/>Brunch</option>
													<option value="Lunch"/>Lunch</option>
													<option value="Tea"/>Tea</option>
													<option value="Dinner"/>Dinner</option>
												</select></td>
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
									<td>Time To Deliver</td><td><input type="number" placeholder="Delivery Time(In minutes)" name="dtime" id="dtime"/></td>
								</tr>
								<tr>
									<td colspan="2">
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
	<script src="../js/adminscript.js"></script>
</body>
</html>