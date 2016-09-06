<?php
include '../include/adminheader.php';
include_once '../model/dbconnect.php';

?>

	<section id="form" style="margin-top: 0px"><!--form-->
		<div class="container">
			<label class="error-label col-xs-12" id="error"></label>
			<?php
					if($msg_register==3)
					{
						?>
							<div class="alert alert-danger">
							  <strong>Oh Snap!</strong> Login failed.
							</div>
						<?php
					}
					else if($msg_register==1)
					{
						?>
							<div class="alert alert-success">
							  <strong>Success!</strong> User registeres successfully.
							</div>
						<?php
					}
					else if($msg_register==2)
					{
						?>
							<div class="alert alert-danger">
							  <strong>Oh Snap!</strong> User cannot be registered.
							</div>
						<?php
					}
					else
					{
						
					}
				?>
			
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<div class="signup-form"><!--sign up form-->
						<h2>My Profile</h2>
						<?php
						
						    $res=mysql_query("SELECT * FROM user INNER JOIN seller ON user.id=seller.userid WHERE user.id='".$userid."'");
						    
						    while($userRow=mysql_fetch_array($res))
						    {
						        ?>
						            <table class="account">
            						    <tr>
            						        <td>Name : </td><td><b><input type="text" value="<?=$userRow['fullname']?>" disabled="disabled" id="fullname"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>User Name : </td><td><b><input type="text" value="<?=$userRow['username']?>" disabled="disabled" name="uname" id="username"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Email : </td><td><b><input type="email" value="<?=$userRow['email']?>" disabled="disabled" name="email" id="mail"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Phone Number : </td><td><b><input type="number" value="<?=$userRow['phone']?>" disabled="disabled" name="phone" id="phone" maxlength="10"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Company : </td><td><b><input type="text" value="<?=$userRow['company']?>" disabled="disabled" name="company"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Description : </td><td><b><input type="text" placeholder="Description" disabled="disabled" value="<?=$userRow['description']?>" name="description"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Address : </td><td><b><input type="text" placeholder="Address" disabled="disabled" value="<?=$userRow['address']?>" name="address"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>City : </td><td><b><input type="text" placeholder="City" disabled="disabled" value="<?=$userRow['city']?>" name="city"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Postal Code : </td><td><b><input type="text" placeholder="Postal Code" disabled="disabled" value="<?=$userRow['postalcode']?>" name="postalcode"/></b></td>
            						    </tr>
            						    
            						    <tr>
            						        <td colspan="2"><a href="changeadminpwd.php">Change Password</a></td><td></td>
            						    </tr>
            						    <tr>
            						        <td colspan="2"><a href="editadminaccount.php">Change Profile</a></td><td></td>
            						    </tr>
            						</table>
						        <?php
						    }
						?>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
<?php include '../include/footer.php'; ?>
</body>
</html>