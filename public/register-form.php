<?php
require 'E:\servak\OSPanel\domains\diplo.me\include.php';
  $data = $_POST;
  
//если кликнули на button
if ( isset($data['do_signup']) )
{

// проверка формы на пустоту полей
    $errors = array();
    if ( trim($data['login']) == '' )
    {
        $errors[] = 'Введите логин';
    }
 
    if ( trim($data['email']) == '' )
    {
        $errors[] = 'Введите Email';
    }
 
    if ( $data['password'] == '' )
    {
        $errors[] = 'Введите пароль';
    }
    if(strlen(trim( $data['password']))<10)
    {
        $errors[] = 'Пароль слишком короткий';
    }
 
    if ( $data['password_confirm'] != $data['password'] )
    {
        $errors[] = 'Повторный пароль введен не верно!';
    }
 
    //проверка на существование одинакового логина
    if ( R::count('users', "name = ?", array($data['name'])) > 0)
    {
        $errors[] = 'Пользователь с таким логином уже существует!';
    }
 
//проверка на существование одинакового email
    if ( R::count('users', "email = ?", array($data['email'])) > 0)
    {
        $errors[] = 'Пользователь с таким Email уже существует!';
    }
 
    if ( empty($errors) )
    {
        //ошибок нет, теперь регистрируем
        $user = R::dispense('users');
        $user->name = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT); 
        R::store($user);
        $_SESSION = $data['login'];
        echo '<div style="color:dreen;">Вы успешно зарегистрированы!</div><hr>';
    }else
    {
        echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
    }
 
}
?>
<head>
</head>
<form class="container" action='register-form.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Если вы- новый сотрудник зарегестрируйтесь</legend>
    </div>
    <div class="control-group">
      <!-- login -->
      <label class="control-label"  for="login">Логин</label>
      <div class="controls">
        <input type="text" id="login" name="login" placeholder="Ваш логин" value="<?php echo @$data['login']; ?>" class="input-xlarge">
        <p class="help-block">Логин будет Вашим уникальным идентификатором</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">Corporate E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="example@workmail.com" <?php echo @$data['email']; ?> class="input-xlarge">
        <p class="help-block">Если Вы не используете корпоративную почту, тогда используйте разрешённую личную</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="**********" class="input-xlarge">
        <p class="help-block">Должен быть не мнее 10 символов и его должны знать только Вы</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="**********" class="input-xlarge">
        <p class="help-block">Подтвердите пароль</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" name = "do_signup">Register</button>
      </div>
    </div>
  </fieldset>
</form>
<div class="alert alert-primary" role="alert">
  <strong>Уже зарегестрированы?</strong> <a href="/" class="alert-link">Вам сюда</a>
</div>
<div class="alert alert-info" role="alert">
  <strong>Безопасность!</strong> Пароль должен быть сложным.Если Вам сложно придумать пароль, Вы можете сгенерировать его 
    <strong> <a href="http://passgen.ru/" target="_blank" class="alert-link">тут</a></strong>
</div>
<?php

