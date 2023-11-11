<?php
	function connectToDatabase(){
		$host = "localhost"; // Replace with your MySQL host name
		$dbname = "school_managment_db"; // Replace with your database name
		$user = "admin"; // Replace with your MySQL username
		$password = "Amine2022!"; // Replace with your MySQL password

		try {
		    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    return $pdo;

		} catch (PDOException $e) {
		    die("Connection failed: " . $e->getMessage());
		}
	}
	