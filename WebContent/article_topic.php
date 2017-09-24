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
    <title> Статті</title>

    <!-- Bootstrap + Font-Awesome + Style.css -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    
    	<link href="css/style.css" rel="stylesheet">
    	
    	
    	<link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
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
<?php include "includes/header_topics.php"; ?>           
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
                          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center"></div>
                          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center">
                          <!-- Image of No_content -->
                             <img src="images/no_content.jpg" class="img-responsive img-rounded" alt="Responsive image">
                          <!-- Image of No_content END -->
                          </div>
                          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center"></div>
                    </div>
                  </div>   

                  <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                  <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">

                        <!--  Main TEXT of the No_content -->
                             <p class="text-justify column-right"> 
                              <h1>Вибачте, даної статті у розділі "Cтатті" не знайдено.</h1>
                               <br>
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
           }else
           {
            $art = mysqli_fetch_assoc($article);
            mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE id = " . (int) $art['id']);
              ?>

 <!-- Content of the NEWs_article -->
<br><br><br>
                    <div class="container" style="margin-top: 0px;">
                    <div class="row">
                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center"></div>
                      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center">
                      <!-- Image of News_article -->
                         <img id="img-news" src="images/<?php echo $art['image']; ?>" class="img-responsive img-rounded" alt="Responsive image" style = "max-height: 450px;">
                      
                      </div>
                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center"></div>

                      </div>
                    </div>  
                    <br><br>
                    
                     <!-- Image of News_article END -->  
                    <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                    <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">

                    <!--  Main TEXT of the News_Articleb(topic) -->
                    <hr>
                    <p class="text-left" style="color:#3ca1e1; margin-left: 10px;">Cтаття має: <?php echo $art['views']; ?> переглядів
                     <a id="btn-news" href="http://iroks.com.ua/Topics.php" class="btn btn-primary text-right">Всі статті</a>
                      
                    </p>
                    <hr>

                         <p class="text-justify column-right">
                          <strong id="pubdate"><?php echo $art['pubdate']; ?> <br> <?php echo $art['title']; ?> </strong> <br>
                          <?php echo $art['text']; ?>
                           <br>
                    </p>
                    <!--  Main TEXT of the News_Articleb(topic) -->
                    </div>

                    <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2  text-center">
                     
                      
                     
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    
    	<script type="text/javascript" src="js/jquery.cslider.js"></script>
    	
    <!-- Включити можливість відображання підказок над елементами -->
    <script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
            
            $('#da-slider').cslider({

            	current		: 1, 	
            	// index of current slide
            	
            	bgincrement	: 50,	
            	// increment the background position 
            	// (parallax effect) when sliding
            	
            	autoplay	: true,
            	// slideshow on / off
            	
            	interval	: 10000  
            	// time between transitions
            	
            });
        });
    </script>
  </body>
</html>
