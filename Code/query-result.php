<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<title>查询结果</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/theme.bootstrap.css" rel="stylesheet">

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
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="index.php">图书馆管理系统</a>
					<div class="nav-collapse">
						<ul class="nav">
							<li><a href="index.php">首页</a></li>
							<li class="active"><a href="#">查询结果</a></li>
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
							<li class="active"><a href="index.php">图书查询</a></li>
							<li><a href="borrow.php">借书</a></li>
							<li><a href="return.php">还书</a></li>
							<li class="nav-header">后台管理</li>
							<li><a href="login.php">登录</a></li>
							<li><a href="logout.php">退出</a></li>
							<li><a href="register.php">添加新卡</a></li>
							<li><a href="delete.php">删除卡</a></li>
							<li><a href="add.php">图书单本入库</a></li>
							<li><a href="add-batch.php">图书批量入库</a></li>
							<li><a href="management.php">借书证管理</a></li>
						</ul>
					</div>
				</div>

				<div class="span9">
				<div class="alert alert-info">
						点击书名以借阅。
				</div>
				<table id="result" class="table table-striped">
					<thead>
						<tr>
							<th>书号</th>
							<th>书名</th>
							<th>作者</th>
							<th>分类</th>
							<th>出版社</th>
							<th>年份</th>
							<th>价格</th>
							<th>总量</th>
							<th>剩余</th>
							<th>编辑</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require 'connect.php';
							$title = $_GET['title'];
							$author = $_GET['author'];
							$category = $_GET['category'];
							$publisher = $_GET['publisher'];
							$year_lower_bound = $_GET['year_lower_bound'];
							$year_upper_bound = $_GET['year_upper_bound'];
							$price_lower_bound = $_GET['price_lower_bound'];
							$price_upper_bound = $_GET['price_upper_bound'];
							$sql = "SELECT * FROM book WHERE 1";
							if (!empty($title)) {
								$sql .= " AND title LIKE '%{$title}%'";
							}
							if (!empty($author)) {
								$sql .= " AND author = '$author'";
							}
							if (!empty($category)) {
								$sql .= " AND category LIKE '%{$category}%'";
							}
							if (!empty($publisher)) {
								$sql .= " AND publisher LIKE '%{$publisher}%'";
							}
							if (!empty($year_lower_bound)) {
								$sql .= " AND year > '$year_lower_bound'";
							}
							if (!empty($year_upper_bound)) {
								$sql .= " AND year < $year_upper_bound";
							}
							if (!empty($price_lower_bound)) {
								$sql .= " AND price > $price_lower_bound";
							}
							if (!empty($price_upper_bound)) {
								$sql .= " AND price < $price_upper_bound";
							}
							$sql .= " ORDER BY title";
							$result = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_array($result)) {
								echo "<tr>
									<td>{$row['book_id']}</td>
									<td><a href='borrow.php?book_id={$row['book_id']}'>{$row['title']}</a></td>
									<td>{$row['author']}</a></td>
									<td>{$row['category']}</a></td>
									<td>{$row['publisher']}</td>
									<td>{$row['year']}</td>
									<td>{$row['price']}</td>
									<td>{$row['total']}</td>
									<td>{$row['stock']}</td>
									<td><a href='edit.php?id={$row['id']}'>编辑</a></td>
								</tr>";
							}
							mysqli_close($con);
						?>
					</tbody>
				</table>
				</div>
<?php
	require "footer.php";
?>