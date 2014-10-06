<?php include './-local_settings.php';?>
<?php include './includes/-custom_functions.php';?>
<?php include './includes/-classes.php';?>
<?php include "./includes/-header.php";?>
<?php include "./includes/-sidebar.php"; ?>
        <div class="col-lg-5">
        	<h2>Members <small>Click to view details</small></h2>
        	<form role="form">
			    <div class="form-group">
			        <input id="searchinput" class="form-control" type="search" placeholder="Search..." />
			    </div>
			    <div id="searchlist" class="list-group">
			        <?php
			        $res = $mysqli->query("SELECT * FROM member");
						while ($row = $res->fetch_assoc()){
							foreach($row as $key => $val)$$key = $val;
							$member = new member();
							//$member->getAllPropsByID($pkid, $mysqli);
							$member->getLinkData($pkid, $mysqli);
							$member->drawLink();
						};
			        ?>
			    </div>
			</form>
        </div>
<?php include "./includes/-footer.php";?>

<script>
    $('#searchlist').btsListFilter('#searchinput');
</script>
