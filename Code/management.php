<?php

session_start();

if (!isset($_SESSION['username'])) {
	echo '<meta charset="utf-8"><script>alert("您还没有登录"); window.location.replace("login.php"); </script>';
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<title>借书证管理</title>

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
							<li class="active"><a href="#">借书证管理</a></li>
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

				<div class="span9">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>借书证号</th>
								<th>姓名</th>
								<th>部门</th>
								<th>类别</th>
							</tr>
						</thead>
						<tbody>
							<?php
							require 'connect.php';
							$sql = "SELECT * FROM card";
							$result = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_array($result)) {
							?>
							<tr>
								<td><a href="card.php?id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['department']; ?></td>
								<td><?php echo $row['type']; ?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
<?php
	mysqli_close($con);
	require "footer.php";
?>