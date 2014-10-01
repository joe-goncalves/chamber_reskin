<?
function drawOptionsFromTable($table, $mysqli){
	$query =  "SELECT * FROM $table";
	$res = $mysqli->query("SELECT * FROM $table");
	while($row = $res -> fetch_assoc()){
		foreach($row as $key=>$val)$$key=$val;
		echo "<option value = '".$pkid."'>".$name.":  $".$price."</option>";
	}
}
?>