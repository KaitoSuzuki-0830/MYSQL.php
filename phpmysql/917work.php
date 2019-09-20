<!DOCTYPE html>
<html>
<head>
	<title>MYSQL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-sxale-1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<h1 class="text-center">MYSQL - SELECT</h1>
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h2 class="pull-left text-center">User Details</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	//include_once 'includes/dbh.inc.php';
	require_once('includes/dbh.inc.php');

	//select all records from the table
	//$sql = "SELECT * FROM Users"

	//select a particular record from the table users
	$sql = "SELECT * FROM Users where id = 5";
	if($result = $conn->query($sql){
	if($result->num_rows >0){
		echo "<table class='table table-bordered table-striped'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>#</th>";
				echo "<th>Name</th>";
				echo "<th>Email</th>";
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