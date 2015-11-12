<?php 
require "search.php";
?>
<script>
	$("#loginform").submit(function (e) {
		e.preventDefault();
		loginAJAX();
	});
	
	$("#loginbutton").click(function (e) {
		e.preventDefault();
		loginAJAX();
	});
	
	$(document).keypress(function(e) {
		//if fields have values and the enter key is pressed
		if(e.which == 13 && $("#usernametext").val() && $("#passwordtext").val()) { 
			console.log('You pressed enter!');
			loginAJAX();
		}
    });	
	
	function loginAJAX () {
		//function to call loginrequest form 
		console.log($("#usernametext").val());
		console.log($("#passwordtext").val());
			$.ajax({
				type: "POST",
				url: "loginrequest.php",
				data: { user : $("#usernametext").val(), pass : $("#passwordtext").val()}, success: function(data) {
					$("#loginform").hide(400);
					$("#logintitle").html("Login Success!");					
				},
				error: function(data) {
					console.log("ERROR");
					$("#logintitle").fadeIn(600).html("Login Error").css("color", "red");
					console.log("Title changed");					
					$("#logintitle").delay(2000).fadeOut(600).queue(function(n) { 
						$(this).html("Login"); 
						$(this).css("color", "black");
						n();
					}).fadeIn(600);
				}
			});
	}
</script>
<link href="Styles\loginstyle.css" rel="stylesheet" type="text/css">
<div id="logincontainer">
<h1 id="logintitle">Login</h1>
<hr/>
<form id="loginform">
	Username: <input id="usernametext" name="usernametext" type="search" placeholder="Username"/> <br/> <br/>
	Password: <input id="passwordtext" name="passwordtext" type="password" placeholder="Password"> <br/> <br/>
	<div id="loginbutton"><a href="#">Login</a></div>
</form>
</div>