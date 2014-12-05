var LIMITE_TAMANYO = 800;

$(document).ready(function(){
	$(window).resize();
	$('.content').css('margin-bottom', $('#footer').innerHeight());
	
	$('#menu_button').click(function(){
		$('.header').slideToggle();
	});
	
	$('.content').click(function(){
		if ($(window).width() <= LIMITE_TAMANYO && $('.header').is(":visible")){
			$('#menu_button').click();
		}
	});
});

$(window).resize(function(event){
	
	var position = $('#footer').innerHeight() + 10;
	$('.debug-helper-box').css('bottom',position);

	if ( $(window).width() > LIMITE_TAMANYO ){
		$('.content').css('margin-top', $('#header').innerHeight());
		$('#menu_navigation').show();
	}
	else{
		$('.content').css('margin-top', $('.title-box').innerHeight());
		$('#menu_navigation').hide();
	}
});
