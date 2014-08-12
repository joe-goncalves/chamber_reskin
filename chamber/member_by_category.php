
<?php include "includes/-header.php";?>
        <div class="col-lg-5">
        	<h2>Members <small>click to expand category</small></h2>
        	<ul class ='list-group first'>
        	<?php
        	$res = $mysqli->query("SELECT * FROM member_cat");
			while ($row = $res->fetch_assoc()){
				foreach($row as $key => $val)$$key = $val;
				echo "<li class = 'list-group-item first'><a href='#' data-catid='".$pkid."'>".$member_cat_name."</a><span class='badge'></span>";
					echo "<ul class ='list-group second'>";
						$res2 = $mysqli->query("SELECT * FROM member WHERE memberCatID = $pkid");
						while ($row2 = $res2 -> fetch_assoc()){
							echo "<li class = 'list-group-item second'><a href='".$local_url."/member/".$row2['memberURLName']."' data-membercatid = '".$row2['memberCatID']."'data-memberid='".$row2['pkid']."'>".$row2['memberName']."</a></li>";
						};
					echo"</ul>";
				echo"</li>"; 
			};
			echo "</ul>";
			?>
        </div>
<?php include "includes/-footer.php";?>
