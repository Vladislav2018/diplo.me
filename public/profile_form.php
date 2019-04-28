
         <div class="col-md-9">
            <div class="card">
               <div class="container mt-3">
                  <!-- Nav tabs -->
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <h4>Профиль: Фамилия Имя Отчество *(Вы)*</h4>
                           <hr>
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
                           <form>
                              <div class="form-group row">
                                 <label for="username" class="col-4 col-form-label">Логин</label> 
                                 <div class="col-4">
                                    <input id="username" name="username" placeholder="Username" class="form-control here" type="text">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="name" class="col-4 col-form-label">Имя</label> 
                                 <div class="col-4">
                                    <input id="name" name="name" placeholder="First Name" class="form-control here" type="text">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="lastname" class="col-4 col-form-label">Фамилия</label> 
                                 <div class="col-4">
                                    <input id="lastname" name="lastname" placeholder="Last Name" class="form-control here" type="text">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="Patronymic" class="col-4 col-form-label">Отчество</label> 
                                 <div class="col-4">
                                    <input id="Patronymic" name="Patronymic" placeholder="Patronymic" class="form-control here" type="text">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="select" class="col-4 col-form-label">Ваша Роль</label> 
                                 <p>*Роль*</p>
                              </div>
                              <div class="form-group row">
                                 <label for="select" class="col-4 col-form-label">Руководитель</label> 
                                 <p>*Руководитель*</p>
                              </div>
                              <div class="form-group row">
                                 <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Обновить</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <br>
                        <form action="" method="post">
                           <div class="form-group row">
                              <label for="corp_email" class="col-4 col-form-label">Корпоративная почта</label> 
                              <div class="col-4">
                                 <input id="corp_email" name="corp_email" placeholder="*from db*" class="form-control here" type="email">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="pers_email" class="col-4 col-form-label">Персональная почта</label> 
                              <div class="col-4">
                                 <input id="pers_email" name="pers_email" placeholder="Email" class="form-control here" type="eamil">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="corp_number" class="col-4 col-form-label">Корпоративный телефон</label> 
                              <div class="col-4">
                                 <input id="corp_number" name="corp_number" placeholder="corp_number" class="form-control here" type="tel">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="pers_number" class="col-4 col-form-label">Личный телефон</label> 
                              <div class="col-4">
                                 <input id="pers_number" name="pers_number" placeholder="number" class="form-control here" type="tel">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="country" class="col-4 col-form-label">Страна</label> 
                              <div class="col-4">
                                 <input id="country" name="country" placeholder="country" class="form-control here" type="text">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="city" class="col-4 col-form-label">Город</label> 
                              <div class="col-4">
                                 <input id="city" name="city" placeholder="city" class="form-control here" type="text">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="street" class="col-4 col-form-label">Улица (квартал)</label> 
                              <div class="col-4">
                                 <input id="street" name="street" placeholder="street" class="form-control here" type="text">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="house" class="col-4 col-form-label">Дом</label> 
                              <div class="col-4">
                                 <input id="house" name="house" placeholder="house" class="form-control here" type="text">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="apartment" class="col-4 col-form-label">Квартира</label> 
                              <div class="col-4">
                                 <input id="apartment" name="apartment" placeholder="apartment" class="form-control here" type="number">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="offset-4 col-8">
                                 <button name="submit" type="submit" class="btn btn-primary">Обновить</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div class="tab-pane fade" id="pills-org" role="tabpanel" aria-labelledby="pills-org-tab">
                        <br>
                        <form action="" method="post">
                           <div class="form-group row">
                              <label for="sex" class="col-md-4 col-form-label">Пол</label>
                              <div class="col-md-6">
                                 <input type="radio" name="sex" value="male"><label for="male">male </label>
                                 <input type="radio" name="sex" value="female"><label for="female">female</label>  
                              </div>
                           </div>
                           <br>
                           <div class="form-group row">
                              <label for="birth" class="col-md-4 col-form-label">Дата Рождения</label>
                              <div class="col-md-6">
                                 <input type="date" id="birth" name="birth" value=""/> 
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="passport" class="col-md-4 col-form-label">Паспорт</label>
                              <div class="col-md-6">
                                 <input id="passport" pattern="{2,255}" type="text" class="form-control" name="passport" value="" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="org" class="col-md-4 col-form-label">Организция</label>
                              <div class="col-md-6">
                                 <input id="org" pattern="{2,255}" type="text" class="form-control" name="org" value="" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="pos" class="col-md-4 col-form-label">Позиция</label>
                              <div class="col-md-6">
                                 <input id="pos" pattern="{2,255}" type="text" class="form-control" name="pos" value="">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="offset-4 col-8">
                                 <button name="submit" type="submit" class="btn btn-primary">Обновить</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>