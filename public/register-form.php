<?php
require 'E:\servak\OSPanel\domains\diplo.me\auth\register.php';
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<form class="container" action='register.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Если вы- новый сотрудник- то зарегестрируйтесь</legend>
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
        <input type="password" id="password" name="password" placeholder="" value="<?php echo @$data['password']; ?> class="input-xlarge">
        <p class="help-block">Должен быт не мнее 10 символов</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" value="<?php echo @$data['password_confirm']; ?> class="input-xlarge">
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
