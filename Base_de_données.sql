CREATE SCHEMA TransMusicales;
SET SCHEMA 'TransMusicales';

CREATE TABLE TransMusicales._utilisateur (
	idUtilisateur	INTEGER	NOT NULL,
	login	VARCHAR(30) NOT NULL,
	pass	VARCHAR(30) NOT NULL,
	CONSTRAINT _utilisateur_pk
		PRIMARY KEY(idUtilisateur),
	CONSTRAINT _utilisateur_u
		UNIQUE (login),
	CONSTRAINT _utilisateur_fk
		REFERENCES TransMusicales._id (id)
);

CREATE TABLE TransMusicales._respATM (
	idRespATM	INTEGER	NOT NULL,
	nom		VARCHAR(50) NOT NULL,
	CONSTRAINT _respATM_pk
		PRIMARY KEY(idRespATM),
	CONSTRAINT _respATM_fk1
		FOREIGN KEY (idRespATM) REFERENCES TransMusicales._utilisateur(idUtilisateur)
);

CREATE TABLE TransMusicales._artiste (
	idArtiste	INTEGER	NOT NULL,
	nom		VARCHAR(50) NOT NULL,
	formation	VARCHAR(60) NOT NULL,
	dateDebut	VARCHAR(120) NOT NULL,
	pays	VARCHAR(60) NOT NULL,
	genre	VARCHAR(60) NOT NULL,
	parente	VARCHAR(120) NOT NULL,
	site	VARCHAR(120) NOT NULL,
	mail	VARCHAR(120) NOT NULL,
	elemPrinc	VARCHAR(120),
	elemPonc	VARCHAR(120),
	img1	INTEGER,
	img2	INTEGER,
	img3	INTEGER,
	video1	INTEGER,
	video2	INTEGER,
	video3	INTEGER,
	CONSTRAINT _artiste_pk
		PRIMARY KEY(idArtiste),
	CONSTRAINT _artiste_u
		UNIQUE (nom),
	CONSTRAINT _artiste_u2
		UNIQUE (img1),
	CONSTRAINT _artiste_u3
		UNIQUE (img2),
	CONSTRAINT _artiste_u4
		UNIQUE (img3),
	CONSTRAINT _artiste_u5
		UNIQUE (video1),
	CONSTRAINT _artiste_u6
		UNIQUE (video2),
	CONSTRAINT _artiste_u7
		UNIQUE (video3)
);	

CREATE TABLE TransMusicales._album (
	nom	VARCHAR(120) NOT NULL,
	artiste	INTEGER NOT NULL,
	dateSortie	DATE NOT NULL,
	CONSTRAINT _album_pk
		PRIMARY KEY(nom),
	CONSTRAINT _album_fk
		FOREIGN KEY (artiste) REFERENCES TransMusicales._artiste(idArtiste)
);

CREATE TABLE TransMusicales._titre (
	nom	VARCHAR(120) NOT NULL,
	album VARCHAR(120) NOT NULL,
	duree	TIME NOT NULL,
	CONSTRAINT _titre_pk
		PRIMARY KEY(nom),
	CONSTRAINT _titre_fk
		FOREIGN KEY (album)	REFERENCES TransMusicales._album(nom)
);
	
CREATE TABLE TransMusicales._respSalle (
	idRes	SERIAL NOT NULL,
	nom	VARCHAR(30) NOT NULL,
	prenom	VARCHAR(30) NOT NULL,
	adresse	VARCHAR(120) NOT NULL,
	tel	VARCHAR(15) NOT NULL,
	mail	VARCHAR(120) NOT NULL,
	CONSTRAINT _respSalle_pk
		PRIMARY KEY(idRes)
);

CREATE TABLE TransMusicales._salle (
	idSalle	SERIAL NOT NULL,
	resp	INTEGER NOT NULL,
	nom	VARCHAR(50) NOT NULL,
	tarif	FLOAT NOT NULL,
	adresse	VARCHAR(120) NOT NULL,
	capacite	INTEGER NOT NULL,
	handicape	BOOLEAN,
	CONSTRAINT _salle_pk
		PRIMARY KEY(idSalle),
	CONSTRAINT _salle_fk1
		FOREIGN KEY(resp) REFERENCES TransMusicales._respSalle(idRes)
);

