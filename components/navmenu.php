<?php
//   require 'E:\servak\OSPanel\domains\diplo.me\include.php';//file with coonection to RedBean
    //include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
$links = array("/public/profile.php", "/public/tasks.php", "/public/group.php", "/public/my_stat.php",
 "/public/manager/group_stat.php", "/public/admin/common_stat.php", "/public/admin/all_profiles.php"); 
$titleForLinks = array("Профиль", "Задания", "Группа", "Моя статистика", 
"Статистика группы", "Общая статистика", "Все профили");  
function what_is($i)
{
    global $links;
    return $links[$i] == $_SERVER['PHP_SELF'] ? 'active': '';
}
?>
<body>
   <div class="navbar">
      <div class="navbar-inner">
         <div class="container">
         <a href='<?php echo "../../components/logout.php";?>'>Logout</a>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-3 ">
            <div class="list-group ">
                <?php
                if($_SESSION['employee']['roles'] == 'worker')
                {
                    for ($i = 0; $i < count($links) - 3; $i++)
                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action %s">%s</a>',$links[$i], what_is($i), $titleForLinks[$i]);
                }
                elseif($_SESSION['employee']['roles'] == 'manager')
                {
                    for ($i = 0; $i < count($links) - 2; $i++)
                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action %s">%s</a>',$links[$i], what_is($i), $titleForLinks[$i]);
                }
                else
                {
                    for ($i = 0; $i < count($links); $i++)
                    echo sprintf('<a href="%s" class="list-group-item list-group-item-action %s">%s</a>',$links[$i], what_is($i), $titleForLinks[$i]);
                }
                ?>
            </div>
         </div>