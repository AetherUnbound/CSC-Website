$("#hist1").click(function (e) {
	console.log("graph hist1 clicked");
	symb = $("#histsymbol").html();
	console.log("graph symbol: " + symb);
	inter = 30;
	$.ajax({
		type: "POST",
		async: false,
		url: "AJAX\\stockgraphdata.php",
		data: { symbol : symb, 
			interval : inter},
		success: function(data) {
			console.log("Hist1 success!");
			$("#graphcontainer").html(data);
		},
		error: function(data) {
			console.log("Fatal graph error");
		}
	});	
});