<?php
   require 'E:\servak\OSPanel\domains\diplo.me\include.php';//file with coonection to RedBean
   include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
   //unset($)
   //b_dump($_SESSION['employee']);
   if($_SESSION['employee']['roles'] != 'worker')
   {
        $my_subordinates = R::findAll('employees' , 'WHERE head_id = ?', array($_SESSION['employee']['id']));
        //b_dump($my_subordinates);
        if(isset($_POST['create_group']))
        {
           b_dump($_POST);
            $new_group = R::dispense('groups');
            $new_group->head_id = $_SESSION['employee']['head_id'];
            $new_group->name = $_POST['group_name'];

        }
   }

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
               <a href="<?php echo("profile.php"); ?>" class="list-group-item list-group-item-action">Профиль</a>
               <a href="<?php echo("tasks.php"); ?>" class="list-group-item list-group-item-action">Задания</a>
               <a href="<?php echo("group.php"); ?>" class="list-group-item list-group-item-action active">Группа</a>
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
         <div class="col-md-9">
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <table class="table table-dark table-bordered">
            <thead>
            <tr >
                <th >Add</th>
                <th >id</th>
                <th >first_name</th>
                <th >last_name</th>
                <th >Groups</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($my_subordinates as $my_subordinate):?>
                    <tr>
                        <td ><input type="checkbox" name="grouped[]" value="<?php echo $my_subordinate['id']?>">to group</td>
                        <td ><?php echo $my_subordinate['id'] ?></td>
                        <td ><?php echo $my_subordinate['first_name'] ?></td>
                        <td ><?php echo $my_subordinate['last_name'] ?></td>
                        <td ><?php  ?></td>
                    </tr>
                  <?php endforeach;?>
            </tbody>
        </table>
            <div class="form-group row">
               <label for="name" class="col-4 col-form-label">Group name</label> 
               <div class="col-4">
                  <input id="group_name" name="group_name" pattern="{2,255}" value="" class="form-control here" type="text" autofocus required>
               </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="create_group" type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
         </form>
        </div>
      </div>
   </div>

   
      