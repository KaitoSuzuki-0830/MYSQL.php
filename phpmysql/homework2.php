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
	<h1>LEFT OUTER JOIN</h1>

	<?php
		ini_set( 'display_errors', 1 );
		ini_set( 'error_reporting', E_ALL );

	$sql = "SELECT Adults.AdultID,Chidren.ChidrenID,Adults.CustomerID,Chidren.ChidrenrName,Adults.OrderDate
				FROM Adults
				INNER JOIN Chidren ON Adults.CustomerID = Chidren.ChidrenID;";

	if($result = mysqli_query($conn,$sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<div class='container'>";
			echo "<table class='table table-bordered'>";
			echo "<thead>";
				echo "<tr>";
					echo "<th>AdultID</th>";
					echo "<th>ChidrenrName</th>"
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>".$row['ChidrenrName']."</td>";
					echo "<td>".$row['AdultID']."</td>";
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