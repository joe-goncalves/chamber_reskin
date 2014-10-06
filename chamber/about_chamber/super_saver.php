<?php include '../-local_settings.php';?>
<?php include '../includes/-custom_functions.php';?>
<?php include '../includes/-classes.php';?>
<?php include "../includes/-header.php";?>
<?php include "../includes/-sidebar.php"; ?>
    <div class="col-lg-10">
    	<?php member::drawAllSuperSavers($mysqli);?>
    </div>
<?php include "../includes/-footer.php";?>

