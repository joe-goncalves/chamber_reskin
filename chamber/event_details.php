
<?php include "includes/-header.php";?>
        <div class="col-lg-8">
        	<?php
        		$event = new event($_GET['id'], $mysqli);
                        echo "<h2>" . $event->name . "</h2>";
        		echo "<ul class = 'list-unstyled'>";
        		$details = $event->properNameArray();
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
