<?php
define('USER',"root");
define('PASSWD',"toor");
define('SERVER',"localhost");
define('BASE',"testphp");

function connect_bd() {
	$dsn = "mysql:dbname=".BASE.";host=".SERVER;
	try {
		$connexion = new PDO($dsn,USER,PASSWD);
	}
	catch(PDOException $e) {
		print_r("echec". $e->getMessage());
		exit();
	}
	return $connexion;
}
?>	
