<span id="wrap" class="quote">
		<form id="theform" action="info.php" autocomplete="off">
			<input id="search" name="search" type="text" placeholder="<?php print $statement;?>">
			<input id="search_submit" type="submit">
			<input type='hidden' name='page' value='<?php print $thisPage;?>'>
		</form>
</span>
<script>
	var elemBackground = $("#search_submit").css("background");
	/*
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
	}); */
	</script>