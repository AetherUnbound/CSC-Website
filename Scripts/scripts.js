//scripts 
var submitted = false;
var searchVal;
$(document).ready( function() {
		
	setPage(thisPage);
	
	$("#search").attr("placeholder", statement);
	
	console.log(thisPage);
	$("#homenav").click( function(ev) {
		ev.preventDefault();
		resetNav();
		setHome();
	});
	$("#quotenav").click( function(ev) {
		ev.preventDefault();
		resetNav();
		setQuote();
		fillContent();
	});
	$("#histnav").click( function(ev) {
		ev.preventDefault();
		resetNav();
		setHist();
		fillContent();
	});
	$("#findnav").click( function(ev) {
		ev.preventDefault();
		resetNav();
		setFind();
		fillContent();
	});
	
	$("#portmenu").hover( function(ev) {
		//$("#portnav").trigger(ev.type);
		$("#portnav").addClass("porthover");		
		console.log("hovering!");
	}, function(ev) {
		$("#portnav").removeClass("porthover");
	});	
	
	
	//Loading gif when waiting for AJAX
	$.ajaxSetup({
                 beforeSend: function() {
                     $('#loading').show();
                     $('#containertemp').hide();
                 },
                 complete: function(){					 
                     $('#loading').hide();
                     $('#containertemp').show();
                 },
                 success: function() {}
	});
	
});	



function setPage(page) {
	if(page == "Home")
		setHome();
	else if (page == "Quote")
		setQuote();
	else if (page == "History")
		setHist();
	else if (page == "Find")
		setFind();
}

function resetNav() {
	//remove active from any other node
	$("#navul").find("a").removeClass("active");
	$("#homeimg").attr("src", "Logos\\SchwabLogoCenter.png");
}

function fillContent() {
	if(!search || (search && $("#search").val()))
		search = $("#search").val();	
	if(search && submitted)	{
		console.log("submitted and posting");
		if(thisPage == "Home")
			thisPage = "Quote";
		/* $.post("dataform.php", {page : thisPage, search : $("#search").val() }, function(data) {
			console.log("This Page: " + thisPage);
			console.log("Search: " + $("#search").val());
			console.log("Data Loaded: " + data);
		}); */
		$.post("dataform.php", {page : thisPage, search : search }, function(data) {
			//$("#containertemp").hide();
			$("body").addClass("notindex");
			resetNav();
			setPage(thisPage);
			$("#containertemp").html(data); 			
			submitted = true; 
			console.log(submitted);
			$("#containertemp").fadeIn(750);
			
		});
	}
	else { 
		$("#containertemp").load("blankform.php");
		$("#search").val("");
	}
}

function setHome() {
	statement = "What are we seeking ?";
	thisPage = "Home";
	submitted = false;
	$("#homenav").addClass("active");
	$("#homeimg").attr("src", "Logos\\SchwabLogoCenterGrey.png");
	$("#containertemp").load("blankform.php");
	$("body").removeClass("notindex");	
	//$("#search").attr("placeholder", statement);
}

function setQuote() {
	statement = "What are we quoting ?";
	thisPage = "Quote";
	$("#quotenav").addClass("active");
}

function setHist() {
	statement = "What are we dating ?";
	thisPage = "History";
	$("#histnav").addClass("active");
	console.log("Changing to history");
}

function setFind() {
	statement = "What are we finding ?";
	thisPage = "Find";
	$("#findnav").addClass("active");
}
	
/*
function setActive() {
	hash = location.hash;
	curLoc = hash.substr(1, hash.length-2);
	if(curLoc)
		document.getElementById(curLoc).classList.add("active");
	else //if URL is blank, loads home
		document.getElementById("homenav").classList.add("active");
	//window.alert("curLoc" + "'" + curLoc + "'");		
} */

