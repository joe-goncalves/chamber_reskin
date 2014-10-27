<?php
include "../-local_settings.php";
$query = "SELECT * FROM event";
$res = $mysqli->query($query);
while($row = $res->fetch_assoc()){
	foreach($row as $key =>$val){
		if($key != "pkid"){
			$val = html_entity_decode($val);
			//$val = strip_tags($val);		
		}else{
			 $$key = $val;	
		}
		$query2 = "UPDATE event SET $key = '$val' WHERE pkid = ".$pkid;
		echo $query2."<br/>";
		$mysqli->query($query2);
	}
}

?>