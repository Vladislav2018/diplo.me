<?php
   require '../../hidden/include.php';//file with coonection to RedBean
   include_once '../../hidden/helper.php';
   checkAuth();
    $users = R::getAll('SELECT * FROM users', array());
    
   if(isset($_POST['find']) && !empty($_POST['sought-for']))
   {
       $employees = R::find('employees' ,'WHERE '.$_POST['findby'].'= ?', array($_POST['sought-for']));

       $employee_konts = array();
       $employee_orgs = array();
        $i = 0;

       //$users = R::findAll('users' , 'WHERE id = ?', array());
       //b_dump($_POST);
   }
   else
   {
    $employees = R::getAll('SELECT * FROM employees', array());
    $employee_konts = array();
    $employee_orgs = array();
     $i = 0;
   }
   if(isset($_POST['delete']) && !empty($_POST['deletes']))
   {
       for($i = 0; $i< count($_POST['deletes']);$i++)
        {
            R::exec('DELETE FROM `users` WHERE id = ?', array($_POST['deletes'][$i]));
        }
        
   }
?>
<body>
<?php include_once '../../components/navmenu.php';?>
         <div class="col-md-9">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="row">
                Искать по:
                <div class="col-md-2">
                    <select name="findby"class="form-control">
                        <option name='findby[]' value="id">id</option>
                        <option name='findby[]' value="user_id">user_id</option>
                        <option name='findby[]' value="first_name">Имени</option>
                        <option name='findby[]' value="last_name">Фамилии</option>
                        <option name='findby[]' value="patronymic">Отчеству</option>
                        <option name='findby[]' value="roles">Роль</option>
                    </select>
                </div>
                    <div class="col-md-6">
                        <div class="active-cyan-4 mb-4">
                            <input class="form-control" name="sought-for" type="text" placeholder="Search" value="<?php if(isset($_POST["sought-for"])) echo $_POST["sought-for"];?>" aria-label="Search">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="offset-4 col-8">
                            <button name="find" type="submit" class="btn btn-primary">Найти</button>
                        </div>
                    </div>
                </div>
            </form>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="table table-dark table-bordered">
                <thead>
                <tr >
                    <td >Delete:</td>
                    <th >id</th>
                    <th >name</th>
                    <th >email</th>
                </tr>
                </thead>
                <tbody style ="height: 500px; overflow: scroll;">
                    <?php for($i = 0; $i< count($users); $i++):?>
                        <tr>
                            <td ><input type="checkbox" name="deletes[]" value="<?php echo $users[$i]['id']; ?>"></td>
                            <td ><?php echo $users[$i]['id']; ?></td>
                            <td ><?php echo $users[$i]['name']; ?></td>
                            <td ><?php echo $users[$i]['email']; ?></td>
                        </tr>
               <?php endfor;?>
                </tbody>
                </table>
                <table class="table table-dark table-bordered">
                <thead>
                    
                <tr >
                    <th >id</th>
                    <th >role</th>
                    <th >first_name</th>
                    <th >last_name</th>
                    <th >patronymic</th>
                    <th >head_id</th>
                </tr>
                </thead>
                <tbody style ="height: 500px; overflow: scroll;">
                <?php foreach($employees as $employee):?>
                        <tr>
                            <td ><?php echo $employee['id']; ?></td>
                            <td ><?php echo $employee['roles']; ?></td>
                            <td ><?php echo $employee['first_name']; ?></td>
                            <td ><?php echo $employee['last_name']; ?></td>
                            <td ><?php echo $employee['patronymic']; ?></td>
                            <td ><?php echo $employee['head_id']; ?></td>
                        </tr>
                        <?php endforeach;?>
                </tbody>
                </table>
                <div class="card" >
                <h5 class="card-title" >Other info about found staff</h5>
                    <div class="card-body" style ="height: 500px; overflow: scroll;">
                        
                        <?php foreach($employees as $employee):?>

                        <?php $employee_konts[$i] = R::findOne('employeekonts', 'WHERE employee_id = ?', array($employee['id']));
                        $employee_konts[$i] = $employee_konts[$i]->export();
                        $employee_orgs[$i] = R::findOne('employeeorgs', 'WHERE employee_id = ?', array($employee['id']));
                        $employee_orgs[$i] = $employee_orgs[$i]->export();
                        ?>
                        
                        <p class="card-text"><?php echo 'Данные сотрудника: '.$employee['first_name'].' '.$employee['last_name'].' '.$employee['patronymic']?></p>
                        <?php b_dump($employee_konts[$i]); ?>
                        <?php b_dump($employee_orgs[$i]); ?>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="offset-4 col-8">
                            <button name="delete" type="submit" class="btn btn-danger">Удалить</button> отмеченных
                        </div>
            </form>
            
         </div>