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
</script>
<link href="Styles\\portfoliostyle.css" rel="stylesheet" type="text/css">
<div id="portcontainer">
	<div id="porttabs">
		<div class="portheader">
			<a href="#"><h2 id="port0" class="portactive">View Portfolio</h2></a>
		</div>
		<div class="portheader">
			<a href="#"><h2 id="port1">Add a Stock</h2></a>
		</div>
	</div>
	<div id="portadd">
		add stocks
	</div>
	<div id="portinfo">
		portfolio table
	</div>
</div>