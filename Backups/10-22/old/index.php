<?php //first line
ob_start(); //output buffering

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0 
session_start();
?>
<?php 
	$thisPage="Home";
	$statement="What are we seeking ?";	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Charlie Schwab</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="Logos\SchwabLogoCenterIcon.ico">
	<link href="Styles\stylesheet.css" rel="stylesheet" type="text/css">
	<link href="Styles\searchstylemain.css" rel="stylesheet" type="text/css">
	<?php //require "Scripts\DbUtil.php"; $objDBUtil = new DbUtil; ?>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<!--	<script src="Scripts\scripts.js"></script> -->
		

</head>

<body OnLoad="document.searchform.search.focus();">
<div id="top-background">	
	<div class="nav" id="navbar">
		<ul>
			<li><a <?php if ($thisPage=="Home") echo " class='active'";?> id="homenav" href="index.php"><img src="Logos\SchwabLogoCenterGrey.png" style="margin-bottom:-30px; vertical-align:top; height: 95px; width: 100px;"></a></li>
			<li><a <?php if ($thisPage=="Quote") echo " class='active'";?> href="info.php?page=Quote" id="quotenav">Quote</a></li>
			<li><a <?php if ($thisPage=="History") echo " class='active'";?> href="info.php?page=History" id="histnav">History</a></li>
			<li><a <?php if ($thisPage=="Find") echo " class='active'";?> href="info.php?page=Find" id="findnav">Find</a></li>
		</ul>
	</div>
	<hr class="top">
</div>
<div id="containertemp">
<?php require "blankform.php" ?>

</body>
<?php 
ob_end_flush();
?> 