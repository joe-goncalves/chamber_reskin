
<?php include "includes/-header.php";?>
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
							$member = new member ($pkid, $mysqli);
							echo "<a class = 'list-group-item' href='member_details.php/?id=".$member->id."'>".$member->name."</a>";
						};
			        ?>
			    </div>
			</form>
        </div>
<?php include "includes/-footer.php";?>

<script>
    $('#searchlist').btsListFilter('#searchinput');
</script>
