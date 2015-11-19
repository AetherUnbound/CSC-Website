<?php 
require "UserUtil.php"; $objUserUtil = new UserUtil;
//just in case
session_start();
//Set up query variables
$user = $_POST['user'];
$pass = $_POST['pass'];
$querySuccess = false;

//establish db connection 
$db = $objUserUtil->Open();	
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
			//extract valid username to pass into javascript
			echo $user;		
			//Add a session variable upon successful login
			//$_SESSION['username'] = $user;
		}
		else {
			//error catch
			header('HTTP/1.0 420 Method Failure');	
			@$result->free();
			$objUserUtil->Close();			
			exit;
		}
	}
	else {
		header('HTTP/1.0 420 Method Failure');		
		@$result->free();
		$objUserUtil->Close();				
		exit;
	}	
@$result->free();
$objUserUtil->Close();	

//$stock = $objUserUtil->DBQuotes($search);
//query, DBQuotes adds slashes to prevent SQL injection
//not gonna worry about SQL injection right now



?>