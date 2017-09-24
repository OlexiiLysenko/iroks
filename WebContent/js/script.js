$(document).ready(function(){
	$('ul.nav li.dropdown').hover(function(){

		$('.dropdown-menu', this).fadeIn();
	}, function(){
		$('.dropdown-menu', this).fadeOut('fast');
	}); //Hover
});