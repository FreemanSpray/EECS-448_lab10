<?php		
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "f165s681", "nevei7ph", "f165s681");
	if($mysqli->connect_errno) {
		printf("Connection failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$query = "SELECT user_id FROM Users;";
	if($result = $mysqli->query($query)) {
		while($row = $result->fetch_assoc()) {
			printf("%s<br>", $row["user_id"]);
		}
		$result->free();
	}
	$mysqli->close();
?>
