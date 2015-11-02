<link href="Styles\\searchstylemain.css" rel="stylesheet" type="text/css">
	<script>
		document.searchform.search.focus();
		$("#search").attr("placeholder", statement);</script>
	<div id="wrap" class="index">
		<?php $_SESSION["page"] = "Quote"; ?>
		<form action="info.php" autocomplete="off" name="searchform">
			<span id="searchspan"><input id="search" name="search" type="text" placeholder="<?php //print $statement;?>"></span>
			<span id="submitspan"><input id="search_submit" type="submit"></span>
			<input type='hidden' name='page' value='<?php if($thisPage=='Home') print "Quote"; else print $thisPage;?>'>
		</form>
	</div>		
</div>