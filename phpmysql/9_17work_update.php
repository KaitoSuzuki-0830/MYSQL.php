<!DOCTYPE html>
<html>
<head>
	<title>MYSQL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
	<h1>Update TABLE </h1>
<?php
	require_once('includes/dbh.inc.php');
	//$sql = "UPDATE Users SET PHONE ='97894 43234'where id=1";
	$stmt = $conn->prepare("UPDATE Users SET PHONE = ? WHERE id = ?;");
		$stmt->bind_param("si",$phone,$id);

	//set parameter and executes
		$phone ="98765 87934";
		$id = 1;
		$stmt->execute();

		$phone ="98765 87934";
		$id = 2;
		$stmt->execute();

		$phone ="98765 87934";
		$id = 3;
		$stmt->execute();

		$phone ="98765 87934";
		$id = 4;
		$stmt->execute();

		$phone ="98765 87934";
		$id = 5;
		$stmt->execute();

		echo "Recoreds updated successfully<br>";

		$stmt->close();

?>

</body>
</html>