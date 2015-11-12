<link href="Styles\searchstyle.css" rel="stylesheet" type="text/css">
<script> 
	$("#search").attr("placeholder", statement);
	$("#theform").submit(function (e) {
			e.preventDefault();
			submitted = true;
			console.log("I stopped the form submit");
			//TODO: get this to work
			$("#containertemp").hide();
			fillContent();
			
	});
</script>
<span id="wrap" class="quote">
		<form id="theform" action="info.php" autocomplete="off">
			<input id="search" name="search" type="text" placeholder="<?php //print $statement;?>">
			<input id="search_submit" type="submit">			
		</form>
</span>
