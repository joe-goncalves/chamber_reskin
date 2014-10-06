<?php include './-local_settings.php';?>
<?php include './includes/-custom_functions.php';?>
<?php include './includes/-classes.php';?>
<?php include "./includes/-header.php";?>
<?php include "./includes/-sidebar.php"; ?>
        <h2>Upcoming Events</h2>
        <div class="col-lg-8">
      	<?php
      	$res=$mysqli->query("SELECT pkid FROM event where active = 1 and eventDateExp >= curdate()+1");
      	while ($row = $res->fetch_assoc()){
      		foreach($row as $key => $val)$$key = $val;
      		$event=new event($pkid, $mysqli);
      		$event->drawEventLink();
      	}
      	?>  
        </div>
<?php include "./includes/-footer.php";?>

