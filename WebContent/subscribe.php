<?php
require "db_rb.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Підписка на новини</title>

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


     <!-- navigation panel and Logotype -->
<div class="container">
 <div class="row">
 	<div class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container-fluid" style="background-color: #163E59; min-height: 60px;">
          <div class="navbar-header" >
          
          	  <!-- Logotype -->
		        <a class="navbar-brand" href="#"><img id="irokslogo" src="images/Santa-Iroks-House-8.png" alt="Blockchain"></a>  
		        
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
	            <span class="sr-only">Відкрити навігацію</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
          
		      
		      
		 </div>
            <div class="collapse navbar-collapse" id="responsive-menu" style="margin-top:30px;">
              <ul class="nav navbar-nav">
              
                <li><a id="nav1" href="http://iroks.com.ua/index.php">ПРО НАС</a></li>
                <li><a id="nav3" href="http://iroks.com.ua/Rooms2.php">КВАРТИРИ</a></li>
                <li><a id="nav2" href="http://iroks.com.ua/News.php">НОВИНИ</a></li>
                <li><a id="nav4" href="http://iroks.com.ua/Documents.php">ДОКУМЕНТИ</a></li>
                <li><a id="nav5" href="http://iroks.com.ua/Feedback.php">ВІДГУКИ</a></li>
                <li><a id="nav7" href="http://iroks.com.ua/Credits.php">РОЗТЕРМІНУВАННЯ</a></li>
                <li><a id="nav6" href="http://iroks.com.ua/Contacts.php">КОНТАКТИ</a></li>
                <li><a id="nav8" href="http://iroks.com.ua/Topics.php">СТАТТІ</a></li>
                <li><a id="nav8" href="http://iroks.com.ua/Shareholders.php">АКЦІОНЕРАМ</a></li>
                <li><a id="nav8" href="http://iroks.com.ua/press-conference.php">ПРЕСС-КОНФЕРЕНЦІЇ</a></li>
              </ul>
     		</div> 
     		 
			 
		</div>
   	</div>
  </div>
 </div>
 
      <section class="parallax">
 		<div class="parallax-inner">
      
      
 <!-- Опускаємо картинку у контейнері вниз, щоб не перекривалася навігаційною панелькою -->
 
       <div class="container-fluid">
    
    <div class="row light">
    <br>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
 
 <div class="container">
      <div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-center">
      <br> <br> <br> <br>
        <img src="images/businessteam.jpg" class="img-responsive img-rounded" alt="Responsive image">
       </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
      </div>
 </div> 





              <?php
            
              if( isset($_POST['do_subscribe']) )
              {
                        $errors = array();

                        if( trim($_POST['login']) == '')
                        {
                          $errors[] = 'Будь-ласка, введіть Логін!';
                        }
                        

                $user_l = R::findOne( 'subscribers', 'login = ?', array($_POST['login']) );
                if( $user_l  )
                  {
                    // login exists;
                    $errors[] = 'Користувач з таким логіном вже підписаний, спробуйте інший логін!';
                  }else
                    { 
                      if( trim($_POST['e-mail']) == '')
                        {
                          $errors[] = 'Будь-ласка, введіть корректний Email!';
                        }
                      $user_e = R::findOne( 'subscribers', 'email = ?', array($_POST['e-mail']) );
                      if( $user_e  )
                      {  
                        //email already exists;
                        $errors[] = 'Користувач з таким e-mail вже підписаний, введіть інший e-mail!';
                      }


                        if (! filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL)) 
                        {
                            $errors[] = "E-mail вказано невірно! (Використовуйте приклад: example@gmail.com)";
                        }
                    }

                    if( empty($errors) )
                          {
                             $subscribers = R::dispense( 'subscribers' );
                             $subscribers->login = $_POST['login'];
                             $subscribers->email = $_POST['e-mail'];
                             $subscribers->ip = $_SERVER['REMOTE_ADDR'];
                             R::store($subscribers);

                             echo "<br><br><br>" . "<b style = 'color: red;''>" . $_POST['login'] . "</b>" . ", Ви щойно підписались на отримання НОВИН з нашого сайту. Щиро дякуємо Вам!" . "<br><br>";

                          }else
                            {
                            // show first error from array errors;
                            echo "<br><br>" . '<div style="color: #3ca1e1;">' . array_shift($errors) . '</div><hr>';
                            }
              }
              ?>
								<div class="text-center">
                    				<a href="http://iroks.com.ua/News.php" class="btn btn-info" data-toggle="tooltip-left" title="Ласкаво просимо!" >На сторінку  Новин</a>
                    			</div>

 	
 	<br><br><br><br><br>	

       	<!-- Simple parallax effect --> 	
 		</div>
 	</section>
     


<!--footer-->
    <?php include "includes/footer.php"; ?>
<!-- footer -->	

 	
 	
 	
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
