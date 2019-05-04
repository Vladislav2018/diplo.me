<?php
require 'E:\servak\OSPanel\domains\diplo.me\include.php';//file with coonection to RedBean
include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
//b_dump($_SESSION);
?>
<body>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a href='<?php echo("logout.php");?>'>Logout</a>
        </div>
    </div>
</div>
   <div class="container">
      <div class="row">
         <div class="col-md-3 ">
            <div class="list-group ">
               <a href="" class="list-group-item list-group-item-action active">Профиль</a>
               <a href="<?php echo("tasks.php"); ?>" class="list-group-item list-group-item-action">Задания</a>
               <a href="<?php echo("group.php"); ?>" class="list-group-item list-group-item-action">Группа</a>
               <a href="<?php echo("my_stat.php"); ?>" class="list-group-item list-group-item-action">Моя статистика</a>
               <?php 
               if($_SESSION['employee']['roles'] != 'worker'):
               ?>
                <a href="<?php echo("group_stat.php"); ?>" class="list-group-item list-group-item-action">Статистика группы</a>
               <?php endif;?>
                <?php 
               if($_SESSION['employee']['roles'] == 'admin'):
               ?>
               <a href="<?php echo("common_stat.php"); ?>" class="list-group-item list-group-item-action">Общая статистика</a>
               <a href="<?php echo("all_profiles.php"); ?>" class="list-group-item list-group-item-action">Все профили</a>
               <?php endif;?>
            </div>
         </div>
<?php include 'profile_form.php';?>