<!DOCTYPE html>
<html>
<head>
	<title>MYSQL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	

</head>
<body>
	<h1>MYSQL - GROUPBY and ORDERBY</h1>
	<?php
	require_once('includes/dbh.inc.php');
	/*$sql = "ALTER TABLE Users ADD COUNTRY VARCHAR(15) NOT NULL AFTER email";
	if($conn->query($sql)==TURE)
		echo "Table Users Altered Successfully<br>";
	else
		echo "Error".$conn->error; */

		//UPDATE DATA IN USERS TABLE
		/*$sql = "UPDATE Users SET Country = 'India' where id = 1;";
		$sql .= "UPDATE Users SET Country = 'Japan' where id = 2;";
		$sql .= "UPDATE Users SET Country = 'Europe' where id = 3;";
		$sql .= "UPDATE Users SET Country = 'India' where id = 4;";
		$sql .= "UPDATE Users SET Country = 'Japan' where id = 5;";
		
	if($conn->multi_query($sql)==TURE)
		echo "Table Users Altered Successfully<br>";
	else
		echo "Error".$conn->error; */

	$sql ="SELECT * FROM Users where COUNTRY In ('India','Japan')";
	if ($result = $conn->query($sql)){

	if($result -> num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo " ".$row["id"]." ";
			echo " ".$row["username"]." ";
			echo " ".$row["email"]." ";
			echo " ".$row["COUNTRY"]."<br>";
		}
	} else echo "No records found";
		
				
	}
	else
		echo "Error: Could not able to execute $sql.".mysqli_error($conn);
		mysqli_close($conn);

	?>

</body>
</html>