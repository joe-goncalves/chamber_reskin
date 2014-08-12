
<?php
error_reporting(1);
ini_set('display_errors', 'On'); 
	include $_SERVER['DOCUMENT_ROOT']."/-full_settings.php";
	$local_url = $host_URL . "/chamber";
	$img_url = $local_url . "/images";
	/*  establish mysqli connection object  */
	$mysqli = new mysqli("localhost", "root", "root", "chamber"); 
	if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
?>