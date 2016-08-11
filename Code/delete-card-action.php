<meta charset="utf-8">
<?php
	require 'connect.php';

	$card_id = $_POST["card_id"];
	$sql = "SELECT * FROM card WHERE id = $card_id";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	if (!$card_id || !$row) {
 		echo '<script>alert("没有输入卡号"); history.back();</script>';
 	}

 	$check = "SELECT * FROM borrow WHERE card_id = $card_id";
 	$check_result = mysqli_query($con, $check);
 	if (mysqli_num_rows($check_result)) {
 		echo '<script>alert("删除失败，有未归还书目"); history.back();</script>';
 		exit();
 	}
	
 	$delete = "DELETE FROM card WHERE id = $card_id";
 	mysqli_query($con, $delete);
 	if (mysqli_affected_rows($con) == 1) {
 		echo '<script>alert("删除成功"); window.location.replace("delete.php");</script>';
 	}
 	else {
 		echo '<script>alert("删除失败，请检查卡号是否正确"); history.back();</script>';
 	}

	mysqli_close($con);
?>