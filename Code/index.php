<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<title>图书查询</title>

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
							<li class="active"><a href="index.php">首页</a></li>
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
				<form class="form-horizontal" action="query-result.php" method="GET">
				<fieldset>
						<legend>图书查询</legend>
						<div class="control-group">
								<label class="control-label" for="title">名称</label>
								<div class="controls">
										<input type="text" class="input-xlarge" id="title" name="title">
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="author">作者</label>
								<div class="controls">
										<input type="text" class="input-xlarge" id="author" name="author">
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="category">类别</label>
								<div class="controls">
										<input type="text" class="input-xlarge" id="category" name="category">
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="publisher">出版社</label>
								<div class="controls">
										<input type="text" class="input-xlarge" id="publisher" name="publisher">
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="year_lower_bound">出版年份</label>
								<div class="controls">
										<div class="input-prepend input-append">
												<span class="add-on">晚于</span>
												<input class="span1" id="year_lower_bound" name="year_lower_bound" type="text">
												<span class="add-on">年</span>
										</div>
										<div class="input-prepend input-append" style="margin-left: 10px;">
												<span class="add-on">早于</span>
												<input class="span1" id="year_upper_bound" name="year_upper_bound" type="text">
												<span class="add-on">年</span>
										</div>
								</div>
						</div>
						<div class="control-group">
								<label class="control-label" for="price_lower_bound">价格</label>
								<div class="controls">
										<div class="input-prepend input-append">
												<span class="add-on">大于</span>
												<input class="span1" id="price_lower_bound" name="price_lower_bound" type="text">
												<span class="add-on">元</span>
										</div>
										<div class="input-prepend input-append" style="margin-left: 10px;">
												<span class="add-on">小于</span>
												<input class="span1" id="price_upper_bound" name="price_upper_bound" type="text">
												<span class="add-on">元</span>
										</div>
										<p class="help-block">留空以列出所有书目</p>
								</div>
						</div>
						<div class="form-actions">
								<button type="submit" class="btn btn-primary">查询</button>
						</div>
				</fieldset>
				</div>
<?php
	require "footer.php";
?>