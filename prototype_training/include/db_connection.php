<?php 
require("constants.php");

	// 1. Create a database connetion
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	// Test if connection occured.
	if(mysqli_connect_errno()){
		die("Database connection failed: " . mysqli_error() . " (" . mysqli_connect_errno() . ")");
	}
 ?>