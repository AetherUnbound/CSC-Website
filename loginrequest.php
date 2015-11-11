<?php 
require "Scripts\DbUtil.php"; $objDBUtil = new DbUtil;

//Set up query variables
$user = $_POST['user'];
$pass = $_POST['pass'];
$querySuccess = false;

//establish db connection 
//have to set right parameters
$objDBUtil->host = "cs.spu.edu";
$objDBUtil->user = "bowdenm";
$objDBUtil->pwd = "du8rejuN";
$objDBUtil->defaultDB = "bowdenm_portfolio";
$db = $objDBUtil->Open();	
$query = "SELECT users.* 
	FROM users 
	WHERE username = '" . $user . "'
	AND password = '" . $pass . "'
	LIMIT 1";
	
	$result = @$db->query($query);
	if($result) {				
		$data = $result->fetch_assoc();
		if(isset($data)) {
			$querySuccess = true;
			extract($data);
			echo "<script>console.log('userDB success');</script>";			
		}
		else {
			//error catch
			header('HTTP/1.0 420 Method Failure');			
			exit;
		}
	}
	else {
		header('HTTP/1.0 420 Method Failure');				
		exit;
	}

//$stock = $objDBUtil->DBQuotes($search);
//query, DBQuotes adds slashes to prevent SQL injection
//not gonna worry about SQL injection right now



?>