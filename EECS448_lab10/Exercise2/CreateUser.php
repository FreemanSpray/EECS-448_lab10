<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$user = $_POST["user_id"];
	if($user == ""){
		printf("ERROR: You need to enter at least 1 character.");
	}
	else {
		$mysqli = new mysqli("mysql.eecs.ku.edu", "f165s681", "nevei7ph", "f165s681");
		if($mysqli->connect_errno) {
			printf("Connection failed: %s\n", $mysqli->connect_error);
			exit();
		}
		$query = "INSERT INTO Users (user_id) VALUES ('" . $user . "');";
		if($result = $mysqli->query($query)) {
			printf("User successfully added to database.");
		}
		else {
			printf("ERROR: That user already exists.");
		}
		$mysqli->close();
	}
?>