<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<title>借书证</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">

		<style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
			}
			.sidebar-nav {
				padding: 9px 0;
			}
		</style>
	</head>

	<body>

		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="index.php">图书馆管理系统</a>
					<div class="nav-collapse">
						<ul class="nav">
							<li><a href="index.php">首页</a></li>
							<li class="active"><a href="#">借书证</a></li>
							<li><a href="about.php">关于</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<li class="nav-header">读者服务</li>
							<li><a href="index.php">图书查询</a></li>
							<li><a href="borrow.php">借书</a></li>
							<li><a href="return.php">还书</a></li>
							<li class="nav-header">后台管理</li>
							<li><a href="login.php">登录</a></li>
							<li><a href="logout.php">退出</a></li>
							<li><a href="register.php">添加新卡</a></li>
							<li><a href="delete.php">删除卡</a></li>
							<li><a href="add.php">图书单本入库</a></li>
							<li><a href="add-batch.php">图书批量入库</a></li>
							<li class="active"><a href="management.php">借书证管理</a></li>
						</ul>
					</div>
				</div>

<?php
require 'connect.php';
$id = $_GET['id'];
$sql = "SELECT * FROM card WHERE id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
if (!$row) {
	echo '<script>alert("借书证不存在"); history.back(); </script>';
	exit();
}
?>

				<div class="span9">
					<section>
						<legend>基本信息</legend>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>借书证号</th>
									<th>姓名</th>
									<th>部门</th>
									<th>类别</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $row['id']; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['department']; ?></td>
									<td><?php echo $row['type']; ?></td>
								</tr>
							</tbody>
						</table>
					</section>
					<section>
						<legend>待还书籍</legend>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>书名</th>
									<th>借书时间</th>
									<th>应还日期</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$sql = "SELECT * FROM borrow WHERE card_id = $id";
							$result = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_array($result)) {
								$book_sql = "SELECT * FROM book WHERE id = {$row['book_id']}";
								$book_result = mysqli_query($con, $book_sql);
								$book_row = mysqli_fetch_array($book_result)
							?>
								<tr>
									<td><a href="return.php?book_id=<?php echo $book_row['book_id']; ?>&card_id=<?php echo $id; ?>"><?php echo $book_row['title']; ?></a></td>
									<td><?php echo $row['borrow_date']; ?></td>
									<td><?php echo $row['limit_date']; ?></td>
								</tr>
							<?php
							}
							?>
							</tbody>
						</table>
						<p>点击书名以归还。</p>
					</section>
				</div>
<?php
	mysqli_close($con);
	require "footer.php";
?>