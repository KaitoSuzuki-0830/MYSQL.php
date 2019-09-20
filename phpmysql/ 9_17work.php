<!DOCTYPE html>
<html>
<head>
	<title>MYSQL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

</head>
<body>
	<h1>ALTER TABLE - MYSQL</h1>
<?php
	require_once('includes/dbh.inc.php');
	
	$sql ="ALTER TABLE Users ADD PHONE VARCHAR(15) NOT NULL AFTER email";
	//$sql = "ALTER TABLE Users DROP COLUMN PHONE";
	if($conn->query($sql) ==TRUE)
		echo "Table Altered Successfully";
	else
		echo "Error;".$conn->error;
?>

</body>
</html>