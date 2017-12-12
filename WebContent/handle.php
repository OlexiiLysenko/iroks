<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Сторінка авторизації</title>

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
        <div class="container-fluid" style="background-color: #163E59; min-height: 80px;">
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
    <!-- Login authorized -->
            
              <!-- <form action="" class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="E-mail" value="">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" value="">
                </div>
                <button type="submit" class="btn btn-primary">
                  
                    <i class="fa fa-sign-in"></i> 
                  
                   Увійти
                </button>
                <button type="submit" class="btn btn-primary">
                   Зареєструватись
                </button>
              </form> -->
              
   
      
      
      <section class="parallax">
 		<div class="parallax-inner">
      
      
 <!-- Опускаємо картинку у контейнері вниз, щоб не перекривалася навігаційною панелькою -->
 
       <div class="container-fluid">
    
    <div class="row light">
    <br>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
 
 <div class="container" style="margin-top: 90px;">
      <div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-center">
      <br> <br> <br> <br>
        <img src="images/Building_02.jpg" class="img-responsive img-rounded" alt="Responsive image">
       </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
      </div>
 </div>    
  
<?php
include ('includes/config.php');
// require "includes/config.php";
// include ("includes/db.php");
// // $_GET
// // $_POST

$login = $_POST['login'];
$password = $_POST['password'];

$count = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password';");
if (mysqli_num_rows ($count) == 0 )
{
	echo '<br>'. '<br>'. '<h1>' . 'Невірний логін або пароль. Будь-ласка, перевірте дані та спробуйте знову!' . '</h1>' . '<br>'. '<br>'. '<br>'. '<br>'. '<br>'. '<br>';
} else
{?>


							  <h1>Вхід для адміністратора:</h1>
						      </div>
      
    
    



								<div class="text-center">
                    				<a href="http://iroks.com.ua/lord_of_rings_panel.php" class="btn btn-info" data-toggle="tooltip-left" title="Ласкаво просимо!" >Перейти до панелі керування сайтом</a>
                    			</div>



 	
 	<br><br><br><br><br><br><br><br>		



<?php
}
?>




						      

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
