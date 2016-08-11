<?php
    session_start();
	require 'connect.php';

    if (isset($_SESSION['username'])) {
        header('Location: signedin.php');
    }
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title>登录</title>

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
              <li class="active"><a href="#">登录</a></li>
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
              <li class="active"><a href="login.php">登录</a></li>
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
        <form class="form-horizontal" method="post" action="login-action.php">
        <fieldset>
            <legend>登录</legend>
            <div class="control-group">
                <label class="control-label" for="id_id">ID</label>
                <div class="controls">
                    <input id="id_id" name="id" class="input-middle" type="text">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="id_password">密码</label>
                <div class="controls">
                    <input id="id_password" name="password" class="input-middle" type="password">
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </fieldset>
        </div>

      </div>
      <hr>
      <footer>
        <p>&copy; Svenja, Aly-Shah & Simone 2013</p>
      </footer>

    </div>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
