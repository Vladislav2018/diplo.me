<?php
   //require 'E:\servak\OSPanel\domains\diplo.me\include.php';//file with coonection to RedBean
   //include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
   $employee= R::FindOne('employees', 'WHERE user_id = ?', array($_SESSION['employee']['user_id']));
   $user = R::FindOne('users', 'WHERE id = ?', array($_SESSION['employee']['user_id']));
   //b_dump($employee['id']);
   $org = R::FindOne('employeeorgs', 'WHERE employee_id = ?', array($employee['id']));
   $contact = R::FindOne('employeekonts', 'WHERE employee_id = ?', array($employee['id']));
   function updateMain()
   {
      $GLOBALS['employee']->first_name = $_POST['main']['first_name'];
      $GLOBALS['employee']->last_name = $_POST['main']['last_name'];
      $GLOBALS['employee']->patronymic = $_POST['main']['patronymic'];
      R::store( $GLOBALS['employee']);
   }
   function updateOrgs()
   {
      //$GLOBALS['org']=R::convertToBean('employeeorgs', $_POST['org']); - Undefined parametr id
      //b_dump($GLOBALS['org']);
      $GLOBALS['org']->sex = $_POST['org']['sex'];
      $GLOBALS['org']->birth = $_POST['org']['birth'];
      $GLOBALS['org']->passport = $_POST['org']['passport'];
      $GLOBALS['org']->organization = $_POST['org']['organization'];
      $GLOBALS['org']->position = $_POST['org']['position'];
      R::store($GLOBALS['org']);
   }
   function updateConts()
   {
      //b_dump($_POST['contact']);
      $GLOBALS['contact']->pers_email = $_POST['contact']['pers_email'];
      $GLOBALS['contact']->corp_number= $_POST['contact']['corp_number'];
      $GLOBALS['contact']->pers_number = $_POST['contact']['pers_number'];
      $GLOBALS['contact']->country = $_POST['contact']['country'];
      $GLOBALS['contact']->city = $_POST['contact']['city'];
      $GLOBALS['contact']->street = $_POST['contact']['street'];
      $GLOBALS['contact']->house = $_POST['contact']['house'];
      $GLOBALS['contact']->apartment = $_POST['contact']['apartment'];
      //b_dump($GLOBALS['contact']);
      R::store($GLOBALS['contact']);
   }
   if(isset($_POST['submit_main']))
   {
      updateMain();
   }
   if(isset($_POST['submit_org']))
   {
      updateOrgs();
   }
   if(isset($_POST['submit_cont']))
   {
      updateConts();
   }
   //b_dump($_POST['main']);
   
   //b_dump();
