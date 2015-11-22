<?php
//Need this in order to utilize the session 
session_start();
//simple logout function 
if(isset($_POST['user'])) {
	$_SESSION['username'] = "";
	echo "Logout Success";
}
else {
	echo "Logout Error";
}
?>