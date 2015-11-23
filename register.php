<?php 
require "search.php";
?>
<script>
	//validator struct
	var validator = { 
		valid : true,
		errorString : ""
	};
	
	$("#regbutton").click(function (e) {
		e.preventDefault();
		checkInputs();
		console.log("Pre-register validity status: " + validator.valid);
		if(validator.valid) {
			registerAJAX();
		}
	});
		
	$(document).keydown(function(e) {
		//if fields have values and the enter key is pressed
		if(e.which == 13 && $("#usernametext").val() && $("#passwordtext").val()) { 
			console.log('You pressed enter!');
			checkInputs();
			if(validator.valid) {
				registerAJAX();
			}
		}
    });	
	
	//Perhaps add another function that performs a pre-query of the DB to ensure
	//there isn't already an entry with that username?
	
	//Function to check that register page has valid inputs
	function checkInputs() {
		//reset validator
		validator.valid = true;
		validator.errorString = "";
		//set RegEx for email test
		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		//Checks each input for empty values		
		$("#regform").find(":input").each( function (index, value) {				
			$(this).removeClass("notext"); //reset after each cycle			
			if($(this).val() == "" || $(this).val() == " ") {
				validator.valid = false;
				validator.errorString = "Some of the fields were not filled";
				$(this).addClass("notext");
				console.log(this.id + " (" + index  + ") is empty!");
			}
		});
		//if valid flag is still true
		if (validator.valid) {
			//checks to make sure passwords are equal
			if($("#passwordtext").val() != $("#verifypasstext").val()) {
				console.log($("#passwordtext").val() + " vs. " + $("#verifypasstext").val());
				$("#passwordtext").addClass("notext");
				$("#verifypasstext").addClass("notext");
				validator.valid = false;
				validator.errorString = "Passwords do not match";
			}
			//checks if email is valid
			else if(!testEmail.test($("#emailtext").val())) {
				$("#emailtext").addClass("notext");
				validator.valid = false;
				validator.errorString = "Email entered is not valid";
			}
			
			//check is username is already registered
			else {
				console.log("Running user AJAX");
				validator.valid = false;
				$.ajax({
					type: "POST",
					async: false,
					url: "AJAX\\registertest.php",
					data: { user : $("#usernametext").val()},
					success: function(data) {
						validator.valid = true;
						console.log(data);
						console.log("Apparent user test success");
					},
					error: function(data) {
						console.log("USERNAME ERROR");
						validator.valid = false;
						console.log(validator.valid);
						validator.errorString = "This username is already registered";
						//$("#errordiv").html(validator.errorString);
					}
				});
				console.log("AJAX post-request message");
			}	
		}
		//Output any errors
		$("#errordiv").html(""); //reset 
		if(!validator.valid) {
			console.log("Preparing error message");
			$("#errordiv").html(validator.errorString);
		}
	}
	
	function registerAJAX () {
		//function to call loginrequest form 
		$("#regform").find(":input").each( function (index, value) {				
			console.log(this.id + " = " + $(this).val());
		});
		$.ajax({
			type: "POST",
			url: "AJAX\\registerrequest.php",
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