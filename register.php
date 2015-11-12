<?php 
require "search.php";
?>
<script>
	$("#regform").submit(function (e) {
		e.preventDefault();
		loginAJAX();
	});
	
	$("#regbutton").click(function (e) {
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
				url: "registerrequest.php",
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
<link href="Styles\registerstyle.css" rel="stylesheet" type="text/css">
<div id="regcontainer">
<h1 id="regtitle">Register</h1>
<hr/>
<form id="regform">
	Username: <input id="usernametext" name="usernametext" type="search" placeholder="Username"/> <br/> <br/>
	Password: <input id="passwordtext" name="passwordtext" type="password" placeholder="Password"> <br/> <br/>
	<input id="verifypasstext" name="verifypasstext" type="password" placeholder="Verify Password"> <br/> <br/>
	Email: <input id="emailtext" name="emailtext" type="search" placeholder="email@domain.com"> <br/> <br/>
	Security Question: <input id="questiontext" name="questiontext" type="text" placeholder="What is the name of the elementary school you attended?"> <br/> <br/>
	Security Answer: <input id="answertext" name="answertext" type="text" placeholder="MHT Quote Elementary School"> <br/> <br/>
	Password Hint: <input id="hinttext" name="hinttext" type="text" placeholder="I use the same password for everything"> <br/> <br/>
	<div id="regbutton"><a href="#">Register</a></div>
</form>
</div>