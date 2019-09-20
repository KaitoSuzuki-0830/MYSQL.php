<!DOCTYPE html>
<html>
<head>
	<title>3rdweek Homework</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-sxale-1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<?php
	/// create DB create Table DELETE 
	// insert alter 
	// JOIN (Innner Right Left)
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

	// データベースを作るコード
	$sql = "CREATE DATABASE IF NOT EXISTS homework";
	if ($conn->query($sql)== TRUE)
		echo "Database Created Successfully<br>";
	else
		echo "Error Creating database:".$conn->error;

	// テーブルを作るコード
	USE homework;
	$sql = "CREATE TABLE IF NOT EXISTS Student(
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

	//テーブルにデータを挿入するコード
	$sql = "INSERT INTO Student (Username,password,email)VALUES('Peter','PeterJoe','p@gmail.com');";
		$sql .= "INSERT INTO Student (Username,password,email)VALUES('John','JohnDoe','j@gmail.com');";
		$sql .= "INSERT INTO Student (Username,password,email)VALUES('Mary','MaryJohn','m@gmail.com');";
		$sql .= "INSERT INTO Student (Username,password,email)VALUES('Julie','JulieRaj','juli@gmail.com');";
		$sql .= "INSERT INTO Student(Username,password,email)VALUES('kishore','kishore','k@gmail.com');";
		$sql .= "INSERT INTO Student(Username,password,email)VALUES('Kazuki','Kazuki','Kazuki@gmail.com');";
		$sql .= "INSERT INTO Student(Username,password,email)VALUES('Syogo','Syogo','S@gmail.com');";
		$sql .= "INSERT INTO Student(Username,password,email)VALUES('Masashi','Masashi','masashi@gmail.com');";


		if($conn ->multi_query($sql)== TRUE)
			echo "Records Inserted Successfully<br>";
		else
			echo "Error:".$conn->error;

	// Second Table
		$sql = "CREATE TABLE IF NOT EXISTS NoNeed(
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
	


	?>

</body>
</html>