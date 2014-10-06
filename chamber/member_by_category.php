
<?php include "includes/-header.php";?>
        <h2>Members <small>click to expand category</small></h2>
        <div class="col-lg-5">
        	<ul class ='list-group first'>
        	<?php
        	$res = $mysqli->query("SELECT * FROM member_cat");
			while ($row = $res->fetch_assoc()){
				foreach($row as $key => $val){
					$$key = $val;
				}
				$cat = new memberCategory($member_cat_name, $pkid, $mysqli);
				echo "<li class = 'list-group-item first'><a href='#' data-catid='".$cat->id."'>".$cat->name."</a><span class='badge'>".$cat->count."</span>";
				echo"</li>"; 
			};
			echo "</ul>";
			echo "</div>";
			echo "<div class='col-lg-5'>";
				echo "<ul class ='list-group second'>";
					$res2 = $mysqli->query("SELECT pkid FROM member");
					while ($row = $res2 -> fetch_assoc()){
						foreach($row as $key => $val){
							$filenm=$key;
							$$filenm = $val;
						}
						$member = new member();
						$member->getAllPropsByID($pkid, $mysqli);
						echo "<li class = 'list-group-item second hidden'><a href='".$GLOBALS['local_url']."/member_details.php?id=".$member->id."' data-membercatid = '".$member->catid."'data-memberid='".$member->id."'>".$member->name."</a></li>";
					};
				echo"</ul>";
			echo"</div>";
			?>
        </div>
<?php 



include "includes/-footer.php";?>

