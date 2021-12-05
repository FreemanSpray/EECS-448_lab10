<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$user = $_POST["user_id"];
	$content = $_POST["content"];
	if($content == ""){
		printf("ERROR: Your post needs to contain at least 1 character.");
	}
	else {
		$mysqli = new mysqli("mysql.eecs.ku.edu", "f165s681", "nevei7ph", "f165s681");
		if($mysqli->connect_errno) {
			printf("Connection failed: %s\n", $mysqli->connect_error);
			exit();
		}
		$query = "SELECT user_id FROM Users WHERE user_id='" . $user . "';";
		if($result = $mysqli->query($query)) {
			if($row = $result->fetch_assoc()) {
				$result->free();
				$query2 = "INSERT INTO Posts (content, author_id) VALUES ('" . $content . "', '" . $user . "');";
				if($result = $mysqli->query($query2)) {
					printf("Post successfully added to database.");
				}
			}
			else {
				printf("ERROR: That user does not exist.");
				$result->free();
			}
		}
		$mysqli->close();
	}
?>