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
	//$thisPage = @$_SESSION["page"];	
	//$thisPage = @$_SERVER["PHP_SELF"];
	//$thisPage = strstr($thisPage, ".php", true);
	$thisPage = @$_GET['page'];
	if (empty($thisPage))
		$thisPage = "Home";
	$search = @$_GET["search"];	
	
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Charlie Schwab</title>
	<meta charset="UTF-8">
	
	<link rel="shortcut icon" href="Logos\SchwabLogoCenterIcon.ico">
	<link href="Styles\stylesheet.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width">
	<?php //require "Scripts\DbUtil.php"; $objDBUtil = new DbUtil; ?>
<!--<link href="Styles\searchstyle.css" rel="stylesheet" type="text/css">-->
	
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!--<script src="scripts.js"></script>-->
	<script src="Scripts\scripts.js"></script>
	<script> var thisPage = "<?php echo $thisPage?>"; var search = "<?php echo @$search?>"; var statement = "<?php echo @$statement?>";</script>

</head>

<body class="">
<script>  console.log(search); console.log(thisPage); console.log(statement); </script>
<div id="top-background">	
	<div class="nav" id="navbar">
		<ul id="navul">
			<li><a id="homenav" href="#"><img id="homeimg" style="margin-bottom:-30px; vertical-align:top; height: 95px; width: 100px;"></a></li>
			<li><a href="#" id="quotenav">Quote</a></li>
			<li><a href="#" id="histnav">History</a></li>
			<li><a href="#" id="findnav">Find</a></li>
			<li><a href="#" id="portnav">Portfolio<div id="portoptions">Testing</div></a></li>
			
		</ul>
	</div>
	<hr class="top">
</div>

<div id="portdiv">
testing
</div>
	
<div id="containertemp">
		
	<div class="thebottom"></div>		
	
</body>
<?php 
ob_end_flush();
?> 