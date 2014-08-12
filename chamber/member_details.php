
<?php include "includes/-header.php";?>
        <div class="col-lg-10">
        	<?php
        		$res = $mysqli->query("SELECT * FROM member WHERE memberURLName = '". $_GET['memberURLName'] . "' LIMIT 1");
        		echo "<pre>";
        		print_r ($res->fetch_assoc());
        		echo "</pre>";
        	?>
		</div>
<?php include "../includes/-footer.php";?>
