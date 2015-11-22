<?php 
require "UserUtil.php"; $objUserUtil = new UserUtil;

//establish db connection 
//have to set right parameters
$db = $objUserUtil->Open();	
$query = "SELECT quotesdb.symbols.symSymbol 
		FROM quotesdb.symbols
		WHERE quotesdb.symbols.symSymbol = '" . $_POST['symbol'] . "'
		LIMIT 1;";
$result = @$db->query($query);
$sym = extract(@$result->fetch_assoc());
if($sym) {							
	echo $symSymbol;
	//echo "Insert complete with result: {$result}";
	exit;
}
else {
	header('HTTP/1.0 420 No Symbol Found');		
	//echo "Error with result: " . $result;
}	
@$result->free();
$objUserUtil->Close();	
?>