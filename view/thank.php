<!-- Thanks your users after successful Payment -->
<?php
include '../include/header2.php';
include_once '../model/dbconnect.php';
?>

	
	<section>
		<div class="container">
			<div class="row">
			
				<div class="col-sm-9">
					<div class="features_items" style="text-align:center;"><!--features_items-->
					<?php print_r($_POST);


                    echo "Payment was made successfully. Thanks for ordering"; ?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
<?php include '../include/footer.php'; ?>
</body>
</html>