<?php
   require 'E:\servak\OSPanel\domains\diplo.me\include.php';//file with coonection to RedBean
   include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
   $ids = R::getCol('SELECT * FROM employees');
   $groups = R::getCol('SELECT groupname FROM `groups`');
   //b_dump($_SESSION);
   if(isset($_POST['create_tasks']))
   {
        $task = R::dispense('tasks');
        $task->task_name = $_POST['taskname'];
        $task->task_description= $_POST['decription'];
        $task->employee_id = $_POST['empl_id'];
        $task->manager_id = $_SESSION['employee']['id'];
        $task->deadline = $_POST['deadline'];
        $task->tags =json_encode(explode(", ",trim($_POST['tags'])));
        $task->priority = $_POST['priority'];
        R::store($task);
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
               <a href="" class="list-group-item list-group-item-action">Профиль</a>
               <a href="<?php echo("tasks.php"); ?>" class="list-group-item list-group-item-action active">Задания</a>
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
        <div class="col-md-9">
            <div class="well well-sm">
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
                            <div class="col-md-3">
                            группа, для которого будет задача:
                                <select name="group"class="form-control">
                                <option name='group[]' value=""></option>
                                    <?php foreach($groups as $group): ?>
                                    <option name='group[]' value="<?php echo $group; ?>"><?php echo $group; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3">                           
                            id сотрудника, для которой будет задача:
                                <select name="empl_id"class="form-control">
                                <option name='empl_id[]' value=""></option>
                                    <?php foreach($ids as $id): ?>
                                    <option name='empl_id[]' value="<?php echo $id; ?>"><?php echo $id; ?></option>
                                    <?php endforeach; ?>
                                </select>
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
</style>