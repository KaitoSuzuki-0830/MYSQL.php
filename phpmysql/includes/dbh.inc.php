
	<?php
	define("SERVERNAME","localhost");
	define("USERNAME","root");
	define("PASSWORD","root");
	define("DBNAME","db");

	$conn = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);

	if(!$conn){
		die("Connection failed".mysqli_connect_error());
	}
	else
		echo "Connected Successfully<br>"
	?>
