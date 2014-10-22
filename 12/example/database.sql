CREATE TABLE guestbook
(
	 id int(11) Not NULL AUTO_INCREMENT,
	 name varchar(40) Not NULL,
	 sex tinyint (1) Not NULL Default 1,
	 email varchar(50) Not NULL,
	 url varchar(100) Not NULL,
	 comment text Not NULL,
	 postdtm datetime,
	 PRIMARY KEY (id)
);
