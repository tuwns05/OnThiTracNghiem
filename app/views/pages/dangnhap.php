<?php

use App\Core\App;
?>
<html>
<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="\public\css\cssDangNhap.css">
</head>
<body>
    <div class="container">
        <div class="heading">Đăng nhập</div>
        <form action="" class="form" method="POST">
            <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
            <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
            <span class="forgot-password"><a href="#">Quên mật khẩu</a></span>
            <span class="register-link">Chưa có tài khoản? <a href="/home/dangky">Đăng nhập</a></span>
            <input class="login-button" type="submit" name="submit" value="Đăng nhập">  
        </form>
    </div>
</body>
</html>
