<?php
	$con = mysqli_connect("localhost", "TAS", "", "Library-project");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>