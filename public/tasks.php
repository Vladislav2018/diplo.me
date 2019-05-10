<?php
   require 'E:\servak\OSPanel\domains\diplo.me\include.php';//file with coonection to RedBean
   include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
   $employess = R::getAll('SELECT id, first_name, last_name FROM employees');
   $groups = R::getAll('SELECT id, groupname FROM `groups`');
   $all_tasks= R::getAll('SELECT * FROM tasks ORDER BY deadline limit ?',array(50));
   $my_tasks = R::getAll('SELECT * FROM tasks WHERE id IN
   (SELECT task_id FROM tasksemployess WHERE employee_id = ?) 
   ORDER BY deadline limit ?',array($_SESSION['employee']['id'], 50));
   $my_groups_tasks = R::getAll('SELECT * FROM tasks WHERE id IN
   (SELECT task_id FROM tasksgroups WHERE group_id IN
   (SELECT id FROM `groups` WHERE id IN
   (SELECT group_id FROM grouped WHERE employee_id = ?)))',array($_SESSION['employee']['id']));
   b_dump($my_groups_tasks);

   if(isset($_POST['create_tasks']) && !in_multidimensional_array($_POST['taskname'], $all_tasks))
   {   
        $data = $_POST;
        $task = R::dispense('tasks');
        $task->task_name = $data['taskname'];
        $task->task_description= $data['decription'];
        $task->manager_id = $_SESSION['employee']['id'];
        $task->deadline = $data['deadline'];
        $task->tags =json_encode(explode(",",trim($data['tags'])));
        $task->priority = $data['priority'];
        R::store($task);
        $this_task = R::findOne('tasks', ' WHERE task_name = ?', array($data['taskname']));
        b_dump($this_task['id']);
        if(count($data['empl_id'])>0)
        {
            for($i = 0; $i< count($data['empl_id']); $i++)
            {
                R::exec('INSERT INTO tasksemployess(employee_id, task_id) VALUES(?,?)', array($data['empl_id'][$i], $this_task['id']));
            }
        }
        if(count($data['group'])>0)
        {
            for($i = 0; $i< count($data['group']); $i++)
            {
                R::exec('INSERT INTO tasksgroups(group_id, task_id) VALUES(?,?)', array($data['group'][$i], $this_task['id']));
            }
        }
        unset($data);
        $_POST = array();
        $_REQUEST = array(); 
   }
?>
<body>
<?php include_once 'navmenu.php';?>
        <div class="col-md-9">
            <div class="well well-sm">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php if($_SESSION['employee']['roles'] != 'worker'):?>
               <li class="nav-item">
                  <a class="nav-link active" id="pills-give-tab" data-toggle="pill" href="#pills-give" role="tab" aria-controls="pills-give" aria-selected="true">Дать задачу</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="pills-tasks-tab" data-toggle="pill" href="#pills-tasks" role="tab" aria-controls="pills-tasks" aria-selected="false">Все задачи</a>
               </li>
               <?php endif;?>
               <li class="nav-item">
                  <a class="nav-link <?php if(($_SESSION['employee']['roles'] == 'worker')) echo 'active';?>" id="pills-mytasks-tab" data-toggle="pill" href="#pills-mytasks" role="tab" aria-controls="pills-mytasks" aria-selected="false">Mои задачи</a>
               </li> 
            </ul>
            <br>
            <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade show <?php if(($_SESSION['employee']['roles'] != 'worker')) echo 'active';?>" id="pills-give" role="tabpanel" aria-labelledby="pills-give-tab">
                    <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <fieldset>
                        <legend class="text-center header">Give Tasks</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="tname" name="taskname" type="text" pattern="{2,255}" placeholder="Название задачи" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control"  id="message" pattern="{2,255}" name="decription" placeholder="Опишите задание в подробностях" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                            группа, для которого будет задача:
                                    <div class="form-check">
                                        <?php foreach($groups as $group): ?>
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="group[]" id="group" value="<?php echo $group['id']; ?>">
                                        <?php echo $group['groupname']; ?>
                                      </label>
                                      <?php endforeach; ?>
                                    </div>
                            </div>
                            <div class="col-md-4">                           
                            id сотрудникa, для которой будет задача:
                            <div class="form-check">
                                    <?php foreach($employess as $employee): ?>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="empl_id[]" id="empl" value="<?php echo $employee['id']; ?>">
                                        <?php echo $employee['first_name'].' '.$employee['last_name']; ?>
                                      </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-md-8">
                                <label for="tags">Тэги задачи</label>
                                <input id="tags" name="tags" type="text" placeholder="тэг1, тэг2, ..." class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-3">
                            <label for="deadline" class="col-md-4 col-form-label">Срок выполнения:</label>
                            <input type="date" id="birth" name="deadline" value="">
                        </div>
                                <div class="col-md-3">
                                <label for="deadline" class="col-md-3 col-form-label">Приоритетность:</label>
                                <select name="priority"class="form-control">
                                <option name='priority[]' value="extra">Дополнительно</option>
                                <option name='priority[]' value="main">Главное</option>
                                <option name='priority[]' value="primary">Срочное</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <button type="submit" name = "create_tasks" class="btn btn-primary btn-lg">Создать</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
               </div>
               <div class="tab-pane fade show" id="pills-tasks" role="tabpanel" aria-labelledby="pills-tasks-tab">
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
               <?php if($_SESSION['employee']['roles'] == 'admin'): ?>
                    <table class="table table-dark table-bordered">
                        <thead>
                        <tr >
                            <th>Удалить</th>
                            <th >id</th>
                            <th >Название задачи</th>
                            <th >Описание задачи</th>
                            <th >h_id</th>
                            <th >Выполнить до:</th>
                            <th >приоритет</th>
                            <th >статус</th>
                            <th >тэги</th>
                            <th >Сделано:</th>
                        </tr>
                        </thead>
                        <tbody style="height:500px; overflow:scroll;">
                            <?php foreach($all_tasks as $each_task):?>
                                <tr>
                                    <td ><input type="checkbox" name="for_delete[]" value="<?php echo $each_task['id']?>"></td>
                                    <td ><?php echo $each_task['id'] ?></td>
                                    <td ><?php echo $each_task['task_name'] ?></td>
                                    <td ><?php echo $each_task['task_description'] ?></td>
                                    <td ><?php echo $each_task['manager_id'] ?></td>
                                    <td ><?php echo $each_task['deadline'] ?></td>
                                    <td ><?php echo $each_task['priority'] ?></td>
                                    <td ><?php echo $each_task['status'] ?></td>
                                    <td ><?php echo $each_task['tags'] ?></td>
                                    <td ><?php echo $each_task['done_at'] ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
               <?php endif;?> 
               <div class="offset-4 col-8">
                            <button name="delete" type="submit" class="btn btn-danger">Удалить</button> отмеченных
                        </div>
               </form> 
               </div>
                
               <div class="tab-pane fade show <?php if(($_SESSION['employee']['roles'] == 'worker')) echo 'active';?>" id="pills-mytasks" role="tabpanel" aria-labelledby="pills-mytasks-tab">
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

               Мои задачи:
                    <table class="table table-dark table-bordered">
                        <thead>
                        <tr >
                            <th>Выполнено</th>
                            <th >id</th>
                            <th >Название задачи</th>
                            <th >Описание задачи</th>
                            <th >h_id</th>
                            <th >Выполнить до:</th>
                            <th >приоритет</th>
                            <th >статус</th>
                            <th >тэги</th>
                            <th >Сделано:</th>
                        </tr>
                        </thead>
                        <tbody style="height:500px; overflow:scroll;">
                            <?php foreach($my_tasks as $my_task):?>
                                <tr>
                                    <td ><input type="checkbox" name="for_delete[]" value="<?php echo $my_task['id']?>"></td>
                                    <td ><?php echo $my_task['id'] ?></td>
                                    <td ><?php echo $my_task['task_name'] ?></td>
                                    <td ><?php echo $my_task['task_description'] ?></td>
                                    <td ><?php echo $my_task['manager_id'] ?></td>
                                    <td ><?php echo $my_task['deadline'] ?></td>
                                    <td ><?php echo $my_task['priority'] ?></td>
                                    <td ><?php echo $my_task['status'] ?></td>
                                    <td ><?php echo $my_task['tags'] ?></td>
                                    <td ><?php echo $my_task['done_at'] ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    Задачи групп, в которых я состою:
                    <table class="table table-dark table-bordered">
                        <thead>
                        <tr >
                            <th>Выполнено</th>
                            <th >id</th>
                            <th >Название задачи</th>
                            <th >Описание задачи</th>
                            <th >h_id</th>
                            <th >Выполнить до:</th>
                            <th >приоритет</th>
                            <th >статус</th>
                            <th >тэги</th>
                            <th >Сделано:</th>
                        </tr>
                        </thead>
                        
                        <tbody style="height:500px; overflow:scroll;">
                            <?php foreach($my_groups_tasks as $my_groups_task):?>
                                <tr>
                                    <td ><input type="checkbox" name="for_delete[]" value="<?php echo $my_groups_task['id']?>"></td>
                                    <td ><?php echo $my_groups_task['id'] ?></td>
                                    <td ><?php echo $my_groups_task['task_name'] ?></td>
                                    <td ><?php echo $my_groups_task['task_description'] ?></td>
                                    <td ><?php echo $my_groups_task['manager_id'] ?></td>
                                    <td ><?php echo $my_groups_task['deadline'] ?></td>
                                    <td ><?php echo $my_groups_task['priority'] ?></td>
                                    <td ><?php echo $my_groups_task['status'] ?></td>
                                    <td ><?php echo $my_groups_task['tags'] ?></td>
                                    <td ><?php echo $my_groups_task['done_at'] ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
               <div class="offset-4 col-8">
                            <button name="delete" type="submit" class="btn btn-access">Выполены</button> отмеченные
                        </div>
               </form> 
               </div>
            </div>

            </div>
        </div>
    </div>
</div>

<style>
    .header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }

    .bigicon {
        font-size: 35px;
        color: #36A0FF;
    }
    tbody
    {
        height:500px; 
        overflow:scroll;
    }
</style>