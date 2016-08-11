<meta charset="utf-8">
<?php
	require 'connect.php';

	$name = $_POST["name"];
	$id = $_POST["id"];
	$department = $_POST["department"];
	$type = $_POST["type"];
	
	if (!$name || !$id || !$department) {
 		echo '<script>alert("信息不全"); history.back();</script>';
 		exit();
 	}

 	if ($id < 0) {
 		echo '<script>alert("卡号不能为负"); history.back();</script>';
 		exit();
 	}
	
 	$insert = "INSERT INTO card (name, id, department, type)
 			VALUES ('$name', $id, '$department', '$type')";
	mysqli_query($con, $insert);
	echo '<script>alert("添加成功"); window.location.replace("register.php");</script>';

	mysqli_close($con);
 ?>
