<!DOCTYPE html>
<html>
<head>
	<title>Home Work</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-sxale-1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php
	// DBの定義
	define("SERVERNAME","localhost");
	define("USERNAME","root");
	define("PASSWORD","root");
	define("DBNAME","Myhomework");

	$conn = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);

	if(!$conn){
		die("Connection failed".mysqli_connect_error());
	}
	else
		echo "Connected Successfully<br>";

	// Create DB 作成
	$sql = "CREATE DATABASE IF NOT EXISTS MYhomework";
	if ($conn->query($sql)== TRUE)
		echo "Database Created Successfully<br>";
	else
		echo "Error Creating database:".$conn->error;

	// Create Table テーブル作成
	USE Myhomework;
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

	// Insert 
	/*
	$sql = "INSERT INTO Student (Username,password,email)VALUES('Peter','PeterJoe','1@gmail.com');";
		$sql .= "INSERT INTO Student (Username,password,email)VALUES('John','JohnDoe','2@gmail.com');";
		$sql .= "INSERT INTO Student (Username,password,email)VALUES('Mary','MaryJohn','3@gmail.com');";
		$sql .= "INSERT INTO Student (Username,password,email)VALUES('Julie','JulieRaj','4@gmail.com');";
		$sql .= "INSERT INTO Student(Username,password,email)VALUES('kishore','kishore','5@gmail.com');";
		$sql .= "INSERT INTO Student(Username,password,email)VALUES('Kazuki','Kazuki','6@gmail.com');";
		$sql .= "INSERT INTO Student(Username,password,email)VALUES('Syogo','Syogo','7@gmail.com');";
		$sql .= "INSERT INTO Student(Username,password,email)VALUES('Masashi','Masashi','8@gmail.com');";

		if($conn ->multi_query($sql)== TRUE)
			echo "Records Inserted Successfully<br>";
		else
			echo "Error:".$conn->error;
	*/

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

	// Delete Table NoNeed
	$sql = "TRUNCATE TABLE NoNeed";
		if($conn->query($sql) ==TRUE)
			echo "Table deleted Successfully<br>";
		else
			echo "Error;".$conn->error;

	// Alter Table
	/*$sql ="ALTER TABLE Student ADD PHONE VARCHAR(15) NOT NULL AFTER email";
	//$sql = "ALTER TABLE Users DROP COLUMN PHONE";
	if($conn->query($sql) ==TRUE)
		echo "Table Altered Successfully";
	else
		echo "Error;".$conn->error; */
