<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>DELETE QUERY</h2>
	<?php
		require_once('includes/dbh.inc.php');

		//delete a particular record from users table
		$sql = "DELETE FROM Users where id =3";
		if($conn->query($sql) ==TRUE)
			echo "Record deleted Successfully<br>";
		else
			echo "Error;".$conn->error;

		//delete all records from users table
		$sql = "TRUNCATE TABLE Users";
		if($conn->query($sql) ==TRUE)
			echo "All Records deleted Successfully<br>";
		else
			echo "Error;".$conn->error;

	?>

</body>
</html>