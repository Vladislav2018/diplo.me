<?php
   require '../include.php';//file with coonection to RedBean
   include_once '../helper.php';
      function redirectUser()
      {
         $employee = R::FindOne('employees', 'WHERE user_id = ?', array($_SESSION['user_id']));
         b_dump($employee);
         if(!empty($employee))
         {
            $c_user_role = $employee['roles'];
            $_SESSION['role'] = $c_user_role;
            b_dump($c_user_role);
            if($c_user_role['roles'] == 'worker')
            {
               ?><script type="text/javascript">
               location = 'accTypes/worker.php';
               </script><?php
               exit();
            }
            elseif($c_user_role['roles'] == 'manager')
            {
               ?><script type="text/javascript">
               location = 'accTypes/worker.php';
               </script><?php
               exit();
            }
            elseif($c_user_role['roles'] == 'admin')
            {
               ?><script type="text/javascript">
               location = 'accTypes/admin.php';
               </script><?php
               exit();
            }
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



