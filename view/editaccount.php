<?php
include '../include/header2.php';
$msg_register = 0;
include '../model/processaccount.php';
if(isset($_POST['btn-edit']))
{

	$processaccount = new Processaccount();
	$u = new User();
	
	$u->setFullname(mysql_real_escape_string($_POST['fname']));
	$u->setUsername(mysql_real_escape_string($_POST['uname']));
	$u->setEmail(mysql_real_escape_string($_POST['email']));
	$u->setPhone(mysql_real_escape_string($_POST['phone']));

	$msg_register = $processaccount->editProfile($u);	
	
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
					else if($msg_register==3 || $msg_register ==4 )
					{
						?>
							<div class="alert alert-danger">
							  <strong>Oh Snap!</strong> Username already taken.
							</div>
						<?php
					}
				?>
			<a href="account.php"><button type="submit" class="btn btn-default" name="btn-signup">Back</button></a>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="signup-form"><!--sign up form-->
						<h2>Edit Your Account!</h2>
						<form action="editaccount.php" method="post" onsubmit="return isEditFormValid();">
						<?php
						     //$res=mysql_query("SELECT * FROM user WHERE id='".$user."'");
						   // $u2=new User();
						   $processaccount = new Processaccount();
						    $u2 = $processaccount->getUser();
						    if(isset($u2))
						    {
						        ?>
						        	<table class="account">
            						    <tr>
            						        <td>Name : </td><td><b><input type="text" placeholder="Full Name" value="<?=$u2->getFullname()?>" name="fname" id="fullname"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>User Name : </td><td><b><input type="text" placeholder="User Name" value="<?=$u2->getUsername()?>" name="uname" id="username"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Email : </td><td><b><input type="email" placeholder="Email Address" value="<?=$u2->getEmail()?>" name="email" id="mail"/></b></td>
            						    </tr>
            						    <tr>
            						        <td>Phone Number : </td><td><b><input type="number" placeholder="Phone Number" value="<?=$u2->getPhone()?>" name="phone" id="phone" maxlength="10"/></b></td>
            						    </tr>
            						    <tr>
            						        <td colspan="2"><button type="submit" class="btn btn-default" name="btn-edit">Update</button></td>
            						    </tr>
            						</table>
						            
						        <?php
						    }
						    else
						    	echo 'Not connected to database';
						?>
						
						
					
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
<?php include '../include/footer.php'; ?>
	 <script src="../js/jquery.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>