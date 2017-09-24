<?php
  require "includes/config.php";
  require "db_rb.php";

  date_default_timezone_set('europe/kiev');


   // add a NEW article
 if( isset($_POST['do_submit']) )
              {
                        $errors = array();

                        if( trim($_POST['uid']) == '' 
                          | trim($_POST['uid']) == 'Забудовник' 
                          | trim($_POST['uid']) == 'Представник забудовника'
                          | trim($_POST['uid']) == 'Представник Забудовника'
                          | trim($_POST['uid']) == 'представник забудовника'
                          | trim($_POST['uid']) == 'представник Забудовника'
                          | trim($_POST['uid']) == 'забудовник'
                          | trim($_POST['uid']) == 'адмін'
                          | trim($_POST['uid']) == 'Адмін'
                          | trim($_POST['uid']) == 'Адміністратор')
                        {
                          $errors[] = 'Будь-ласка, введіть Ваше Ім`я!';
                        }
                        

              
                      if( trim($_POST['message']) == '')
                        {
                          $errors[] = 'Будь-ласка, введіть Текст Вашого Коментаря!';
                        }

// response reCAPCHA to strver side

                        //var 2
                            $curl = curl_init();

                            curl_setopt_array($curl, [
                              CURLOPT_RETURNTRANSFER => 1,
                              CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
                              CURLOPT_POST => 1,
                              CURLOPT_POSTFIELDS => [
                                  'secret' => '6LcDKSMUAAAAAJUTVEP62iqNTe274tdsZDU5lVKC',
                                  'response' => $_POST['g-recaptcha-response'],
                              ],
                              ]);

                            $response = json_decode(curl_exec($curl));

                            if (!$response->success) {
                              //Redirect with error
                          
                              $errors[] = 'Будь-ласка, пройдіть валідацію: доведіть, що Ви людина, а не робот! Для цього потрібно поставити галочку в блоці reCAPTCHA перед додаванням Вашого Коментаря на сайт';

                            }
                            // post the comment
                        //var 2 end



                        // if(isset($_POST['g-recaptcha-response'])){
                        //     $captcha=$_POST['g-recaptcha-response'];
                        //   }
                        //   if(!$captcha){
                        //     echo '<h2>Будь-ласка пройдіть валідацію: доведіть, що Ви людина, а не робот!</h2>';
                        //     exit;
                        //   }
                        //   $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcDKSMUAAAAAJUTVEP62iqNTe274tdsZDU5lVKC&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
                        //   if($response.success == false)
                        //   {
                        //     $errors[] = 'Ви спаммер! Залиште цей сайт!';
                        //   }

// response reCAPCHA to server side END
                        
                    if( empty($errors) )
                          {
                             $comments = R::dispense( 'comments' );
                             $comments->uid = $_POST['uid'];
                             $comments->message = $_POST['message'];
                             
                             R::store($comments);
 ?>
                              <script type="text/javascript"> 
                                alert ( "Щиро дякуємо за Ваш коментар!" );
                             </script> 
 <?php
                          }else
                            {
                            // show first error from array errors;
                              ?>
                              <script>
                                alert ('<?php echo  array_shift($errors); ?>');
                              </script>
                           <?php
                            }
              }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Відгуки</title>

    
    <!-- Bootstrap + Font-Awesome + Style.css -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    
      <link href="css/style.css" rel="stylesheet">
      
      
      <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
     

    <script async type="text/javascript" src="js/modernizr.custom.28468.js"></script>

 <!-- BEGIN Zooming of Pictures -->
      <!-- Add jQuery library -->
  <script async type="text/javascript" src="../lib/jquery-1.10.2.min.js"></script>

  <!-- Add mousewheel plugin (this is optional) -->
  <script async type="text/javascript" src="../lib/jquery.mousewheel.pack.js?v=3.1.3"></script>

  <!-- Add fancyBox main JS and CSS files -->
  <script async type="text/javascript" src="../source/jquery.fancybox.pack.js?v=2.1.5"></script>
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />

  <!-- Add Button helper (this is optional) -->
  <link rel="stylesheet" type="text/css" href="../source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
  <script async type="text/javascript" src="../source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

  <!-- Add Thumbnail helper (this is optional) -->
  <link rel="stylesheet" type="text/css" href="../source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
  <script async type="text/javascript" src="../source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

  <!-- Add Media helper (this is optional) -->
  <script async type="text/javascript" src="../source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
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
<script src='https://www.google.com/recaptcha/api.js'></script>
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
                <li><a id="nav3" href="http://iroks.com.ua/Rooms4.php">КВАРТИРИ</a></li>
                <li><a id="nav2" href="http://iroks.com.ua/News.php">НОВИНИ</a></li>
                <li><a id="nav4" href="http://iroks.com.ua/Deals3.php">ДОКУМЕНТИ</a></li>
                <li><a id="nav5" href="http://iroks.com.ua/Feedback.php" style="color:#fff;">ВІДГУКИ</a></li>
                <li><a id="nav7" href="http://iroks.com.ua/Credits.php">РОЗТЕРМІНУВАННЯ</a></li>
                <li><a id="nav6" href="http://iroks.com.ua/Contacts.php">КОНТАКТИ</a></li>
                <li><a id="nav8" href="http://iroks.com.ua/Topics.php">СТАТТІ</a></li>
                <li><a id="nav8" href="http://iroks.com.ua/Shareholders.php">АКЦІОНЕРАМ</a></li>
              </ul>
     		</div> 
     		 
			 
		</div>
   	</div>
  </div>
 </div>

