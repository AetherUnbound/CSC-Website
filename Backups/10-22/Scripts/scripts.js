//scripts 

$(document).ready( function() {
	if(thisPage == "Home")
		//statement = "What are we seeking ?";
		setHome();
	else if (thisPage == "Quote")
		statement = "What are we quoting ?";
	else if (thisPage == "History")
		statement = "What are we dating ?";
	else if (thisPage == "Find")
		statement = "What are we finding ?";
	
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

function setHome() {
	statement = "What are we seeking ?";
	$("#homenav").addClass("active");
	$("#homeimg").attr("src", "Logos\\SchwabLogoCenterGrey.png");
	$("#containertemp").load("blankform.php");	
	//$("#search").attr("placeholder", statement);
}


function resetNav() {
	//remove active from any other node
	$("#navul").find("a").removeClass("active");
	$("#homeimg").attr("src", "Logos\\SchwabLogoCenter.png");
}

function setQuote() {
	statement = "What are we quoting ?";
	$("#quotenav").addClass("active");
	$("#containertemp").load("dataform.php");
}

function setHist() {
	statement = "What are we dating ?";
	$("#histnav").addClass("active");
	$("#containertemp").load("dataform.php");
}

function setFind() {
	statement = "What are we finding ?";
	$("#findnav").addClass("active");
	$("#containertemp").load("dataform.php");
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

