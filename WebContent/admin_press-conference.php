<?php

require "db_rb.php";

require "includes/config.php";

if($_SESSION["auth"] != "YES")
{
  header('Location: /index.php');
  exit();
}


//actions
// including all actions 
 include ( "admin_press-conference_actions.php");

  //action add New
  if(isset($_GET['action']))
    $action = $_GET['action'];
  else
    $action = "";
// deleting an existing article
  if ($action == "delete"){
    article_delete($_GET['id']);
  }

  // add a NEW press-conference
 if( isset($_POST['do_submit']) )
              {
                        $errors = array();

                        if( trim($_POST['title']) == '')
                        {
                          $errors[] = 'Будь-ласка, введіть назву Пресс-конференції!';
                        }
                        

              
                      if( trim($_POST['text']) == '')
                        {
                          $errors[] = 'Будь-ласка, введіть Текст Пресс-конференції!';
                        }

                        if( trim($_POST['video']) == '')
                        {
                          $errors[] = 'Будь-ласка, введіть URL-посилання відео-файла Пресс-конференції!';
                        }
                        

                      if( $_FILES['image'] == '')
                      {
                        $errors[] = 'Будь-ласка, оберіть фото для Пресс-конференції!';
                      }

                    if( empty($errors) )
                          {
                             $articles = R::dispense( 'articles' );
                             $articles->title = $_POST['title'];
                            
                             // $articles->image = $_POST['image'];


                                if ($_FILES['image']){
                            // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image']['name'];
                                  $size = $_FILES['image']['size'];
                                  $type = $_FILES['image']['type'];
                                  $tmp = $_FILES['image']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image = $name;
                                        } 
                                }

                                if ($_FILES['image1']){
                              // uploading an image1 to database and to uploads folder                     
                             
                                  $name = $_FILES['image1']['name'];
                                  $size = $_FILES['image1']['size'];
                                  $type = $_FILES['image1']['type'];
                                  $tmp = $_FILES['image1']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image1 = $name;
                                        }  
                                  }

                                if ($_FILES['image2']){
                              // uploading an image2 to database and to uploads folder                     
                             
                                  $name = $_FILES['image2']['name'];
                                  $size = $_FILES['image2']['size'];
                                  $type = $_FILES['image2']['type'];
                                  $tmp = $_FILES['image2']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image2 = $name;
                                        }  
                                  }

                                if ($_FILES['image3']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image3']['name'];
                                  $size = $_FILES['image3']['size'];
                                  $type = $_FILES['image3']['type'];
                                  $tmp = $_FILES['image3']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image3 = $name;
                                        }   
                                  }


                                if ($_FILES['image4']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image4']['name'];
                                  $size = $_FILES['image4']['size'];
                                  $type = $_FILES['image4']['type'];
                                  $tmp = $_FILES['image4']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image4 = $name;
                                        } 
                                  }

                                if ($_FILES['image5']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image5']['name'];
                                  $size = $_FILES['image5']['size'];
                                  $type = $_FILES['image5']['type'];
                                  $tmp = $_FILES['image5']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image5 = $name;
                                        }   
                                  }

                                if ($_FILES['image6']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image6']['name'];
                                  $size = $_FILES['image6']['size'];
                                  $type = $_FILES['image6']['type'];
                                  $tmp = $_FILES['image6']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image6 = $name;
                                        }  
                                  }

                                if ($_FILES['image7']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image7']['name'];
                                  $size = $_FILES['image7']['size'];
                                  $type = $_FILES['image7']['type'];
                                  $tmp = $_FILES['image7']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image7 = $name;
                                        }
                                  }

                                if ($_FILES['image8']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image8']['name'];
                                  $size = $_FILES['image8']['size'];
                                  $type = $_FILES['image8']['type'];
                                  $tmp = $_FILES['image8']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image8 = $name;
                                        }  
                                  }

                                if ($_FILES['image9']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image9']['name'];
                                  $size = $_FILES['image9']['size'];
                                  $type = $_FILES['image9']['type'];
                                  $tmp = $_FILES['image9']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image9 = $name;
                                        }
                                  }

                                if ($_FILES['image10']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image10']['name'];
                                  $size = $_FILES['image10']['size'];
                                  $type = $_FILES['image10']['type'];
                                  $tmp = $_FILES['image10']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image10 = $name;
                                        }    
                                  }

                             $articles->video = $_POST['video'];
                             $articles->text = $_POST['text'];
                             $articles->categorie_id = 10;
                             R::store($articles);
 ?>
                              <script type="text/javascript"> 
                                alert ( " УРА!!! Ви щойно додали Пресс-конференцію. Відео успішно вбудовано в Html-сторінку. Фото також успішно завантажено у каталог та в базу данних! Щиро дякуємо Вам!" );
                             </script> 
 <?php
                          }else
                            {
                            // show first error from array errors;
                            echo "<br><br>" . '<div style="color: #3ca1e1;">' . array_shift($errors) . '</div><hr>';
                            }
              }
   



