<?php
require 'E:\servak\OSPanel\domains\diplo.me\include.php';
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm</title>
</head>
    <body>
        <nav class="nav justify-content-center">
        </nav>
        <div class="card-body">
                <div class="alert alert-success" role="alert">
                    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">Ваши данные</div>

                    <div class="card-body">
                    <form method="POST" action="">
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
                        <div class="form-group row">
                        <label for="head_id" class="col-md-4 col-form-label text-md-right">Идентификатор руководителя</label>
                        
                        <div class="col-md-3">
                            <input id="head_id" type="number" min='1' max= '9223372036854775807'class="form-control" name="head_id" value="" autofocus>

                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="head" id="head" value="head_id" checked>
                            Я руководитель
                          </label>
                        </div> 
                        </div>
                    </div>                    
                    <button type="submit" class="btn btn-primary">Оправить</button>
                </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
