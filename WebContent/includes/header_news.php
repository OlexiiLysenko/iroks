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

          <?php
            $categories_q = mysqli_query($connection, "SELECT * FROM `articles_categories`");
            $categories = array();
            while ( $cat = mysqli_fetch_assoc($categories_q) )
            {
                $categories[] = $cat;
            }
           ?>

            <div class="collapse navbar-collapse" id="responsive-menu" style="margin-top:30px;">
              <ul class="nav navbar-nav">
              
                  <?php 
                      foreach ( $categories as $cat )
                      { 

                        if($cat['id'] == 3 )
                        {
                          ?>
                        <li><a id="nav1" href="//iroks.com.ua/<?php echo $cat['pagename']; ?>" style="color:#fff;"><?php echo $cat['title']; ?></a></li>
                          <?php
                        }else
                        {
                          ?>
                          <li><a id="nav1" href="//iroks.com.ua/<?php echo $cat['pagename']; ?>"><?php echo $cat['title']; ?></a></li>
                          <?php
                        }
                      }
                  ?>
              
          </ul>
     		 </div> 
		    </div>
   	  </div>
    </div>
  </div>
