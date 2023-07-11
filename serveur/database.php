<?php 
	define('HOST', 'localhost');
	define('DB_NAME', 'user');
	define('USER', 'root');
	define('PASS', 'Sir_200!');
	try{ 
		$db = new PDO("mysql:host=" . HOST .";dbname=" . DB_NAME ,USER,PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_Exeception);
		echo "Conetez ok";
	} catch (PDOExeception $e){
		echo $e;
	}

?>