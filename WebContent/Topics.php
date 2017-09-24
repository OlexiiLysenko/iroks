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
      
    <?php include "includes/header_topics.php"; ?>
              
      
      <section class="parallax ">
 		<div class="parallax-inner ">
 		
      <div class="row" style="margin-top: 60px; opacity: 0.8;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center newshead">
        <br>   <br><br><br><br><br><br><br><br><br><br><br><br>
          <h1>Статті</h1>
  	   	  <p>
  	            <b>Цікаві факти та тонкощі будівельної справи</b> 
  	      </p>
        </div>	
      </div>
    
     <!--  <div class="row">
	      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
	                    <br><br>
	            <div class="row text-center">
	               <button class="btn btn-primary" data-toggle="modal" data-target="#modal-1">Підписатись на новини</button> 
	            </div>
	          
	     </div>
	      
	    </div> -->
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
          <h1 style="color:#3ca1e1;">Ділимось корисною інформацією</h1><br><br><br><br>
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
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right"></div>
        </td>
    	
         <?php
            $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE categorie_id = 8 ORDER BY pubdate DESC;");
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
                          <?php echo mb_substr(strip_tags($art['text']), 0, 450, 'utf-8') . '...'; ?>
                           <br>
                          <a href="/article_topic.php?id=<?php echo $art['id']; ?> " style="color: #3879BF;"> читати далі</a>
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
                  <input type="text" class="form-control" placeholder="Ваше ім'я" name="username">
                </div>
                <br>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Ваш e-mail" name="e-mail">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">
                  
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





<!-- <div class="container" style="margin-top: 0px;">
                    	<div class="row">
                      		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center"></div>
                      		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center">
                      
                         		<img src="images/Topic-2-1.jpg" class="img-responsive img-rounded" alt="Responsive image" style = "max-height: 450px;">
                      
                      		</div>
                      		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center"></div>

                      </div>
                    </div>   -->













<!-- Example of Topic
				
		<h3>
			Радіоактивна цегла
		</h3>
		<p style="text-align: justify;">
			Іноді небезпеку для нашого здоров'я таїться в таких речах, в яких її навряд чи запідозриш. В останні десятиліття багато задумалися про радіаційну загрозу. Підвищена радіація - не завжди наслідок чорнобильської аварії: деякі предмети від природи мають дуже високий радіаційний фон. Це стосується, зокрема, будівельних матеріалів - адже мова йде про будинки і квартири, в яких мешкають люди.
			<br><br>
 Нормами радіаційної безпеки України регламентується три класи використання будівельних матеріалів, що містять природні радіонукліди. Йдеться про природну радіоактивність, ніяк не пов'язану з чорнобильською катастрофою. Рівень радіоактивності того чи іншого матеріалу залежить від місцевості, в якій він здобувався. Вміст природних радіонуклідів - сумарна питома активність радію, торію і калію - як раз і визначає клас будматеріалів. До 370 бекерель на кілограм (Бк / кг) питомої активності - це 1й клас. Будівельні матеріали 1го класу можуть використовуватися без обмежень у всіх видах будівництва, для будівель і приміщень будь-якого функціонального призначення: житлових будинків, шкіл, дитячих садів і т. д.
 <br><br>
2й клас радіоактивності будматеріалів - від 370 до 740 Бк / кг. Ці будматеріали можуть використовуватися в промисловому і дорожньому будівництві - житлове вже виключається.
<br><br>
Будівельні матеріали 3го класу - від 740 до 1350 Бк / кг - можна використовувати тільки при будівництві доріг, дамб, мостів за межами населених пунктів. Використання будматеріалів, радіоактивність яких вище 3го класу, допустима тільки з дозволу Міністерства охорони здоров'я після отримання висновку Державної санітарно-епідеміологічної експертизи саме на даний вид матеріалу. При цьому враховується призначення об'єкта, контакт людей з цим матеріалом.
Радіологічний відділ СЕСА займається підприємствами будівельної індустрії в Львівської області, що виробляють цеглу, плитку та інші будматеріали. Жодне підприємство в нашому регіоні не виробляє будівельні матеріали з радіоактивністю вище 1-го класу. Максимум вони йдуть до 150 Бк / кг. Всі підприємства, що випускають будматеріали, зобов'язані мати результати радіологічних досліджень своєї продукції і сертифікати радіаційної якості. Без них підприємство не може ні продати свою продукцію, ні брати участь в тендерах, ні вивозити продукцію за кордон.
<br><br>
У Львівській області (на відміну від Кременчука, від Житомирської, Запорізької, Кіровоградської областей) немає кар'єрів, в яких глина або щебінь мали б підвищений радіаційний фон. Але іноді з інших областей нам завозиться матеріал другого класу.
Найбільше природні радіонукліди містить камінь: граніт, мармур. Наші будівельники вимагають у виробників радіаційні сертифікати на ввезену продукцію. Трапляється, що виробники в інших областях іноді хитрують. Був у нас випадок, коли завезли щебінь, що відноситься за документами до першого класу (надавали приватні особи), а реально там був 2й клас. І для фундаменту будинку його вже не можна використовувати. А для доріжки, яку зверху покриють асфальтом, - можна.
<br><br>
Вістовіцькій завод "Художньої кераміки та цегляних виробів ім. Завадського" - найбільший виробник цегли в нашому регіоні. Постійний радіаційний контроль підтверджує відповідність його продукції вимогам радіаційної безпеки.
<br>
		<h3>
			Небезпечний газ
		</h3>
