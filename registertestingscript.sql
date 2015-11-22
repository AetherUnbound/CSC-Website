use bowdportdbenm_portfolio;
select users.* FROM users WHERE username = "test" AND password = "test" LIMIT 1;
select users.* FROM users WHERE username = "asdfasdf" AND password = "teasdfasdfst" LIMIT 1;
select users.* FROM users;
insert into users values("dumb", "realdumb", "email@dumb.com", "this is a question", "this is an answer", "im dumb", 'blah');
DELETE from users where username = "swains";
set password = password('dinglebrumbus');
SELECT username FROM users WHERE username = 'fuckoff' LIMIT 1;
select * FROM portdb WHERE pUsername = 'test';
select * FROM portdb;
DROP table portdb;
insert into portdb values(NULL, "test", now(), "GE", "5", "16.88");
use quotesdb;
describe quotes;
	SELECT bowdenm_portfolio.portdb.*, quotesdb.quotes.qLastSalePrice
	FROM bowdenm_portfolio.portdb INNER JOIN (
		SELECT quotesdb.quotes.*
		FROM quotesdb.quotes
		ORDER BY quotesdb.quotes.qQuoteDateTime DESC
		LIMIT 1)
	WHERE bowdenm_portfolio.portdb.pUsername = 'test'
	AND bowdenm_portfolio.portdb.pSymbol = quotesdb.quotes.qSymbol
	ORDER BY bowdenm_portfolio.portdb.pTimestamp DESC;