// EDIT an existing Press-conference

           if( isset($_POST['do_edit']) )
                    {

                               
                               // $last_edited_id = R::getCell( 'SELECT news_id FROM edited DESC LIMIT 1' );
                      $last_edited_id = R::findLast('edited');
                          // $last_edited = mysqli_query($connection, "SELECT @last_id := MAX(id) FROM edited;");
                          // $last_edited_id = mysqli_fetch_assoc($last_edited);
                          $news_id_edited = $last_edited_id['news_id'];
                          // var_dump($last_edited_id);
                                // $last_edited_id_array = R::findAll( 'edited' , ' ORDER BY id DESC LIMIT 1 ' );
                                // $last_edited_id = $last_edited_id_array['news_id'];
                              $errors = array();

                              if( trim($_POST['title']) == '')
                              {
                                $errors[] = 'Будь-ласка, введіть назву Пресс-конференції!';
                              }
                              

                    
                            if( trim($_POST['text']) == '')
                              {
                                $errors[] = 'Будь-ласка, введіть Текст Пресс-конференції!';
                              }


                              if( trim($_POST['video']) == '')
                              {
                                $errors[] = 'Будь-ласка, введіть URL-посилання на відео Пресс-конференції!';
                              }


                              
                            if( empty($errors) )
                                  {
                                    
                                 
                                     $articles_edit = R::load('articles', $news_id_edited );
                                     $articles_edit->title = $_POST['title'];


                                if ($_FILES['image']){
                            // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image']['name'];
                                  $size = $_FILES['image']['size'];
                                  $type = $_FILES['image']['type'];
                                  $tmp = $_FILES['image']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image = $name;
                                        } 
                                }

                                if ($_FILES['image1']){
                              // uploading an image1 to database and to uploads folder                     
                             
                                  $name = $_FILES['image1']['name'];
                                  $size = $_FILES['image1']['size'];
                                  $type = $_FILES['image1']['type'];
                                  $tmp = $_FILES['image1']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image1 = $name;
                                        }   
                                  }

                                if ($_FILES['image2']){
                              // uploading an image2 to database and to uploads folder                     
                             
                                  $name = $_FILES['image2']['name'];
                                  $size = $_FILES['image2']['size'];
                                  $type = $_FILES['image2']['type'];
                                  $tmp = $_FILES['image2']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image2 = $name;
                                        }   
                                  }

                                if ($_FILES['image3']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image3']['name'];
                                  $size = $_FILES['image3']['size'];
                                  $type = $_FILES['image3']['type'];
                                  $tmp = $_FILES['image3']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image3 = $name;
                                        }  
                                  }


                                if ($_FILES['image4']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image4']['name'];
                                  $size = $_FILES['image4']['size'];
                                  $type = $_FILES['image4']['type'];
                                  $tmp = $_FILES['image4']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image4 = $name;
                                        }   
                                  }

                                if ($_FILES['image5']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image5']['name'];
                                  $size = $_FILES['image5']['size'];
                                  $type = $_FILES['image5']['type'];
                                  $tmp = $_FILES['image5']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image5 = $name;
                                        }  
                                  }

                                if ($_FILES['image6']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image6']['name'];
                                  $size = $_FILES['image6']['size'];
                                  $type = $_FILES['image6']['type'];
                                  $tmp = $_FILES['image6']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image6 = $name;
                                        }
                                  }

                                if ($_FILES['image7']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image7']['name'];
                                  $size = $_FILES['image7']['size'];
                                  $type = $_FILES['image7']['type'];
                                  $tmp = $_FILES['image7']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image7 = $name;
                                        } 
                                  }

                                if ($_FILES['image8']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image8']['name'];
                                  $size = $_FILES['image8']['size'];
                                  $type = $_FILES['image8']['type'];
                                  $tmp = $_FILES['image8']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image8 = $name;
                                        }     
                                  }

                                if ($_FILES['image9']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image9']['name'];
                                  $size = $_FILES['image9']['size'];
                                  $type = $_FILES['image9']['type'];
                                  $tmp = $_FILES['image9']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image9 = $name;
                                        } 
                                  }

                                if ($_FILES['image10']){
                              // uploading an image to database and to uploads folder                     
                             
                                  $name = $_FILES['image10']['name'];
                                  $size = $_FILES['image10']['size'];
                                  $type = $_FILES['image10']['type'];
                                  $tmp = $_FILES['image10']['tmp_name'];
                                  $images = 'images/'.$name;
                                  $upload = move_uploaded_file($tmp, $images);

                                  if($upload){
                                    $articles->image10 = $name;
                                        }
                                  }

                                     $articles_edit->text = $_POST['text'];
                                     $articles_edit->video = $_POST['video'];
                                     $articles_edit->categorie_id = 10;
                                     R::store( $articles_edit );
                           ?>
                                      <script type="text/javascript"> 
                                        alert ( " УРА!!! Ви щойно змінили існуючу Пресс-конференцію.Щиро дякуємо Вам!" );
                                     </script> 

                           <?php

                                  }else
                                    {
                                    // show first error from array errors;
                                    echo "<br><br>" . '<div style="color: #3ca1e1;">' . array_shift($errors) . '</div><hr>';
                                    }
                      }
                      ?>
