<?php 

	try {
		$DB = new PDO("mysql:host=localhost;dbname=unilab", "root", "");
	} catch (PDOException $e) {
		print "there is a problem ". $e->getMessage();
		exit();
	}

 ?>