<?php include './-local_settings.php';?>
<?php include './includes/-custom_functions.php';?>
<?php include './includes/-classes.php';?>
<?php include "./includes/-header.php";?>
<?php include "./includes/-sidebar.php"; ?>
        <div class="col-md-9">
        	<?php
        		$member = new member();
                        $member->getAllPropsByID($_GET['id'], $mysqli);
                        echo "<div class='row'>"
                                ."<div class='col-md-12'>"
        		              ."<h2>" . $member->name . "</h2>"
                                ."</div>"
                             ."</div>";
                        echo "<div class='row'>"
                                ."<div class='col-md-9'>"
        		                  ."<ul class = 'list-unstyled'>";
                            		$details = $member->properNameArray();
                                            $details["Street Address"].=" ".$details['City'].", ".$details['State']."  ".$details['Zip'];
                                            foreach($details as $key => $val){
                                                    if ($key=='Contact Number'&&isset($val)&&!empty($val)){
                                                            echo '<li><i class="fa fa-phone"></i><a class href="tel:+1'.str_replace("-","",str_replace(")","",str_replace("(","",str_replace(" ", "", $val)))).'">'.trim($val).'</a></li>';
                                                        
                                                    }
                                                    
                                                    else if($key=="Street Address"&&isset($val)&&!empty($val)&&sizeof($val)>3){
                                                            echo '<li><i class="fa fa-building"></i>'.trim($val).'</li>';
                                                    }
                                                    else if($key=="Website"&&isset($val)&&!empty($val)&&trim($val)!=""&&strip_tags($val)!=""){
                                                            echo '<li><i class="fa fa-globe"></i>'.trim($val).'</li>';       
                                                    }
                                                    else if($key=="Contact Name"&&isset($val)&&!empty($val)&&trim($val)!=""){
                                                            echo '</br><li><strong>Contact '.trim($val).':</strong></li>';       
                                                    }
                            			else if ($key!="City"&&$key!="State"&&$key!="Zip"&&$key!="Member Name"&&$key!="Level"&&$key!="Category"&&isset($val)&&!empty($val)&&sizeof($val)>3){
                                                            echo "<li>";
                                    				echo $val;
                                    			echo "<li>";
                                                    }
                            		}
                            		echo "</ul>";
                                echo "</div>";
                                echo "<div class='col-md-3'>";
                                        echo '<div class="row member-details-cat">'
                                                .'<div class="col-md-12">'
                                                    .'<i class="fa fa-certificate '.$member->level.'"></i>'
                                                .'</div>'
                                            .'<div class="row">'
                                                .'<div class="col-md-12">'
                                                        .'<ul class="list-unstyled">'
                                                            .'<li>Member Level:  '.$member->level.'</li>'
                                                            .'<li>Member Category:  '.$member->catnm.'</li>'
                                                        .'</ul>'
                                                .'</div>'
                                            .'</div>';
                               echo "</div>"; 
                        echo "</div>";
                        if (!empty($member->supersaver)){
                                        echo "<div class='row'>".$member->drawSuperSaver(6)."</div>";
                                    }
                    echo "</div>";
                echo "</div>";
        	?>
<?php include "./includes/-footer.php";?>
