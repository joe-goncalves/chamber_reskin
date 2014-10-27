<?php include '../-local_settings.php';?>
<?php include '../includes/-custom_functions.php';?>
<?php include '../includes/-classes.php';?>
<?php include "../includes/-header.php";?>
<?php include "../includes/-sidebar.php"; ?>
<div class="col-md-9">
	<div class='row'>
		<div class="col-md-12">
			<h2>Super Savers</h2>
		</div>
	</div>
	<?php member::drawAllSuperSavers($mysqli);?>
</div>
<?php include "../includes/-footer.php";?>

