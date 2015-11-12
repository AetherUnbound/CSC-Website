<?php 
require "Scripts\DbUtil.php"; $objDBUtil = new DbUtil;

//establish db connection 
//have to set right parameters
$objDBUtil->host = "cs.spu.edu";
$objDBUtil->user = "bowdenm";
$objDBUtil->pwd = "du8rejuN";
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
		echo "<script>console.log('userDB insert success');console.log('{$result}');</script>";
	}
	else {
		header('HTTP/1.0 420 Blaze it');						
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