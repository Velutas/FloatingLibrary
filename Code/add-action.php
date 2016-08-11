<meta charset="utf-8">
<?php
	require 'connect.php';

	$book_id = $_POST["book_id"];
	$category = $_POST["category"];
	$title = $_POST["title"];
	$publisher = $_POST["publisher"];
	$year = $_POST["year"];
	$author = $_POST["author"];
	$price = $_POST["price"];
	$total = $_POST["total"];

	if (empty($book_id) || empty($category) || empty($title) || empty($publisher) || empty($year) || empty($author) || empty($price) || empty($total)) {
		echo '<script>alert("请完整填写书籍信息"); history.back();</script>';
	}

	if ($total < 0) {
		echo '<script>alert("书量不能为负"); history.back();</script>';
	}

	else {
		$sql = "SELECT * FROM book WHERE book_id = '$book_id'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			$sql = "UPDATE book SET total = total + $total, stock = stock + $total WHERE book_id = '$book_id'";
			if (!mysqli_query($con, $sql))
				die('An error occurred in adding exist book.');
		}
		else {
			$sql = "INSERT INTO book(book_id, category, title, publisher, year, author, price, total, stock) VALUES('$book_id', '$category', '$title', '$publisher', $year, '$author', $price, $total, $total)";
			if (!mysqli_query($con, $sql)) {
				die('An error occurred in adding new book.');
			}
		}
	}

	echo '<script>window.location.replace("add.php?success=1");</script>';

	mysqli_close($con);
?>