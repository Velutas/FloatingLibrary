<meta charset="utf-8">
<?php
	require 'connect.php';
	$file = $_POST["data"];
	$trimmed_file = trim($file, "\n");
	$records = explode("\n", $trimmed_file);
	$counts = 0;
	foreach ($records as $value) {
		$record = explode(", ", $value);
		$counts = $counts + 1;
		$book_id = $record[0];
		$category = $record[1];
		$title = $record[2];
		$publisher = $record[3];
		$year = $record[4];
		$author = $record[5];
		$price = $record[6];
		$total = $record[7];

		if (empty($book_id) || empty($category) || empty($title) || empty($publisher) || empty($year) || empty($author) || empty($price) || empty($total)) {
			echo "<script>alert('第 $counts 条记录缺项'); history.back();</script>";
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
	}
	echo '<script>window.location.replace("add-batch.php?success=1");</script>';

	mysqli_close($con);
?>