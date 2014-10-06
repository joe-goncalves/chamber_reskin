
<?php
error_reporting(1);
ini_set('display_errors', 'On'); 
	$host_URL = "http://".$_SERVER["HTTP_HOST"];
	$GLOBALS['local_url'] = $host_URL . "/chamber";
	$mysqli = new mysqli("chamber.db.2324072.hostedresource.com","chamber","Inb3w33n2wa11s!","chamber");
	$GLOBALS['mysqli']=$mysqli;
	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $GLOBALS['mysqli']->connect_errno . ") " . $GLOBALS['mysqli']->connect_error;
	}
	echo "<pre>";
	var_dump(debug_backtrace());
	echo "</pre>";
?>