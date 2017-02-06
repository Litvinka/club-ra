
<?php

	$dbhost = "localhost";
	$dbuser = "ra";
	$dbpassword = "rarara"; 
	$dbname = "ra";
	try{
	$pdo = new PDO("mysql:host=localhost;dbname=ra", $dbuser, $dbpassword);
	//$pdo=setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
	}
	catch(PDOException $e){
		exit('No connection with database');
	}

?>