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
	<h1>MYSQL-GROUPBY / ORDERBY 9/19</h1>
	<?php
		require_once('includes/dbh.inc.php');

		// $sql = "SELECT COUNT(id) AS TOTAL,Country FROM Users GROUP BY Country;";
		$sql = "SELECT COUNT(id) AS TOTAL,Country FROM Users 
				GROUP BY Country
				HAVING COUNT(id) >=2;";

		$sql ="SELECT COUNT(id) AS TOTAL,Country FROM Users 
				GROUP BY Country
				ORDER BY Country DESC;"; 

		$sql ="SELECT COUNT(id) AS TOTAL,Country FROM Users 
				GROUP BY Country
				ORDER BY COUNT(id) ASC;"; 

		$sql ="SELECT COUNT(id) AS TOTAL,Country FROM Users 
				GROUP BY Country
				HAVING COUNT(id)>=2
				ORDER BY Country DESC;"; 




		if($result = mysqli_query($conn,$sql)){
			if(mysqli_num_rows($result)>0){
				echo "<div class='container'>";
				echo "<table class='table table-bordered table-striped'>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>#</th>";
						echo "<th>Country</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
				echo "<td>".$row["TOTAL"]."</td>";
				echo "<td>".$row["Country"]."</td>";
			echo "</tr>";
			} 
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
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