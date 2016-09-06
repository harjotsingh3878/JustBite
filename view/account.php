<?php
include '../include/header2.php';
include '../model/processaccount.php';
?>

	<section id="form" style="margin-top: 0px"><!--form-->
		<div class="container">
		    <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Account</li>
				</ol>
			</div>
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
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>My Profile</h2>
						<?php
							$processaccount = new Processaccount();
							$user = $processaccount->getUser();
						    
						    
						    if(isset($user))
						    {
						        ?>
						            <table class="account">
            						    <tr>
            						        <td>Name : </td><td><b><?=$user->getFullname()?></b></td>
            						    </tr>
            						    <tr>
            						        <td>User Name : </td><td><b><?=$user->getUsername()?></b></td>
            						    </tr>
            						    <tr>
            						        <td>Email : </td><td><b><?=$user->getEmail()?></b></td>
            						    </tr>
            						    <tr>
            						        <td>Phone Number : </td><td><b><?=$user->getPhone()?></b></td>
            						    </tr>

            						    <tr>
            						        <td colspan="2"><a href="changepassword.php">Change Password</a></td>
            						    </tr>
            						    <tr>
            						        <td colspan="2"><a href="editaccount.php">Change Profile</a></td>
            						    </tr>
            						</table>
						        <?php
						    }
						    else
						    	echo 'Not connected to database';
						?>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
<?php include '../include/footer.php'; ?>
</body>
</html>