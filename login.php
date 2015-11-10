<?php 
require "search.php";
require "Scripts\DbUtil.php"; $objDBUtil = new DbUtil;
?>
<script>
	$("#loginform").submit(function (e) {
		e.preventDefault();
	});
</script>
<link href="Styles\\loginstyle.css" rel="stylesheet" type="text/css">
<div id="logincontainer">
<h1>Login</h1>
<hr/>
<form id="loginform">
	Username: <input id="usernametext" name="usernametext" type="search" placeholder="Username"/> <br/> <br/>
	Password: <input id="passwordtext" name="passwordtext" type="password" placeholder="Password"> <br/> <br/>
	<div id="loginbutton"><a href="#">Login</a></div>
</form>
</div>