?>
    <?php
   	/* $sql ="CREATE TABLE IF NOT EXISTS Chidren(
	 ChidrenID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	 ChidrenrName VARCHAR(30) NOT NULL,
	 ContactName VARCHAR(30) NOT NULL,
	 Country VARCHAR(50)
	);";

	if($conn->query($sql)==TRUE)
		echo "Table Chidren created successfully<br>";
	else
		echo "Error creating table:".$conn->error; */
	/*
 	$sql ="INSERT INTO Chidren (ChidrenrName,ContactName,Country)VALUES('John','JohnDoe','India');";
		$sql .="INSERT INTO Chidren (ChidrenrName,ContactName,Country)VALUES('Michel','Gates','Japan');";
		$sql .="INSERT INTO Chidren (ChidrenrName,ContactName,Country)VALUES('Sridhar','Murali','Russia');";
		$sql .="INSERT INTO Chidren (ChidrenrName,ContactName,Country)VALUES('Bill','Clinton','Italy');";
		$sql .="INSERT INTO Chidren (ChidrenrName,ContactName,Country)VALUES('Sunder','Pichhai','India');";
		$sql .="INSERT INTO Chidren (ChidrenrName,ContactName,Country)VALUES('Mark','Zucherberg','Japan');";
		
		if($conn->multi_query($sql)==TRUE)
			echo "New record created successfully<br>";
		else
			echo "Error: ".$sql."<br>".$conn->error;
	*/

	/*	$sql = "CREATE TABLE IF NOT EXISTS Adults(
				AdultID INT(4) NOT NULL,
				CustomerID INT(4) UNSIGNED,
				OrderDate TIMESTAMP
				);";

		if($conn->query($sql)==TRUE)
			echo "Table Adults created successfully<br>";

		else
			echo "Error creating table:".$conn->error;
	*/
			
	/*	$sql ="INSERT INTO Adults(AdultID,CustomerID)VALUES(1,5);";
		$sql .="INSERT INTO Adults(AdultID,CustomerID)VALUES(2,3);";
		$sql .="INSERT INTO Adults(AdultID,CustomerID)VALUES(3,6);";
		$sql .="INSERT INTO Adults(AdultID,CustomerID)VALUES(4,4);";
		$sql .="INSERT INTO Adults(AdultID,CustomerID)VALUES(5,1);";
		$sql .="INSERT INTO Adults(AdultID,CustomerID)VALUES(6,7);";

		if($conn->multi_query($sql)==TRUE)
			echo "New record created successfully<br>";

		else
			echo "Error: ".$sql."<br>".$conn->error; 
	*/

	//INNER JOIN
		echo"<h2>INNER JOIN </h2>";

		$sql = "SELECT Adults.AdultID,Chidren.ChidrenID,Adults.CustomerID,Chidren.ChidrenrName,Adults.OrderDate
				FROM Adults
				INNER JOIN Chidren ON Adults.CustomerID = Chidren.ChidrenID;";

		if($result = mysqli_query($conn,$sql)){
			if(mysqli_num_rows($result)>0){
				echo "<div class='container'>";
				echo "<table class='table table-bordered table-striped'>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>AdultID</th>";
						echo "<th>ChidrenrName</th>";
						echo "<th>OrderDate</th>";
					echo "</tr>";
				echo "</thead>";
				echo "</tdody>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>".$row['AdultID']."</td>";
					echo "<td>".$row['ChidrenrName']."</td>";
					echo "<td>".$row['OrderDate']."</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo "</div>";

			mysqli_free_result($result);
		}else
			echo "<p class='lead'><em>No records were found</em></p>";
		}else
			echo "ERROR: Could not able to execute $sql.".mysqli_error($conn);

	//Left Join
	echo "<h2>LEFT OUTER JOIN</h2>";

	$sql = "SELECT Chidren.ChidrenrName,Adults.CustomerID
			FROM Adults
			LEFT JOIN Chidren ON Adults.CustomerID = Chidren.ChidrenID;";

	if($result = mysqli_query($conn,$sql)){
			if(mysqli_num_rows($result)>0){
				echo "<div class='container'>";
				echo "<table class='table table-bordered table-striped'>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>CustomerID</th>";
						echo "<th>ChidrenrName</th>";
					echo "</tr>";
				echo "</thead>";
				echo "</tdody>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>".$row['CustomerID']."</td>";
					echo "<td>".$row['ChidrenrName']."</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo "</div>";

			mysqli_free_result($result);
		}else
			echo "<p class='lead'><em>No records were found</em></p>";
		}else
			echo "ERROR: Could not able to execute $sql.".mysqli_error($conn);


	//Right Join
		echo "<h2>Right Outer Join</h2>";

	$sql = "SELECT Chidren.ChidrenrName,Adults.CustomerID,Adults.OrderDate
			FROM Adults
			RIGHT JOIN Chidren  ON Adults.CustomerID = Chidren.ChidrenID;";

			if($result = mysqli_query($conn,$sql)){
			if(mysqli_num_rows($result)>0){
				echo "<div class='container'>";
				echo "<table class='table table-bordered table-striped'>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>CustomerID</th>";
						echo "<th>ChidrenrName</th>";
						echo "<th>OderDate</th>";
					echo "</tr>";
				echo "</thead>";
				echo "</tdody>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>".$row['CustomerID']."</td>";
					echo "<td>".$row['ChidrenrName']."</td>";
					echo "<td>".$row['OrderDate']."</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo "</div>";

			mysqli_free_result($result);
		}else
			echo "<p class='lead'><em>No records were found</em></p>";
		}else
			echo "ERROR: Could not able to execute $sql.".mysqli_error($conn);


	?>


</body>
</html>