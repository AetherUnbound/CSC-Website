<?php 
require "DbUtil.php"; $objDBUtil = new DbUtil;

//Checks to see if the username to register is already in the database
$objDBUtil->host = "cs.spu.edu";
$objDBUtil->user = "bowdenm";
$objDBUtil->pwd = "dinglebrumbus";
$objDBUtil->defaultDB = "bowdenm_portfolio";
$db = $objDBUtil->Open();	
$query = "SELECT username FROM users 
	WHERE username = '" . $_POST['user'] . "'";
	
	$result = @$db->query($query);	
	//$data = @$result->fetch_assoc();
	//if(isset($data)) extract($data);
	$numrows = @$result->num_rows;
	if($numrows == 0) {						
		echo "Username not registered: {$numrows}";
		exit;
	}
	else {
		header('HTTP/1.0 404 User Test Error');				
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