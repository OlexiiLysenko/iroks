<?php
    include "config.php";
?>
<footer class="footer1" style="margin-top: 0px;">
<div class="container">

<div class="row"><!-- row -->
            
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Консульт. центр</h1>
                                
                                <ul style="margin-left:40px;">
                                	<li><p> м. Львів, вул. Залізнична, 7</p></li>
                                    <li><p>Гаряча лінія:</p>
									 <p>+38(068)-504-36-42
                                     <br>+38(032)-229-58-55</p></li>

                                     <li><p>Cекретар:</p>
                                     <p>+38(068)-091-00-05</p></li>

                                </ul>
                    
							</li>
                            
                        </ul>
                         
                      
                </div><!-- widgets column left end -->
                
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
            
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Email</h1>
                                
                                <ul style="margin-left:40px;">
 									<li><p><a href="mailto:iroks.smanager@gmail.com" style="color:#fff;">iroks.smanager@gmail.com</a></p></li>

                                     <li><p>Відділ постачання:</p>
                                     <p>+38(063)-264-98-24</p></li>
                                </ul>
                    
							</li>
                            
                        </ul>
                         
                      
                </div><!-- widgets column left end -->
                
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
            
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Телефони менеджерів</h1>
                                
                                <ul class="text-justify" style="margin-left:50px;">

               
          <?php
            $managers = mysqli_query($connection, "SELECT * FROM `managers` ORDER BY manager_priority;");
            while( $man = mysqli_fetch_assoc($managers) )
            {
          ?>
					
                    <li><?php echo $man['manager_phone'];?> <b><?php echo $man['manager_name'] ;?></b> </li>
                    <!-- <li>+38(067)-773-83-86   <b>Наталія</b> </li>
                    <li>+38(068)-811-41-12   <b>Соломія</b> </li>
                    <li>+38(067)-943-68-65   <b>Світлана</b> </li>
                    
                    <li> +38(068)-696-34-24   <b>&nbsp;&nbsp;Оксана</b> </li>
                    <!-- <li> +38(098)-971-35-58   <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Леся</b> </li> --> 
 		
            <?php
            }
            ?>
                                </ul>
						   </li>
                      </ul>
                         
                      
                </div><!-- widgets column left end -->
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column center -->
                
                   
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget"> Ми у соц.мережах</h1>
                                <div class="social-icons">
                                
                                	<ul class="nomargin" style="margin-left:20px;">
                                    
						                 <a href="<?php echo $config['fb_url']; ?>"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
							            <a href="<?php echo $config['twitter']; ?>"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
							            <a href="<?php echo $config['youtube']; ?>"><i class="fa fa-youtube-square fa-3x social-em" id="social"></i></a>
							           <!--  <a href="<?php echo $config['vk_url']; ?>"><i class="fa fa-vk fa-3x social-gp" id="social"></i></a> -->
                                    
                          
                                    
                                    </ul>
                                </div>
                    		</li>
                    		<br><br><br><br><br>
                    		<li>
                    			<div class="text-center">
                    				<a href="http://iroks.com.ua/admin_entrance.php" class="btn btn-info" data-toggle="tooltip-left" title="Вхід для Адміністратора сайту" style="margin-left: 40px;">Вхід для Адміністратора сайту</a>
                    			</div>
                    		</li>
                          </ul>
                       </div>
                </div>
</div>
</footer>
<!--header-->

<div class="footer-bottom">

	<div class="container">

		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<div class="copyright">

					© 2017 - ПрАТ "ІРОКС" - Всі права захищено

				</div>

			</div>

		</div>

	</div>

</div>