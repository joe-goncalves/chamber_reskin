<?php include '../-local_settings.php';?>
<?php include '../includes/-custom_functions.php';?>
<?php include '../includes/-classes.php';?>
<?php include "../includes/-header.php";?>
<?php include "../includes/-sidebar.php"; ?>        
<div class="col-md-9">
	<div class="row">
		<div class="col-md-12">
			<h2>President's Message</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php getPresMessage();?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<img src='<?=$GLOBALS["local_url"]?>/images/siggy.png' alt ="president's signature"/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			President, The Chamber of Commerce of the Greater Ronkonkomas
		</div>
	</div>
</div>
<?php include "../includes/-footer.php";?>

