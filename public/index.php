<?php
require 'E:\servak\OSPanel\domains\diplo.me\include.php';?>
<form action="login.php" method="POST">
    <strong>Логин</strong>
    <input type="text" name="login" value="<?php echo @$data['login']; ?>"><br>
    <strong>Корпоративная почта</strong>
    <input type="text" name="login" value="<?php echo @$data['login']; ?>"><br>
    <strong>Пароль</strong>
    <input type="password" name="password" value="<?php echo @$data['password']; ?>"><br>
    <button type="submit" name="do_login">Войти</button>
</form>
