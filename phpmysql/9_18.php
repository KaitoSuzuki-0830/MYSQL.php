<!DOCTYPE html>
<html>
<head>
	<title>MYSQL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
	<h2>MYSQL FUNCTIONS</h2>
	<?php
	require_once('includes/dbh.inc.php');

	$sql = "CREATE TABLE IF NOT EXISTS products(
			product_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			product_name VARCHAR(30) NOT NULL,
			price VARCHAR(10) NOT NULL,
			grade VARCHAR(5),
			reg_date TIMESTAMP
			)";

	if($conn ->query($sql) ==TRUE)
		echo "Table Created sccessfully<br>";
	else
		echo "Error:".$conn->error;

	$sql ="INSERT INTO products(product_name,price,grade)VALUES('Apple','200','A');";
	$sql .="INSERT INTO products(product_name,price,grade) VALUES ('Tomato','300','B');";
	$sql .="INSERT INTO products(product_name,price,grade)VALUES('Grapes','250','C');";
	$sql .="INSERT INTO products(product_name,price,grade)VALUES('Almond','210','A');";
	$sql .="INSERT INTO products(product_name,price,grade)VALUES('Orange','280','B');";
	
	if($conn ->multi_query($sql) ==TRUE)
		echo "Table Created sccessfully<br>";
	else
		echo "Error:".$conn->error;

	//count() function
	$sql = "SELECT COUNT(product_name) as NO_of_Products FROM Products;";

	// avg()
	$sql = "SELECT AVG(price) as Average FROM Products;";

	//min()
	$sql = "SELECT MIN(price) as Min_Price FROM Products;";

	//max()
	$sql = "SELECT MAX(price) as Max_Price FROM Products;";

	//SUM()
	$sql = "SELECT SUM(price) as Total_Price FROM Products;";

	//UCASE()-uppercase
	$sql = "SELECT UCASE(product_name) as Products, Price FROM Products;";

	//Lcase() -lowercase
	$sql = "SELECT LCASE(product_name) as Products, Price FROM Products;";

	//NOW()
	$sql = "SELECT product_name,price,Now() as PerDate FROM Products;";







	?>
</body>
</html>