<!-- Main content - Feedback -->

 		
     
     
      
     
   
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dark text-center">

    <div class="row" style="margin-top: 20px; opacity: 0.8;">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center newshead">
      <br>
      <br>
      <br>
      <br>
      
        <div class="container" style="margin-top: 0px;">
      <div class="row">
      <h3 style="color: #fff;">
              <b>
                Ваші думки, питання, пропозиції, зауваження чи побажання
              </b> 
        </h3>

        
        <hr>
    <div class="col-xs-1 col-sm-1 col-md-3 col-lg-3 text-center"></div>
    <div class="col-xs-10 col-sm-10 col-md-6 col-lg-6 text-center">
     
        <img src="images/businessteam.jpg" class="img-responsive img-rounded" alt="Responsive image" style="width: 1700px; height: auto;">
   </div>
        <div class="col-xs-1 col-sm-1 col-md-3 col-lg-3 text-center"></div>
      </div>
      <hr>
 </div>    
        
      </div>  

    </div>
    
 
     
    <br> <br> <br> 
<table>
<tr>
<td>
 
                      <div class="col-md-3 col-lg-3"></div>
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-justify">
      <?php
        


            $comments = mysqli_query($connection, "SELECT * FROM `comments` ORDER BY pubdate DESC;");
            while( $com = mysqli_fetch_assoc($comments) )
            {
              
                 if ($com['uid'] == "Представник забудовника")
                 {
                  ?>
                        <br>
                        <div class="semi-dark">
                          <p class="text-right"> 
                              <strong id="pubdate" style="color: red;"><?php echo $com['uid'];?><br><?php echo $com['pubdate'];?></strong>
                          </p>
                          <div class="row">

                            <!-- Image 1 -->
                                <?php
                            if ($com['image'])
                                    {
                                ?>
                                <!-- <img class="leftimg" src="images/<?php // echo $com['image']; ?>" class="img-responsive img-rounded" alt="Responsive image" style="max-height:150px; max-width:250px;"> -->

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="thumbnail">
                                  <a class="fancybox" rel="group" href="images/<?php echo $com['image']; ?>" title=" Фото1 з коментаря Представника забудовника від <?php echo $com['pubdate']; ?>"><img src="images/<?php echo $com['image']; ?>" style="width: 300px;" alt=""></a>
                                </div>
                                </div>
                          <?php
                      }else{
                                ?>
                                    <p style="display: none;"></p>
                                <?php
                          }


                          // Image 2
                            if ($com['image2'])
                              {
                            ?>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="thumbnail">
                                  <a class="fancybox" rel="group" href="images/<?php echo $com['image2']; ?>" title=" Фото2 з коментаря Представника забудовника від <?php echo $com['pubdate']; ?>"><img src="images/<?php echo $com['image2']; ?>" style="width: 300px;" alt=""></a>
                                  
                                </div>
                                </div>


                          <?php
                      }else{
                                ?>
                                    <p style="display: none;"></p>
                                <?php
                          }


                          // Image 3
                            if ($com['image3'])
                              {
                            ?>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="thumbnail">
                                  <a class="fancybox" rel="group" href="images/<?php echo $com['image3']; ?>" title=" Фото3 з коментаря Представника забудовника від <?php echo $com['pubdate']; ?>"><img src="images/<?php echo $com['image3']; ?>" style="width: 300px;" alt=""></a>
                                  
                                </div>
                                </div>
                          <?php
                      }else{
                                ?>
                                    <p style="display: none;"></p>
                                <?php
                          }
                          // Image 4
                           if ($com['image4'])
                              {
                            ?>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="thumbnail">
                                  <a class="fancybox" rel="group" href="images/<?php echo $com['image4']; ?>" title=" Фото4 з коментаря Представника забудовника від <?php echo $com['pubdate']; ?>"><img src="images/<?php echo $com['image4']; ?>" style="width: 300px;" alt=""></a>
                                  
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

                  <!-- End of Pasting Images -->


                              <p> 
                              <hr style="margin-top: -20px;">
                                 <?php echo $com['message']; ?>
                              
                              </p>
                              </div>

                  <?php
                 }else
                 {
                 ?>
                          <p class="text-justify"> 
                              <strong id="pubdate"><?php echo $com['uid'];?><br><?php echo $com['pubdate'];?></strong><br>
                              <?php echo strip_tags($com['message']); ?>
                          </p>
                   <?php
                 }
                   ?>
                   
                  
                
    <!-- Image and text of News-article END -->
              <?php
            }
         ?>
           
           </div>
                     <div class="col-md-3 col-lg-3"></div>
         </td>
         </tr>
         </table>
     <br> 
   
    
       
  <div class="col-md-3 col-lg-3"></div>
   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

            <form action="Feedback.php" method="POST">
                <!-- <div class="modal-header">
                 
                  <h4 class="modal-title text-left" id="myModalLabel" style="color: #fff;">Додати Мій Коментар</h4>
                </div> -->

                <div class="modal-body">
                
                    <div class="form-group">
                     <!--  <label class="text-left" style="color: #fff;">Моє Ім'я</label> -->
                      <input type="text" class="form-control" placeholder="Введіть Ваше Ім'я" name="uid">
                    </div>

<!-- <p> <br> </p> -->
                    <div class="form-group">
                      <!-- <label class="text-left" style="color: #fff;">Текст Мого Коментаря</label> -->
                      <textarea rows="5" class="form-control" placeholder="Введіть текст Коментаря" name="message"></textarea>
                    </div>

                </div>
              
              <div class="col-md-8 col-lg-8">
                 <!-- google reCAPCHA field -->
              <div class="g-recaptcha" data-sitekey="6LcDKSMUAAAAAGeot_dgxt4KrpJEp4Inn7ozP5-O"></div>
              </div>
              <div class="col-md-4 col-lg-4">
              <br><br>

                <button type="submit" class="btn btn-primary" name="do_submit">Додати Мій Коментар!</button>
              </div>
              <!-- <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div> -->
                <br> 
    <br> 
    <br> 
    <br> 
  
              </form>

            </div>
            <div class="col-md-3 col-lg-3"></div>




 
    
         
    
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                     <br>
    <br>
    <br>
    <br>
    <!-- 
              <div class="row text-center">
                <a href="mailto:iroks.smanager@gmail.com" class="btn btn-primary" data-toggle="tooltip-right" title="Відправити листа на e-mail">Написати листа менеджеру</a>
              </div> -->
   
         </div>
     <!-- End of parallax -->
		
    

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="row">
<!--footer-->
    <?php include "includes/footer.php"; ?>
<!-- footer -->
 	</div>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
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
            $('.fancybox').fancybox();
        });
    </script>
</body>
</html>