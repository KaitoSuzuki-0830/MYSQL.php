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

	<?php
	//include_once 'includes/dbh.inc.php';
	require_once('includes/dbh.inc.php');

	//select all records from the table
	//$sql = "SELECT * FROM Users"
	//$sql ="SELECT * FROM Users LIMIT 3;";
	$sql ="SELECT * FROM Users LIMIT 2 OFFSET 3;";

	//select a particular record from the table users
	//$sql = "SELECT * FROM Users where id = 5";
	//$sql ="SELECT * FROM Users where id = 5 OR usename= 'Peter';";
	$sql - "SEKECT * FROM Users where NOT username= 'Peter';";

	//LIKE EXPRESSIONS
	//$sql = "SELECT * FROM Users where username LIKE 'K%';";
	// LIKE 関連性があるキーワードのために使う
	//$sql = "SELECT * FROM Users where username LIKE '_e%';";
	// _はスキップ　二番目の文字がeのものが検索される
	//$sql = "SELECT * FROM Users where username LIKE '%a';";
	// 文字の最後がaのものが検索される
 	//$sql = "SELECT * FROM Users where username LIKE '%ar%';";


	//NOT LIKE EXPRESSIONS
	//$sql = "SELECT * FROM Users where username  NOT LIKE 'K%';";
	// LIKE 関連性があるキーワードのために使う NOT
	//$sql = "SELECT * FROM Users where username  NOT LIKE '_e%';";
	// _はスキップ　二番目の文字がeのものが検索される NOT
	//$sql = "SELECT * FROM Users where username  NOT LIKE '%a';";
	// 文字の最後がaのものが検索される NOT
 	//$sql = "SELECT * FROM Users where username LIKE '%ar%';";
 	// NOT
 	



	//select distinct username from users
	//$sql ="SELECT DISTINCT username FROM Users;"

	$sql = "SELECT * FROM Users where COUNTRY IN ('India','Japan');";
	if($result = $conn->query($sql){
	if($result->num_rows >0){
		echo "<table class='table table-bordered table-striped'>";
		echo "<thead>";
			echo "<tr>";
				//echo "<th>#</th>";
				echo "<th>Name</th>";
				//echo "<th>Email</th>";
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while($row = $result->fetch_assoc()){
			echo $row["id"]."&nbsp".$row["username"]."$nbsp".$row["email"]."<br>";
		}
		echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["username"]."</td>";
			echo "<td>".$row["email"]."</td>";
			echo "<td>".$row["COUNTRY"]."</td>";
		echo "</tr>";
	} 
	echo "</tbody>";
	echo "</table>";
		mysqli_free_result($result);

	}else
	 echo "<p class='lead'><em>No records found</em></p>";
	}
	else 
		echo "Error: Could not able to execute $sql.".mysqli_error($conn);
	mysqli_close($conn);




	?>

</body>
</html>