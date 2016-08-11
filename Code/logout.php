<?php

session_start();

echo '<meta charset="utf-8">';

if (isset($_SESSION['username'])) {
	unset($_SESSION['id']);
	session_destroy();
	echo '<script>alert("登出成功"); history.back(); </script>';
}
else {
	echo '<script>alert("您还没有登录"); history.back(); </script>';
}
?>