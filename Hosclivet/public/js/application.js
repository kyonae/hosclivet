$(document).ready(function(){
	$(window).resize();
});

$(window).resize(function(event){

	$('#header').css('position','fixed').css('width','100%').css('top','0px').css('z-index','9');
	$('.debug-helper-box').css('z-index','8');
	$('.content').css('margin-top', $('#header').innerHeight());
	
	if (Modernizr.mq('(min-width: 801px)')) {
	} 
	else{
	}

});

