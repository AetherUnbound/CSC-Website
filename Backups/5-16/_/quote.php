<?php //first line
ob_start(); //output buffering

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0 
?>
	<?php $thisPage="Quote"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Charlie Schwab</title>
	<meta charset="UTF-8">
	
	<link rel="shortcut icon" href="Logos\SchwabLogoCenterIcon.ico">
	<link href="Styles\stylesheet.css" rel="stylesheet" type="text/css">	
	<link href="Styles\searchstyle.css" rel="stylesheet" type="text/css">
	<link href="Styles\quotetablestyle.css" rel="stylesheet" type="text/css">


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
	<span id="wrap" class="quote">
		<form action="quote.php" autocomplete="off">
			<input id="search" name="search" type="text" placeholder="What are we quoting ?">
			<input id="search_submit" type="submit">
		</form>
	</span>
	<div style="padding-bottom: 80px; margin-bottom: 5vh;"></div>
	<div class="tablelayout">
	  <h1 class="cellnobord">GOOG</h1>
	  <div class="cellnobord">
	  
	   <h3 class="tablelayout w100">Google Inc.</h3>
		<div class="tablelayout w100"> 
		  		  
		  <div class="row">
			<p class="cell left"> Last </p>
			<p class="cell right"> 530.80 </p>
		  </div>
		  <div class="row">
			<p class="cell left"> Change </p>
			<p class="cell right red"> -9.98 </p>
		  </div>
		  <div class="row">
			<p class="cell left"> % Change </p>
			<p class="cell right red"> -1.85% </p>
		  </div>
		  <div class="row">
			<p class="cell left"> High </p>
			<p class="cell right"> 539.74 </p>
		  </div>
		  <div class="row">
			<p class="cell left"> Low </p>
			<p class="cell right"> 530.39 </p>
		  </div>
		  <div class="row">
			<p class="cell left"> Daily Volume </p>
			<p class="cell right"> 1,381,740 </p>
		  </div>
		  <div class="row">
			<p class="cell left"> Prev Close </p>
			<p class="cell right"> 540.78 </p>
		  </div>
		  <div class="row">
			<p class="cell left"> Bid </p>
			<p class="cell right"> 532.25 </p>
		  </div>
		  <div class="row">
			<p class="cell left"> Ask </p>
			<p class="cell right"> 530.00 </p>
		  </div>
		  <div class="row">
			<p class="cell left"> 52 Week High </p>
			<p class="cell right"> 599.65 </p>
		  </div>
		  <div class="row">
			<p class="cell left"> 52 Week Low </p>
			<p class="cell right"> 487.56 </p>
		  </div>
		</div>
	  </div>
	</div>
	<div class="tablelayout">
	 <div class="cellnobord">
		<h3 class="tablelayout w100 fundament">Fundamentals</h3>
		<div class="tablelayout w100">
			<div class="row">
				<p class="cell left borderleft"> PE Ratio </p>
				<p class="cell right"> 25.25 </p>
			</div>
			<div class="row">
				<p class="cell left borderleft"> Earnings/share </p>
				<p class="cell right"> 20.99 </p>
			</div>
			<div class="row">
				<p class="cell left borderleft"> Div/Share </p>
				<p class="cell right"> n/a </p>
			</div>
			<div class="row">
				<p class="cell left borderleft"> Market Cap. </p>
				<p class="cell right"> 183,586.0 Mil</p>
			</div>
			<div class="row">
				<p class="cell left borderleft"> # Shares Out. </p>
				<p class="cell right"> 680,622,000 </p>
			</div>
			<div class="row">
				<p class="cell left borderleft"> Div. Yield </p>
				<p class="cell right"> n/a </p>
			</div>
		</div>
	 </div>
	</div>
	<div class="thebottom"></div>		
	
</body>
<?php 
ob_end_flush();
?> 