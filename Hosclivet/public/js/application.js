var LIMITE_TAMANYO = 800;

$(document).ready(function(){
	$(window).resize();
	
	$('#menu_button').click(function(){
		$('.header').slideToggle();
	});
});

$(window).resize(function(event){
	
	var position = $('#footer').innerHeight() + 10;
	$('.debug-helper-box').css('bottom',position);
	
	if ( $(window).width() > LIMITE_TAMANYO ){
		$('.content').css('margin-top', $('#header').innerHeight()).css('margin-bottom', $('#footer').innerHeight());
		$('#menu_button').hide();
		$('#menu_navigation').show();
	}
	else{
		$('.content').css('margin-top', $('.title-box').innerHeight()).css('margin-bottom', $('#footer').innerHeight());
		$('#menu_button').show();
		$('#menu_navigation').hide();
	}
});
