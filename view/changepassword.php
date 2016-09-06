<?php
include '../includeheader2.php';
include_once '../model/dbconnect.php';
include '../model/processaccount.php';

$msg_register = 0;
if(isset($_POST['btn-signup']))
{
	
	$processaccount = new Processaccount();
	$users = new User();
	
	$users->setPassword(md5(mysql_real_escape_string($_POST['oldpass'])));
	$users->setConfirm(md5(mysql_real_escape_string($_POST['pass'])));
	$users->setNewpass(md5(mysql_real_escape_string($_POST['confirm'])));
	
	$msg_register = $processaccount->changePassword($users);
	if($msg_register == 0)
	{
		header("Location: account.php");
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
							  <strong>Oh Snap!</strong> Old Pasword is not correct.
							</div>
						<?php
					}
					else if($msg_register==2)
					{
						?>
							<div class="alert alert-danger">
							  <strong>Oh Snap!</strong> Password cannot be changed.
							</div>
						<?php
					}
					else
					{
						
					}
				?>
			<a href="account.php"><button type="submit" class="btn btn-default" name="btn-signup">Back</button></a>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="signup-form"><!--sign up form-->
						<h2>Change Password!</h2>
						<form action="changepassword.php" method="post" onsubmit="return isChangeFormValid();">
						
					        <table class="account">
							    <tr>
							        <td>Old Password : </td><td><input type="password" placeholder="Old Password" name="oldpass" id="oldpass"/></td>
							    </tr>
							    <tr>
							        <td>New Password : </td><td><input type="password" placeholder="New Password" name="pass" id="pass"/></td>
							    </tr>
							    <tr>
							        <td>Confirm Password : </td><td><input type="password" placeholder="Confirm Password" name="confirm" id="confirm"/></td>
							    </tr>
							    <tr>
							        <td colspan="2"><button type="submit" class="btn btn-default" name="btn-signup">Change</button></td>
							    </tr>
							</table>
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