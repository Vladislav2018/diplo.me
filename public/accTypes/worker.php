<?php
require '../accounts.php';
?>
<body>
   <div class="container">
      <div class="row">
         <div class="col-md-3 ">
            <div class="list-group ">
               <!-- поля доступны всем -->
               <a href="" class="list-group-item list-group-item-action active">Профиль</a>
               <a href="<?php echo("../tasks.php"); ?>" class="list-group-item list-group-item-action">Задания</a>
               <a href="<?php echo("../group.php"); ?>" class="list-group-item list-group-item-action">Группа</a>
               <a href="<?php echo("../my_stat.php"); ?>" class="list-group-item list-group-item-action">Моя статистика</a>
            </div>
         </div>
         <?php include '../profile_form.php';?>