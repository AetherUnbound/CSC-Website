<?php 
require "UserUtil.php"; $objUserUtil = new UserUtil;

//establish db connection 
//have to set right parameters
$db = $objUserUtil->Open();	
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
		$objUserUtil->Close();
		exit;
	}	
@$result->free();
$objUserUtil->Close();	

//$stock = $objUserUtil->DBQuotes($search);
//query, DBQuotes adds slashes to prevent SQL injection
//not gonna worry about SQL injection right now

//See this for password hashing: https://alias.io/2010/01/store-passwords-safely-with-php-and-mysql/

?>