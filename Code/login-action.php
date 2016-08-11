<?php
	session_start();
	require 'connect.php';

	echo '<meta charset="utf-8">';

 	if (!$_POST['id'] || !$_POST['password']) {
		echo '<script>alert("NOPE"); history.back();</script>';
	}
	$username = $_POST['id'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM admin WHERE id = '$username' AND password = '$password'";
 	$login = mysqli_query($con, $sql);
	
	if (mysqli_num_rows($login) == 1){
		$_SESSION['username'] = $_POST['username'];
		echo '<script>window.location.replace("signedin.php");</script>';
	}

	else {
		echo '<script>alert("用户名或密码错误"); history.back();</script>';
 	}
	mysqli_close($con);
?> 
 