//scripts 
var submitted = false;

$(document).ready( function() {
		
	if(thisPage == "Home")
		//statement = "What are we seeking ?";
		setHome();
	else if (thisPage == "Quote")
		setQuote();
	else if (thisPage == "History")
		setHist();
	else if (thisPage == "Find")
		setFind();
	
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
	});
	$("#histnav").click( function(ev) {
		ev.preventDefault();
		resetNav();
		setHist();
	});
	$("#findnav").click( function(ev) {
		ev.preventDefault();
		resetNav();
		setFind();
	});
	
});	


function resetNav() {
	//remove active from any other node
	$("#navul").find("a").removeClass("active");
	$("#homeimg").attr("src", "Logos\\SchwabLogoCenter.png");
}

function fillContent() {
	if($("#search").val() && submitted)	{
		console.log("submitted and posting");
		if(thisPage == "Home")
			thisPage = "Quote";
		$.post("dataform.php", {page : thisPage, search : $("#search").val() }, function(data) {
			console.log("This Page: " + thisPage);
			console.log("Search: " + $("#search").val());
			console.log("Data Loaded: " + data);
		});
		//$.post("dataform.php", {page : thisPage, search : $("#search").val() }, function(data) {$("#containertemp").html(data);});
	}
	else { 
		$("#containertemp").load("blankform.php");
		$("#search").val("");
	}
}

function setHome() {
	statement = "What are we seeking ?";
	$("#homenav").addClass("active");
	$("#homeimg").attr("src", "Logos\\SchwabLogoCenterGrey.png");
	$("#containertemp").load("blankform.php");	
	//$("#search").attr("placeholder", statement);
}

function setQuote() {
	statement = "What are we quoting ?";
	$("#quotenav").addClass("active");
	fillContent();
}

function setHist() {
	statement = "What are we dating ?";
	$("#histnav").addClass("active");
	fillContent();
}

function setFind() {
	statement = "What are we finding ?";
	$("#findnav").addClass("active");
	fillContent();
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

