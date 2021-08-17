<?php 
	session_start();
	$host = 'localhost'; 
	$db = 'teste';
	$user = 'root';
	$pwd = "";

	$connect = "mysql:host=".$host.";dbname=".$db.";";
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

	try {
		$link = new PDO($connect, $user, $pwd, $options);
	}catch (PDOException $error){
		echo 'Connection failed: ' . $error->getMessage();
	}
?>