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

insert into TransMusicales._artiste (idArtiste, nom, formation, dateDebut, pays, genre, parente, site, mail)
	values (2, 'Alsarah & The Nubatones', 'Chant / basse / oud / percussions', '2010 / Alsarah seule : première moitiè des années 2000', 'Soudan', 'Rétro pop d\'Afrique de l\'Est', 'Musique nubienne', 'www.alsarah.com', 'alsarah@gmail.com');

insert into TransMusicales._utilisateur (idUtilisateur, login, pass) values (2, 'als001', '2jU68Xqp');