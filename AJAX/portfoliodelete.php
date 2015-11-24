<?php 
require "UserUtil.php"; $objUserUtil = new UserUtil;

//establish db connection 
//have to set right parameters
$db = $objUserUtil->Open();	
$price = $_POST['price'];
$price = number_format(floatval(str_replace(',', '', $price)), 2);


$query = "DELETE FROM portdb
	WHERE pSymbol = '" . $_POST['symbol'] . "'
	AND pUsername = '" . $_POST['user'] . "'
	AND pPurchasePrice LIKE '" . $price . "'
	LIMIT 1;";

$result = @$db->query($query);
if($result) {						
	echo "Delete complete price: {$price}";
}
else {
	header('HTTP/1.0 420 Portfolio Delete Error');
}	
@$result->free();
$objUserUtil->Close();

?>