<?php
require 'E:\servak\OSPanel\domains\diplo.me\include.php';
$data = $_POST;
if ( isset($data['do_login']) )
{
    $employee = R::dispense('employees');
        $employee->user_id = $_SESSION['user_id'];
        $employee->first_name = $data['first_name'];
        $employee->last_name = $data['last_name'];
        $employee->patronymic = $data['patronymic'];
        $employee->head_id = $data['head_id'];
    R::store($user);
    ?><script type="text/javascript">
    location = 'accounts.php';
    </script><?php
}
?>
<head>
    <title>Confirm</title>
</head>
    <body>
        <nav class="nav justify-content-center">
        </nav>
        <div class="card-body">
                
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header">Ваши данные</div>

                    <div class="card-body">
                    <form method="POST" action="confirm.php">
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">Имя</label>

                                <div class="col-md-5">
                                    <input id="first_name" pattern="[A-Za-zА-Яа-яЁё]{2,255}" type="text"  class="form-control" name="first_name" value="" required autofocus>
                               </div> 
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                                <div class="col-md-5">
                                    <input id="last_name" pattern="[A-Za-zА-Яа-яЁё]{2,255}" type="text" class="form-control" name="last_name" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="patronymic" class="col-md-4 col-form-label text-md-right">Отчество</label>

                                <div class="col-md-5">
                                    <input id="patronymic" pattern="[A-Za-zА-Яа-яЁё]{2,255}" type="text" class="form-control" name="patronymic" value="" required autofocus>
                                </div>
                            </div>
                        <!-- <div class="form-group row">
                        <label for="grop_id" class="col-md-4 col-form-label text-md-right">Идентификатор группы</label>
                        
                        <div class="col-md-3">
                            <input id="head_id" type="number" min='1' max= '9223372036854775807'class="form-control" name="head_id" value="" autofocus>

                        </div> -->
                        <div class="form-group row">
                        <label for="head_id" class="col-md-4 col-form-label text-md-right">Идентификатор руководителя</label>
                        
                        <div class="col-md-3">
                            <input id="head_id" type="number" min='1' max= '9223372036854775807'class="form-control" name="head_id" value="" autofocus>

                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="head" id="head" value="head_id">
                            Я руководитель
                          </label>
                        </div> 
                        </div>
                    </div>                    
                    <button type="submit" name="submit" class="btn btn-primary">Оправить</button>
                </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