?>
<div class="col-md-9">
   <div class="card">
      <div class="container mt-3">
         <!-- Nav tabs -->
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <h4>Профиль: <?php echo($employee['first_name'].' '.$employee['last_name'].' '.$employee['patronymic'] )?></h4>
                  <br>
               </div>
            </div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="pills-main-tab" data-toggle="pill" href="#pills-main" role="tab" aria-controls="pills-main" aria-selected="true">Основное</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="pills-org-tab" data-toggle="pill" href="#pills-org" role="tab" aria-controls="pills-org" aria-selected="false">Организационное</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Контакты</a>
               </li>
            </ul>
            <br>
            <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade show active" id="pills-main" role="tabpanel" aria-labelledby="pills-main-tab">
                  <br>
                  <form name = 'main' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                     <div class="form-group row">
                        <label for="username" class="col-4 col-form-label">Логин</label> 
                        <div class="col-4">
                           <p><?php echo($user['name'])?></p>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Имя</label> 
                        <div class="col-4">
                           <input id="name" name="main[first_name]" pattern="({2,255})?" value="<?php echo($employee['first_name'])?>" class="form-control here" type="text">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="lastname" class="col-4 col-form-label">Фамилия</label> 
                        <div class="col-4">
                           <input id="lastname" name="main[last_name]" pattern="({2,255})?" value="<?php echo($employee['last_name'])?>" class="form-control here" type="text">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="Patronymic" class="col-4 col-form-label">Отчество</label> 
                        <div class="col-4">
                           <input id="Patronymic" name="main[patronymic]" pattern="({2,255})?" value="<?php echo($employee['patronymic'])?>" class="form-control here" type="text">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="role" class="col-4 col-form-label">Ваша Роль</label> 
                        <p><?echo($_SESSION['employee']['roles'])?></p>
                     </div>
                     <div class="form-group row">
                        <label for="head" class="col-4 col-form-label">Руководитель</label> 
                        <p>
                           <?php 
                              if(!empty($employee['head_id'])){
                                 echo($employee['head_id']);
                              }
                              else
                              {
                                 echo('руководитель не задан');
                              } 
                              ?>
                        </p>
                     </div>
                     <div class="form-group row">
                        <div class="offset-4 col-8">
                           <button name="submit_main" type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                  <br>
                  <form name = 'contact' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                     <div class="form-group row">
                        <label for="corp_email" class="col-4 col-form-label">Корпоративная почта</label> 
                        <div class="col-4">
                           <p><?php echo($user['email'])?></p>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="pers_email" class="col-4 col-form-label">Персональная почта</label> 
                        <div class="col-4">
                           <input id="pers_email" name="contact[pers_email]" value="<?php if(!empty($contact['pers_email'])) echo($contact['pers_email']);else echo('введите личную почту');?>" class="form-control here" type="eamil">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="corp_number" class="col-4 col-form-label">Корпоративный телефон</label> 
                        <div class="col-4">
                           <input id="corp_number" name="contact[corp_number]" value="<?php if(!empty($contact['corp_number'])) echo($contact['corp_number']);else echo('введите корпоративный телефон');?>" class="form-control here" type="tel">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="pers_number" class="col-4 col-form-label">Личный телефон</label> 
                        <div class="col-4">
                           <input id="pers_number" name="contact[pers_number]" value="<?php if(!empty($contact['pers_number'])) echo($contact['pers_number']);else echo('введите личный телефон');?>" class="form-control here" type="tel">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="country" class="col-4 col-form-label">Страна</label> 
                        <div class="col-4">
                           <input id="country" name="contact[country]" pattern="({2,255})?" value="<?php if(!empty($contact['country'])) echo($contact['country']);else echo('введите страну проживания');?>" class="form-control here" type="text">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="city" class="col-4 col-form-label">Город</label> 
                        <div class="col-4">
                           <input id="city" name="contact[city]" pattern="({2,255})?" value="<?php if(!empty($contact['city'])) echo($contact['city']);else echo('введите город проживания');?>" class="form-control here" type="text">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="street" class="col-4 col-form-label">Улица (квартал)</label> 
                        <div class="col-4">
                           <input id="street" name="contact[street]" pattern="({2,255})?" value="<?php if(!empty($contact['street'])) echo($contact['street']);else echo('введите город проживания');?>" class="form-control here" type="text">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="house" class="col-4 col-form-label">Дом</label> 
                        <div class="col-4">
                           <input id="house" name="contact[house]" pattern="({2,255})?" value="<?php if(!empty($contact['house'])) echo($contact['house']);else echo('введите город проживания');?>" class="form-control here" type="text">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="apartment" class="col-3 col-form-label">Квартира</label> 
                        <div class="col-3">
                           <input id="apartment" name="contact[apartment]" value="<?php if(!empty($contact['apartment'])) echo($contact['apartment']);else echo('введите номер квартиры');?>" class="form-control here" type="number">
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="offset-4 col-8">
                           <button name="submit_cont" type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="tab-pane fade" id="pills-org" role="tabpanel" aria-labelledby="pills-org-tab">
                  <br>
                  <form name="org" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                     <div class="form-group row">
                        <label for="sex" class="col-md-4 col-form-label">Пол</label>
                        <div class="col-md-6">
                           <input type="radio" name="org[sex]" value="male" <?php if($org['sex'] == 'male'): ?> selected <?php endif; ?>><label for="male">male </label>
                           <input type="radio" name="org[sex]" value="female" <?php if($org['sex'] == 'female'): ?>  selected <?php endif; ?>><label for="female">female</label>  
                        </div>
                     </div>
                     <br>
                     <div class="form-group row">
                        <label for="birth" class="col-md-4 col-form-label">Дата Рождения</label>
                        <div class="col-md-6">
                           <input type="date" id="birth" name="org[birth]" value="<?php if(!empty($org['birth'])) echo($org['birth']);?>"/> 
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="passport" class="col-md-4 col-form-label">Паспорт</label>
                        <div class="col-md-6">
                           <input id="passport" pattern="({2,255})?" type="text" class="form-control" name="org[passport]" value="<?php if(!empty($org['passport'])) echo($org['passport']);else echo('введите серию и номер паспорта');?>" >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="org" class="col-md-4 col-form-label">Организция</label>
                        <div class="col-md-6">
                           <input id="org" pattern="({2,255})?" type="text" class="form-control" name="org[organization]" value="<?php if(!empty($org['organization'])) echo($org['organization']);else echo('введите название организации работы');?>" >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="pos" class="col-md-4 col-form-label">Позиция</label>
                        <div class="col-md-6">
                           <input id="pos" pattern="({2,255})?" type="text" class="form-control" name="org[position]" value="<?php if(!empty($org['position'])) echo($org['position']);else echo('введите вашу должность');?>">
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="offset-4 col-8">
                           <button name="submit_org" type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>