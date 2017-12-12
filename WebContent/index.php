<?php
require "includes/config.php";
require "cookies.php";
require "db_rb.php";

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


	<!-- OneSignal push messages service BEGINNING -->
			<!-- <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async='async'></script>
			<script type="text/javascript">
				var OneSignal = window.OneSignal || [];
					OneSignal.push(["init", {appId: "c53c3007-f27d-4d24-9510-9d0935b6a1bc", 
						autoRegister: true, /* Set to true to automatically prompt visitors */ 
						subdomainName: 'iroks', 
						notifyButton: {
							enable: true /* Set to false to hide */
						}
					}]);
				</script> -->
				<!-- OneSignal push messages service END -->

				<!-- scrollreveal script here -->
				<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>


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
    							<span class="sr-only">Відкрити</span>
    							<span class="icon-bar"></span>
    							<span class="icon-bar"></span>
    							<span class="icon-bar"></span>
    						</button>



    					</div>
    					<div class="collapse navbar-collapse" id="responsive-menu" style="margin-top:30px;">
    						<ul class="nav navbar-nav">

    							<li><a id="nav1" href="http://iroks.com.ua/index.php" style="color:#fff;">ПРО НАС</a></li>
    							<li><a id="nav3" href="http://iroks.com.ua/Rooms2.php">КВАРТИРИ</a></li>
    							<li><a id="nav2" href="http://iroks.com.ua/News.php">НОВИНИ</a></li>
    							<li><a id="nav4" href="http://iroks.com.ua/Documents.php">ДОКУМЕНТИ</a></li>
    							<li><a id="nav5" href="http://iroks.com.ua/Feedback.php">ВІДГУКИ</a></li>
    							<li><a id="nav7" href="http://iroks.com.ua/Credits.php">РОЗТЕРМІНУВАННЯ</a></li>
    							<li><a id="nav6" href="http://iroks.com.ua/Contacts.php">КОНТАКТИ</a></li>
    							<li><a id="nav8" href="http://iroks.com.ua/Topics.php">СТАТТІ</a></li>
    							<li><a id="nav8" href="http://iroks.com.ua/Shareholders.php">АКЦІОНЕРАМ</a></li>
    							<li><a id="nav8" href="http://iroks.com.ua/press-conference.php">ПРЕСС-КОНФЕРЕНЦІЇ</a></li>
    							<li><a id="nav8" href="#" style="color: red;">ОНЛАЙН: <?php echo $online_count; ?></a></li>
               <!--   <li class="dropdown">
                	<a id="nav8" href="#" class="dropdown-toggle" data-toggle="dropdown">АКЦІОНЕРАМ <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li> <a href="#">Повідомлення про збори</a></li>
							<li> <a href="#">Документи загальних зборів</a></li>
							<li> <a href="#">Особлива інформація</a></li>
						</ul>
					</li> -->

				</ul>
			</div> 


		</div>
	</div>
</div>
</div>



