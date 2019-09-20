<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-sxale-1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<h1>MYSQL - JOINS</h1>
	<?php
	 require_once('includes/dbh.inc.php');

	 //DIFFERENT TYPES OF JOINS
	 	// 1. INNER JOIN
	 	// 2.LEFT OUTER JOIN
	 	// 3. RIGHT OUTER JOIN
	 	// 4. FULL OUTER JOIN - NOT SUPPORTED(OUTDATED)
	/* $sql ="CREATE TABLE IF NOT EXISTS Customer(
	 CustomerID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	 CustomerName VARCHAR(30) NOT NULL,
	 ContactName VARCHAR(30) NOT NULL,
	 Country VARCHAR(50)
	);";

	if($conn->query($sql)==TRUE)
		echo "Table Customers created successfully<br>";
	else
		echo "Error creating table:".$conn->error;

		$sql ="INSERT INTO Customer (CustomerName,ContactName,Country)VALUES('John','JohnDoe','India');";
		$sql .="INSERT INTO Customer (CustomerName,ContactName,Country)VALUES('Michel','Gates','Japan');";
		$sql .="INSERT INTO Customer (CustomerName,ContactName,Country)VALUES('Sridhar','Murali','Russia');";
		$sql .="INSERT INTO Customer (CustomerName,ContactName,Country)VALUES('Bill','Clinton','Italy');";
		$sql .="INSERT INTO Customer (CustomerName,ContactName,Country)VALUES('Sunder','Pichhai','India');";
		$sql .="INSERT INTO Customer (CustomerName,ContactName,Country)VALUES('Mark','Zucherberg','Japan');";
		
		if($conn->multi_query($sql)==TRUE)
			echo "New record created successfully<br>";
		else
			echo "Error: ".$sql."<br>".$conn->error;*/
		// 一つ作ったらコメントにしないと重複してしまう

		/*$sql = "CREATE TABLE IF NOT EXISTS Orders(
				OrderID INT(4) NOT NULL,
				CustomerID INT(4) UNSIGNED,
				OrderDate TIMESTAMP
				);";

		if($conn->query($sql)==TRUE)
			echo "Table orders created successfully<br>";

		else
			echo "Error creating table:".$conn->error;

		$sql ="INSERT INTO Orders(OrderID,CustomerID)VALUES(1,5);";
		$sql .="INSERT INTO Orders(OrderID,CustomerID)VALUES(2,3);";
		$sql .="INSERT INTO Orders(OrderID,CustomerID)VALUES(3,6);";
		$sql .="INSERT INTO Orders(OrderID,CustomerID)VALUES(4,4);";
		$sql .="INSERT INTO Orders(OrderID,CustomerID)VALUES(5,1);";
		$sql .="INSERT INTO Orders(OrderID,CustomerID)VALUES(6,7);";

		if($conn->multi_query($sql)==TRUE)
			echo "New record created successfully<br>";

		else
			echo "Error: ".$sql."<br>".$conn->error; */

		//INNER JOIN
		echo"<h2>INNER JOIN </h2>";

		$sql = "SELECT Orders.OrderID,Customer.CustomerID,Orders.CustomerID,Customer.CustomerName,Orders.OrderDate
				FROM Orders
				INNER JOIN Customer ON Orders.CustomerID = Customer.CustomerID;";

		// Left Outer Join 9-20work
		$sql = "SELECT Customer.CustomerName,Orders.OrderID
			FROM Customer
			LEFT JOIN Orders ON Customer.CustomerID= Orders.CustomerID;";

		if($result = mysqli_query($conn,$sql)){
			if(mysqli_num_rows($result)>0){
				echo "<div class='container'>";
				echo "<table class='table table-bordered table-striped'>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>OrderID</th>";
						echo "<th>CCustomerID</th>";
						echo "<th>OCustomerID</th>";
						echo "<th>CustomerName</th>";
						echo "<th>OrderDate</th>";
					echo "</tr>";
				echo "</thead>";
				echo "</tdody>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>".$row['OrderID']."</td>";
					echo "<td>".$row['CustomerID']."</td>";
					echo "<td>".$row['CustomerID']."</td>";
					echo "<td>".$row['CustomerName']."</td>";
					echo "<td>".$row['OrderDate']."</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo "</div>";

			my_sqli_free_result($result);
		}else
			echo "<p class='lead'><em>No records were found</em></p>";
		}else
			echo "ERROR: Could not able to execute $sql.".mysqli_error($conn);

	?>

	<h1>RIGHT OUTER JOIN</h1>
	<?php
		$sql = "SELECT customer.CustomerName,Orders,OrderID,Orders.OrderDate
			FROM Customer
			RIGHT JOIN Orders ON CustomerID = Orders.CustomerID;";

			if($result = mysqli_query($conn,$sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<div class='container'>";
			echo "<table class='table table-bordered'>";
			echo "<thead>";
				echo "<tr>";
					echo "<th>CutomerName</th>";
					echo "<th>OrderID</th>";
					echo "<th>OrderDate</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>".$row['CustomerName']."</td>";
					echo "<td>".$row['OrderID']."</td>";
					echo "<td>".$row['OrderDate']."</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo "</div>";

			mysqli_free_result($result);
		}
		else
			echo "<p class='lead'><em>No records were found</em></p>";
	}
		else
			echo "Could not able to execute $sql.".mysqli_error($conn);

	?>

</body>
</html>