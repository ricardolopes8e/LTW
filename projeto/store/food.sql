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
