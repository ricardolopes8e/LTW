CREATE TABLE owner (
	idUser VARCHAR NOT REFERENCES user(id) ,
	id_restaurant INTEGER NOT NULL REFERENCES restaurant(id) ,
	PRIMARY KEY(idUser, id_restaurant)
);

CREATE TABLE reply_review (
	id INTEGER PRIMARY KEY,
	comment TEXT,
	id_review INTEGER FOREIGN KEY REFERENCES review(id),
	id_owner VARCHAR FOREIGN KEY REFERENCES owner(id)
 );

CREATE TABLE restaurant (
	name TEXT NOT NULL,
	description TEXT NOT NULL,
	localization TEXT,
	id_owner VARCHAR NOT NULL FOREIGN KEY REFERENCES owner(id) ,
	id_review INTEGER FOREIGN KEY REFERENCES review(id),
	id INTEGER,
	PRIMARY KEY(id)
 );

 CREATE TABLE image_restaurant (
	id INTEGER PRIMARY KEY,
	title VARCHAR NOT NULL,
	id_restaurant INTEGER
 )


 CREATE TABLE review (
	idUser VARCHAR NOT NULL FOREIGN KEY REFERENCES user(id),
	comment TEXT NOT NULL,
	id_restaurant INTEGER FOREIGN KEY REFERENCES restaurant(id),
	id INTEGER PRIMARY KEY
  );

 CREATE TABLE user (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  username VARCHAR2(100),
  password VARCHAR2(255),
  firstname TEXT,
  secondname TEXT,
  image INTEGER,
  imagePath TEXT
 );

  INSERT INTO restaurant VALUES('a','desc1','rua a','1','1','1')
  INSERT INTO restaurant VALUES('b','desc2','rua b','1','1','2')
  INSERT INTO restaurant VALUES('c','desc3','rua c','1','1','3')
  INSERT INTO restaurant VALUES('d','desc4','rua d','1','1','4')
  INSERT INTO restaurant VALUES('e','desc5','rua e','1','1','5')
  INSERT INTO restaurant VALUES('f','desc6','rua f','1','1','6')
  INSERT INTO restaurant VALUES('g','desc7','rua g','1','1','7')
  INSERT INTO restaurant VALUES('h','desc8','rua h','1','1','8')
  INSERT INTO restaurant VALUES('i','desc9','rua i','1','1','9')
  INSERT INTO restaurant VALUES('j','desc10','rua j','1','1','10')
