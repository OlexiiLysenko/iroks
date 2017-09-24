
 	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    
    	<script type="text/javascript" src="js/jquery.cslider.js"></script>
    	
    <!-- Включити можливість відображання sidebar -->
    <script>
        $(function(){
        	 // side-nav
            var bodyEl = $('body'),
            	navToggleBtn = bodyEl.find('.nav-toggle-btn');
            navToggleBtn.on('click', function(e) {
            	bodyEl.toggleClass('active-nav');
            	e.preventDefault();
            });
        });
    </script>   