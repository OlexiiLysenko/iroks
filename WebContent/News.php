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
  <title> Новини</title>

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


      
      <?php include "includes/header_news.php"; ?>
      
      
      

      
      <section class="parallax ">
       <div class="parallax-inner ">
         
        <div class="row" style="margin-top: 60px; opacity: 0.8;">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center newshead">
            <br>   <br><br><br><br><br><br><br><br><br><br><br><br>
            <h1>НОВИНИ</h1>
            <p>
             <b>Найактуальніші події з життя нашої компанії</b> 
           </p>
         </div>	
       </div>
       
       <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
           <br><br>
           <div class="row text-center">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-1">Підписатись на новини</button> 
          </div>
          
        </div>
        
      </div>
      <br><br><br>
      <br><br><br><br><br><br><br>
      <br><br><br>
      
      
      
      <div class="table-responsive dark" style="opacity: 0.9;">
        <table>
          <tr>
            <div class="container-fluid">
             <td>
               
              <div class="row">
                <br> <br>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> 
                  <h1 style="color:#3ca1e1;">Що у нас нового та цікавого?</h1><br><br><br><br>
                </div>
              </div>
            </td>
          </div>
        </tr>

        <tr>
          <td style="background-color: #264B76;">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
              <h2></h2>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
             <!--  <a id="link_news" href="/articles.php"><h3>ПЕРЕГЛЯНУТИ ВСІ НОВИНИ</h3></a> -->
           </div>
         </td>
         
         
         <?php
         $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE categorie_id = 3 ORDER BY pubdate DESC;");
         while( $art = mysqli_fetch_assoc($articles) )
         {
          ?>

          <!-- Image and text of News-article -->
          <tr>
            <td>
              <div class="row news">
               <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 text-center">
                 <br>
                 <img src="images/<?php echo $art['image']; ?>" class="img-responsive img-rounded" alt="Responsive image">
                 <br>
               </div>
               
               
               <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <p class="text-justify column-right"> 
                  <strong id="pubdate"><?php echo $art['pubdate']; ?> <br> <?php echo $art['title']; ?> </strong> <br>
                  <?php echo mb_substr(strip_tags($art['text']), 0, 250, 'utf-8') . '...'; ?>
                  <br>
                  <a href="/article.php?id=<?php echo $art['id']; ?> " style="color: #3879BF;"> читати далі</a>
                </p>
                
              </div>
            </div>
          </td>
        </tr>
        <!-- Image and text of News-article END -->
        <?php
      }
      ?>
    </section>
    
    
  </div>
</div>
</td>
</tr>
</table>
</div>


<!-- Simple parallax effect -->



<!--footer-->
<?php include "includes/footer.php"; ?>
<!-- footer -->	


<!-- Модальне вікно -->

<div class="modal fade" id="modal-1">
  
  <form action="subscribe.php" method="POST" class="navbar-form navbar-center" style="margin-top: 250px; text-align: center;">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Ваше ім'я" name="login">
    </div>
    <br>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Ваш e-mail" name="e-mail">
    </div>
    <br>
    <button type="submit" class="btn btn-primary" name="do_subscribe">
      
      <i class="fa fa-sign-in"></i> 
      
      Підписатись!
    </button>
  </form>
  
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
