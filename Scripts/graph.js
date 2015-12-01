function drawChart (object, width, height) {
	options = {
		title: object.symbol + " Stock Trend: " + object.interval + " Days",
		titleTextStyle: {
			fontSize: 22
		},
		chartArea: {
			height: '55%',
			width: '82%',
			left: '12%',
			top: '20%'
		},
		vAxis: { 
			minValue: object.minprice, 
			maxValue: object.maxprice, 
			title: 'Price', 
			gridlines: {color: 'white', count: 10}, 
			titleTextStyle: {italic: false, bold: true},
		},
		hAxis: {
			title: 'Date',
			titleTextStyle: {italic: false, bold: true},
			format: 'MMM d, y',
			slantedTextAngle: 35,
		},
		width: width,
		height: height,
		backgroundColor: '#CCCCCC',
		crosshair: {color: '#009FE0'},
		fontName: 'Helvetica Neue, sans-serif',
		legend: {
			position: 'none',
		},
		series: {
			0: {
				color: '#009FE0'
			}
		},
	};
	
	chart = new google.visualization.LineChart(document.getElementById('graphcontainer'));
	data = google.visualization.arrayToDataTable(object.data);
	chart.draw(data, options);
}

function graphAJAX() {
	symb = $("#histsymbol").html();
	console.log("graph symbol: " + symb);
	$.ajax({
		type: "POST",
		async: false,
		url: "AJAX\\stockgraphdata.php",
		data: { symbol : symb, 
			interval : inter},
		success: function(data) {
			console.log("Hist1 success!");			
			data = JSON.parse(data);
			console.log("Data symbol: " + data.symbol);
			if(data.length <= 1) {
				//if the symbol isn't found
				console.log("Graph error");
				$("#graphcontainer").html(data.data);
				return;
			}
			drawChart(data, $("#histtabs").width(), ($(window).height()/2));
			//$("#graphcontainer").html(JSON.stringify(data));
		},
		error: function(data) {
			console.log("Fatal graph error");
		}
	});	
}

$("#hist1").click(function (e) {
	e.preventDefault();
	console.log("graph hist1 clicked");
	graphAJAX();
});

$("#histtabs a").click(function(ev) {
	ev.preventDefault();
	console.log($(this).attr('id'));
	//switches the "active" class to the different tab
	if($(this).attr('id') == "hist0") {
		$(this).addClass("histactive");
		$("#histtabs a").eq(1).removeClass("histactive");
		$("#graphdata").hide();
		$("#histdata").show();
	}
	else { //if index == 1
		$(this).addClass("histactive");
		$("#histtabs a").eq(0).removeClass("histactive");
		$("#histdata").hide();
		console.log("Hist1 clicked");
		$("#graphdata").show();						
	}
});

/* $(window).resize( function() {
	graphAJAX();
}); */

$("#interval a").click(function(ev) {
	ev.preventDefault();
	console.log($(this).attr('id'));
	//switches the "active" class to the different tab
	//Remove class from all tabs
	$("#interval a").removeClass("histactive");
	//Add it to the clicked link
	$(this).addClass("histactive");
	inter = $(this).attr('id');
	graphAJAX();
});