<?php 
require "search.php";
//various HEREDOC functions 
$red = function($theData) {
	if($theData < 0)
		return " red ";
};

//function to format data that is >1000
$numComma = function($someNum) {
	return (number_format($someNum));
};

//function for adding an appropriate decimal
$numDec = function($someNum) {
	if($someNum > 0)
		return (number_format(round($someNum,1)));
	else 
		return '0';
};

//function for percent valued data
$numPerc = function($someNum) {
	if($someNum != NULL OR $someNum ===0) //php considers null == 0 apparently, which is annoying
		return number_format($someNum,2, '.', '') . " %";
	else
		return 'N/A';
};

//function for properly setting a date
$numDate = function($someDate) {
	if(isset($someDate)){
		$date = date_create($someDate);
		return date_format($date, 'm/d/y');
	}
};

//function to properly deal with null values coming from the database 
$forNull = function($someVar, $isString = false, $killMe = false) {
	if (!isset($someVar)) {
		if ($killMe) //while I actually don't like this implementation, it works with the way that I've set up my code. This is intended to redirect the page to 'Find' if there is no symbol found for the search query. Unfortunately, it has to load the page that one is searching and then redirect to Find with the correct search parameters.
			if($GLOBALS['thisPage'] == "Find")
			{
				return $GLOBALS['search'] . " - No Data Found";
			}
			else
				print "<script> location.href = \"info.php?page=Find&search={$GLOBALS['search']}\" </script>";
		elseif ($isString) //pulls the search string from globals
			return strtoupper($GLOBALS['search']); //this wouldn't work without the GLOBALS keyword...		
		else
			return "N/A";
	}
	elseif (is_numeric($someVar))
		return number_format($someVar,2, '.',',');
	else
		return $someVar;
};

//function for printing user-entered search in all caps
$toUps = strtoupper($GLOBALS['search']);

