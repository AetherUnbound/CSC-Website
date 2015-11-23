use bowdenm_portfolio;
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
SELECT quotesdb.quotes.*
			FROM quotesdb.quotes
			WHERE quotesdb.quotes.qSymbol = 'GOOG'
			ORDER BY quotesdb.quotes.qQuoteDateTime DESC
			LIMIT 1;
SELECT quotesdb.symbols.* 
		FROM quotesdb.symbols
		WHERE quotesdb.symbols.symSymbol = 'goog'
		LIMIT 1;
INSERT INTO pordb VALUES (NULL, 'test', now(), 'GOOG', '1', '750');
DELETE FROM portdb
	WHERE pPurchasePrice LIKE '900.00'
	LIMIT 1;