<section class="parallax">
	<div class="parallax-inner">
		<div class="container-fluid">

			<div class="row dark">
				<br> 
				<br> 
				<br> 
				<br> 
				<br> 
				<br>
				<br>
				<br>
				<br>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">

					<!-- <h1>Увага!!! При повній оплаті знижка до <b style="color: red;">-5%</b>!!!</h1> -->
					<div id="sale" style="font-size:30px; font-weight: 700; color:white;">Увага!!! <b style="color: red;">СВЯТКОВІ ЗНИЖКИ</b> та <b style="color: red;">СПЕЦІАЛЬНІ ПРОПОЗИЦІЇ</b>*!!!</div>
					<h6 id="descriptsale" style="color: white;">*акція дійсна до 31.01.2018р.</h6>

					<div class="container" style="margin-top: 0px;">
						<div class="row">
							<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-center">

								<div id="imagefadein">
									<img src="images/Building_cite_main.png" class="img-responsive img-rounded" alt="Responsive image" style="width: 1700px; height: auto;">
								</div>
							</div>
							<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
						</div>
					</div>    

					<div id="why" style="font-size:26px; font-weight: 700; color:white;">Чому житло купують саме у нас?</div>

					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>

				</div>

			</div>


			<!--  <br><br><br><br><br><br><br><br> -->



			<!-- Опускаємо картинку у контейнері вниз, щоб не перекривалася навігаційною панелькою -->



			<div class="row light">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">


					<br> 
					<div id="sliderHide">
						<br><br><br><br>
					</div>
					<h1>Бо нам <em>довіряють</em>! Адже ми пропонуємо:</h1>



				</div>

			</div>



		</div>



		<div class="container-fluid">

			<div class="row light">
				<br>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">

					<div class="container" style="margin-top: 0px;">
						<div class="row">
							<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-center">


								<img src="images/Couple_Keys.jpg" class="img-responsive img-rounded" alt="Responsive image" style="width: 1700px;height: auto;">
							</div>
							<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
						</div>
					</div>       

					<h1>Комфортні, найвигідніші умови купівлі елітного житла у Львові!</h1>
				</div>



				<div style="text-align: center; color:black;">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">

						</div>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
					</div>
				</div>
				<div id="sliderHide">
					<br><br>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
						<span class="fa-stack fa-3x">
							<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
							<i class="fa fa-clock-o fa-stack-1x" aria-hidden="true"></i>
						</span>

						<p class="text-center">
							<br> <br>
							<b>Понад 25 років досвіду!</b> 
						</p>
						<p class="text-justify textColumn column-left">
							Компанія "ІРОКС" - це житлові масиви перевірені часом! У Львові присутні і справно експлуатуються об'єкти, 
							побудовані нами понад 25 років тому!<br> Друзі, ми пишаємось тим, що вже стільки часу надаємо Вам достойні 
							житлові умови по доступним цінам!
						</p>

					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">

						<span class="fa-stack fa-3x">
							<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
							<i class="fa fa-heart-o fa-stack-1x" aria-hidden="true"></i>
						</span>

						<p class="text-center">
							<br><br>
							<b>Ми дбаємо про Вас!</b> 
						</p>
						<p class="text-justify textColumn">
							Піклуючись про безпеку Вашого здоров'я ми власноруч виробляємо (та розробляємо нові) всі необхідні будівельні матеріали, також контролюємо їхню якість, 
							безпеку та відповідність до світових стандартів!

							Тому, купуючи квартиру у нас, Ви також підтримуєте вітчизняного виробника і тисячі українців, зайнятих у виробництві будівельних матеріалів.
						</p>

					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
						<span class="fa-stack fa-3x">
							<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
							<i class="fa fa-building-o fa-stack-1x" aria-hidden="true"></i>
						</span>

						<p class="text-center">
							<br><br>
							<b>Якісне житло від забудовника</b>
						</p>
						<p class="text-justify textColumn column-right">
							Всі пропозиції на цьому сайті надаються безпосередньо самим забудовником,- будівельною компанією ПрАТ "ІРОКС", - 
							тому Ви можете бути впевнені, що надані ціни є дійсно найнижчими у Львові!
							Натомість, якість наших споруд є дуже високою, бо всі будівлі зведено із дотриманням усіх міжнародних норм!
						</p>

					</div>

				</div>


				<br>




				<!-- button subscribe -->

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<br>
						<p class="text-сenter">
							<h1><b>Бажаєте бути в курсі всіх наших новин?</b></h1> 
						</p>

						<div class="row text-center">
							<button class="btn btn-primary" data-toggle="modal" data-target="#modal-1">Підписатись на новини</button>
						</div>

					</div>

				</div>


				<br><br><br><br>

				<div class="container-fluid">

					<div class="row dark">
						<br>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">

							<div class="container" style="margin-top: 90px;">
								<div class="row">
									<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-center">
										<br>
										<img src="images/TeamBuild_01.jpg" class="img-responsive img-rounded" alt="Responsive image" style="width: 1700px;height: auto;">
									</div>
									<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
								</div>
							</div>     

							<h1 class="indexH1Smaller">Ми - компанія з багаторічним практичним досвідом роботи!</h1><br>
						</div>










						<div style="text-align: center; color:black;">
							<div class="row">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">

								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
							</div>
						</div>
						<br><br>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
								<span class="fa-stack fa-3x">
									<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
									<i class="fa fa-trophy fa-stack-1x" aria-hidden="true"></i>
								</span>

								<p class="text-center">
									<br> <br>
									<b>Будівлі різних типів</b> 
								</p>
								<p class="text-justify textColumn column-left">
									З 1991 р. на ринку капітального будівництва багатоквартирних комплексів, елітного та соціального житла, 
									офісних центрів, та об'єктів промислового характеру. 
									Нам відомі усі тонкощі будівництва будь-якої складності від початку планування і до здачі в експлуатацію готового житла.
								</p>

							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">

								<span class="fa-stack fa-3x">
									<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
									<i class="fa fa-users fa-stack-1x" aria-hidden="true"></i>


								</span>

								<p class="text-center">
									<br><br>
									<b>Справжні професіонали</b> 
								</p>
								<p class="text-justify textColumn">
									В нашій компаніі працює дружня команда висококваліфікованих спеціалістів найвищого рівня, 
									що є найбільшою цінністю та базою для стабільного розвитку майбутнього будь-якої успішної організації.
								</p>

							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
								<span class="fa-stack fa-3x">
									<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
									<i class="fa fa-line-chart fa-stack-1x" aria-hidden="true"></i>
								</span>

								<p class="text-center">
									<br><br>
									<b>Передові технології</b>
								</p>
								<p class="text-justify textColumn column-right">
									Стратегія нашої організації полягає у неприпинному пошуку 

									та використанні найсучаснішого обладнання та технологій 

									будівництва будівель та споруд, для максимального задоволення 

									потреб людей, які користуються нашими послугами, що 

									дозволяє вийти на лідируючі позиції у сфері будівництва.
								</p>

							</div>

						</div>










						<br>


						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
								<br>
								<p class="text-сenter">
									<h1><b>
										З'явились питання?<br>

									</b></h1>

								</p>


								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
								</div>
							</div>

							<br><br><br>



							<div class="row">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
									<a href="mailto:iroks.smanager@gmail.com" class="btn btn-primary" data-toggle="tooltip-right" title="Відправити листа на e-mail">Написати нам листа</a>
								</div>

							</div>

						</div>








						<br><br><br><br><br><br>









						<div class="container-fluid">

							<div class="row light">
								<br>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">

									<div class="container" style="margin-top: 90px;">
										<div class="row">
											<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
											<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-center">
												<br>
												<img src="images/TeamBuild_02.jpg" class="img-responsive img-rounded" alt="Responsive image" style="width: 1700px;height:auto;">
											</div>
											<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center"></div>
										</div>
									</div>  
									<br>
									<h1 class="text-center" style="color: #213e5f;">Пропонуємо широкий спектр послуг:</h1><br>
								</div>


								<div class="row">
									<div class="col-xs-1 col-sm-1 col-md-3 col-lg-3 text-center">
									</div>

									<div class="col-xs-10 col-sm-10 col-md-6 col-lg-6 text-left">

										<ul>
											<li>
												капітальне будівництво споруд житлового та нежитлового призначення;
											</li>
											<li>
												будівництво котеджних поселень;
											</li>
											<li>
												роботи з реставрації та реконструкції;
											</li>
											<li>
												капітальні ремонтні роботи;
											</li>
											<li>
												здача квартири під ключ в новобудовах;
											</li>
											<li>
												здача складських, виробничих та офісних приміщень в довготривалу оренду;
											</li>
											<li>
												поточний ремонт приміщень (офісних, квартир, складських) будь-якої складності;
											</li>
										</ul>
										<br><br>
									</div>
									<div class="col-xs-1 col-sm-1 col-md-3 col-lg-3 text-center">
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">

										<div class="row text-center">
											<a href="https://vk.com/club128897021" class="btn btn-primary" data-toggle="tooltip-right" title="Перейти на форум ПрАТ 'Ірокс' Вконтакті">Перейти на форум</a>
										</div>
										<br>
									</div>

								</div>

								<br><br>

							</div>

						</div>




						<div id="hideFeedback" class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> 

								<h1 id="feedback" class="text-center" Style="opacity:0.5;">Про нас згадують із вдячністю:</h1>
								<br><br>

							</div>
						</section>    

						<!-- Slider -->	  
						<div class="dark">         
							<div id="sliderHide" class="container" style="width: 102%; margin-left:-15px;">
								<div id="da-slider" class="da-slider img-responsive img-rounded">
									<div class="da-slide">
										<h2>Олександр,</h2>
										<p>приватний підприємець:<br>Довго обирав фірму-забудовника, розглядав всі варіанти, зупинився на компанії "Ірокс". По якості їхні будинки насьогодні найкращі!</p>

										<div class="da-img"><img src="images/1.png" alt="image01" /></div>
									</div>
									<div class="da-slide">
										<h2>Тетяна,</h2>
										<p>економіст: <br> Шумоізоляція приміщень особливо порадувала, люблю коли стіни зберігають таємниці! Особливо, коли святкуємо з друзями Новий рік:)</p>

										<div class="da-img"><img src="images/2.png" alt="image01" /></div>
									</div>
									<div class="da-slide">
										<h2>Володимир,</h2>
										<p>програміст:<br> Я звик обирати надійність, практичність та якість. Тому при виборі квартири дотошно дізнавався про конкретні тонкощі будівництва.</p>

										<div class="da-img"><img src="images/3.png" alt="image01" /></div>
									</div>
									<div class="da-slide">
										<h2>Маргарита,</h2>
										<p>бухгалтер:<br>  Хотілося би, щоб у нашій квартирі змогли би жити діти та онуки. Цегляні стіни в 50 см завтовшки мене переконали.</p>

										<div class="da-img"><img src="images/4.png" alt="image01" /></div>
									</div>
									<nav class="da-arrows">
										<span class="da-arrows-prev"></span>
										<span class="da-arrows-next"></span>
									</nav>
								</div>
							</div>
						</div> 





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

						<!-- <script src="js/script.js"></script> -->
						<script type="text/javascript" src="js/jquery.cslider.js"></script>
						<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>

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


						<!-- video script -->
