<?php //first line
ob_start(); //output buffering

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0 
?>
	<?php $thisPage="History"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Charlie Schwab</title>
	<meta charset="UTF-8">
	
	<link rel="shortcut icon" href="Logos\SchwabLogoCenterIcon.ico">
	<link href="Styles\stylesheet.css" rel="stylesheet" type="text/css">
	<link href="Styles\searchstyle.css" rel="stylesheet" type="text/css">
	<link href="Styles\histtablestyle.css" rel="stylesheet" type="text/css">


</head> 

<body class="notindex">
<div id="top-background">	
	<div class="nav" id="navbar">
		<ul>
			<li><a <?php if ($thisPage=="Home") echo " class='active'";?> id="homenav" href="index.php"><img src="Logos\SchwabLogoCenter.png" style="margin-bottom:-30px; vertical-align:top; height: 95px; width: 100px;"></a></li>
			<li><a <?php if ($thisPage=="Quote") echo " class='active'";?> href="quote.php" id="quotenav">Quote</a></li>
			<li><a <?php if ($thisPage=="History") echo " class='active'";?> href="history.php" id="histnav">History</a></li>
			<li><a <?php if ($thisPage=="Find") echo " class='active'";?> href="find.php" id="findnav">Find</a></li>
		</ul>
	</div>
	<hr class="top">
</div>

<div id="containertemp">
	<div id="wrap" class="quote">
		<form action="quote.php" autocomplete="off">
			<input id="search" name="search" type="text" placeholder="What are we dating ?">
			<input id="search_submit" type="submit">
		</form>
	</div>
	<div style="padding-bottom: 80px;"></div>
	<div class="tablelayout">
	  <h1 class="cellnobord">GOOG</h1>
	  <div class="cellnobord">
	  
	   <h3 class="tablelayout w100">Google Inc.</h3>		
	  </div>	  
	</div>
	<div class="tablelayout">
		<hr>
	</div>
	<div class="tablelayout">
		<div class="row title">
			<p class="cell center borderleft">Date</p>
			<p class="cell right">Last</p>
			<p class="cell right">Change</p>
			<p class="cell right">%Change</p>
			<p class="cell right">Volume</p>
		</div>
	</div>
	<div class="tablelayout">
		<hr>
	</div>
	<div style="height: 50vh; overflow: auto;">
		<div class="tablelayout hist">
			
			<?php
			for ($x =0; $x <= 100; $x++) {
				echo "
				<div class=\"row\">
					<p class=\"cell center borderleft\">05/06/2015</p>
					<p class=\"cell right\">524.22</p>
					<p class=\"cell right red\">-6.58</p>
					<p class=\"cell right red\">-1.24</p>
					<p class=\"cell right borderright\">1,566,867</p>
				</div>";
			}?>
		</div>
	</div>
	<div class="tablelayout">
		<hr class="hrbot">
	</div>
	<div class="thebottom"></div>
</div>
</body>
<?php 
ob_end_flush();
?> 