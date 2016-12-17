CREATE TABLE owner (
	username VARCHAR(255) NOT NULL REFERENCES user(username) ,
	id_restaurant INTEGER NOT NULL REFERENCES restaurant(id) ,
	PRIMARY KEY(username, id_restaurant)
);

CREATE TABLE restaurant (
	id INTEGER AUTOINCREMENT,	
	name VARCHAR(255) NOT NULL,
	user_owner VARCHAR(255) NOT NULL REFERENCES owner(username) ,
	timetable VARCHAR,
	contact INTEGER,
	adress VARCHAR(255),
	description VARCHAR(255) NOT NULL,
	id_review INTEGER REFERENCES review(id),
	PRIMARY KEY(id)
 );
 
INSERT INTO restaurant VALUES(1,'BB Vila', 'LuisCruz','Segunda - Domingo 12:00h - 3:00h',229383374,'Rua das Larangas','Vila',NULL );
INSERT INTO restaurant VALUES(2,'BB Gourmet', 'MiguelCruz', 'Segunda-Sabado 12:00h - 2:00h',221122112,'Rua dos morangos', 'Gourmet' ,NULL);
INSERT INTO restaurant VALUES(3,'McDonals Foz', 'LuisCruz','Segunda-Sexta 7:00h - 4:00h',220101010,'Avenida Brasil', 'Foz', 1);

 CREATE TABLE review (
	id INTEGER AUTOINCREMENT PRIMARY KEY,
	id_restaurant INTEGER REFERENCES restaurant(id),
	username VARCHAR(255) NOT NULL REFERENCES user(username),	
	dateAval DATE,
	rating INTEGER,
	comment VARCHAR(255) NOT NULL
  );
  
INSERT INTO review VALUES(1, 2, 'LuisCruz',5,'22-03-2016','Melhor local para ir jantar e receber um bolo de aniversário!');

 CREATE TABLE user (
  username VARCHAR(255),
  password VARCHAR(255),
  email VARCHAR(255),
  description VARCHAR(255), 
  PRIMARY KEY(username)
 );
 
INSERT INTO user VALUES('LuisCruz','$2y$12$ka2aGPQmODWNu81L1Ibdsu3zvCEry.WBJd2f2OlNaklFkkB3Vn3pO','luis.labc95@gmail.com',NULL);
INSERT INTO user VALUES('MiguelCruz','$2y$12$ka2aGPQmODWNu81L1Ibdsu3zvCEry.WBJd2f2OlNaklFkkB3Vn3pO','miguel@fe.up.pt', NULL);
			
CREATE TABLE photo(
			id_photo INTEGER PRIMARY KEY , 
			photo_name VARCHAR
			);
INSERT INTO photo VALUES(1, 'img1.jpg');
INSERT INTO photo VALUES(2, 'img2.jpg');
INSERT INTO photo VALUES(3, 'img3.jpg');
INSERT INTO photo VALUES(4, 'img4.jpg');
INSERT INTO photo VALUES(5, 'img5.jpg');
INSERT INTO photo VALUES(6, 'img6.jpg');
INSERT INTO photo VALUES(7, 'img7.jpg');
INSERT INTO photo VALUES(8, 'img8.jpg');
INSERT INTO photo VALUES(9, 'img9.jpg');
INSERT INTO photo VALUES(10,'img10.jpg');
INSERT INTO photo VALUES(11,'img11.jpg');


CREATE TABLE user_photo(
			id_photo INTEGER,
			username VARCHAR, 
			FOREIGN KEY(id_photo) REFERENCES photo(id_photo),
			FOREIGN KEY(username) REFERENCES user(username),
			PRIMARY KEY (id_photo)
			);

INSERT INTO user_photo VALUES(11, 'LuisCruz');