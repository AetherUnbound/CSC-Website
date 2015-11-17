<?php 
//TODO: Write a funciton that checks the session variable
//Returns true if there is a session variable and false if there isn't
//True will open the regular portfolio page
//		and set the Login option to Logout
//False will open the login page

//If a user is logged in 
if(@$_SESSION['username']) {
	echo $_SESSION['username'];
}
else { //if user is not logged in 
	header('HTTP/1.0 404 User Not Logged In');	
}
?>