<?php
include 'header2.php';
include_once 'dbconnect.php';

if(isset($_GET['mail']))
{
    $mail=$_GET['mail'];
}
?>
	<section>
		<div class="container">
			<div class="row">
			
				<div class="col-sm-9">
					<div class="features_items" style="text-align:center;"><!--features_items-->
					  <?php
					    if($mail=='1')
					    {
					        ?>
					            <img src="images/green-tick.png">
						        <p>Thank you for contacting us. We will be in touch with you very soon.</p>
					        <?php
					    }
					    else if($mail=='0')
					    {
					        ?>
					            <img src="images/red-cross.png">
						        <p>Message could not be sent...</p>
					        <?php
					    }
					  ?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
<?php include 'footer.php'; ?>
</body>
</html>