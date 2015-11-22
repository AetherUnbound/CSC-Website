<?php 
require "UserUtil.php"; $objUserUtil = new UserUtil;

//establish db connection 
//have to set right parameters
$db = $objUserUtil->Open();	
$query = "DELETE FROM portdb
	WHERE pSymbol = '" . $_POST['symbol'] . "'
	AND pUsername = '" . $_POST['user'] . "'
	AND pPurchasePrice = '" . $_POST['price'] . "');";

$result = @$db->query($query);
if($result) {						
	echo "Delete complete result: {$result}";
}
else {
	header('HTTP/1.0 420 Portfolio Delete Error');
}	
@$result->free();
$objUserUtil->Close();

?>