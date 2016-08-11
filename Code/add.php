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
		<title>新增单册</title>

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
							<li class="active"><a href="#">新增单册</a></li>
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
							<li class="active"><a href="add.php">图书单本入库</a></li>
							<li><a href="add-batch.php">图书批量入库</a></li>
							<li><a href="management.php">借书证管理</a></li>
						</ul>
					</div>
				</div>
				
				<div class="span9">
<?php
if ($_GET['success'] === '1') {
?>
				<div class="alert alert-success">
						恭喜，图书添加成功。
				</div>
<?php } ?>
				<form class="form-horizontal" method="post" action="add-action.php">
				<fieldset>
						<legend style="margin-bottom: 0;">图书单本入库</legend>
						<div class="control-group">
								<label class="control-label" for="id_book_id">书号</label>
								<div class="controls">
										<input id="id_book_id" name="book_id" class="input-middle" type="text">
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="id_category">类别</label>
								<div class="controls">
										<input id="id_category" name="category" class="input-middle" type="text">
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="id_title">书名</label>
								<div class="controls">
										<input id="id_author" name="title" class="input-middle" type="text">
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="id_publisher">出版社</label>
								<div class="controls">
										<input id="id_publisher" name="publisher" class="input-middle" type="text">
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="id_author">作者</label>
								<div class="controls">
										<input id="id_author" name="author" class="input-small" type="text">
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="id_year">年份</label>
								<div class="controls">
									<div class="input-append">
										<input id="id_year" name="year" class="input-small" type="text">
										<span class="add-on">年</span>
									</div>
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="id_price">价格</label>
								<div class="controls">
									<div class="input-append">
										<input id="id_price" name="price" class="input-small" type="text">
										<span class="add-on">元</span>
									</div>
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="id_total">数量</label>
								<div class="controls">
									<div class="input-append">
										<input id="id_total" name="total" class="input-small" type="text">
										<span class="add-on">本</span>
									</div>
								</div>
						</div>
						<div class="form-actions">
								<button type="submit" class="btn btn-primary">添加</button>
						</div>
				</fieldset>
				</div>
<?php
	require "footer.php";
?>