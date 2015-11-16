<?php 
require "DbUtil.php"; $objDBUtil = new DbUtil;

//establish db connection 
//have to set right parameters
$objDBUtil->host = "cs.spu.edu";
$objDBUtil->user = "bowdenm";
$objDBUtil->pwd = "dinglebrumbus";
$objDBUtil->defaultDB = "bowdenm_portfolio";
$db = $objDBUtil->Open();	
$query = "INSERT INTO users 
	VALUES ('" . $_POST['user'] . "', '" .
	$_POST['pass'] . "', '" .
	$_POST['email'] . "', '" . 
	$_POST['quest'] . "', '" . 
	$_POST['answ'] . "', '" . 
	$_POST['hint'] . "');";
	
	$result = @$db->query($query);
	if($result) {						
		echo "Insert complete with result: {$result}";
		exit;
	}
	else {
		header('HTTP/1.0 420 Blaze it');		
		//echo "Error with result: " . $result;
		@$result->free();
		$objDBUtil->Close();
		exit;
	}	
@$result->free();
$objDBUtil->Close();	

//$stock = $objDBUtil->DBQuotes($search);
//query, DBQuotes adds slashes to prevent SQL injection
//not gonna worry about SQL injection right now
?>