<br>
Існує й інша проблема, пов'язана з природними радіонуклідами - це радіоактивний газ радон, який виділяється з грунту під будівлями. Якщо приміщення погано провітрюється, то його концентрація може бути досить високою. Особливо це стосується старих будинків. 80% радону виділяється з грунту під будівлею (інші 20% - з будівельних матеріалів). Радон не має ні смаку, ні запаху, він важчий за повітря і тому осідає на нижніх поверхах. Цей газ - альфавипромінник, як зовнішнє джерело - він безпечний, від нього можна захиститися аркушем паперу. Але при постійному вдиханні альфачастини осідають на легеневій тканині, викликаючи її опромінення. За статистикою, кожен п'ятий випадок раку легень викликаний саме підвищеною концентрацією радону. Тому дуже жорсткі вимоги до дитячих установ в цьому плані.
<br><br>
Понад п'ять років тому на одному з підприємств в Ізюмському районі розібрали плавильну піч, яка була викладена з потужного вогнетривкої цегли. Треба відзначити, що бакорові вогнетриви містять дуже високу кількість природних радіонуклідів - тисячі бекерель. Піч демонтували, а цегла дісталися робочим, тому що за технічними характеристиками вона дуже добре збереглася. Хтось виклав в своїх будинках доріжки з цієї цегли, хтось поставив паркани. І біля цих зборів радіаційний фон досягав 100 мікрорентген на годину (при нормі 15). Добре, що ніхто не здогадався з цієї цегли зробити фундамент. А підвищений фон виявили співробітники районної СЕС, коли проходили по населеному пункту з дозиметром.
<br>
<h3>
Коли влада звернула увагу на проблему радіоактивності будматеріалів?
</h3>
<br>
У 1991 році в Краматорську Донецької області, в одній з квартир житлового будинку, від онкологічного захворювання протягом короткого часу померли всі члени сім'ї. Потім в цю квартиру вселилася інша сім'я, і ​​ситуація в точності повторилася: люди, включаючи дітей, почали хворіти на рак. Про цю історію писали в ЗМІ. Провели обстеження і виявили в стіні потужне радіоактивне джерело. У кар'єрах, де видобувають щебінь, використовуються рівнеміри - з їх допомогою визначають рівень заповнення ємностей. У комплект рівнеміра входить гаммаджерело. Якимось чином вийшло, що гаммаджерело з рівнеміра потрапило в щебінь, щебінь потрапив в залізобетонну плиту, яку використовували при будівництві житлового будинку. Заміри показали, що рівень випромінювання в цій квартирі в мільйони разів перевищував допустимі норми. А люди хворіли і не знали чому. 
<br><br>
Після цього випадку на законодавчому рівні зобов'язали всіх будівельників проводити радіаційний контроль будівельних матеріалів та перед здачею в експлуатацію нового будинку проводити в ньому дозиметричний контроль. У Законі України «Про захист людини від впливу іонізуючого випромінювання» існує стаття 15, яка передбачає обов'язкове проведення радіаційного контролю земельної ділянки, на якій буде проводитися будівництво, використовуваних будівельних матеріалів і обов'язковий радіаційний контроль при введенні в експлуатацію. Якщо хтось будує приватний будинок - він може звернутися або до нас, або в будь-яку лабораторію, яка атестована на даному виді досліджень. Деякі люди звертаються до нас перед тим, як придбати квартиру. Нещодавно звернулася жінка: їй сподобалася квартира в одному з будинків. З продавцями домовилися, але вирішили розпитати про квартиру сусідів і дізналися, що в родині, яка жила в цій квартирі, всі троє померли від раку. У таких підозрілих випадках радіаційний контроль необхідний.
<br><br>
Отже, проблема є, але державні органи намагаються її контролювати. Можемо сказати, що основна маса будматеріалів, які виробляються офіційно або легально ввозяться в Україну, відповідає радіаційним нормам. Але в наш час не зайвим буде самостійно попіклуватися про перевірку на радіологічний рівень приміщення у якому ви збираєтесь жити або вже живете, задля того щоб уникнути таких жахливих випадків із страшними наслідками. 

			<br>
					
			<br>
			
		</p>
		

    -->