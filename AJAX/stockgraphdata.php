<?php 
require "DbUtil.php"; $objDBUtil = new DbUtil;

//post vars: symbol, interval 
$symbol = @$_POST['symbol'];
$interval = @$_POST['interval'];
if ($interval == 0) {
	//default value in case unset 
	$interval = 30;
}

//Retrieve min max 
$db = $objDBUtil->Open();
$query = <<<EODMAXMIN
	SELECT MAX(qLastSalePrice) as maxprice,
		MIN(qLastSalePrice) as minprice
	FROM (SELECT qLastSalePrice FROM quotes
				WHERE qSymbol = '{$symbol}'
				ORDER BY qQuoteDateTime DESC LIMIT {$interval}
			) as t1;
EODMAXMIN;

$resultminmax = $db->query($query);
if (!$resultminmax) {
	print "Unrecognized stock symbol: {$symbol}";
	return;
}

$rowminmax = $resultminmax->fetch_assoc();
//extract($rowminmax);
$minprice = $rowminmax["minprice"];
$maxprice = $rowminmax["maxprice"];
$resultminmax->free();

//Retrieve data
$query = "SELECT * FROM (SELECT qSymbol, qQuoteDateTime, qLastSalePrice 
							FROM quotes
							WHERE qSymbol = '{$symbol}' 
							ORDER BY qQuoteDateTime DESC
							LIMIT {$interval}
						) as t1
			ORDER BY qQuoteDateTime ASC;";

$resultdata = $db->query($query);
//converty data into JSON object
$JSONobj = array( 
	'symbol' => $symbol,
	'interval' => $interval,
	'minprice' => $minprice,
	'maxprice' => $maxprice);
//set up the data array 
$data = array( array('Date', 'Price'));

while ($r = $resultdata->fetch_assoc()){
	$dt = new DateTime($r['qQuoteDateTime']);
	$price = $r['qLastSalePrice'];
	$tempArray = array($dt, $price);
	//push value on data array
	array_push($data, $tempArray);
}
//push data array onto JSON array 
array_push($JSONobj, $data);
print json_encode($JSONobj);	
$resultdata->free();
$db->close();
?>