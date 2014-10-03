<?
function drawOptionsFromTable($table, $mysqli, $money=false){
	$query =  "SELECT * FROM $table";
	$res = $mysqli->query("SELECT * FROM $table");
	while($row = $res -> fetch_assoc()){
		foreach($row as $key=>$val)$$key=$val;
		if ($money){
			echo "<option value = '".$pkid."'>".$name.":  $".$price."</option>";
		}else{
			echo "<option value = '".$pkid."'>".$name."</option>";
		}
	}
}
function postLatestFlyer($mysqli){
	$res = $mysqli->query("SELECT content FROM upload WHERE upload_type_id=3 ORDER BY timestamp DESC LIMIT 1");
	$row = $res->fetch_assoc();
	$image = $row['content'];
	$image = base64_encode($image);

	echo'<img class="img-responsive center-block" src="data:image/jpeg;base64,'.$image.'"/>';
}
function getPresMessage($mysqli){
	$query = "SELECT message FROM pres_msg ORDER BY timestamp DESC LIMIT 1";
	$res = $mysqli->query($query);
	$row = $res->fetch_assoc();
	echo $row['message'];
}
?>