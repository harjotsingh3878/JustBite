<?php
include '../include/adminheader.php';
include_once '../model/dbconnect.php';

include '../model/processaccount.php';
include '../model/seller.php';
$msg_register = 0;
if(isset($_POST['btn-edit']))
{
	$users = new User();
	$seller = new Seller();
	$processaccount = new Processaccount();
	
	$users->setFullname(mysql_real_escape_string($_POST['fname']));
	$users->setUsername(mysql_real_escape_string($_POST['uname']));
	$users->setEmail(mysql_real_escape_string($_POST['email']));
	$users->setPhone(mysql_real_escape_string($_POST['phone']));
	$seller->setCompany(mysql_real_escape_string($_POST['company']));
	$seller->setAddress(mysql_real_escape_string($_POST['address']));
	$seller->setCity(mysql_real_escape_string($_POST['city']));
	$seller->setPostalcode(mysql_real_escape_string($_POST['postalcode']));
	$seller->setDescription(mysql_real_escape_string($_POST['description']));
	
	$objs = array();
	$objs[] = $users;$objs[] = $seller;
	
	$msg_register = $processaccount->editAdminProfile($objs);
	if($msg_register == 0)
	{
		header("Location: adminaccount.php");
	}
}


?>

	
	<section id="form" style="margin-top: 0px"><!--form-->
		<div class="container">
			
			<label class="error-label col-xs-12" id="error"></label>
			<?php
					if($msg_register==1)
					{
						?>
							<div class="alert alert-success">
							  <strong>Success!</strong> Account edited successfully.
							</div>
						<?php
					}
					else if($msg_register==2)
					{
						?>
							<div class="alert alert-danger">
							  <strong>Oh Snap!</strong> Account cannot be edited.
							</div>
						<?php
					}
					else if($msg_register==3 || $msg_register ==4 )
					{
						?>
							<div class="alert alert-danger">
							  <strong>Oh Snap!</strong> Username already taken.
							</div>
						<?php
					}
				?>
			<a href="adminaccount.php"><button type="submit" class="btn btn-default" name="btn-signup">Back</button></a>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="signup-form"><!--sign up form-->
						<h2>Edit Your Account!</h2>
						<form action="editadminaccount.php" method="post" onsubmit="return isEditFormValid();">
						<?php
						     $res=mysql_query("SELECT * FROM user INNER JOIN seller ON user.id=seller.userid WHERE user.id='".$userid."'");
						    
						    while($userRow=mysql_fetch_array($res))
						    {
						        ?>
						        <table class="account">
            						    <tr>
            						        <td>Name : </td><td><b><input type="text" placeholder="Full Name" name="fname" value="<?=$userRow['fullname']?>" id="fullname"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>User Name : </td><td><b><input type="text" placeholder="User Name" value="<?=$userRow['username']?>" name="uname" id="username"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Email : </td><td><b><input type="email" placeholder="Email Address" value="<?=$userRow['email']?>" name="email" id="mail"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Phone Number : </td><td><b><input type="number" placeholder="Phone Number" value="<?=$userRow['phone']?>" name="phone" id="phone" maxlength="10"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Company : </td><td><b><input type="text" placeholder="Company" value="<?=$userRow['company']?>" name="company" id="company"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Description : </td><td><b><input type="text" placeholder="Description" value="<?=$userRow['description']?>" name="description" id="description"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Address : </td><td><b><input type="text" placeholder="Address" value="<?=$userRow['address']?>" name="address" id="address"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>City : </td><td><b><input type="text" placeholder="City" value="<?=$userRow['city']?>" name="city" id="city"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Postal Code : </td><td><b><input type="text" placeholder="Postal Code" placeholder="Postal Code" id="postalcode" value="<?=$userRow['postalcode']?>" name="postalcode"/></b></td>
            						    </tr>
            						    <tr>
            						        <td colspan="2"><button type="submit" class="btn btn-default" name="btn-edit">Update</button></td>
            						    </tr>
            						</table>
						            
        							
						        <?php
						    }
						?>
						
						
					
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
<?php include '../include/footer.php'; ?>
	 <script src="../js/jquery.js"></script>
    <script src="../js/adminscript.js"></script>
</body>
</html>