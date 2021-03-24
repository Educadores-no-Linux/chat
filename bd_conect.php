<?php
	try {
		$dns = "mysql:dbname=chatsimples;host=localhost";
		$user = "admin";
		$pass = "root";
		$pdo = new PDO($dns, $user, $pass);
	}catch (PDOException $e){
		echo "Falha: ". $e->getMessage();
	}



?>