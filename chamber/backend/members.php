
<?php 
include "../-local_settings.php";
$data=array();
$res = $mysqli->query("SELECT * FROM member_cat");
echo "<ul>";
while ($row = $res->fetch_assoc()){
	foreach($row as $key => $val)$$key = $val;
	echo "<li data-catname='".$pkid."'>".$member_cat_name."</li>";
};
echo "</ul>";
?>