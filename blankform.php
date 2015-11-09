<link href="Styles\\searchstylemain.css" rel="stylesheet" type="text/css">
	<script>
		//document.searchform.search.focus();
		$("#search").focus();
		$("#search").attr("placeholder", statement);		
		
		
		//I have to have this in the php because having in the ready function won't work
		//I suspect it has something to do with this content not actually being loaded or some bs
		$("form").submit(function (e) {
			e.preventDefault();
			submitted = true;
			console.log("I stopped the form submit");
			//TODO: get this to work			
			$("#containertemp").hide();
			fillContent();
			
		});</script>
	<div id="wrap" class="index">
		<?php $_SESSION["page"] = "Quote"; ?>
		<form action="#" autocomplete="off" name="searchform" method="post">
			<span id="searchspan"><input id="search" name="search" type="text" placeholder="<?php //print $statement;?>" /></span>
			<span id="submitspan"><input id="search_submit" type="submit" /></span>			
		</form>
	</div>		
</div>