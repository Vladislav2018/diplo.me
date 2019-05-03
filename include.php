<?php
use RedBeanPHP\Util\DispenseHelper;

require 'libs/rb-mysql.php';
require 'vendor/composer/autoload_psr4.php';
R::setup( 
'mysql:host=127.0.0.1;
dbname=work_pr',
'mysql', 'mysql' );
if(!R::testConnection())
{
    exit('some error with db connection or file structure');
}
DispenseHelper::setEnforceNamingPolicy(false);
//m.b. need to cut and pastle in helper
R::ext('normdispense', function($table_name)
{
    return R::getRedBean()->dispense($table_name);
});
//R::fancyDebug( TRUE );
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>