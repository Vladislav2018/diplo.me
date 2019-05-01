<?php
require 'E:\servak\OSPanel\domains\diplo.me\include.php';
if(isset('logout'))
{
    session_destroy();
    ?><script type="text/javascript">
    location = 'index.php';
    </script><?php
    exit();
}
?>
<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <button class="btn btn-outline-success my-2 my-sm-0" type="button" name = "logout">Выйти</button>
  </form>
</nav>