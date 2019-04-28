<?php
require 'E:\servak\OSPanel\domains\diplo.me\include.php';
$data = $_POST;
if ( isset($data['do_login']) )
{

    $user = R::findOne('users', 'login = ?', array($data['login']));
    if ( $user )
    {
        //логин существует
        if ( password_verify($data['password'], $user->password) )
        {
            //если пароль совпадает, то нужно авторизовать пользователя
            $_SESSION['logged_user'] = $user;
            echo '<div style="color:dreen;">Вы авторизованы!<br> 
            Можете перейти на <a href="/">главную</a> страницу.</div><hr>';
        }else
        {
            $errors[] = 'Неверно введен пароль!';
        }
 
    }else
    {
        $errors[] = 'Пользователь с таким логином не найден!';
    }
     
    if ( ! empty($errors) )
    {
        //выводим ошибки авторизации
        echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
    }
}
?>
<head>
<title>Unautorized</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>
    
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="index.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Login:</label><br>
                                <input type="text" name="login" value="<?php echo @$data['login']; ?>" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Corporate email:</label><br>
                                <input type="text" name="email" value="<?php echo @$data['email']; ?>" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" value="<?php echo @$data['password'];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="do_login" class="btn btn-info btn-md" value="Autorize me!">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="/register-form.php" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


