
<?php include "../includes/-header.php";?>
        <h2>Officers and Directors</h2>
                <div class="col-lg-10">
                	<?php boardmember::fetchAllBoardMembers($mysqli); ?>
                </div>
<?php include "../includes/-footer.php";?>

