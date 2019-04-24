<?php
require 'libs/rb-mysql.php';
R::setup( 
'mysql:host=127.0.0.1;
dbname=work_pr',
'mysql', 'mysql' );
if(!R::testConnection())
{
    exit('some error with db connection or file structure');
}
?>