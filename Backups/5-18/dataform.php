<?php 
$x=0;

function printHist() {
	for ($x =0; $x <= 100; $x++) {
				echo "
				<div class=\"row\">
					<p class=\"cell center borderleft\">05/06/2015</p>
					<p class=\"cell right\">524.22</p>
					<p class=\"cell right red\">-6.58</p>
					<p class=\"cell right red\">-1.24</p>
					<p class=\"cell right borderright\">1,566,867</p>
				</div>";
			}
}

$printHist = 'printHist';
$stock = strtoupper(substr($search, 0, 5));

if($thisPage == "Quote") {
print <<<EODQuote
	<div style="padding-bottom: 80px; margin-bottom: 5vh;"></div>
	<div class="tablelayout">
	  <h1 class="cellnobord">{$stock}</h1>
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
EODQuote;
}

elseif ($thisPage == "History") {
print <<<EODHist1
		<div style="padding-bottom: 80px;"></div>
		<div class="tablelayout">
	  <h1 class="cellnobord">{$stock}</h1>
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
EODHist1;
$printHist();
print <<<EODHist2
		</div>
	</div>
	<div class="tablelayout">
		<hr class="hrbot">
	</div>
EODHist2;
}

elseif ($thisPage == "Find") {
print <<<EODFind
	<div style="padding-bottom: 80px;"></div>
	<div class="tablelayout">	 
	  <div class="cellnobord">
	  
	   <h3 class="tablelayout w100">{$stock}</h3>
		
	  </div>	  
	</div>
	<div class="tablelayout">
		<hr>
	</div>
	<div class="tablelayout">
		<div class="row title">
			<p class="cell company borderleft">Company</p>
			<p class="cell symbol">Symbol</p>
			<p class="cell entry">4 Entries</p>			
		</div>
	</div>
	<div class="tablelayout">
		<hr>
	</div>	
	<div class="tablelayout">
		<div class="row">
			<p class="cell company borderleft">Google Inc.</p>
			<p class="cell symbol">GOOG</p>
			<p class="cell entry borderright"><a href="info.php?search=goog&page=Quote">Quote</a> <a href="info.php?search=goog&page=History">History</a></p>
		</div>
		<div class="row">
			<p class="cell company borderleft">Google Inc.</p>
			<p class="cell symbol">GOOAV</p>
			<p class="cell entry borderright"><a href="info.php?search=gooav&page=Quote">Quote</a> <a href="info.php?search=gooav&page=History">History</a></p>
		</div>
		<div class="row">
			<p class="cell company borderleft">Google Inc.</p>
			<p class="cell symbol">GOOCV</p>
			<p class="cell entry borderright"><a href="info.php?search=goog&page=Quote">Quote</a> <a href="info.php?search=goog&page=History">History</a></p>
		</div><div class="row">
			<p class="cell company borderleft">Google Inc.</p>
			<p class="cell symbol">GOOGL</p>
			<p class="cell entry borderright"><a href="info.php?search=goog&page=Quote">Quote</a> <a href="info.php?search=goog&page=History">History</a></p>
		</div>
	</div>
EODFind;
}
	