<!-- 						<script type="text/javascript">
  //jQuery is required to run this code
  $( document ).ready(function() {

  	scaleVideoContainer();

  	initBannerVideoSize('.video-container .poster img');
  	initBannerVideoSize('.video-container .filter');
  	initBannerVideoSize('.video-container video');

  	$(window).on('resize', function() {
  		scaleVideoContainer();
  		scaleBannerVideoSize('.video-container .poster img');
  		scaleBannerVideoSize('.video-container .filter');
  		scaleBannerVideoSize('.video-container video');
  	});

  });

  function scaleVideoContainer() {

  	var height = $(window).height() + 5;
  	var unitHeight = parseInt(height) + 'px';
  	$('.homepage-hero-module').css('height',unitHeight);

  }

  function initBannerVideoSize(element){

  	$(element).each(function(){
  		$(this).data('height', $(this).height());
  		$(this).data('width', $(this).width());
  	});

  	scaleBannerVideoSize(element);

  }

  function scaleBannerVideoSize(element){

  	var windowWidth = $(window).width(),
  	windowHeight = $(window).height() + 5,
  	videoWidth,
  	videoHeight;

  	console.log(windowHeight);

  	$(element).each(function(){
  		var videoAspectRatio = $(this).data('height')/$(this).data('width');

  		$(this).width(windowWidth);

  		if(windowWidth < 1000){
  			videoHeight = windowHeight;
  			videoWidth = videoHeight / videoAspectRatio;
  			$(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

  			$(this).width(videoWidth).height(videoHeight);
  		}

  		$('.homepage-hero-module .video-container video').addClass('fadeIn animated');

  	});
  }

</script> -->

<!-- scrollreveal script here -->

<script>
	{
		if (screen.width > 1220) document.write ('<script src="js/scroll.js" ></sc' + 'ript>');
	}
</script>


</body>
</html>