CREATE TABLE TransMusicales._journee (
	jour DATE NOT NULL,
	CONSTRAINT _journee_pk
		PRIMARY KEY(jour)
);

CREATE TABLE TransMusicales._creneau (
	idCreneau	SERIAL NOT NULL,
	jour	DATE NOT NULL,
	hDebut	TIME,
	hFin	TIME,
	salle	INTEGER,
	CONSTRAINT _creneau_pk
		PRIMARY KEY(idCreneau),
	CONSTRAINT _creneau_fk1
		FOREIGN KEY(jour) REFERENCES TransMusicales._journee,
	CONSTRAINT _creneau_fk2
		FOREIGN KEY(salle) REFERENCES TransMusicales._salle(idSalle)
);

CREATE TABLE TransMusicales._reservation (
	idReserv	SERIAL NOT NULL,
	dateReserv	DATE NOT NULL,
statut	VARCHAR(30) NOT NULL,
	artiste	INTEGER NOT NULL,	
	creneau	INTEGER NOT NULL,
	CONSTRAINT _reservation_pk
		PRIMARY KEY(idReserv),
	CONSTRAINT _reservation_u1
		UNIQUE (creneau),
	CONSTRAINT _reservation_fk1
		FOREIGN KEY(artiste) REFERENCES TransMusicales._artiste(idArtiste),
	CONSTRAINT _reservation_fk2
		FOREIGN KEY(creneau) REFERENCES TransMusicales._creneau(idCreneau)
);

CREATE TABLE TransMusicales._annulation (
	idAnnul		INTEGER NOT NULL,	
	dateReserv	DATE NOT NULL,
	artiste		INTEGER NOT NULL,
	creneau		INTEGER NOT NULL,
	CONSTRAINT _annulation_pk
		PRIMARY KEY(idAnnul),
CONSTRAINT _annulation_fk1
		FOREIGN KEY(artiste) REFERENCES TransMusicales._artiste(idArtiste),
	CONSTRAINT _annulation_fk2
		FOREIGN KEY(creneau) REFERENCES TransMusicales._creneau(idCreneau)
);

insert into TransMusicales._utilisateur (idUtilisateur, login, pass) values (1, 'atm001', 'password');

insert into TransMusicales._respATM (idRespATM, nom) values (1, 'Marc Janvier');

insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (2, 'Alsarah & The Nubatones', 'Chant / basse / oud / percussions', '2010 / Alsarah seule : première moitiè des années 2000', 'Soudan', 'Rétro pop dAfrique de lEst', 'Musique nubienne', 'www.alsarah.com', 'alsarah@gmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (3, 'Andre Bratten', 'Electronic', '2013', 'Norvège', 'Electronic / Experimental', 'Todd Terje', 'Prins Thomas ou Linstrèm', 'www.andre.combratten');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (4, 'Animal Chuki', 'Electronic', '2012', 'Pérou', 'Electronic / Experimental', 'Todd Terje', 'Prins Thomas ou Linstrèm', 'www.animalchuki.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (5, 'Awesome Tapes From Africa', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (6, 'Bantam Lyons', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (7, 'Bison Bisou', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (8, 'Boris Brejcha', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (9, 'Clap! Clap!', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (10, 'Clarens', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (11, 'Compact Disk Dummies', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (12, 'Cosmo Sheldrake', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (13, 'Costello', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (14, 'Courtney Barnett', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (15, 'Courtship Ritual', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (16, 'Curtis Harding', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (17, 'Dad Rocks!', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (18, 'Darjeeling Speech', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (19, 'DBFC', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (20, 'Dead Obies', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (21, 'Den Sorte Skole', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (22, 'Dollkraut', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (23, 'Eagles Gift', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (24, 'F.E.M', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (25, 'Fawl', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (26, 'Fitness', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (27, 'Forever Pavot', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (28, 'Fragments', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (29, 'Frank McWeeny', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (30, 'Friend Within', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (31, 'Fumaça Preta', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (32, 'Fuzeta', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (33, 'Gandi Lake', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (34, 'Grand Blanc', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (35, 'I Me Mine', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (36, 'Islam Chipsy', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (37, 'Jambinai', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (38, 'Jeanne Added', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (39, 'Joy Squander', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (40, 'Joyce Muniz', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (41, 'Jungle By Night', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (42, 'Kate Tempest', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (43, 'Kosmo Pilot', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (44, 'La Fine Equipe', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (45, 'La Mverte', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (46, 'Le Zoo', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (47, 'Lizzo', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (48, 'Lord Paramour', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (49, "Mac lArnaque", 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (50, 'Marco Barotti', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (51, 'Max Jury', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');
insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail) values (52, 'Metà Metà', 'Solo', '2006', 'Etats-Unis', 'Musique populaire africaine', 'Musique populaire africaine', 'www.atfa.com', 'atfa@hotmail.com');

insert into TransMusicales._utilisateur (idUtilisateur, login, pass) values (2, 'als001', '2jU68Xqp');
insert into TransMusicales._utilisateur (idUtilisateur, login, pass) values (3, 'and001', '9fK95fXb');
insert into TransMusicales._utilisateur (idUtilisateur, login, pass) values (4, 'ani001', 'vAWw7p22');
insert into TransMusicales._utilisateur (idUtilisateur, login, pass) values (5, 'awe001', 'RNy936uq');

insert into TransMusicales._journee (jour) values ('2016-12-02');
insert into TransMusicales._journee (jour) values ('2016-12-03');
insert into TransMusicales._journee (jour) values ('2016-12-04');
insert into TransMusicales._journee (jour) values ('2016-12-05');
insert into TransMusicales._journee (jour) values ('2016-12-06');

insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('BURNIER', 'Michel-Antoine', '12 rue des Champignons', '0225246987', 'maburnier@gmail.com');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('CAMUS', 'Albert', '4 rue dArtois', '0245632541', 'acamus@hotmail.fr');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('CHEVERNY', 'Julien', '23 rue de la gare', '0145236987', 'julien.cheverny@yahoo.com');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('CHIRAC', 'Jacques', 'Elysée', '0123654789', 'jacques.chirac@gmail.com');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('CLAUDIUS-PETIT', 'Eugène', '11 place de la Mairie', '0625143698', 'eugene@laposte.fr');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('COLOMBO', 'Pia', '12 avenue Charles de Gaulle', '0245231256', 'pia.colombo@yahoo.com');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('CREVEL', 'René', '21 rue de Mars', '0214785625', 'rene.crevel@hotmail.fr');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('DALADIER', 'Edouard', '22 rue de la gare', '0124356857', 'edouard@daladier.fr');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('DE SAINT-JORRE', 'Marc', '6 rue de la gare', '0214583625', 'marc@desaintjorre.com');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('DESCAMPS', 'Eugène', '12 place de la Maire', '0645789632', 'eugene2@laposte.fr');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('DYLAN', 'Bob', '2 avenue Bob Dylan', '0214583645', 'contact@bobdylan.com');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('ESCUDERO', 'Leny', '24 rue de la gare', '0214582314', 'lenyyyyy@gmail.com');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('FERNIOT', 'Jean', '14 rue de Goudelin', '0147586923', 'jean.ferniot@gmail.com');
insert into TransMusicales._respSalle (nom, prenom, adresse, tel, mail) values ('FLAUBERT', 'Gustave', '11 rue des auteurs', '0258472536', 'contact@gustave.flaubert.com');

insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (1, 'Aire Libre', 569, '32 avenue Louis Barthou 35000 RENNES', 2000, TRUE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (12, 'Batofar', 170, '15 rue de Châtillon 35000 RENNES', 99, FALSE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (14, 'Centre Culturel de lEcusson', 192, '3 rue Duhannel 35000 RENNES', 490, TRUE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (3, 'Espace Bel Air', 168, '167 route de Lorient 35000 RENNES', 1500, TRUE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (6, 'FNAC', 182, '27 avenue Jean Janvier 35000 RENNES', 490, TRUE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (7, 'Grand Huit', 130, '47 bis avenue Jean Janvier 35000 RENNES', 98, FALSE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (11, 'LAventure', 200, '6 place de la gare 35000 RENNES', 97, FALSE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (13, 'La Bellangerais', 289, '31 boulevard Beaumont 35000 RENNES', 96, FALSE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (2, 'Le Blosne', 112, '15 place de la gare 35000 RENNES', 95, FALSE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (10, 'Le Pôle Sud', 159, '7 bis place de la gare 35000 RENNES', 94, FALSE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (4, 'Lenexpo', 158, '5 rue de Nemours 35000 RENNES', 93, FALSE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (9, 'Maison de la Culture', 192, 'Rue du capitaine Maignan 35000 RENNES', 460, TRUE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (5, 'Parc des Expositions - House Hall', 230, '6 rue Lanjuinais 35000 RENNES', 570, TRUE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (8, 'Parc des Expositions - LUsine', 230, '11 rue Lanjuinais 35000 RENNES', 680, TRUE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (1, 'Parc des Expositions - Hall 8', 230, '27 rue Dupont des Loges 35000 RENNES', 790, TRUE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (14, 'Salle du CLOUS', 158, '23 rue de Châtillon 35000 RENNES', 470, TRUE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (6, 'Salle Omnisports', 170, '185 boulevard Jean Baptiste de la Salle 35000 RENNES', 480, TRUE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (13, 'Théâtre de Cornouailles', 250, '156 rue dAntrain 35000 RENNES', 92, FALSE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (7, 'Théâtre de la Ville', 250, '60 bis rue des Gobelins 35000 RENNES', 91, FALSE);
insert into TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) values (12, 'Village', 180, '92 rue de la Soif 35000 RENNES', 90, TRUE);

insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 1);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '21:00:00', '22:00:00', 1);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '22:00:00', '23:00:00', 1);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '23:00:00', '24:00:00', 1);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 2);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 3);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 4);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 5);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 6);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 7);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 8);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 9);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 10);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 11);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 12);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-03', '20:00:00', '21:00:00', 13);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-04', '20:00:00', '21:00:00', 7);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-04', '20:00:00', '21:00:00', 8);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-04', '20:00:00', '21:00:00', 9);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-04', '21:00:00', '22:00:00', 8);
insert into TransMusicales._creneau (jour, hdebut, hfin, salle) values ('2016-12-04', '21:00:00', '22:00:00', 9);

insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'validee', 5,	16);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'validee', 2,	2);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'validee', 3,	3);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'validee', 4,	4);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'validee', 5,	5);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'validee', 4,	6);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'validee', 1,	7);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'validee', 2,	8);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'validee', 3,	9);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'validee', 4, 10);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'attente', 5, 11);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'attente', 2, 12);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'attente', 3, 13);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'attente', 4, 14);
insert into TransMusicales._reservation (dateReserv, statut, artiste, creneau) values (current_date, 'attente', 5, 15);

insert into TransMusicales._annulation (idannul, dateReserv, artiste, creneau) values (1, current_date, 2, 11);
insert into TransMusicales._annulation (idannul, dateReserv, artiste, creneau) values (2, current_date, 2, 12);
insert into TransMusicales._annulation (idannul, dateReserv, artiste, creneau) values (3, current_date, 2, 13);
insert into TransMusicales._annulation (idannul, dateReserv, artiste, creneau) values (4, current_date, 2, 14);
insert into TransMusicales._annulation (idannul, dateReserv, artiste, creneau) values (5, current_date, 2, 15);

