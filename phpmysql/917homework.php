<!DOCTYPE html>
<html>
<head>
	<title>Homework</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
	<h2>homework</h2>
	<?php
	require_once('includes/dbh.inc.php');
	define("SERVERNAME","localhost");
	define("USERNAME","root");
	define("PASSWORD","root");
	define("DBNAME","homework");

	$conn = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);

	if(!$conn){
		die("Connection failed".mysqli_connect_error());
	}
	else
		echo "Connected Successfully<br>";

	//create database using SQL
	$sql = "CREATE DATABASE IF NOT EXISTS myhomework";
	 if ($conn->query($sql)==TRUE)
	 	echo "Database Created Successfully<br>";
	 else
	 	echo "Error Creating database:".$conn->error;

	 //Create Table 
	 $sql = "CREATE TABLE IF NOT EXISTS Users(
	 	id INT(2) unsigned auto_increment  PRIMARY KEY,
	 	username VARCHAR(30) NOT NULL,
	 	password VARCHAR(10) NOT NULL,
	 	email VARCHAR(50)UNIQUE,
	 	reg_date TIMESTAMP
	 )";

	 if ($conn->query($sql)== TRUE)
		echo "Table Created Successfully<br>";
	else
		echo "Error Creating table:".$conn->error;

	?>

</body>
</html>