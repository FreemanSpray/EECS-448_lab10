<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$checkedBoxes = $_POST["boxes"];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "f165s681", "nevei7ph", "f165s681");
	if($mysqli->connect_errno) {
		printf("Connection failed: %s\n", $mysqli->connect_error);
		exit();
	}
	for($i = 0; $i < count($checkedBoxes); $i++) {
		$query = "DELETE FROM Posts WHERE post_id='" . $checkedBoxes[$i] . "';";
		if($result = $mysqli->query($query)) {
			printf("Post %s successfully deleted.<br>", $checkedBoxes[$i]);
		}
	}
	$mysqli->close();
?>