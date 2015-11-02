<?php //first line
ob_start(); //output buffering

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0 
?>
	<?php $thisPage="Home"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Charlie Schwab</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="Logos\SchwabLogoCenterIcon.ico">
	<link href="Styles\stylesheet.css" rel="stylesheet" type="text/css">
	<link href="Styles\searchstyle.css" rel="stylesheet" type="text/css">
	
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="Scripts\scripts.js"></script>
		

</head>

<body OnLoad="document.searchform.search.focus();">
<div id="top-background">	
	<div class="nav" id="navbar">
		<ul>
			<li><a <?php if ($thisPage=="Home") echo " class='active'";?> id="homenav" href="index.php"><img src="Logos\SchwabLogoCenterGrey.png" style="margin-bottom:-30px; vertical-align:top; height: 95px; width: 100px;"></a></li>
			<li><a <?php if ($thisPage=="Quote") echo " class='active'";?> href="quote.php" id="quotenav">Quote</a></li>
			<li><a <?php if ($thisPage=="History") echo " class='active'";?> href="history.php" id="histnav">History</a></li>
			<li><a <?php if ($thisPage=="Find") echo " class='active'";?> href="find.php" id="findnav">Find</a></li>
		</ul>
	</div>
	<hr class="top">
</div>

<div id="containertemp">
	<div id="wrap" class="index">
		<form action="quote.php" autocomplete="off" name="searchform">
			<span id="searchspan"><input id="search" name="search" type="text" placeholder="What are we quoting ?"></span>
			<span id="submitspan"><input id="search_submit" type="submit"></span>
		</form>
	</div>	
</div>
</body>
<?php 
ob_end_flush();
?> 