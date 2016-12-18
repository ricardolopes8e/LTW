CREATE TABLE Restaurant(
			idRestaurant INTEGER PRIMARY KEY AUTOINCREMENT,
			name VARCHAR NOT NULL,
			owner VARCHAR REFERENCES User(username),
			timetable VARCHAR,
			contact INTEGER,
			address VARCHAR,
			idCity INTEGER REFERENCES City(idCity)
			);		

INSERT INTO Restaurant VALUES(1,'BB Vila', 'LuisCruz','Segunda - Domingo 12:00h - 3:00h',229383374,'Rua das Larangas', 1);
INSERT INTO Restaurant VALUES(2,'BB Gourmet', 'MiguelCruz', 'Segunda-Sabado 12:00h - 2:00h',221122112,'Rua dos morangos', 2);
INSERT INTO Restaurant VALUES(3,'McDonals Foz', 'LuisCruz','Segunda-Sexta 7:00h - 4:00h',220101010,'Avenida Brasil', 2);


CREATE TABLE RestaurantFoto(
	idFoto INTEGER UNIQUE,
	idRestaurant INTEGER, 
	FOREIGN KEY(idFoto) REFERENCES Foto(idFoto),
	FOREIGN KEY(idRestaurant) REFERENCES Restaurant(idRestaurant),
	PRIMARY KEY (idFoto, idRestaurant)
	);

INSERT INTO RestaurantFoto VALUES(1, 1); 
INSERT INTO RestaurantFoto VALUES(2, 2); 
INSERT INTO RestaurantFoto VALUES(3, 3); 


CREATE TABLE Review(
			idreview INTEGER PRIMARY KEY AUTOINCREMENT,
			idRestaurant INTEGER,
			username VARCHAR,
			rating INTEGER,
			dateAval DATE,
			comment VARCHAR,
			FOREIGN KEY(idRestaurant) REFERENCES Restaurant(idRestaurant),
			FOREIGN KEY(username) REFERENCES User(username)
			);

INSERT INTO Review VALUES(1, 1, 'LuisCruz',5,'22-03-2016','Melhor local para ir jantar e receber um bolo de aniversário!');
INSERT INTO Review VALUES(2, 1, 'MiguelCruz',4,'22-03-2016','Boa refeição a preços acessiveis. Oferta de bolo em caso de aniversário.');

CREATE TABLE City(
			idCity INTEGER PRIMARY KEY,
			city VARCHAR
			);
			
INSERT INTO City VALUES(1,'Porto - Francos');
INSERT INTO City VALUES(2,'Porto - Foz');


CREATE TABLE Foto(
			idFoto INTEGER PRIMARY KEY , 
			fotoName VARCHAR
			);

		
INSERT INTO Foto VALUES(1, 'img1.jpg');
INSERT INTO Foto VALUES(2, 'img2.jpg');
INSERT INTO Foto VALUES(3, 'img3.jpg');
INSERT INTO Foto VALUES(4, 'img4.jpg');
INSERT INTO Foto VALUES(5, 'img5.jpg');
INSERT INTO Foto VALUES(6, 'img6.jpg');
INSERT INTO Foto VALUES(7, 'img7.jpg');
INSERT INTO Foto VALUES(8, 'img8.jpg');
INSERT INTO Foto VALUES(9, 'img9.jpg');
INSERT INTO Foto VALUES(10,'img10.jpg');
INSERT INTO Foto VALUES(11,'img11.jpg');
INSERT INTO Foto VALUES(12,'default.jpg');

CREATE TABLE User(
			username VARCHAR PRIMARY KEY,
			password VARCHAR,
			email VARCHAR,
			idCity REFERENCES City(idCity)
			);

INSERT INTO User VALUES('LuisCruz','$2y$12$ka2aGPQmODWNu81L1Ibdsu3zvCEry.WBJd2f2OlNaklFkkB3Vn3pO','luis.labc95@gmail.com', 2);
INSERT INTO User VALUES('MiguelCruz','$2y$12$ka2aGPQmODWNu81L1Ibdsu3zvCEry.WBJd2f2OlNaklFkkB3Vn3pO','miguel@fe.up.pt', 2);
			
CREATE TABLE UserFoto(
			idFoto INTEGER,
			username VARCHAR, 
			FOREIGN KEY(idFoto) REFERENCES Foto(idFoto),
			FOREIGN KEY(username) REFERENCES User(username),
			PRIMARY KEY (idFoto, username)
			);

INSERT INTO UserFoto VALUES(11, 'LuisCruz');




