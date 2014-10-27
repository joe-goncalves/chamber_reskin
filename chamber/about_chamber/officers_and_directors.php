<?php include '../-local_settings.php';?>
<?php include '../includes/-custom_functions.php';?>
<?php include '../includes/-classes.php';?>
<?php include "../includes/-header.php";?>
<?php include "../includes/-sidebar.php"; ?>
<div class="col-md-9">
	<h2>Officers and Directors</h2>
	<?php boardmember::fetchAllBoardMembers($mysqli); ?>
</div>
<?php include "../includes/-footer.php";?>

