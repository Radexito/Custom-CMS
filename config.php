<?php
	session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cms";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection to the database failed!");
	    //TODO: send email/Log $conn->connect_error;
	} 
	
	require_once('functions.php');
	
	define('SITE_URL', 	getSettingFromDB("siteurl", $conn));
?>