
<?php include "includes/-header.php";?>
        <div class="col-lg-8">
        	<?php
        		$member = new member();
                        $member->getAllPropsByID($_GET['id'], $mysqli);
        		echo "<h2>" . $member->name . "</h2>";
        		echo "<ul class = 'list-unstyled'>";
        		$details = $member->properNameArray();
        		foreach($details as $key => $val){
        			echo "<li>";
        				echo "<strong>" . $key . ":  </strong>";
        				echo $val;
        			echo "<li>";
        		}
        		echo "</ul>";
        	?>
		</div>
<?php include "includes/-footer.php";?>
