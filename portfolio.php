<?php 
require "search.php";
?>
<script>
//code here to determine which div to actually display
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

$("#addbutton").click(function (e) {
	e.preventDefault();
	//checkInputs();
	//console.log("Pre-register validity status: " + validator.valid);
	//if(validator.valid) {
		//registerAJAX();
	//}
});
	
$(document).keypress(function(e) {
	//if fields have values and the enter key is pressed
	if(e.which == 13 && $("#usernametext").val() && $("#passwordtext").val()) { 
		console.log('You pressed enter!');
		//checkInputs();
		//if(validator.valid) {
		//	registerAJAX();
		//}
	}
});	

</script>
<link href="Styles\\\portfoliostyle.css" rel="stylesheet" type="text/css">
<div id="portcontainer">
	<div id="porttabs">
		<div class="portheader">
			<a href="#"><h2 id="port0" class="portactive">View Portfolio</h2></a>
		</div>
		<div class="portheader">
			<a href="#"><h2 id="port1">Add a Stock</h2></a>
		</div>
	</div>
	<div id="portinfo">
		<div style="margin-top: 30px"></div>
		<div class="tablelayout ">
			<div class="row title">
				<p class="cell center borderleft">Date</p>
				<p class="cell right">Last</p>
				<p class="cell right">Change</p>
				<p class="cell right">%Change</p>
				<p class="cell right">Volume</p>
			</div>
		</div>		
		<div class="tablelayout ">
			<hr>
		</div>
		<div class="tablelayout">
			<div class="row">
				<p class="cell center borderleft">11/19/15</p>
				<p class="cell right">738.41</p>
				<p class="cell right red">-1.59</p>
				<p class="cell right red">-0.21%</p>
				<p class="cell right borderright">1,327,275</p>
			</div>
			<div class="row">
					<p class="cell center borderleft">11/18/15</p>
					<p class="cell right">740.00</p>
					<p class="cell right ">14.70</p>
					<p class="cell right ">2.03 %</p>
					<p class="cell right borderright">1,683,978</p>
			</div>
		</div>
		<div class="tablelayout ">
			<hr class="hrbot">
		</div>
	</div>
	<div id="portadd">
		<form id="addform">		
		Symbol: <input id="addsymbol" type="text" placeholder="Ex. GOOG"> <br/><br/>
		Quantity: <input id="addquantity" type="text" placeholder="Ex. 1, 15"> <br/><br/>
		Purchase Price: <input id="addprice" type="text" placeholder="Ex. 10, 4.20, 158.39"> <br/><br/>
		<div id="addbutton"><a href="#">Add</a></div>
		</form>
	</div>	
</div>