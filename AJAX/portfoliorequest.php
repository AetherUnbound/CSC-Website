<?php 
require "UserUtil.php"; $objUserUtil = new UserUtil;
session_start();

//==FUCNTION SPACE==
$color = function($theData) {
	if($theData < 0)
		return " red ";
	else if ($theData > 0)
		return " green ";
};

//function to format data that is >1000
$numComma = function($someNum) {
	return (number_format($someNum));
};

//function for adding an appropriate decimal
$numDec = function($someNum) {	
	return (number_format($someNum,2, '.',','));	
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

$percentDiff = function($firstVal, $secondVal) {
	if($firstVal == 0 || $secondVal == 0)
		return '0';
	else {
		$dec = ($secondVal/$firstVal) * 100;
		if($dec < 1) {
			$dec = -(($firstVal/$secondVal) * 100);
		}		
		return (number_format(round($dec,1)));
	}
};


//==DB SPACE==
$db = $objUserUtil->Open();
$query = "
	SELECT *
	FROM portdb
	WHERE pUsername = '" . $_SESSION['username'] . "';";

$result = @$db->query($query);
if($result) { //print data
	$numrows = @$result->num_rows;
	$row = @$result->fetch_assoc();
	if(isset($row))
		extract($row);
	do {		
		$qQuery = "
			SELECT quotesdb.quotes.*
			FROM quotesdb.quotes
			WHERE quotesdb.quotes.qSymbol = '" . $pSymbol . "'
			ORDER BY quotesdb.quotes.qQuoteDateTime DESC
			LIMIT 1;";
		$qResult = @$db->query($qQuery);
		$qData = @$qResult->fetch_assoc(); extract($qData);		
		$percent = $percentDiff($pPurchasePrice, $qLastSalePrice);
		$diff = $qLastSalePrice - $pPurchasePrice;
		print "
		<div class='row delete'>
				<p class='cell left borderleft'>{$pSymbol}</p>
				<p class='cell center date'>{$numDate(@$pTimestamp)}</p>
				<p class='cell center'>{$pQuantity}</p>
				<p class='cell center'>{$numDec($pPurchasePrice)}</p>
				<p class='cell center'>{$numDec($qLastSalePrice)}</p>
				<p class='cell right borderright {$color($diff)}'>{$numDec($diff)}</p>
		</div>";
		@$qResult->free();		
	} while ($row = @$result->fetch_assoc() and extract($row));
}
else {
	header('HTTP/1.0 420 Critical Portfolio Error');
}
@$result->free();
$objUserUtil->Close();

?>