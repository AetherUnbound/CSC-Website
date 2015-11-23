<?php 
require "search.php";
?>
<script>
//code here to determine which div to actually display
var currDisp = ".percent";
var symFound = false;
var currRow = "";
var currIndex = "";
var isRowFilled = false;
var deleteFill = ' <p class="cell left borderleft delrow">Delete?</p> <p class="cell center date delrow portdeleteyes">Yes</p>	<p class="cell center delrow portdeleteno">No</p> <p class="cell center delrow"></p> <p class="cell center delrow"></p> <p class="cell right borderright delrow"></p> ';
//Dictionaries for the delete option
var rowDict = {};
var symbolDict = {};
var priceDict = {};


$("#porttabs a").click(function(ev) {
	ev.preventDefault();
	console.log($(this).find("h2").attr('id'));
	//switches the "active" class to the different tab
	if($(this).find("h2").attr('id') == "port0") {
		$(this).find("h2").addClass("portactive");
		$("#porttabs h2").eq(1).removeClass("portactive");
		$("#portadd").hide();
		$("#portinfo").show();
	}
	else { //if index == 1
		$(this).find("h2").addClass("portactive");
		$("#porttabs h2").eq(0).removeClass("portactive");
		$("#portinfo").hide();
		$("#portadd").show();		
	}
});

$("#portaddsearch").click(function (e) {
	e.preventDefault();	
	portAddSearch();	
});

$("#portaddbutton").hide();

$("#portaddbutton").click(function(e) {
	e.preventDefault();
	if(checkInputs()) {
		portAddStock();
	}
});

$("#portaddcancel").click(function(e) {
	e.preventDefault();
	//clear all inputs and switch to view portfolio tab
	$("#addsymbol").val(""); 
	$("#addquantity").val("");
	$("#addprice").val("");
	$("#addsymbol").prop('disabled', false);
	$("#portaddbutton").hide();
	$("#portaddsearch").show();
	//reset portfolio page
	portfolioPage();
});

$("#portdata").click(function(e) {	
	$("#errordivinfo").html("");
	e.preventDefault();
	console.log("What you clicked: " + $(e.target).html());
	console.log("Sibling Symbol: " + $(e.target).siblings(".borderleft").html());
	currRow = $(e.target).parent().html();
	currIndex = $(e.target).parent().index();
	if($(e.target).hasClass("portdeleteyes")) {
		console.log("Found a yes");
		$.ajax({
			type: "POST",
			async: false,
			url: "AJAX\\portfoliodelete.php",
			data: {
				user : username,
				symbol : symbolDict[currIndex],
				price : priceDict[currIndex]
			},
			success: function(data) {
				console.log(data);
				delete rowDict[currIndex];
				delete symbolDict[currIndex];
				delete priceDict[currIndex];
				//reload the page once the delete is complete
				portfolioPage();
			},
			error: function(data) {
				console.log(data);
			}
		});		
	}
	if(!(currIndex in rowDict)) {
		//$(e.target).parent().addClass("delrow");
		//console.log(currRow);
		//console.log("Index: " + currIndex);
		rowDict[currIndex] = currRow;
		symbolDict[currIndex] = $(e.target).siblings(".borderleft").html();
		priceDict[currIndex] = $(e.target).siblings(".price").html();
		console.log("Symbol: " + symbolDict[currIndex] + " Price: " + priceDict[currIndex]);
		//console.log("Index 0: " + rowDict[0]);
		//console.log("Data at currIndex: " + rowDict[currIndex]);
		$(e.target).parent().html(deleteFill);			
	}
	else if(currIndex in rowDict) {
		$(e.target).parent().html(rowDict[currIndex]);
		//console.log("Deleting " + rowDict[currIndex]);
		delete rowDict[currIndex];
	}
});

$(document).keydown(function(e) {
	//if enter key is pressed and searching
	$("#errordiv").html("");
	if(e.which == 13 && !symFound) { 
		portAddSearch();	
	}	
	//if enter key is pressed and adding
	else if((e.which == 13 && checkInputs())) {
		//run input check
		portAddStock();
		console.log("port test");
	}
	else if(e.which == 13) {
		console.log("Edit port args empty");
		$("#errordiv").html("Some of the forms are not filled");
	}
});	

