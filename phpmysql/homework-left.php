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
echo "<h2>LEFT OUTER JOIN</h2>";
	require_once('includes/dbh.inc.php');

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

?>

</body>
</html>