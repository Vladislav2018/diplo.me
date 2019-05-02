<?php
   require '../include.php';//file with coonection to RedBean
   include_once '../helper.php';
      function getEmployee()
      {
         $employee = R::FindOne('employees', 'WHERE user_id = ?', array($_SESSION['user_id']));
         b_dump($employee);
         return $employee;
      }
      function getVerify()
      {
         if(empty(getEmployee()))
         {
            return false;
         }
         else
         return true;  
      }
      function getUserRole($c_user_role)
      {
         if(getVerify(true))
         {
            $c_user_role = getEmployee()['roles'];
            return $c_user_role;
         }   
      }
      function redirectUser()
      {
         if(getVerify(false))
         {
            ?><script type="text/javascript">
            location = 'confirm.php';
            </script><?php
            exit();
         }
         else
         {
            if(getUserRole('worker'))
            {
               ?><script type="text/javascript">
               location = 'accTypes/worker.php';
               </script><?php
               exit();
            }
            elseif(getUserRole('manager'))
            {
               ?><script type="text/javascript">
               location = 'accTypes/worker.php';
               </script><?php
               exit();
            }
            elseif(getUserRole('admin'))
            {
               ?><script type="text/javascript">
               location = 'accTypes/admin.php';
               </script><?php
               exit();
            }
         }
      }     
   b_dump($_SESSION);
   ?>



