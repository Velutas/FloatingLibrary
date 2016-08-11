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
		<title>借书</title>

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
							<li class="active"><a href="#">借书</a></li>
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
							<li class="active"><a href="borrow.php">借书</a></li>
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
<?php
	if ($_GET['error']) {
?>
					<div class="alert alert-error">
						借阅失败，<?php echo $_GET['error']; ?>。
					</div>
<?php } else if ($_GET['limit_date']) { ?>
					<div class="alert alert-success">
						借阅成功，请在 <?php echo $_GET['limit_date']; ?> 前归还。
					</div>
<?php } ?>
					<div class>
					</div>
					<form class="form-horizontal" action="borrow-action.php">
					<fieldset>
						<legend>图书借阅</legend>
						<div class="control-group">
							<label class="control-label" for="book_id">书号</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="book_id" name="book_id" value="<?php echo $_GET['book_id']; ?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="card_id">借书证号</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="card_id" name="card_id">
								<p class="help-block">即学生证号</p>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="borrow_length">借期</label>
							<div class="controls">
								<div class="input-append">
									<input type="text" class="span1" id="borrow_length" name="borrow_length" value="30"><span class="add-on">天</span>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="admin_id">经手人</label>
							<div class="controls">
								<input type="text" disabled class="input-xlarge" id="admin_id" name="admin_id" value="<?php echo $_SESSION['username']; ?>">
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">借阅</button>
						</div>
				</fieldset>
			</div>
<?php
	require "footer.php";
?>