<?php 
require "UserUtil.php"; $objUserUtil = new UserUtil;

//establish db connection 
//have to set right parameters
$db = $objUserUtil->Open();	
$query = "INSERT INTO portdb 
	VALUES (NULL, '" . $_POST['user'] . "', now(), '" .
	$_POST['symbol'] . "', '" .
	$_POST['quantity'] . "', '" . 
	$_POST['price'] . "');";

$result = @$db->query($query);
if($result) {						
	echo "Insert complete with result: {$result}";
}
else {
	header('HTTP/1.0 420 Portfolio Insertion Error');		
	//echo "Error with result: " . $result;
}	
@$result->free();
$objUserUtil->Close();	

?>
