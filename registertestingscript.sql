use bowdenm_portfolio;
select users.* FROM users WHERE username = "test" AND password = "test" LIMIT 1;
select users.* FROM users WHERE username = "asdfasdf" AND password = "teasdfasdfst" LIMIT 1;
select users.* FROM users;
insert into users values("dumb", "realdumb", "email@dumb.com", "this is a question", "this is an answer", "im dumb", 'blah');
DELETE from users where username = "asdfasdf";