function portAddSearch() {
	if($("#addsymbol").val() == "") {
		$("#errordiv").html("No symbol given");
	}
	else {
		$("#errordiv").html("");
		$.ajax({
			type: "POST",
			async: false,
			url: "AJAX\\portaddpresearch.php",
			data: { symbol : $("#addsymbol").val()},
			success: function(data) {
				$("#addsymbol").val(data);
				$("#addsymbol").prop('disabled', true);
				$("#addformalt").show();
				$("#portaddsearch").hide();
				$("#portaddbutton").show();
				$("#addquantity").focus();
				symFound = true;
			},
			error: function(data) {
				$("#errordiv").html("No symbol found for: " + $("#addsymbol").val());
			}
		});
	}		
}

function portAddStock() {
	console.log("Query: INSERT INTO pordb VALUES (NULL, '" + username + "', now(), '" +  $("#addsymbol").val() + "', '" +	$("#addquantity").val() + "', '" + $("#addprice").val() + "');");
	$.ajax({
		type: "POST",
		url: "AJAX\\portaddstock.php",
		data: { 
			user : username,
			symbol : $("#addsymbol").val(),
			quantity : $("#addquantity").val(),
			price : $("#addprice").val()			
		},
		success: function(data) {
			console.log("Portfolio insertion successful");
			$("#portedit").html("<p>Portfolio Addition Successful!</p>");
			setTimeout(portfolioPage, 1000);
		},
		error: function(data) {
			$("#portedit").html("<p style'color=red'>Portfolio Addition Failure</p>");
			console.log("Critical Portfolio Error!");
		}
	});
}

function checkInputs() {	
	$("#errordiv").html("");
	$("#addquantity").removeClass("notext");
	$("#addprice").removeClass("notext");
	if($("#addquantity").val() == "") {
		$("#addquantity").addClass("notext");		
		$("#errordiv").html("Some of the forms are not filled");
		return false;
	}
	else if($("#addprice").val() == "") {
		$("#addprice").addClass("notext");		
		$("#errordiv").html("Some of the forms are not filled");
		return false;
	}
	return true;
}

function loadPortfolio() {
	$.ajax({
		type: "POST",
		url: "AJAX\\portfoliorequest.php",
		data: { user : username },
		success: function(data) {
			$("#portdata").html(data);
			console.log("Portfolio successfully imported");
		},
		error: function(data) {
			$("#portdata").html("No porfolio data found");
			console.log("Critical Portfolio Error!");
		}
	});
}

</script>
<link href="Styles\portfoliostyle.css" rel="stylesheet" type="text/css">
<div id="portcontainer">
	<div id="porttabs">
		<div class="portheader">
			<a href="#"><h2 id="port0" class="portactive">View Portfolio</h2></a>
		</div>
		<div class="portheader">
			<a href="#"><h2 id="port1">Edit Portfolio</h2></a>
		</div>
	</div>
	<div id="portinfo">
	<div id="errordivinfo"></div>
		<div style="margin-top: 30px"></div>
		<div class="tablelayout ">
			<div class="row title">
				<p class="cell center borderleft">Symbol</p>
				<p class="cell center date">Date</p>
				<p class="cell center">Quantity</p>
				<p class="cell center">Price</p>
				<p class="cell center">Last</p>
				<p class="cell center"><span class="dollar">$</span><span class="percent" style="display: none">|%</span> G/L</p>
			</div>
		</div>		
		<div class="tablelayout ">
			<hr>
		</div>
		<div id="portdata" class="tablelayout">
			
		</div>
		<div class="tablelayout ">
			<hr class="hrbot">
		</div>
		<div id="porttotals"> 
			Total Portfolio Gain/Loss: <span id="totalVal">0</span>
		</div>
	</div>
	<div id="portedit">
		<div id="errordiv"></div>
		<div id="portadd">
			<form id="addform">		
			Symbol: <input id="addsymbol" type="text" placeholder="Ex. GOOG"> <br/><br/>
			<span id="addformalt" style="display: none">
			Quantity: <input id="addquantity" type="text" placeholder="Ex. 1, 15"> <br/><br/>
			Purchase Price: <input id="addprice" type="text" placeholder="Ex. 10, 4.20, 158.39"> <br/><br/>
			</span>
			</form>
			<div style="text-align: center">
			<span id="portaddsearch" class="addbutton"><a href="#">Search</a></span>
			<span id="portaddbutton" class="addbutton"><a href="#">Add</a></span>
			<span id="portaddcancel" class="addbutton"><a href="#">Cancel</a></span>
			</div>
		</div>	
	</div>
</div>
<script>loadPortfolio(); //having this at the end of the document ensures the entire page loads before we fill content that doesn't exist yet</script>