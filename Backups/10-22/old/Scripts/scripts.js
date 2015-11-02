//scripts 
$(document).ready( function() {
	var elemBackground = $("#search_submit").css("background");
	$("#search").click(function(){
		if(elemBackground == "url('\\Logos/search-icon-md-small.png') center center no-repeat")
		{
			$("#search_submit").css("background", "url('\\Logos/arrowsmall.png') center center no-repeat");
		}
		else 
		{
			$("#search_submit").css("background", "url('\\Logos/search-icon-md-small.png') center center no-repeat");
		}
	});
	
	$("#search_submit").click(function(){
		if(elemBackground == "url('\\Logos/arrowsmall.png') center center no-repeat")
		{
			$("#search_submit").css("background", "url('\\Logos/search-icon-md-small.png') center center no-repeat");
		}
		else
		{
			$("#search_submit").css("background", "url('\\Logos/arrowsmall.png') center center no-repeat");
		}
	});
	
	$("#wrap").click(function(){
		if(elemBackground == "url('\\Logos/arrowsmall.png') center center no-repeat")
		{
			$("#search_submit").css("background", "url('\\Logos/search-icon-md-small.png') center center no-repeat");
		}
		else
		{
			$("#search_submit").css("background", "url('\\Logos/arrowsmall.png') center center no-repeat");
		}
	});

});



/*
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

$(function() {
   $('#dumb').toggle(function() {
    $('input').link("fast");
   }, function() {
    $('p').hide("fast");
   });
});

search.addEventListener('click', function() {
	document.getElementById("#search_submit").style.background = (document.getElementById("#search_submit").style.background == 'url("\\Logos\\arrowBrownSmall.png") center center no-repeat') ? 'url("\\Logos\\search-icon-md-small.png") center center no-repeat' : 'url("\\Logos\\arrowBrownSmall.png") center center no-repeat';
});
*/