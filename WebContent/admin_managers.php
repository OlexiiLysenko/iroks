<?php

require "cookies.php";
require "db_rb.php";

require "includes/config.php";

if($_SESSION["auth"] != "YES")
{
  header('Location: /index.php');
  exit();
}


// counter online

  $cookie_key = 'online-cache';
  $ip = $_SERVER['REMOTE_ADDR'];
  $online = R::findOne('online', 'ip = ?', array($ip));
  if( $online )
  {
    $do_update = false;
    //Update
    if( CookieManager::stored($cookie_key) )
    {
      //via cookies;
      $c = (array) @json_decode(CookieManager::read($cookie_key), true);
      if( $c )
      {
        if( $c['lastvisit'] < (time() - (60*5)) )
        {
          $do_update = true;
        }
      }else
      {
      // without cookies;
      $do_update = true;
      }
    }else
    {
      // without cookies;
      $do_update = true;
    }
    // Update if required;
    if ( $do_update )
    {
      // exit('Updating Data');
      $time = time();
      $online->lastvisit = $time;
      R::store($online);
      CookieManager::store($cookie_key, json_encode(array('id' => $online->id, 'lastvisit' => $time)));
    }

  } else {
    //Create
    $time = time();
    $online = R::dispense('online');
    $online->lastvisit = $time;
    $online->ip = $ip;
    R::store($online);
    CookieManager::store($cookie_key, json_encode(array('id' => $online->id, 'lastvisit' => $time)));
  }

// show online visitors for last one hour;
  $online_count = R::count('online', "lastvisit > " . (time() - (3600)) );




//actions
// including all actions 
 include ( "admin_managers_actions.php");

  //action add New
  if(isset($_GET['action']))
    $action = $_GET['action'];
  else
    $action = "";
// deleting an existing article
  if ($action == "delete"){
    article_delete($_GET['id']);
  }
  // if ($action == "edit"){
  //   article_edit($_GET['id']);
    
  // }



// Create a New Manager

  if( isset($_POST['do_create_manager']) )
  {
    $data = $_POST;
                        

    //registration;
    $errors = array();
    if( trim($data['manager_name']) == '')
    {
      $errors[] = 'Введіть Ім`я менеджера!';
    }
    if( trim($data['manager_phone']) == '')
    {
      $errors[] = 'Введіть Телефон менеджера!';
    }
    if( $data['manager_priority'] == '')
    {
      $errors[] = 'Введіть Пріорітет менеджера (число)!';
    }
    

    if ( empty($errors) )
    {
      // it`s ok - let`s register this user
      $user = R::dispense('managers');
      $user->manager_name = $data['manager_name'];
      $user->manager_phone = $data['manager_phone'];
      $user->manager_priority = $data['manager_priority'];
      R::store($user); 
?>
      <script type="text/javascript">
        alert ( "Ура!!! Ви успішно зареєстрували нового Менеджера по продажах!" );
      </script>
<?php
     
    }else
    {
      echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
    }
  }

// END of Create a New Manager




// editing Info of existing Manager
       
  if( isset($_POST['do_changes']) )
  {
                          $data = $_POST;
                          //finging last edited id
                          $last_edited_id = R::findLast('edited');
                          $news_id_edited = $last_edited_id['news_id'];

    //registration;
    $errors = array();
    if( trim($data['manager_name']) == '')
    {
      $errors[] = 'Введіть Ім`я менеджера!';
    }
    if( trim($data['manager_phone']) == '')
    {
      $errors[] = 'Введіть Телефон менеджера!';
    }
    if( $data['manager_priority'] == '')
    {
      $errors[] = 'Введіть Пріорітет менеджера (число)!';
    }
    

    if ( empty($errors) )
    {
      // it`s ok - let`s change this Manager
      $user = R::load('managers', $news_id_edited );
     
      $user->manager_name = $data['manager_name'];
      $user->manager_phone = $data['manager_phone'];
      $user->manager_priority = $data['manager_priority'];
      R::store($user); 
?>
      <script type="text/javascript">
        alert ( "Ура!!! Ви успішно змінили дані існуючого Менеджера по продажах!" );
      </script>
<?php
      
    }else
    {
      echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
    }
  }
