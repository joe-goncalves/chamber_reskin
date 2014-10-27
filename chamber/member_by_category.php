<?php include './-local_settings.php';?>
<?php include './includes/-custom_functions.php';?>
<?php include './includes/-classes.php';?>
<?php include "./includes/-header.php";?>
<?php include "./includes/-sidebar.php"; ?>
        <div class="col-md-9">
        	<div class="row">
	        	<div class="col-md-6">
	        		<h2>Members</h2>
	        		<ul class ='list-group first'>
		        	<?php
		        	$res = $mysqli->query("SELECT * FROM member_cat");
					while ($row = $res->fetch_assoc()){
						foreach($row as $key => $val){
							$$key = $val;
						}
						$cat = new memberCategory($member_cat_name, $pkid, $mysqli);
						if ($cat->count>0){
							echo "<li class = 'list-group-item first'>".
									"<a href='#' data-catid='".$cat->id."'>".$cat->name."</a><span class='badge'>".$cat->count."</span>".
								 "</li>"; 
						}
					};
					echo "</ul>";
				echo "</div>";
				echo "<div class='col-md-6'>";
				echo"<h2 id='cat-name' class='hidden'>Category Members</h2>";
					echo "<ul class ='list-group second'>";
						$res2 = $mysqli->query("SELECT pkid FROM member WHERE active=1 ORDER BY memberName");
						while ($row = $res2 -> fetch_assoc()){
							foreach($row as $key => $val){
								$filenm=$key;
								$$filenm = $val;
							}
							$member = new member();
							$member->getAllPropsByID($pkid, $mysqli);
							echo "<li class = 'list-group-item second hidden'><a href='".$GLOBALS['local_url']."/member_details.php?id=".$member->id."' data-membercatid = '".$member->catid."' data-memberid='".$member->id."'>".$member->name."</a></li>";
						};
					echo"</ul>";
				echo"</div>";
				?>
		</div>
	</div>
<?php 
include "./includes/-footer.php";?>

