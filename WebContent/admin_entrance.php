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
    <title><?php echo $config['title']; ?></title>

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
              <span class="sr-only">Відкрити</span>
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
                <li><a id="nav5" href="http://iroks.com.ua/Feedback.php">ВІДГУКИ</a></li>
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





   
     <div class="row dark">
    <br> <br> <br> <br> <br> <br>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
 
 <div class="container">
      <div class="row">
    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-center">
      <br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<?php
  if( isset($_SESSION['logged_user']) ) : 
 header('Location: /admin_panel.php');
else : ?>



<?php
$data = $_POST;
if( isset($data['do_login']) )
{
  $errors = array();
  $user = R::findOne( 'admins', 'login = ?', array($data['login']) );
  if( $user  )
  {
    // login exists
    if( $data['password']==$user->password )
    {
      // it`s ok, let`s login this user;
      $_SESSION['logged_user'] = $user;
      $_SESSION["auth"] = "YES";
      
      header('Location: /admin_panel.php');
    }else
    {
      $errors[] = 'Ви ввели невірний Пароль, спробуйте знову!';
      $_SESSION["auth"] = "NO";
    }
  }else
  {
    $errors[] = 'Невірний Логін, будь-ласка,спробуйте ще раз!';
  }
  if ( ! empty($errors) )
    {
      // show first error from array errors;
    echo '<div style="color: #3ca1e1;">' . array_shift($errors) . '</div><hr>';
      
    }

}

?>




<form action="admin_entrance.php" method="POST" class="navbar-form navbar-center">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Логін адміністратора" name="login" value="<?php echo @$data['login']; ?>">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Пароль адміністратора" name="password" value="<?php echo @$data['password']; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="do_login">
                  
                    <i class="fa fa-sign-in"></i> 
                  
                   Увійти
                </button>
              </form>

   <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
      </div>
 </div>   

    </div>
   
 </div>

 </body>

<?php endif; ?>
</html>
