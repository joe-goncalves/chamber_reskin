
<?php
error_reporting(1);
ini_set('display_errors', 'On'); 
	$host_URL = "http://localhost:8888";
	//$host_URL = $_SERVER['DOCUMENT_ROOT'];
	$GLOBALS['local_url'] = $host_URL . "/chamber";
	/*  establish mysqli connection object  */
	$mysqli = new mysqli("localhost", "root", "root", "chamber"); 
	if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
?>