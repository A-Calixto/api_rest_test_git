<?php
	$servername = "localhost";
	$database = "calixto";
	$username = "root";
	$password = "";

	try{
		// $pdo = new PDO('mysql:host='.$servername.';dbname='.$database,$username,$password);
		$pdo = new PDO('mysql:host=localhost;dbname=calixto','root','');
	} catch(PDOException $exception) {
		exit($exception->getMessage());
	}
	
	// Create connection
	// $conn = mysqli_connect($servername, $username, $password, $database);
	// Check connection
	// if (!$conn) {
	// 	die("Connection failed: " . mysqli_connect_error());
	// }
?>