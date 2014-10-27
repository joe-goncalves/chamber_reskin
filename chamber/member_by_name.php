<?php include './-local_settings.php';?>
<?php include './includes/-custom_functions.php';?>
<?php include './includes/-classes.php';?>
<?php include "./includes/-header.php";?>
<?php include "./includes/-sidebar.php"; ?>
<div class="col-md-9">
	<div class="row">
    	<div class="col-md-12">
    		<h2>Members</h2>
    		<form role="form">
		    	<div class="form-group">
		        	<input id="searchinput" class="form-control" type="search" placeholder="Search..." />
		    	</div>
		    	<div id="searchlist" class="list-group">
		        	<?php
		        	$res = $mysqli->query("SELECT * FROM member WHERE active=1 ORDER BY memberName");
						while ($row = $res->fetch_assoc()){
							foreach($row as $key => $val)$$key = $val;
							$member = new member();
							$member->getLinkData($pkid, $mysqli);
							$member->drawLink();
						};
		        	?>
		    	</div>
			</form>
		</div>
	</div>
</div>
<script>
    $('#searchlist').btsListFilter('#searchinput');
</script>
<?php include "./includes/-footer.php";?>

