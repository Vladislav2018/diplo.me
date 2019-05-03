<?php
   require 'E:\servak\OSPanel\domains\diplo.me\include.php';//file with coonection to RedBean
   include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
      function redirectUser()
      {
         $employee = R::FindOne('employees', 'WHERE user_id = ?', array($_SESSION['user_id']));
         //b_dump($employee);
         if(!empty($employee))
         {
            $c_user_role = $employee['roles'];
            $_SESSION['role'] = $c_user_role;
            ?><script type="text/javascript">
            location = 'profile.php';
            </script><?php
            exit();
         }
         else
         {
            ?><script type="text/javascript">
            location = 'confirm.php';
            </script><?php
            exit();
         }
      }     
   b_dump($_SESSION);
   redirectUser();
   ?>



