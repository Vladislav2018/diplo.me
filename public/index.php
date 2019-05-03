<?php
require 'E:\servak\OSPanel\domains\diplo.me\include.php';
include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
//b_dump($_SESSION);
$data = $_POST;
if ( isset($data['do_login']) )
{
    $user = R::findOne('users', 'name = ?', array($data['login']));
    if ( $user )
    {
        //логин существует
        if ( password_verify($data['password'], $user->password) )
        {
            //если пароль совпадает, то нужно авторизовать пользователя
            $current_user = R::findOne('users', 'WHERE name = ?', array($data['login']));
            $_SESSION['user']=$current_user;
            $_SESSION['user_id'] = $current_user->id;
            unset($_SESSION['user']);
            unset($_SESSION['logged_user']);
            //print_r($_SESSION['user_id']);
            echo '<div style="color:dreen;">Вы авторизованы!<br>'; 
            //header('Location: accounts.php', true, 301);
            ?><script type="text/javascript">
                location = 'accounts.php';
            </script><?php
            exit();
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
                                <input type="password" name="password" value="<?php echo @$data['password'];?>" class="form-control">
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