?>
<!-- End of Editing Info of an existing Manager -->





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Адмін Панель | Керування сайтом</title>

  
    <!-- Bootstrap + Font-Awesome + Style.css -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/style-admin.css" rel="stylesheet">
    
      
      
      <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style_admin.css" />
     

    <script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
    <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Відкрити навігацію</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ПрАТ "ІРОКС"</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="admin_panel.php">Підписані</a></li>
            <li><a href="admin_news.php">Новини</a></li>
            <li><a href="admin_press-conference.php">Пресс-конференції</a></li>
            <li><a href="admin_topics.php">Статті</a></li>
            <li><a href="admin_documents.php">Документи</a></li>
            <li><a href="news_to_emails.php">Розсилка</a></li>
            <li><a href="change_admin_password.php">Адміни</a></li>
            <li><a href="admin_comments.php">Коментарі</a></li>
            <li class="active"><a href="admin_managers.php">Менеджери</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Вітаю,<?php echo $_SESSION['logged_user']->login; ?>!</a></li>
            <li><a href="logout.php">Вийти</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Панель адміністратора <small>Керуйте своїм сайтом</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Створити контент
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Додати Новину</a></li>
                <li><a type="button" data-toggle="modal" data-target="#addTopic">Додати Статтю</a></li>
                <li><a type="button" data-toggle="modal" data-target="#addDocument">Додати Документ</a></li>
                <li><a type="button" data-toggle="modal" data-target="#addComment">Коментар Предст.забуд.</a></li>
                 <li><a type="button" data-toggle="modal" data-target="#addPressConference">Додати Пресс-конференцію</a></li>
                <!-- <li><a href="#">Розсилка</a></li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Панель керування</li>
        </ol>
      </div>
    </section> -->
<br><br>
    <section id="main">
      <div class="container">
        <div class="row">
         

          <div class="col-md-12 col-lg-12">

            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">  Огляд веб-сайту</h3>
              </div>
              <div class="panel-body">

                <div class="col-md-2">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $subscribers_count = R::count ( 'subscribers' ); ?></h2>
                    <h4>Підписались</h4>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $news_count = R::count ( 'articles', "categorie_id = 3" ); ?></h2>
                    <h4>Новин</h4>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><?php echo $topics_count = R::count ( 'articles', "categorie_id = 8" ); ?></h2>
                    <h4>Статей</h4>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?php echo $subscribers_count = R::count ( 'documents' ); ?></h2>
                    <h4>Документів</h4>
                  </div>
                </div>

                 <div class="col-md-2">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list" aria-hidden="true"></span> <?php echo $subscribers_count = R::count ( 'comments' ); ?></h2>
                    <h4>Коментарів</h4>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> <?php echo $online_count; ?></h2>
                    <h4>Онлайн</h4>
                  </div>
                </div>
              </div>
            </div>




