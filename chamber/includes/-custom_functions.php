<?
function drawOptionsFromTable($table, $money=false){
	$query =  "SELECT * FROM $table";
	$res = $GLOBALS["mysqli"]->query("SELECT * FROM $table");
	while($row = $res -> fetch_assoc()){
		foreach($row as $key=>$val)$$key=$val;
		if ($money){
			echo "<option value = '".$pkid."'>".$name.":  $".$price."</option>";
		}else{
			echo "<option value = '".$pkid."'>".$name."</option>";
		}
	}
}
function postLatestFlyer(){
	
	$res = $GLOBALS["mysqli"]->query("SELECT upload.content, event_upload.event_id FROM upload LEFT JOIN event_upload ON event_upload.upload_id = upload.id WHERE upload_type_id=3 ORDER BY timestamp DESC LIMIT 1");
	$row = $res->fetch_assoc();
	$image = $row['content'];
	$image = base64_encode($image);
	
	echo "<a href='http://beta.ronkonkomachamber.com/chamber/event_details.php/?id=".$row['event_id']."'>".
			'<img class="img-responsive center-block" alt=" " src="data:image/jpeg;base64,'.$image.'"/>'.
		"</a>";

}
function getPresMessage($truncated=false){
	$query = "SELECT message FROM pres_msg ORDER BY timestamp DESC LIMIT 1";
	$res = $GLOBALS["mysqli"]->query($query);
	$row = $res->fetch_assoc();
	$message = $row['message'];
	$message = html_entity_decode($message);
	if($truncated){
		$message = strip_tags($message);
		$messagearray = explode(' ', $message);
		$shortmsg = array();
		for($i=0;$i<50;$i++){
			array_push($shortmsg, $messagearray[$i]);
		}
		echo implode(' ', $shortmsg)."...<a href='about_chamber/message_from_president.php'>read more!!</a>";
	}else{
		echo $message;	
	} 	
}

?>