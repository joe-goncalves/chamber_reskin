<?php include './-local_settings.php';?>
<?php include './includes/-custom_functions.php';?>
<?php include './includes/-classes.php';?>
<?php include "./includes/-header.php";?>
<?php include "./includes/-sidebar.php"; ?>
<div class="col-md-9">
	<h2>Past Events</h2>
	<ul class="list-unstyled">
	  <?php
	  $res=$mysqli->query("SELECT pkid FROM event where active = 1 and eventDateExp < curdate()+1 ORDER BY eventDate DESC");
	  while ($row = $res->fetch_assoc()){
	 	  foreach($row as $key => $val)$$key = $val;
		  $event=new event($pkid, $mysqli);
		  $event->drawEventLink();
	  }
	  ?>
	</ul>  
</div>
<?php include "./includes/-footer.php";?>

