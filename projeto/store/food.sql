CREATE TABLE owner (
	idUser VARCHAR(255) NOT NULL REFERENCES user(id) ,
	id_restaurant INTEGER NOT NULL REFERENCES restaurant(id) ,
	PRIMARY KEY(idUser, id_restaurant)
);
/*
CREATE TABLE reply_review (
	id INTEGER,
	comment VARCHAR(255),
	id_review INTEGER REFERENCES review(id),
	id_owner VARCHAR(255) REFERENCES owner(id),
    PRIMARY KEY (id)
 );
*/
CREATE TABLE restaurant (
	name VARCHAR(255) NOT NULL,
	description VARCHAR(255) NOT NULL,
	local VARCHAR(255),
	id_owner VARCHAR(255) NOT NULL REFERENCES owner(idUser) ,
	id_review INTEGER REFERENCES review(id),
	id INTEGER,
	imagePath VARCHAR(255),
	PRIMARY KEY(id)
 );
/*
 CREATE TABLE image_restaurant (
	id INTEGER PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
	id_restaurant INTEGER
 );
*/
 CREATE TABLE review (
	idUser VARCHAR(255) NOT NULL REFERENCES user(id),
	comment VARCHAR(255) NOT NULL,
	id_restaurant INTEGER REFERENCES restaurant(id),
	id INTEGER PRIMARY KEY
  );

 CREATE TABLE user (
  id INTEGER,
  username VARCHAR(255),
  password VARCHAR(255),
  firstname VARCHAR(255),
  secondname VARCHAR(255),
  description VARCHAR(255), 
  imagePath VARCHAR(255),
  PRIMARY KEY(id)
 );
 
  INSERT INTO restaurant VALUES('a','desc1','rua a','1','1','1');
  INSERT INTO restaurant VALUES('b','desc2','rua b','1','2','2');
  INSERT INTO restaurant VALUES('c','desc3','rua c','1','3','3');
  INSERT INTO restaurant VALUES('d','desc4','rua d','1','4','4');
  INSERT INTO restaurant VALUES('e','desc5','rua e','1','5','5');
  INSERT INTO restaurant VALUES('f','desc6','rua f','1','6','6');
  
