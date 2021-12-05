<?php		
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$user = $_POST["user_id"];
	echo "<table>";
	$mysqli = new mysqli("mysql.eecs.ku.edu", "f165s681", "nevei7ph", "f165s681");
	if($mysqli->connect_errno) {
		printf("Connection failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$query = "SELECT content FROM Posts WHERE author_id='$user';";
	if($result = $mysqli->query($query)) {
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["content"] . "</td></tr>";
		}
		$result->free();
	}
	$mysqli->close();
?>
