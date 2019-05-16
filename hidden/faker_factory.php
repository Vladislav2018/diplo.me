<?php
require '..\include.php';
//include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
function addUsers()
{
    $permitted_chars = 'abcdefghijklmnopqrstuvwxyz'; 
    for($i = 0; $i<= $_POST['count']; $i++)
    {
        $users = R::dispense('users');
        $users->name = substr(str_shuffle($permitted_chars), 2, 5);
        $users->email = substr(str_shuffle($permitted_chars), 2, 5).'@'.substr(str_shuffle($permitted_chars), 2, 5).'.'.substr(str_shuffle($permitted_chars), 2, 3);
        $users->password = password_hash('asdf', PASSWORD_DEFAULT);
        R::store($users);
    }
}
    if(isset($_POST['add_users']))
    {
      //b_dump($_POST);
      addUsers();
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Количество юзеров</label>
    <input type="number" name='count' min="1" max="20" class="form-control" id="count" placeholder="10">
  </div>
  <button type="submit" name = 'add_users' class="btn btn-primary">Добавить</button>
</form>