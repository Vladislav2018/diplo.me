<?php 
require 'E:\servak\OSPanel\domains\diplo.me\include.php';//file with coonection to RedBean
include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
checkAuth();
$employees= R::getCol('SELECT employee_id FROM persresults');
//b_dump($employees);
if(!in_array($_SESSION['employee']['id'], $employees))
{
    $employee = R::dispense('persresults');
    $employee->employee_id = $_SESSION['employee']['id'];
    R::store($employee);
}
else
{
    $done_tasks = R::getCol('SELECT count(*) FROM tasks WHERE `status` = "done" AND id IN
    (SELECT task_id FROM tasksemployess WHERE employee_id = ?)', array($_SESSION['employee']['id']));
    $failed_tasks = R::getCol('SELECT count(*) FROM tasks WHERE `status` = "failed" AND id IN
    (SELECT task_id FROM tasksemployess WHERE employee_id = ?)', array($_SESSION['employee']['id']));
    $process_tasks = R::getCol('SELECT count(*) FROM tasks WHERE `status` = "in_process" 
    OR `status` = "cheking" OR `status` = "remaking" AND id IN
    (SELECT task_id FROM tasksemployess WHERE employee_id = ?)', array($_SESSION['employee']['id']));
    $avg_mark = R::getCol('SELECT avg(mark) FROM tasks WHERE id IN
    (SELECT task_id FROM tasksemployess WHERE employee_id = ?)', array($_SESSION['employee']['id']));
    R::exec('UPDATE persresults SET done_tasks = ?, failed_tasks = ?, process_tasks = ?, avarage_mark = ?
    WHERE employee_id = ?',array($done_tasks[0], $failed_tasks[0], $process_tasks[0], $avg_mark[0], $_SESSION['employee']['id']));
    //R::exec('UPDATE FROM persresults ');
    //b_dump($done_tasks);
}

?>
<?php include_once 'navmenu.php';?>
<div class="col-md-9">
<ul class="list-group" style="max-width: 20rem;">
  <li class="list-group-item">Выполнено: <?php echo $done_tasks[0];?></li>
  <li class="list-group-item">Провалено: <?php echo $failed_tasks[0];?> </li>
  <li class="list-group-item">В процессе: <?php echo $process_tasks[0];?> </li>
  <li class="list-group-item">Средняя оценка: <?php echo $avg_mark[0];?> </li>
  <li class="list-group-item">Полезность: <?php echo $done_tasks[0] - $failed_tasks[0];?> </li>
</ul>
</div>
                        