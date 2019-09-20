<?php

		require_once('includes/dbh.inc.php');
		//Drop the table users from the database
		$sql = "DROP TABLE Users;";

		if ($conn->query($sql)== TRUE)
			echo "Table Users dropped Successfully<br>";
		else
			echo "Error:".$conn->error;
?>