<?php
require "includes/config.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Пресс-конференції</title>

  <!-- Bootstrap + Font-Awesome + Style.css -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">
  <link href="css/style1.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">


  <link rel="shortcut icon" href="../favicon.ico"> 
  <!-- <link rel="stylesheet" type="text/css" href="css/demo.css" /> -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />




  <script async type="text/javascript" src="js/modernizr.custom.28468.js"></script>

  <!-- BEGIN Zooming of Pictures -->
  <!-- Add jQuery library -->
  <script async type="text/javascript" src="lib/jquery-1.10.2.min.js"></script>

  <!-- Add mousewheel plugin (this is optional) -->
  <script async type="text/javascript" src="js/jquery.mousewheel.pack.js?v=3.1.3"></script>

  <!-- Add fancyBox main JS and CSS files -->
  <script async type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.5"></script>
  <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />

  <!-- Add Button helper (this is optional) -->
  <link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
  <script async type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

  <!-- Add Thumbnail helper (this is optional) -->
  <link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
  <script async type="text/javascript" src="source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

  <!-- Add Media helper (this is optional) -->
  <script async type="text/javascript" src="source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
  <!-- END Zooming of Pictures -->


  <link href='http://fonts.googleapis.com/css?family=Economica:700,400italic' rel='stylesheet' type='text/css'>
  <noscript>
    <link rel="stylesheet" type="text/css" href="css/nojs.css" />
  </noscript>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>

      <!-- Header -->
      <?php include "includes/header_press-conference.php"; ?>           
      <!-- Header END-->

      <section class="parallax ">
        <div class="parallax-inner ">
          <div class="container-fluid">
            <div class="row light">
              <br> 
              <br> 
              <br>



              <?php
              $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE id = " . (int) $_GET['id']);

              if( mysqli_num_rows($article) <= 0 )
              {
                ?>

                <!-- NO_CONTENT FOUND --> 
                <div class="container" style="margin-top: 0px;">
                  <div class="row">
                    <br><br><br>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
                      <!-- Image of No_content -->
                      <img src="images/no_content.jpg" class="img-responsive img-rounded" alt="Responsive image" style="max-height: 500px;">
                      <!-- Image of No_content END -->
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                  </div>
                </div>   
                <br><br>
                <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 text-center">

                  <!--  Main TEXT of the No_content -->
                  <p> 
                    <h1>Вибачте, даної пресс-конференції у розділі "ПРЕСС-КОНФЕРЕНЦІЇ" не знайдено. Гадаємо, вона загубилася десь у Всесвітньому просторі...</h1>
                    <br>

                    <a href="http://iroks.com.ua/press-conference.php" class="btn btn-primary">Всі Пресс-конференції</a>
                  </p>
                  <!--  Main TEXT of the No_content END -->

                </div>
                <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 text-center"></div>

                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br>

              </div>
            </div>           
          </div>
        </section>  
        <!-- NO_CONTENT FOUND  END--> 


        <?php
      }else{
        $art = mysqli_fetch_assoc($article);
        mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE id = " . (int) $art['id']);
        ?>

        <!-- Content of the NEWs_article -->
        <br>
        <br>
        <br>
        <div class="container" style="margin-top: 0px;">
          <div class="row">
            <div class="col-md-2 col-lg-2 text-center"></div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">
              <!-- Image of News_article -->
              <img id="img-news" src="images/<?php echo $art['image']; ?>" class="img-responsive img-rounded" alt="Responsive image" style = "max-height: 450px;">

            </div>
            <div class="col-md-2 col-lg-2 text-center"></div>

          </div>
        </div>  
        <!-- Image of News_article END -->  
        <br>
        <br>
        <div class=" col-md-2 col-lg-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

          <!--  Main TEXT of the News_Articleb(topic) -->
          <hr>
          <p class="text-left" style="color:#3ca1e1; margin-left: 10px;">Конференція має: <?php echo $art['views']; ?> переглядів
            <a id="btn-news" href="http://iroks.com.ua/press-conference.php" class="btn btn-primary text-right">Всі Пресс-конференції</a>
          </p>
          <hr>

          <div class="row text-center">


<iframe width="860" height="615" src="https://www.youtube.com/embed/<?php echo $art['video']; ?>" frameborder="0" allowfullscreen></iframe>

            <!-- <video width="600" height="500" controls autoplay>

                <source src="<?php // echo $art['video']?>" type='video/mp4'>
                  <source src="video/<?php // echo $art['video']?>" type='video/webm; codecs="vp8, vorbis"'>
                    Тег video не поддерживается вашим браузером. <a href="video/<?php // echo $art['video']?>">Скачайте видео</a>.
                  </video> -->
                </div>
                <br>
                <p class="text-justify column-right">
                  <strong id="pubdate"><?php echo $art['pubdate']; ?> <br> <?php echo $art['title']; ?> </strong> 
                  <br>
                  <?php echo $art['text']; ?>
                  <br>
                </p>
                <!--  Main TEXT of the News_Article(topic) END-->
              </div>
              <div class="col-md-2 col-lg-2  text-center"></div>



              <!--  Block of Images goes here............................................... -->
              <div class="container">
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                 <hr>
                 <!-- View the images which been added to the News Topic -->


                 <!--  Image 1........................................ -->
                 <?php 
                 if ($art['image1'])
                 {
                  ?>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 img-news-padding">
                    <div class="thumbnail">
                      <a class="fancybox" rel="group" href="images/<?php echo $art['image1']; ?>" title="Додаток 1"><img src="images/<?php echo $art['image1']; ?>" style="width: 300px;" alt=""></a>
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <p style="display: none;"></p>
                  <?php
                }

                          // Image 2......................................
                if ($art['image2'])
                {
                  ?>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 img-news-padding">
                    <div class="thumbnail">
                      <a class="fancybox" rel="group" href="images/<?php echo $art['image2']; ?>" title="Додаток 2"><img src="images/<?php echo $art['image2']; ?>" style="width: 300px;" alt=""></a>
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <p style="display: none;"></p>
                  <?php
                }



                          // Image 3......................................
                if ($art['image3'])
                {
                  ?>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 img-news-padding">
                    <div class="thumbnail">
                      <a class="fancybox" rel="group" href="images/<?php echo $art['image3']; ?>" title="Додаток 3"><img src="images/<?php echo $art['image3']; ?>" style="width: 300px;" alt=""></a>
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <p style="display: none;"></p>
                  <?php
                }


                          // Image 4......................................
                if ($art['image4'])
                {
                  ?>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 img-news-padding">
                    <div class="thumbnail">
                      <a class="fancybox" rel="group" href="images/<?php echo $art['image4']; ?>" title="Додаток 4"><img src="images/<?php echo $art['image4']; ?>" style="width: 300px;" alt=""></a>
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <p style="display: none;"></p>
                  <?php
                }


                          // Image 5......................................
                if ($art['image5'])
                {
                  ?>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 img-news-padding">
                    <div class="thumbnail">
                      <a class="fancybox" rel="group" href="images/<?php echo $art['image5']; ?>" title="Додаток 5"><img src="images/<?php echo $art['image5']; ?>" style="width: 300px;" alt=""></a>
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <p style="display: none;"></p>
                  <?php
                }



                          // Image 6......................................
                if ($art['image6'])
                {
                  ?>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 img-news-padding">
                    <div class="thumbnail">
                      <a class="fancybox" rel="group" href="images/<?php echo $art['image6']; ?>" title="Додаток 6"><img src="images/<?php echo $art['image6']; ?>" style="width: 300px;" alt=""></a>
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <p style="display: none;"></p>
                  <?php
                }



                          // Image 7......................................
                if ($art['image7'])
                {
                  ?>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 img-news-padding">
                    <div class="thumbnail">
                      <a class="fancybox" rel="group" href="images/<?php echo $art['image7']; ?>" title="Додаток 7"><img src="images/<?php echo $art['image7']; ?>" style="width: 300px;" alt=""></a>
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <p style="display: none;"></p>
                  <?php
                }


                          // Image 8......................................
                if ($art['image8'])
                {
                  ?>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 img-news-padding">
                    <div class="thumbnail">
                      <a class="fancybox" rel="group" href="images/<?php echo $art['image8']; ?>" title="Додаток 8"><img src="images/<?php echo $art['image8']; ?>" style="width: 300px;" alt=""></a>
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <p style="display: none;"></p>
                  <?php
                }


                          // Image 9......................................
                if ($art['image9'])
                {
                  ?>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 img-news-padding">
                    <div class="thumbnail">
                      <a class="fancybox" rel="group" href="images/<?php echo $art['image9']; ?>" title="Додаток 9"><img src="images/<?php echo $art['image9']; ?>" style="width: 300px;" alt=""></a>
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <p style="display: none;"></p>
                  <?php
                }



                          // Image 10......................................
                if ($art['image10'])
                {
                  ?>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 img-news-padding">
                    <div class="thumbnail">
                      <a class="fancybox" rel="group" href="images/<?php echo $art['image10']; ?>" title="Додаток 10"><img src="images/<?php echo $art['image10']; ?>" style="width: 300px;" alt=""></a>
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <p style="display: none;"></p>
                  <?php
                }
                ?>
              </div>
              <div class="col-md-2 col-lg-2"></div>
            </div>


            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br>

          </div>
        </div>       
      </div>
    </section>  

    <!-- Content of the NEWs_article END -->

    <?php
  }
  ?>







  <!--footer-->
  <?php include "includes/footer.php"; ?>
  <!-- footer -->   

  
  <!-- Модальне вікно -->

  <div class="modal fade" id="modal-1">
    <div class="modal-dialog modal-sm" style="margin-top: 250px;">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal">&times</button>
          <h4 class="modal-title" style="color: grey;">Підписатись на новини</h4>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" placeholder="Введіть Ваш e-mail">
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" data-dismiss="modal">Підписатись!</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Модальне вікно -->
  
  
  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>

  <!-- <script type="text/javascript" src="js/jquery.cslider.js"></script> -->

  <!-- Включити можливість відображання підказок над елементами -->
  <script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
            
        
             $('.fancybox').fancybox();
        });
    </script>
</body>
</html>
