//scripts 
$(document).ready( function() {
 
//This doesn't work and needs to be fixed 

var search = document.getElementById('search_submit');
var setter = document.getElementById('search');
/*
setter.addEventListener('click', swapopac(search));
search.addEventListener('click', swapopac(search)); */
 
 
 /*
 $('#searchspan').on('click', function() {
	 if($('#submitspan').css('opacity') =="0.4")
	{
		$('#submitspan').css('opacity', "1");
	}
	else
	{
		$('#submitspan').css('opacity', "0.4");
 } });
 */
 
  $('#submitspan').on('click', function() {
	 if($('#submitspan').css('opacity') =='0.4')
	{
		$('#submitspan').css('opacity', "1");
	}
	else
	{
		$('#submitspan').css('opacity', "0.4");
 } });
 
});

function swapopac() {
	if($('search_submit').css('opacity') ==="0.4")
	{
		$('search_submit').css('opacity', "1");
	}
	else
	{
		$('search_submit').css('opacity', "0.4");
	} 
}