<!-- edit Modul -->

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
    <!-- add this link for correct cdn with bootstrap - using it in upload image form -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    
      
      
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
            <li class="active"><a href="admin_press-conference.php">Пресс-конференції</a></li>
            <li><a href="admin_topics.php">Статті</a></li>
            <li><a href="admin_documents.php">Документи</a></li>
            <li><a href="news_to_emails.php">Розсилка</a></li>
            <li><a href="change_admin_password.php">Адміни</a></li>
            <li><a href="admin_comments.php">Коментарі</a></li>
            <li><a href="admin_managers.php">Менеджери</a></li>
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

   <!--  <section id="breadcrumb">
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
                    <h2><span class="glyphicon glyphicon-film" aria-hidden="true"></span><?php echo $press_conference_count = R::count ( 'articles', "categorie_id = 10"  ); ?></h2>
                    <h4>Конференцій</h4>
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
 // editing an existing article
  if ($action == "edit")
        {
                // finding article via id
                   $articles  = R::findOne( 'articles', ' id = ? ', [ $_GET['id'] ] );

                   $edited = R::dispense( 'edited' );
                   $edited->news_id = $_GET['id'];
                   R::store( $edited );
                ?>

                <!--  edit form  -->
              <form action="admin_press-conference.php" method="POST" enctype="multipart/form-data">
              <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                <h4 class="modal-title" id="myModalLabel">Редагувати Пресс-конференцію</h4>
              </div>
              <div class="modal-body">
                
                    <div class="form-group">
                      <label>Заголовок Пресс-конференції</label>
                      <input type="text" class="form-control" name="title" value="<?php echo @$articles['title']; ?>">
                    </div>

                    <div class="form-group">
                      <label>URL-посилання на YouTube з відео-конференцією</label>
                      <input type="text" class="form-control" name="video" value="<?php echo @$articles['video']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="file">Завантажити фото</label>
                      <input type="file" id="file" name="image">
                      <p class="help-block">Будь-ласка, попередньо підготуйте картинку - зробіть її квадратною і у розмірі не більше 1000х1000 пікселів!</p>
                    </div>
                  
                    <p> <br> </p>

                    <div class="form-group">
                      <label>Опис Пресс-конференції</label>
                      <textarea rows="20" class="form-control" name="text"><?php echo @$articles["text"]; ?></textarea>
                    </div>

              </div>
              <div class="modal-footer">
                <a type="button" class="btn btn-default" href = "http://iroks.com.ua/admin_press-conference.php">Закрити</a>
                <button type="submit" class="btn btn-primary" name="do_edit">Зберегти зміни!</button>
              </div>
              </form>

          <?php
          
  }
?>

            <!-- Latest Users -->
               <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Всі Конференції</h3>
                </div>
                <div class="panel-body">
                    
                    <!-- Table of Users BEGINNING -->
                      <table class="table table-striped table-hover">
                        <tr>
                          <th>Дата</th>
                          <th>Назва Конференції</th>
                          <th>Редагування</th>
                          <th>Видалення</th>
                        </tr>


          <?php
            $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE categorie_id = 10 ORDER BY pubdate DESC;");
            while( $art = mysqli_fetch_assoc($articles) )
            {
          ?>


                        <tr>
                          <td><?php echo $art['pubdate']; ?></td>
                          <td><?php echo $art['title']; ?></td>
                          <td><a href = "admin_press-conference.php?action=edit&id=<?php echo $art['id']; ?>" class="btn btn-primary">Редагувати</a></td>
                          <td><a href = "admin_press-conference.php?action=delete&id=<?php echo $art['id']; ?>" class="btn btn-danger">Видалити</a></td>
                        </tr>
                        
                    

                    <!-- Table of Users END -->




            <?php 
          }
            ?>
              </table>
                </div>
              </div>

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

         <script>
            CKEDITOR.replace( 'text3' );
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