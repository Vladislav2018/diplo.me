<?php
   require 'E:\servak\OSPanel\domains\diplo.me\include.php';//file with coonection to RedBean
   include_once 'E:\servak\OSPanel\domains\diplo.me\helper.php';
?>
<body>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a href='<?php echo("logout.php");?>'>Logout</a>
        </div>
    </div>
</div>
   <div class="container">
      <div class="row">
         <div class="col-md-3 ">
            <div class="list-group ">
               <a href="" class="list-group-item list-group-item-action">Профиль</a>
               <a href="<?php echo("tasks.php"); ?>" class="list-group-item list-group-item-action active">Задания</a>
               <a href="<?php echo("group.php"); ?>" class="list-group-item list-group-item-action">Группа</a>
               <a href="<?php echo("my_stat.php"); ?>" class="list-group-item list-group-item-action">Моя статистика</a>
               <?php 
               if($_SESSION['employee']['roles'] != 'worker'):
               ?>
                <a href="<?php echo("group_stat.php"); ?>" class="list-group-item list-group-item-action">Статистика группы</a>
               <?php endif;?>
                <?php 
               if($_SESSION['employee']['roles'] == 'admin'):
               ?>
               <a href="<?php echo("common_stat.php"); ?>" class="list-group-item list-group-item-action">Общая статистика</a>
               <a href="<?php echo("all_profiles.php"); ?>" class="list-group-item list-group-item-action">Все профили</a>
               <?php endif;?>
            </div>
         </div>
        <div class="col-md-9">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Give Tasks</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text" placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="" rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }

    .bigicon {
        font-size: 35px;
        color: #36A0FF;
    }
</style>