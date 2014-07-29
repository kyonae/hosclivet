/**
 * 
 */
$('#tableEmployees').footable().bind('footable_filtering', function (e) {
	var selected = $('.filter-status').find(':selected').text();
	if (selected && selected.length > 0) {
		e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
		e.clear = !e.filter;
	}
});

$('.clear-filter').click(function (e) {
	e.preventDefault();
	$('.filter-status').val('');
	$('table').trigger('footable_clear_filter');
});

$("#tableEmployees > tbody > tr").click(function(){
	/* Quitar esta linea para permitir seleccion multiple de filas*/
	var hasClass=false;
	if ($(this).hasClass('activeRow'))
		hasClass=true;
	$("#tableEmployees > tbody > tr").removeClass('activeRow');
	if (!hasClass)
		$(this).addClass('activeRow');

});