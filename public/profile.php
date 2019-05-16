<?php
require $_SERVER['DOCUMENT_ROOT'].'\hidden\include.php';//file with coonection to RedBean
//include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
//b_dump($_SESSION);
checkAuth();
?>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/components/navmenu.php';;
 include_once '../components/profile_form.php';?>