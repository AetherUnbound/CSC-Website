$(".quoteButtonA").click( function(e) {
	e.preventDefault();
	thisPage = "Quote";
	search = $(this).attr("href");
	setPage(thisPage);
	fillContent();
});

$(".histButtonA").click( function(e) {
	e.preventDefault();
	thisPage = "History";
	search = $(this).attr("href");
	setPage(thisPage);
	fillContent();
});
	