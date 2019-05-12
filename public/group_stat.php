<?php 
require 'E:\servak\OSPanel\domains\diplo.me\include.php';//file with coonection to RedBean
include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
checkAuth();

$current_groups = R::getCol('SELECT group_id FROM `groupresults` WHERE head_id = ?', array($_SESSION['employee']['id']));
for($i = 0; $i < count($current_groups); $i++)
{
    $done_tasks[$i] = R::getCol('SELECT count(*) FROM tasks WHERE `status` = "done" AND id IN
    (SELECT task_id FROM tasksgroups WHERE group_id = ?)', array($current_groups[$i]));
    $failed_tasks[$i] = R::getCol('SELECT count(*) FROM tasks WHERE `status` = "failed" AND id IN
    (SELECT task_id FROM tasksgroups WHERE group_id = ?)', array($current_groups[$i]));
    $process_tasks[$i] = R::getCol('SELECT count(*) FROM tasks WHERE `status` = "in_process" 
    OR `status` = "cheking" OR `status` = "remaking" AND id IN
    (SELECT task_id FROM tasksgroups WHERE group_id = ?)', array($current_groups[$i]));
    $avg_mark[$i] = R::getCol('SELECT avg(mark) FROM tasks WHERE id IN
    (SELECT task_id FROM tasksgroups WHERE group_id = ?)', array($current_groups[$i]));
    R::exec('UPDATE persresults SET done_tasks = ?, failed_tasks = ?, process_tasks = ?, avarage_mark = ?
    WHERE group_id = ?',array($done_tasks[$i][0], $failed_tasks[$i][0], $process_tasks[$i][0], $avg_mark[$i][0], $current_groups[$i]));
}

$my_groups_stat = R::getAll('SELECT * FROM groupresults WHERE head_id =  ?', array($_SESSION['employee']['id']));
$group_names = R::getCol('SELECT groupname FROM `groups` WHERE head_id = ?', array($_SESSION['employee']['id']));
    //b_dump($group_names);
?>
<?php include_once 'navmenu.php';?>
<div class="col-md-9">
    <?php for($i = 0; $i< count($my_groups_stat); $i++): ?>
<div class="col-md-3">
    <p><?php echo $group_names[$i] ?></p>
<ul class="list-group" style="max-width: 20rem;">
  <li class="list-group-item">Выполнено: <?php echo $done_tasks[$i][0];?></li>
  <li class="list-group-item">Провалено: <?php echo $failed_tasks[$i][0];?> </li>
  <li class="list-group-item">В процессе: <?php echo $process_tasks[$i][0];?> </li>
  <li class="list-group-item">Средняя оценка: <?php echo $avg_mark[$i][0];?> </li>
  <li class="list-group-item">Полезность: <?php echo $done_tasks[$i][0] - $failed_tasks[$i][0];?> </li>
</ul>
</div><br>
<?php endfor;?>
</div>