//---------------------
//	   Quote Page
//---------------------
if($thisPage == "Quote") {	
	if(!empty($search))
	{	//process the form
		
		//establish db connection 
		$db = $objDBUtil->Open();	
		$stock = $objDBUtil->DBQuotes($search);
		//query, DBQuotes adds slashes to prevent SQL injection
		$query = "SELECT symbols.*, quotes.* 
		FROM symbols
		LEFT OUTER JOIN quotes ON symSymbol=qSymbol
		WHERE symSymbol = " . $stock . "
		ORDER BY qQuoteDateTime DESC
		LIMIT 1"; 
		
		
		//fetch data
		$result = @$db->query($query);
		if($result) {
			$data = @$result->fetch_assoc();
			//makes sure that the data is good before extracting so it doesn't throw an error
			if(isset($data)) extract($data); 
			
			/* next is the HEREDOC. While it's convenient for me to use this format for printing lots of HTML, it becomes very difficult to perform PHP within the HEREDOC; you have to end up setting functions as variables and 'printing' those. I don't want to call it dumb because I understand the reasons behind it (sort of), but it made working through it a lot harder to say the least. */
			print <<<EODQuote
			<link href="Styles\quotetablestyle.css" rel="stylesheet" type="text/css">
			<div class="quoteDiv" style=""></div>
			<div class="tablelayout forMozil">
			  <h1 class="cellnobord">{$forNull(@$symSymbol, true, true)}</h1>
			  <div class="cellnobord">
			  
			   <h3 class="tablelayout tableTop w100">{$forNull(@$symName, true)}</h3>
				<div class="tablelayout w100"> 
						  
				  <div class="row">
					<p class="cell left"> Last </p>
					<p class="cell right"> {$forNull(@$qLastSalePrice)} </p>
				  </div>
				  <div class="row">
					<p class="cell left"> Change </p>
					<p class="cell right {$red(@$qNetChangePrice)}"> {$forNull(@$qNetChangePrice)} </p>
				  </div>
				  <div class="row">
					<p class="cell left"> % Change </p>
					<p class="cell right {$red(@$qNetChangePct)}"> {$forNull($numPerc(@$qNetChangePct))} </p>
				  </div>
				  <div class="row">
					<p class="cell left"> High </p>
					<p class="cell right"> {$forNull(@$qTodaysHigh)} </p>
				  </div>
				  <div class="row">
					<p class="cell left"> Low </p>
					<p class="cell right"> {$forNull(@$qTodaysLow)} </p>
				  </div>
				  <div class="row">
					<p class="cell left"> Daily Volume </p>
					<p class="cell right"> {$numComma(@$qShareVolumeQty)} </p>
				  </div>
				  <div class="row">
					<p class="cell left"> Prev Close </p>
					<p class="cell right"> {$forNull(@$qPreviousClosePrice)} </p>
				  </div>
				  <div class="row">
					<p class="cell left"> Bid </p>
					<p class="cell right"> {$forNull(@$qBidPrice)} </p>
				  </div>
				  <div class="row">
					<p class="cell left"> Ask </p>
					<p class="cell right"> {$forNull(@$qAskPrice)} </p>
				  </div>
				  <div class="row">
					<p class="cell left"> 52 Week High </p>
					<p class="cell right"> {$forNull(@$q52WeekHigh)} </p>
				  </div>
				  <div class="row">
					<p class="cell left"> 52 Week Low </p>
					<p class="cell right"> {$forNull(@$q52WeekLow)} </p>
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
						<p class="cell right"> {$forNull(@$qCurrentPERatio)} </p>
					</div>
					<div class="row">
						<p class="cell left borderleft"> Earnings/share </p>
						<p class="cell right {$red(@$qEarningsPerShare)}"> {$forNull(@$qEarningsPerShare)} </p>
					</div>
					<div class="row">
						<p class="cell left borderleft"> Div/Share </p>
						<p class="cell right"> {$forNull(@$qCashDividendAmount)} </p>
					</div>
					<div class="row">
						<p class="cell left borderleft"> Market Cap. </p>
						<p class="cell right"> {$numDec(@$symMarketCap)} Mil</p>
					</div>
					<div class="row">
						<p class="cell left borderleft"> # Shares Out. </p>
						<p class="cell right"> {$numComma(@$qTotalOutstandingSharesQty)} </p>
					</div>
					<div class="row">
						<p class="cell left borderleft"> Div. Yield </p>
						<p class="cell right"> {$forNull($numPerc(@$qCurrentYieldPct))} </p>
					</div>
				</div>
			 </div>
			</div>
EODQuote;
		}
		else {
			print "Symbol '{$stock}' not found\n";
		}
		//BE FREE MY CHILD
		@$result->free();
		$objDBUtil->Close(); //close connection
	}
}


//---------------------
//	  History Page
//---------------------
elseif ($thisPage == "History") {
if(!empty($search))
	{	//process the form
		
		//establish db connection 
		$db = $objDBUtil->Open();	
		$stock = $objDBUtil->DBQuotes($search);
		//query, DBQuotes adds slashes to prevent SQL injection
		$query = "SELECT symbols.*, quotes.* 
		FROM symbols
		LEFT OUTER JOIN quotes ON symSymbol=qSymbol
		WHERE symSymbol = " . $stock . "
		ORDER BY qQuoteDateTime DESC"; 
		
		//fetch data
		$result = @$db->query($query);
		if($result) {
		$numRows = @$result->num_rows; 
		//for use later to correctly format table with bottom border and scrollbar
		$row = @$result->fetch_assoc();
		if(isset($row))
			extract($row);
		if(isset($qLastSalePrice))
			$printTable = true; //will still print the table if a symbol without data
		print <<<EODHist1
			<link href="Styles\\histtablestyle.css" rel="stylesheet" type="text/css">
			<div class="largescreentop"></div>
			<div class="tablelayout forMozil">
		  <h1 class="cellnobord">{$forNull(@$symSymbol, true, true)}</h1>
		  <div class="cellnobord">
		  
		   <h3 class="tablelayout w100">{$forNull(@$symName, true)}</h3>		
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
		<div style="height: 60vh; overflow: auto;">
EODHist1;
		//checks if the table has data (and how much) to see if a scrollbar and the bottom bar are necessary
		if (@$printTable and ($numRows > 10))
			print "<div class=\"tablelayout hist\">";
		else
			print "<div class=\"tablelayout\">";
		do { //do-while here because we've already extracted once
			
			echo "
				<div class=\"row\">
					<p class=\"cell center borderleft\">{$forNull($numDate(@$qQuoteDateTime))}</p>
					<p class=\"cell right\">{$forNull(@$qLastSalePrice)}</p>
					<p class=\"cell right {$red(@$qNetChangePrice)}\">{$forNull(@$qNetChangePrice)}</p>
					<p class=\"cell right {$red(@$qNetChangePct)}\">{$forNull($numPerc(@$qNetChangePct))}</p>
					<p class=\"cell right borderright\">{$numComma(@$qShareVolumeQty)}</p>
				</div>";
		} while($row = @$result->fetch_assoc() and extract($row));
		if(intval($numRows) > 10 and @$printTable)
		{
			print <<<EODHist2
					</div>
				</div>
				<div class="tablelayout">
					<hr class="hrbot">
				</div>
EODHist2;
		}
		}
		else {
			print "Symbol '{$stock}' not found \n";
		}
		//BE FREE MY CHILD
		@$result->free();
		$objDBUtil->Close(); //close connection
	}
}


