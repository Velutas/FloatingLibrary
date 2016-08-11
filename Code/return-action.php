<?php

session_start();

if (!isset($_SESSION['username'])) {
	echo '<meta charset="utf-8"><script>alert("您还没有登录"); window.location.replace("login.php"); </script>';
}
?>
<meta charset="utf-8">
<?php
	require 'connect.php';
	$book_id = $_GET['book_id'];
	$card_id = $_GET['card_id'];
	$admin_id = $_SESSION['username'];
	
	$sql = "SELECT * FROM card WHERE id = $card_id";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	if (empty($card_id) || !$row) {
		echo '<script>window.location.replace("return.php?error=请输入正确的借书证号");</script>';
		exit();
	}

	if (empty($book_id)) {
		echo "<script>window.location.replace('card.php?id=$card_id');</script>";
		exit();
	}

	$sql = "SELECT * FROM book WHERE book_id = '$book_id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$id = $row['id'];
	$sql = "SELECT * FROM borrow WHERE book_id = $id AND card_id = $card_id";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	if (!$row) {
		echo '<script>window.location.replace("return.php?error=找不到借阅记录");</script>';
		exit();
	}
	else {
		$sql = "DELETE FROM borrow WHERE book_id = $id AND card_id = $card_id ORDER BY borrow_date LIMIT 1";
		mysqli_query($con, $sql);
		$sql = "UPDATE book SET stock = stock + 1 WHERE id = $id";
		mysqli_query($con, $sql);
		echo '<script>window.location.replace("return.php?success=1");</script>';
	}
	mysqli_close($con);
?>