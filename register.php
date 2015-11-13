<?php 
require "search.php";
?>
<script>
	var isFilled = true;
	
	$("#regbutton").click(function (e) {
		e.preventDefault();
		checkInputs();
		if(isFilled) {
			registerAJAX();
		}
	});
		
	$(document).keypress(function(e) {
		//if fields have values and the enter key is pressed
		if(e.which == 13 && $("#usernametext").val() && $("#passwordtext").val()) { 
			console.log('You pressed enter!');
			checkInputs();
			if(isFilled) {
				registerAJAX();
			}
		}
    });	
	
	//Perhaps add another function that performs a pre-query of the DB to ensure
	//there isn't already an entry with that username?
	
	function checkInputs() {				
		isFilled = true;
		$("#regform").find(":input").each( function (index, value) {				
			$(this).removeClass("notext"); //reset after each cycle			
			if($(this).val() == "" || $(this).val() == " ") {
				isFilled = false;
				$(this).addClass("notext");
				console.log(this.id + " (" + index  + ") is empty!");
			}
		});
		$("#errordiv").html(""); //reset 
		if(!isFilled) {
			$("#errordiv").html("Some of the fields were not filled");
		}
	}
	
	function registerAJAX () {
		//function to call loginrequest form 
		$("#regform").find(":input").each( function (index, value) {				
			console.log(this.id + " = " + $(this).val());
		});
		$.ajax({
			type: "POST",
			url: "registerrequest.php",
			data: { 
				user : $("#usernametext").val(), 
				pass : $("#passwordtext").val(), 
				email : $("#emailtext").val(),
				quest : $("#questiontext").val(),
				answ : $("#answertext").val(),
				hint : $("#hinttext").val()
			},
			success: function(data) {
				
				$("#regform").hide();
				console.log("This is the data: " + data);	
				$("#regtitle").html("Registration Success!").css({
					"line-height" : "70px"
				});	
			},
			error: function(data) {
				console.log("ERROR");
				$("#regform").hide();
				$("#regtitle").html("Registration Error").css({
					"color" : "red",
					"line-height" : "70px"
				});
				console.log("Title changed");					
				$("#regtitle").delay(2000).fadeOut(600).queue(function(n) { 
					//clear the form
					$("#regform").find(":input").each( function (index, value) {
						$(this).val("");
					});
					$(this).html("Register"); 
					$(this).css({
						"color" : "black",
						"line-height" : "0px"
					});
					$("#regform").fadeIn(600);
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
	<div id="errordiv"></div>
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