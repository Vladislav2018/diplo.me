<?php
require 'E:\servak\OSPanel\domains\diplo.me\include.php';
include_once '../helper.php';
$name = 'slave2';
$current_user = R::findOne('users', 'WHERE name = :name', array(
    ':name' => $name
));
$_SESSION['user']=$current_user;
$_SESSION['user_id'] = $current_user->id;
unset($_SESSION['user']);
b_dump($_SESSION);
?>