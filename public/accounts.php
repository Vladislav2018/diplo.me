<?php

   namespace Accounts;
   require 'E:\servak\OSPanel\domains\diplo.me\include.php';
   include_once '../helper.php';
   // spl_autoload_register(function ($class) 
   // { 
   //    require _DIR_ . '/' .str_replace('\\', '/', $class) . '.php'; 
   // });
   use RedBeanPHP;
   class Account
   {
      public static function getEmployee()
      {
         $employee = RedBeanPHP\R::FindOne('employees', 'WHERE user_id = ?', array($_SESSION['user_id']));
         b_dump($employee);
         return $employee;
      }
      public static function getVerify()
      {
         if(empty(self::getEmployee()))
         {
            return false;
         }
         else
         return true;  
      }
      public static function getUserRole($c_user_role)
      {
         if(self::getVerify(true))
         {
            $c_user_role = self::getEmployee()['roles'];
            return $c_user_role;
         }   
      }
      public static function redirectUser()
      {
         if(self::getVerify(false))
         {
            ?><script type="text/javascript">
            location = 'confirm.php';
            </script><?php
            exit();
         }
         else
         {
            if(self::getUserRole('worker'))
            {
               ?><script type="text/javascript">
               location = 'accTypes/worker.php';
               </script><?php
               exit();
            }
            elseif(self::getUserRole('manager'))
            {
               ?><script type="text/javascript">
               location = 'accTypes/worker.php';
               </script><?php
               exit();
            }
            elseif(self::getUserRole('admin'))
            {
               ?><script type="text/javascript">
               location = 'accTypes/admin.php';
               </script><?php
               exit();
            }
         }
      }
   }      
   b_dump($_SESSION);
   Account::redirectUser();
   ?>



