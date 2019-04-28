<?php
namespace Amdins;

use Accounts\Account;

require '../accounts.php';

class Admin extends Account
{

}
?>
<body>
   <div class="container">
      <div class="row">
         <div class="col-md-3 ">
            <div class="list-group ">
               <a href="" class="list-group-item list-group-item-action active">Профиль</a>
               <a href="<?php echo("../tasks.php"); ?>" class="list-group-item list-group-item-action">Задания</a>
               <a href="<?php echo("../group.php"); ?>" class="list-group-item list-group-item-action">Группа</a>
               <a href="<?php echo("../my_stat.php"); ?>" class="list-group-item list-group-item-action">Моя статистика</a>
                <a href="<?php echo("../group_stat.php"); ?>" class="list-group-item list-group-item-action">Статистика группы</a>
               <a href="<?php echo("../common_stat.php"); ?>" class="list-group-item list-group-item-action">Общая статистика</a>
               <a href="<?php echo("../all_profiles.php"); ?>" class="list-group-item list-group-item-action">Все профили</a>
            </div>
         </div>
<?php include '../profile_form.php';?>