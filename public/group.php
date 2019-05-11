<?php
   require 'E:\servak\OSPanel\domains\diplo.me\include.php';//file with coonection to RedBean
   include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
   //unset($)
   //b_dump($_SESSION['employee']);
   if($_SESSION['employee']['roles'] != 'worker')
   {
      //b_dump($_SESSION);
        $my_subordinates = R::findAll('employees' , 'WHERE head_id = ?', array($_SESSION['employee']['id']));
        //b_dump($my_subordinates);
        $my_groups = R::getAll('SELECT * FROM `groups` WHERE head_id = ?', array($_SESSION['employee']['id']));
        $participants = R::getAll('SELECT first_name, last_name FROM employees WHERE id IN 
        (SELECT employee_id FROM grouped WHERE group_id IN
        (SELECT id FROM `groups` WHERE head_id = ?))', array($_SESSION['employee']['id']) );
        b_dump($participants);
        if(isset($_POST['create_group']) && !in_multidimensional_array($_POST['group_name'], $my_groups))
        {
           b_dump($_POST);
            $new_group = R::dispense('groups');
            $new_group->head_id = $_SESSION['employee']['id'];
            $new_group->groupname = $_POST['group_name'];
            R::store($new_group);
            $this_group = R::findOne('groups', 'WHERE groupname = ?', array($_POST['group_name']));
            //b_dump($this_group['id']);
            for($i = 0; $i< count($_POST['grouped']); $i++)
            {
               R::exec('INSERT INTO grouped(employee_id, group_id) VALUES(?,?)', array($_POST['grouped'][$i], $this_group['id']));
            }
          }
   }
   else
   {
        $my_participant = R::getAll('SELECT groupname FROM `groups` WHERE id IN
        (SELECT group_id FROM grouped WHERE employee_id = ?)', array($_SESSION['employee']['id']));
        $my_groupmates = R::getAll('SELECT first_name, last_name FROM employees WHERE head_id = ?'
        , array($_SESSION['employee']['head_id']));
        //b_dump($my_groupmates);
        $my_manager = R::findOne('employees', 'WHERE id = ?',array($_SESSION['employee']['head_id']));
        $manager_conts = R::findOne('employeekonts', 'WHERE employee_id = ?',array($_SESSION['employee']['head_id']));
        $conts_columns= R::getColumns('employeekonts');
        $conts_columns = array_keys($conts_columns);
        //b_dump($conts_columns);
   }

?>
<body>
<?php include_once 'navmenu.php';?>
         
         <div class="col-md-9">
            <?php if($_SESSION['employee']['roles'] != 'worker'): ?>
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <table class="table table-dark table-bordered">
            <thead>
            <tr >
                <th >Add</th>
                <th >id</th>
                <th >first_name</th>
                <th >last_name</th>
            </tr>
            </thead>
            <tbody style ="height: 500px; overflow: scroll;">
                <?php foreach($my_subordinates as $my_subordinate):?>
                    <tr>
                        <td ><input type="checkbox" name="grouped[]" value="<?php echo $my_subordinate['id']?>">to group</td>
                        <td ><?php echo $my_subordinate['id'] ?></td>
                        <td ><?php echo $my_subordinate['first_name'] ?></td>
                        <td ><?php echo $my_subordinate['last_name'] ?></td>
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
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <table class="table table-dark table-bordered">
            <thead>
            <tr >
                <th >Add</th>
                <th >id</th>
                <th >Название</th>
                <th> Участники </th>
            </tr>
            </thead>
            <tbody style ="height: 500px; overflow: scroll;">
                <?php foreach($my_groups as $my_group):?>
                    <tr>
                        <td ><input type="checkbox" name="groups[]" value="<?php echo $my_group['id']?>"></td>
                        <td ><?php echo $my_group['id'] ?></td>
                        <td ><?php echo $my_group['groupname'] ?></td>
                        <td ><?php ?></td>
                    </tr>
                  <?php endforeach;?>
            </tbody>
        </table>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="create_group" type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
         </form>
<?php else:?>
            <div class="card bg-dark mb-3" style="max-width: 25rem;">
            <div class="card-header">Группа</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo'Руководитель: '.$my_manager['first_name'].' '.$my_manager['last_name'].' '.$my_manager['patronymic'] ?></h5>
                <ul class="card-text">
                <p>Участники:</p>
                <?php for($i = 0; $i<count($my_groupmates); $i++): ?>
                <li> <?php echo $my_groupmates[$i]['first_name'].' '.$my_groupmates[$i]['last_name'];?> </li>
                <?php endfor;?>
                </ul>
                <p>О руководителе:</p>
                <?php 
                for($i = 2; $i<count($conts_columns); $i++)
                {
                   echo $conts_columns[$i].': '.$manager_conts[$conts_columns[$i]].'<br>';
                }
                 ?>
            </div>
            </div>
        </div>
            <?php endif; ?>      


   
      