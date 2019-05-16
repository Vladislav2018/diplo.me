<?php
   require 'include.php';//file with coonection to RedBean
   //include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
      function redirectUser()
      {
         $employee = R::FindOne('employees', 'WHERE user_id = ?', array($_SESSION['user_id']));
         //b_dump($employee);
         if(!empty($employee))
         {         
            unset($_SESSION['employee_id']);
            //b_dump($employee);
            $_SESSION['employee'] = $employee;
            //b_dump($_SESSION);
            ?><script type="text/javascript">
            location = '../public/profile.php';
            </script><?php
            //exit();
         }
         else
         {
            ?><script type="text/javascript">
            location = '../public/confirm.php';
            </script><?php
            exit();
         }
      }     
   redirectUser();
   ?>