//---------------------
//	   Find Page
//---------------------
elseif ($thisPage == "Find") {
	if(!empty($search))
	{	//process the form
		
		//establish db connection 
		$db = $objDBUtil->Open();	
		//had to go around the DBUtil because it was adding framing quotes ("'string'" instead of just "string"). This ended up giving no results when querying the DB.
		$stock = addslashes($search);
				
		$query = "SELECT * 
		FROM symbols
		WHERE symSymbol LIKE (\"%" . $stock . "%\")
		OR symName LIKE (\"%" . $stock . "%\")
		ORDER BY symName"; 	
		
		//fetch data
		$result = @$db->query($query);
		if($result) {
			$data = @$result->fetch_assoc();
			//makes sure that the data is good before extracting so it doesn't throw an error
			if(isset($data)) extract($data); 
			if(isset($symName))
				$printTable = true; //will only print tables if found a name
		//HEREDOC next
print <<<EODFind1
	<link href="Styles\\findtablestyle.css" rel="stylesheet" type="text/css">
	<div style="padding-bottom: 80px;"></div>
	<div class="tablelayout">	 
	  <div class="cellnobord">
	  
	   <h3 class="tablelayout w100">{$toUps}</h3>
		
	  </div>	  
	</div>
	<div class="tablelayout">
		<hr>
	</div>
	<div class="tablelayout">
		<div class="row title">
			<p class="cell company borderleft">Company</p>
			<p class="cell symbol">Symbol</p>
			<p class="cell entry">{$result->num_rows} Entries</p>			
		</div>
	</div>
	<div class="tablelayout">
		<hr>
	</div>
EODFind1;
	if (@$printTable)
	{ //prints the result table
		print "<div class=\"tablelayout\">";
		do {
			echo "
	
			<div class=\"row\">
				<p class=\"cell company borderleft\">{$forNull(@$symName)}</p>
				<p class=\"cell symbol\">{$forNull(@$symSymbol)}</p>
				<p class=\"cell entry borderright\"><a href=\"info.php?search={$forNull(@$symSymbol)}&page=Quote\">Quote</a> <a href=\"info.php?search={$forNull(@$symSymbol)}&page=History\">History</a></p>
			</div>"; 
		} while($row = @$result->fetch_assoc() and extract($row));
		print "</div>";
	}
		else { //If nothing was found, prints the following
			print "<div class='tablelayout'>\n 
					  <div class='cellnobord'>\n					  
					   <h3 class='tablelayout w100'>Symbol or Name '{$stock}' not found</h3>\n						
					  </div>\n	  
					</div>\n";
		}}
		//BE FREE MY CHILD
		@$result->free();
		$objDBUtil->Close(); //close connection
	
}
}

	