<!DOCTYPE html>
<html>
<head>
	<title>MY SQL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-sxale-1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<h1>LEFT OUTER JOIN</h1>
	<?php
	include_once('includes/dbh.inc.php');

	$sql = "SELECT Customer.CustomerName,Orders.OrderID
			FROM Customer
			LEFT JOIN Orders ON Customer.CustomerID= Orders.CustomerID;";


	if($result = mysqli_query($conn,$sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<div class='container'>";
			echo "<table class='table table-bordered'>";
			echo "<thead>";
				echo "<tr>";
					echo "<th>OrderID</th>";
					echo "<th>CustomerName</th>"
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>".$row['CustomerName']."</td>";
					echo "<td>".$row['OrderID']."</td>";
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