<?php
 // editing an existing Manager
  if ($action == "edit")
        {
                // finding Manager via id
                   $data  = R::findOne( 'managers', ' id = ? ', [ $_GET['id'] ] );

                   $edited = R::dispense( 'edited' );
                   $edited->news_id = $_GET['id'];
                   R::store( $edited );
                ?>

 
 <!--  edit form  -->
              <form action="admin_managers.php" method="POST">
              <div class="modal-header">
               
                <h4 class="modal-title" id="myModalLabel">Редагувати дані Менеджера</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">
                      <label>Ім`я Менеджера</label>
                      <input type="text" class="form-control" name="manager_name" value="<?php echo @$data['manager_name']; ?>">
                    </div>

                    <p> <br> </p>

                    <div class="form-group">
                      <label>Телефон Менеджера</label>
                      <input type="text" class="form-control" name="manager_phone" value="<?php echo @$data['manager_phone']; ?>">
                    </div>

                    <div class="form-group">
                      <label>Пріорітет Менеджера</label>
                      <input type="text" class="form-control" name="manager_priority" value="<?php echo @$data['manager_priority']; ?>">
                      <p class="help-block" style="color: red;">Будь-ласка, встановіть пріорітет: менеджер з пріорітетом 1 буде виводитись першим, з пріорітетом 2 - другим по списку і т.д.</p>
                    </div>
              

              </div>
              <div class="modal-footer">
                <a type="button" class="btn btn-default" href = "admin_managers.php">Закрити</a>
                <button type="submit" class="btn btn-info" name="do_changes"><i class="fa fa-paw"></i>Зберегти зміни!</button>
              </div>
              </form>


        <?php 
    }
        ?>




<!-- Form to create Manager -->
      
                <div class="row">
                            <div class="col-md-4">
                              <div class="panel panel-default">
                                <div class="panel-heading main-color-bg">
                                    <h3 class="panel-title text-center">Додати нового Менеджера</h3>
                                </div>
                                <div class="panel-body">
                            

                              <form action="admin_managers.php" method="POST" class="navbar-form navbar-center" style="text-align: center;">
                                
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Ім`я Менеджера" name="manager_name">
                                </div>
                <br><br>
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Телефон Менеджера" name="manager_phone">
                                </div>
                <br><br>
                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Пріорітет Менеджера" name="manager_priority">
                                </div>
                                <br><br>
                                
                                <button type="submit" class="btn btn-info" name="do_create_manager">
                                  
                                    <i class="fa fa-paw"></i> 
                                  
                                   Додати Менеджера!
                                </button>
                              </form>
                            </div>
                          </div>
                         </div>
        <!-- Form to create Admin ENDs -->
        <div class="col-md-8">

          <p>
            <b>Пріорітет Менеджера</b> потрібен для встановлення порядку відображення Менеджерів на сторінках внизу сайту (<b>Footer</b>), а також на сторінці <b>Контакти</b>.
            <br><br>
            Менеджер з пріорітетом рівним <b>1</b> буде відображатись у <b>верхівці списку, на першій позиції</b>. Менеджер з пріорітетом рівним <b>5</b> - <b>наприкінці списку</b>. Таким чином, змінюючи пріорітет Менеджера Ви керуєте порядком відображення номерів телефонів менеджерів на сайті.
          </p>

        </div>

        <div class="col-md-1"></div>
        <div class="col-md-10">
            

            <!-- Latest Users -->
               <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title" style="padding-left: 37px;">Всі Менеджери</h3>
                </div>
                <div class="panel-body">
                    
                    <!-- Table of Users BEGINNING -->
                      <table class="table table-striped table-hover">
                        <tr>
                          <th style="text-align: center;">Пріорітет менеджера</th>
                          <th>Телефон менеджера</th>
                          <th>Ім`я менеджера</th>
                          <th>Редагування</th>
                          <th>Видалення</th>
                        </tr>


          <?php
          
            $managers = mysqli_query($connection, "SELECT * FROM `managers` ORDER BY manager_priority;");
            while( $man = mysqli_fetch_assoc($managers) )
            {
          ?>


                        <tr>
                          <td style="text-align: center;"><?php echo $man['manager_priority']; ?></td>
                          <td><?php echo $man['manager_phone']; ?></td>
                          <td><?php echo $man['manager_name']; ?></td>
                          <td><a href = "admin_managers.php?action=edit&id=<?php echo $man['id']; ?>" class="btn btn-primary">Редагувати</a></td>
                          <td><a href = "admin_managers.php?action=delete&id=<?php echo $man['id']; ?>" class="btn btn-danger">Видалити</a></td>
                        </tr>
                        
                    

                    <!-- Table of Users END -->

            <?php 
          }
            ?>
              </table>
                </div>
              </div>
          <div class="col-md-1"></div>

          </div>
        </div>
      </div>
    </section>

<br><br><br><br>

<!-- Footer -->
<footer id="footer">
  <p>ПрАТ "ІРОКС", &copy; 2017. Всі права захищено.</p>
</footer>
<!-- Footer END -->



    <!-- Modals -->

<!-- Add New Press-conference -->
    <div class="modal fade" id="addPressConference" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


              <form action="admin_press-conference.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Додати Пресс-конференцію</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">
                      <label>Заголовок Конференції</label>
                      <input type="text" class="form-control" placeholder="Назва Пресс-конференції" name="title">
                    </div>

                    <div class="form-group">
                      <label>URL-посилання на YouTube сторінку з відео-конференцією</label>
                      <input type="text" class="form-control" placeholder="https://www.youtube.com/watch?v=СКОПІЙОВАНИЙ_ТЕКСТ" name="video">
                      <p class="help-block" style="color: red;">*УВАГА!!! В це поле потрібно вставити ЛИШЕ останній шматок тексту посилання з YouTube, що йде в адресній строці браузера одразу після знаку "<span style="color: blue;">=</span>", наприклад, з посилання "<span style="color: blue;">https://www.youtube.com/watch?v=<span style="color: green;">W7bMYWLoSxY</span></span>" вставляємо у це поле тільки "<span style="color: green;">W7bMYWLoSxY"</span></p>
                    </div>


                    <div class="form-group">
                      <label for="file">Завантажити лицьове фото</label>
                      <input type="file" id="file" name="image">
                      <p class="help-block">Будь-ласка, попередньо підготуйте картинку - зробіть її квадратною і у розмірі не більше 1000х1000 пікселів!</p>
                    </div>
                    <!-- <button type="submit" class="btn btn-default">Завантажити</button> -->
<p> <br> </p>
                    <div class="form-group">
                      <label>Опис Пресс-конференції</label>
                      <textarea id="text3" rows="20" class="form-control" placeholder="Текст Пресс-конференції" name="text"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="file">Завантажити фото в кінець новини</label>
                      <p class="help-block">Ці фото будуть додані в сам низ новини окремим блоком</p>
                      <input type="file" id="file1" name="image1">
                      <input type="file" id="file2" name="image2">
                      <input type="file" id="file3" name="image3">
                      <input type="file" id="file4" name="image4">
                      <input type="file" id="file5" name="image5">
                      <input type="file" id="file6" name="image6">
                      <input type="file" id="file7" name="image7">
                      <input type="file" id="file8" name="image8">
                      <input type="file" id="file9" name="image9">
                      <input type="file" id="file10" name="image10">
                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                <button type="submit" class="btn btn-primary" name="do_submit">Додати Конференцію на сайт!</button>
              </div>
              </form>

                <p><br></p>
      
    </div>
  </div>
</div>

 <!-- Add News Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


              <form action="admin_news.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Додати Новину</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">
                      <label>Заголовок Новини</label>
                      <input type="text" class="form-control" placeholder="Назва Новини" name="title">
                    </div>


                    <div class="form-group">
                      <label for="file">Завантажити лицьове фото</label>
                      <input type="file" id="file" name="image">
                      <p class="help-block">Будь-ласка, попередньо підготуйте картинку - зробіть її квадратною і у розмірі не більше 1000х1000 пікселів!</p>
                    </div>
                    <!-- <button type="submit" class="btn btn-default">Завантажити</button> -->
<p> <br> </p>
                    <div class="form-group">
                      <label>Тіло Новини</label>
                      <textarea id="text3" rows="20" class="form-control" placeholder="Текст Новини" name="text"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="file">Завантажити фото в кінець новини</label>
                      <p class="help-block">Ці фото будуть додані в сам низ новини окремим блоком</p>
                      <input type="file" id="file1" name="image1">
                      <input type="file" id="file2" name="image2">
                      <input type="file" id="file3" name="image3">
                      <input type="file" id="file4" name="image4">
                      <input type="file" id="file5" name="image5">
                      <input type="file" id="file6" name="image6">
                      <input type="file" id="file7" name="image7">
                      <input type="file" id="file8" name="image8">
                      <input type="file" id="file9" name="image9">
                      <input type="file" id="file10" name="image10">
                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                <button type="submit" class="btn btn-primary" name="do_submit">Додати Новину на сайт!</button>
              </div>
              </form>

                <p><br></p>
              <!-- Thumbnails -->
             <!--  <div class="row">
                <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <img src="..." alt="..." title=" ">
                    <div class="caption">
                      <p><a href="#" class="btn btn-danger" role="button">Видалити</a></p>
                    </div>
                  </div>
                </div>
              </div>
 -->
      
    </div>
  </div>
</div>




    <!-- Add Topic -->
        <div class="modal fade" id="addTopic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


              <form action="admin_topics.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Додати Статтю</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">
                      <label>Заголовок Статті</label>
                      <input type="text" class="form-control" placeholder="Назва Статті" name="title">
                    </div>


                    <div class="form-group">
                      <label for="file">Завантажити фото</label>
                      <input type="file" id="file" name="image">
                      <p class="help-block">Будь-ласка, попередньо підготуйте картинку - зробіть її квадратною і у розмірі не більше 1000х1000 пікселів!</p>
                    </div>
                    <!-- <button type="submit" class="btn btn-default">Завантажити</button> -->
<p> <br> </p>
                    <div class="form-group">
                      <label>Тіло Статті</label>
                      <textarea id="text1" rows="20" class="form-control" placeholder="Текст Статті" name="text"></textarea>
                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                <button type="submit" class="btn btn-primary" name="do_submit_topic">Додати Статтю на сайт!</button>
              </div>
              </form>

                <p><br></p>
          
    </div>
  </div>
</div>



   


   <!-- Add Document -->
        <div class="modal fade" id="addDocument" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


              <form action="admin_documents.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Додати Документ</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">
                      <label>Скорочена назва Документу</label>
                      <input type="text" class="form-control" placeholder="Скорочена назва Документу" name="title">
                      <p class="help-block" style="color:red;">Це саме та назва, яка буде відображена на сайті</p>
                    </div>


                    <div class="form-group">
                      <label for="file">Завантажити Документ</label>
                      <input type="file" id="file" name="document_name">
                      <p class="help-block" style="color:red;">Будь-ласка, попередньо підготуйте назву Документу - замініть ВСІ пробіли на знак "_"!Такий формат назви потрібен для коректної роботи Бази Даних</p>
                    </div>
                    <!-- <button type="submit" class="btn btn-default">Завантажити</button> -->
<p> <br> </p>
                  <div class="form-group">
                      <label for="file">Визначити розділ для публікації Документу</label>
                      <input type="text" class="form-control" placeholder="Введіть відповідну цифру, наприклад: 2" name="document_id">
                      <p class="help-block" style="color:red;">В данне поле потрібно ввести лише одну цифру (наприклад: 5). Перелік значень цифр:<br>2 - вул.Тернопільська,42; <br> 3 - вул. Величковського, 61; <br> 4 - вул. Величковського, 64; <br> 5 - вул. Антонича, 5; <br> 6 - вул. Антонича, 8; <br> 7 - вул. Шевченка, 418; <br> 8 - вул. Шевченка, 418а; <br> 9 - Повідомлення про збори; <br> 10 - Документи загальних зборів; <br> 11 - Особлива інформація; <br> 12 -  Річні звіти;<br> 13 -  вул. О.Бальзака, 25;<br> 14 -  вул. Величковського, 62;</p>
                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                <button type="submit" class="btn btn-primary" name="do_submit_document">Додати Документ на сайт!</button>
              </div>
              </form>

                <p><br></p>
          
    </div>
  </div>
</div>




<!-- Add Comment -->
    <div class="modal fade" id="addComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


              <form action="admin_comments.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Додати Коментар Представника забудовника</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">
                      <!-- <label>Заголовок Новини</label> -->
                      <input type="text" class="form-control" name="uid" value="Представник забудовника">
                    </div>


                  <div class="form-group">
                      <label for="file">Завантажити фото</label>
                      <input type="file" id="file" name="image">
                      <input type="file" id="file2" name="image2">
                      <input type="file" id="file3" name="image3">
                      <input type="file" id="file4" name="image4">
                      <!-- <p class="help-block">Будь-ласка, попередньо підготуйте картинку - зробіть її квадратною і у розмірі не більше 1000х1000 пікселів!</p> -->
                    </div>
                    <!-- <button type="submit" class="btn btn-default">Завантажити</button> -->
<p> <br> </p>



                    <div class="form-group">
                      <!-- <label>Тіло Новини</label> -->
                      <textarea id="text2" rows="10" class="form-control text-justify" placeholder="Текст Коментаря" name="message"></textarea>
                    </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                <button type="submit" class="btn btn-primary" name="do_submit_comment">Додати Коментар на сайт!</button>
              </div>
              </form>

                <p><br></p>
         
      
    </div>
  </div>
</div>



<!-- JavaScripts -->
        <script>
            CKEDITOR.replace( 'text' );
        </script>

         <script>
            CKEDITOR.replace( 'text1' );
         </script>

         <script>
            CKEDITOR.replace( 'text2' );
         </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- add this script for correct cdn with bootstrap - using it in upload image form -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    
  </body>
</html>