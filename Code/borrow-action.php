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
	$borrow_length = $_GET['borrow_length'];
	$admin_id = $_SESSION['username'];
	$sql = "SELECT * FROM card WHERE id = $card_id";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	if (empty($card_id) || !$row) {
		echo '<script>window.location.replace("borrow.php?error=请输入正确的借书证号");</script>';
		exit();
	}

	if (empty($book_id)) {
		echo "<script>window.location.replace('card.php?id=$card_id');</script>";
		exit();
	}

	$sql = "SELECT * FROM book WHERE book_id = '$book_id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	if (!$row) {
		echo '<script>window.location.replace("borrow.php?error=请输入正确的书号");</script>';
		exit();
	}

	if ($borrow_length < 0) {
		echo '<script>window.location.replace("borrow.php?error=请输入正确的借书天数");</script>';
		exit();
	}
	else {
		$id = $row['id'];
		if ($row['stock'] > 0) {
			date_default_timezone_set("Asia/Shanghai");
			$borrow_date = date("Y-m-d");
			$limit_date = date("Y-m-d", strtotime($borrow_date . " + $borrow_length days"));
			$sql = "UPDATE book SET stock = stock - 1 WHERE id = $id";
			mysqli_query($con, $sql);
			$sql = "INSERT INTO borrow(book_id, card_id, borrow_date, limit_date, admin_id) VALUES ($id, $card_id, '$borrow_date', '$limit_date', $admin_id)";
			mysqli_query($con, $sql);
			echo "<script>window.location.replace('borrow.php?limit_date=$limit_date');</script>";
			exit();
		}
		else {
			$sql = "SELECT * FROM borrow WHERE book_id = $id ORDER BY limit_date LIMIT 1";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$date = $row['limit_date'];
			echo "<script>window.location.replace('borrow.php?error=库存不足，最近归还日期为 $date');</script>";
			exit();
		}
	}
	mysqli_close($con);
?>