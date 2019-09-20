<!DOCTYPE html>
<html>
<head>
	<title>DATABASE - MYSQL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-sxale-1">

</head>
<body>
	<?php
	define("SERVERNAME","localhost");
	define("USERNAME","root");
	define("PASSWORD","root");
	define("DBNAME","db");

	$conn = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);

	if(!$conn){
		die("Connection failed".mysqli_connect_error());
	}
	else
		echo "Connected Successfully<br>";

	//create database using SQL - Structured Query Language
	$sql = "CREATE DATABASE IF NOT EXISTS mydb";
	if ($conn->query($sql)== TRUE)
		echo "Database Created Successfully<br>";
	else
		echo "Error Creating database:".$conn->error;

	//Create Table using SQL
	$sql = "CREATE TABLE IF NOT EXISTS Users(
		id INT(2) unsigned auto_increment PRIMARY KEY,
		username VARCHAR(30) NOT NULL,
		password VARCHAR(10) NOT NULL,
		email VARCHAR(50) UNIQUE,
		reg_date TIMESTAMP
	)";

	if ($conn->query($sql)== TRUE)
		echo "Table Created Successfully<br>";
	else
		echo "Error Creating table:".$conn->error;

	//insert records into the users table Methood1/Way1
		$sql = "INSERT INTO Users (username,password,email)VALUES('Peter','PeterJoe','peter@gmail.com');";
		$sql .= "INSERT INTO Users (username,password,email)VALUES('John','JohnDoe','john@gmail.com');";
		$sql .= "INSERT INTO Users (username,password,email)VALUES('Mary','MaryJohn','mmary@gmail.com');";
		$sql .= "INSERT INTO Users (username,password,email)VALUES('Julie','JulieRaj','julie@gmail.com');";
		$sql .= "INSERT INTO Users (username,password,email)VALUES('kishore','kishore','kishor1@gmail.com');";

		if($conn ->multi_query($sql)== TRUE)
			echo "Records Inserted Successfully<br>";
		else
			echo "Error:".$conn->error;

		//Methood2/Way2
		//insert record into the users table  --Prepared Statement
		$stmt = $conn->prepare("INSERT INTO Users(username,password,email)VALUES(?,?,?);");
		$stmt->bind_param("sss",$username,$password,$email);

		//set parameter and execute
		$username = "Virat Kholi";
		$password ="virat";
		$email = "Virat@gmail.com";
		$stmt->execute();

		$username = "MS Dhoni";
		$password ="dhoni";
		$email = "msd@gmail.com";
		$stmt->execute();

		$username = "Sachin";
		$password ="tendulkar";
		$email = "sachin@gmail.com";
		$stmt->execute();

		echo "New records inserted successfully<br>";

		$stmt->close();
		

		//Drop the table users from the database
		/*$sql = "DROP TABLE Users;";

		if ($conn->query($sql)== TRUE)
			echo "Table deleted Successfully<br>";
		else
			echo "Error:".$conn->error;

		$conn->close(); */









	?>

</body>
</html>