/* CREER UNE BASE DE DONNEES SOUS POSTGRESQL CONFORME AU DIAGRAMME DE CLASSE */

CREATE SCHEMA TransMusicales;
SET SCHEMA 'TransMusicales';

CREATE TABLE TransMusicales._utilisateur (
	idUtilisateur	SERIAL	NOT NULL,
	login	VARCHAR(30),
	pass	VARCHAR(30),
	nom	VARCHAR(120) NOT NULL,
	CONSTRAINT _utilisateur_pk
		PRIMARY KEY(idUtilisateur),
	CONSTRAINT _utilisateur_u
		UNIQUE (login),
	CONSTRAINT _utilisateur_u2
		UNIQUE (nom)
);

CREATE TABLE TransMusicales._respATM (
	idRespATM	INTEGER	NOT NULL,
	CONSTRAINT _respATM_pk
		PRIMARY KEY(idRespATM),
	CONSTRAINT _respATM_fk1
		FOREIGN KEY (idRespATM) REFERENCES TransMusicales._utilisateur(idUtilisateur)
);

CREATE TABLE TransMusicales._artiste (
	idArtiste	INTEGER	NOT NULL,
	formation	VARCHAR(150) NOT NULL,
	dateDebut	VARCHAR(120) NOT NULL,
	pays	VARCHAR(120) NOT NULL,
	genre	VARCHAR(150) NOT NULL,
	parente	VARCHAR(150) NOT NULL,
	site	VARCHAR(150) NOT NULL,
	mail	VARCHAR(150) NOT NULL,
	elemPrinc	VARCHAR(150),
	elemPonc	VARCHAR(150),
	img1	INTEGER,
	img2	INTEGER,
	img3	INTEGER,
	video1	INTEGER,
	video2	INTEGER,
	video3	INTEGER,
	CONSTRAINT _artiste_pk
		PRIMARY KEY(idArtiste),
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
		UNIQUE (video3),
	CONSTRAINT _artiste_fk1
		FOREIGN KEY (idArtiste) REFERENCES TransMusicales._utilisateur(idUtilisateur)
);

CREATE TABLE TransMusicales._album (
	nom	VARCHAR(150) NOT NULL,
	artiste	INTEGER NOT NULL,
	dateSortie	DATE NOT NULL,
	CONSTRAINT _album_pk
		PRIMARY KEY(nom),
	CONSTRAINT _album_fk
		FOREIGN KEY (artiste) REFERENCES TransMusicales._artiste(idArtiste)
);

CREATE TABLE TransMusicales._titre (
	nom	VARCHAR(150) NOT NULL,
	album VARCHAR(150) NOT NULL,
	duree	TIME NOT NULL,
	CONSTRAINT _titre_pk
		PRIMARY KEY(nom),
	CONSTRAINT _titre_fk
		FOREIGN KEY (album)	REFERENCES TransMusicales._album(nom)
);
	
CREATE TABLE TransMusicales._respSalle (
	idRes	SERIAL NOT NULL,
	nom	VARCHAR(50) NOT NULL,
	prenom	VARCHAR(50) NOT NULL,
	adresse	VARCHAR(150) NOT NULL,
	tel	VARCHAR(15) NOT NULL,
	mail	VARCHAR(150) NOT NULL,
	CONSTRAINT _respSalle_pk
		PRIMARY KEY(idRes)
);

CREATE TABLE TransMusicales._salle (
	idSalle	SERIAL NOT NULL,
	resp	INTEGER NOT NULL,
	nom	VARCHAR(150) NOT NULL,
	tarif	FLOAT NOT NULL,
	adresse	VARCHAR(150) NOT NULL,
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
	statut	VARCHAR(50) NOT NULL,
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

COPY TransMusicales._utilisateur (login, pass, nom) FROM STDIN;
'atm001'	'atmMdP22'	'Responsable ATM'
'als001'	'2jU68Xqp'	'Alsarah & The Nubatones'
'and001'	'9fK95fXb'	'Andre Bratten'
'ani001'	'vAWw7p22'	'Animal Chuki'
'awe001'	'RNy936uq'	'Awesome Tapes From Africa'
'ban001'	'Yp5J2i6t'	'Bantam Lyons'
'bis001'	'sDmj64X4'	'Bison Bisou'
'bor001'	'3xkPz23A'	'Boris Brejcha'
'cla001'	'Qtv43h4C'	'Clap! Clap!'
'cla002'	'a7Z8Ga7c'	'Clarens'
'com001'	'm5HUe53i'	'Compact Disk Dummies'
'cos001'	'xNe6B27u'	'Cosmo Sheldrake'
'cos002'	'Hr2ja9S7'	'Costello'
'cou001'	'CeFp3n72'	'Courtney Barnett'
'cou002'	'g6uC4k2L'	'Courtship Ritual'
'cur001'	'9t25akLL'	'Curtis Harding'
'dad001'	'Aky376Xf'	'Dad Rocks!'
'dar001'	'9VcRw73m'	'Darjeeling Speech'
'dbf001'	'a9wR4Kh6'	'DBFC'
'dea001'	'j26vR3Nb'	'Dead Obies'
'den001'	'3sXY2rm9'	'Den Sorte Skole'
'dol001'	'3kfJv6K8'	'Dollkraut'
'eag001'	'L5fq8Nu4'	'Eagles Gift'
'fem001'	'T9qSb8r5'	'F.E.M'
'faw001'	'42i3WrUh'	'Fawl'
'fit001'	'GKgx254r'	'Fitness'
'for001'	'mCt5zS82'	'Forever Pavot'
'fra001'	'5D6bP2nt'	'Fragments'
'fra002'	'7cwP8Z3b'	'Frank McWeeny'
'fri001'	'7a6ErF3r'	'Friend Within'
'fum001'	'zB95Buj2'	'Fumaça Preta'
'fuz001'	'cN9Nw8h8'	'Fuzeta'
'gan001'	'3Ra7B5tt'	'Gandi Lake'
'gra001'	'B9zhG9t5'	'Grand Blanc'
'ime001'	'h6zP89yT'	'I Me Mine'
'isl001'	'n6t2ZAq6'	'Islam Chipsy'
'jam001'	'8UynCb86'	'Jambinai'
'jea001'	'c72S7vcH'	'Jeanne Added'
'joy001'	'5Cae9q6Z'	'Joy Squander'
'joy002'	'r22s5fNM'	'Joyce Muniz'
'jun001'	'Th66u7rA'	'Jungle By Night'
'kat001'	'b9Q6j8Ax'	'Kate Tempest'
'kos001'	'x6mP6c9D'	'Kosmo Pilot'
'laf001'	'gdLEp335'	'La Fine Equipe'
'lam001'	'44G5yxwA'	'La Mverte'
'lez001'	'FfpB64p9'	'Le Zoo'
'liz001'	'U8n2bR8x'	'Lizzo'
'lor001'	'y7g8X2Qj'	'Lord Paramour'
'mac001'	'37cMzZi3'	'Mac l\'Arnaque'
'mar001'	'kXm4rM52'	'Marco Barotti'
'max001'	'm6EV4e2w'	'Max Jury'
'met001'	'59H7aPjt'	'Metà Metà'
\.

COPY TransMusicales._respATM (idRespATM) FROM STDIN;
	1
\.


COPY TransMusicales._respSalle (nom,prenom,adresse,tel,mail) FROM STDIN;
'BURNIER'	'Michel-Antoine'	'12 rue des Champignons'	'0225246987'	'maburnier@gmail.com'
'CAMUS'	'Albert'	'4 rue d\'Artois'	'0245632541'	'acamus@hotmail.fr'
'CHEVERNY'	'Julien'	'23 rue de la gare'	'0145236987'	'julien.cheverny@yahoo.com'
'CHIRAC'	'Jacques'	'Elysée'	'0123654789'	'jacques.chirac@gmail.com'
'CLAUDIUS-PETIT'	'Eugène'	'11 place de la Mairie'	'0625143698'	'eugene@laposte.fr'
'COLOMBO'	'Pia'	'12 avenue Charles de Gaulle'	'0245231256'	'pia.colombo@yahoo.com'
'CREVEL'	'René'	'21 rue de Mars'	'0214785625'	'rene.crevel@hotmail.fr'
'DALADIER'	'Edouard'	'22 rue de la gare'	'0124356857'	'edouard@daladier.fr'
'DE SAINT-JORRE'	'Marc'	'6 rue de la gare'	'0214583625'	'marc@desaintjorre.com'
'DESCAMPS'	'Eugène'	'12 place de la Maire'	'0645789632'	'eugene2@laposte.fr'
'DYLAN'	 'Bob'	'2 avenue Bob Dylan'	'0214583645'	'contact@bobdylan.com'
'ESCUDERO'	'Leny'	'24 rue de la gare'	'0214582314'	'lenyyyyy@gmail.com'
'FERNIOT'	'Jean'	'14 rue de Goudelin'	'0147586923'	'jean.ferniot@gmail.com'
'FLAUBERT'	'Gustave'	'11 rue des auteurs'	'0258472536'	'contact@gustave.flaubert.com'
\.

COPY TransMusicales._salle (resp,nom,tarif,adresse,capacite,handicape) FROM STDIN;
1	'Aire Libre'	569	'32 avenue Louis Barthou 35000 RENNES'	2000	1
12	'Batofar'	170	'15 rue de Châtillon 35000 RENNES'	99	0
14	'Centre Culturel de l\'Ecusson'	192	'3 rue Duhannel 35000 RENNES'	490	1
3	'Espace Bel Air'	168	'167 route de Lorient 35000 RENNES'	1500	1
6	'FNAC'	182	'27 avenue Jean Janvier 35000 RENNES'	490	1
7	'Grand Huit'	130	'47 bis avenue Jean Janvier 35000 RENNES'	98	0
11	'L\'Aventure'	200	'6 place de la gare 35000 RENNES'	97	0
13	'La Bellangerais'	289	'31 boulevard Beaumont 35000 RENNES'	96	0
2	'Le Blosne'	112	'15 place de la gare 35000 RENNES'	95	0
10	'Le Pôle Sud'	159	'7 bis place de la gare 35000 RENNES'	94	0
4	'Lenexpo'	158	'5 rue de Nemours 35000 RENNES'	93	0
9	'Maison de la Culture'	192	'Rue du capitaine Maignan 35000 RENNES'	460	1
5	'Parc des Expositions - House Hall'	230	'6 rue Lanjuinais 35000 RENNES'	570	1
8	'Parc des Expositions - L\'Usine'	230	'11 rue Lanjuinais 35000 RENNES'	680	1
1	'Parc des Expositions - Hall 8'	230	'27 rue Dupont des Loges 35000 RENNES'	790	1
14	'Salle du CLOUS'	158	'23 rue de Châtillon 35000 RENNES'	470	1
6	'Salle Omnisports'	170	'185 boulevard Jean Baptiste de la Salle 35000 RENNES'	480	1
13	'Théâtre de Cornouailles'	250	'156 rue d\'Antrain 35000 RENNES'	92	0
7	'Théâtre de la Ville'	250	'60 bis rue des Gobelins 35000 RENNES'	91	0
12	'Village'	180	'92 rue de la Soif 35000 RENNES'	90	1
\.

COPY TransMusicales._journee (jour) FROM STDIN;
2016-11-30
2016-12-01
2016-12-02
2016-12-03
2016-12-04
\.

COPY TransMusicales._artiste (idArtiste,formation,dateDebut,pays,genre,parente,site,mail) FROM STDIN;
2	'Chant / basse / oud / percussions'	'2010 / Alsarah seule : première moitiè des années 2000'	'Soudan_Etats-Unis'	'Rétro pop d\'Afrique de l\'Est'	'Musique nubienne'	'www.alsarah.com'	'alsarah@gmail.com'
3	'Electronic'	'2013'	'Norvège'	'Electronic / Experimental'	'Todd Terje'	'Prins Thomas ou Linstrèm'	'www.andre.combratten'
4	'Electronic'	'2012'	'Pérou'	'Electronic / Experimental'	'Todd Terje'	'Prins Thomas ou Linstrèm'	'www.animalchuki.com'
5	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
6	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
7	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
8	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
9	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
10	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
11	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
12	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
13	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
14	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
15	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
16	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
18	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
19	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
20	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
21	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
22	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
23	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
24	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
25	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
26	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
27	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
28	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
29	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
30	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
31	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
32	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
33	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
34	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
35	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
36	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
37	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
38	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
39	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
40	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
41	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
42	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
43	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
44	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
45	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
46	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
47	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
48	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
49	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
50	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
51	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
52	'Solo'	'2006'	'Etats-Unis'	'Musique populaire africaine'	'Musique populaire africaine'	'www.atfa.com'	'atfa@hotmail.com'
\.



COPY TransMusicales._creneau (jour, hdebut, hfin, salle) FROM STDIN;
2016-11-30	20:00	21:00	1
2016-11-30	21:00	22:00	1
2016-11-30	22:00	23:00	1
2016-11-30	23:00	24:00	1
2016-11-30	20:00	21:00	2
2016-11-30	20:00	21:00	3
2016-11-30	20:00	21:00	4
2016-11-30	20:00	21:00	5
2016-11-30	20:00	21:00	6
2016-11-30	20:00	21:00	7
2016-11-30	20:00	21:00	8
2016-11-30	20:00	21:00	9
2016-11-30	20:00	21:00	10
2016-11-30	20:00	21:00	11
2016-11-30	20:00	21:00	12
2016-11-30	20:00	21:00	13
2016-12-01	20:00	21:00	7
2016-12-01	20:00	21:00	8
2016-12-01	20:00	21:00	9
2016-12-01	21:00	22:00	8
2016-12-01	21:00	22:00	9
\.
	

COPY TransMusicales._reservation (dateReserv, statut, artiste, creneau) FROM STDIN;
current_date	'validee'	1	1
current_date	'validee'	2	2
current_date	'validee'	3	3
current_date	'validee'	4	4
current_date	'validee'	5	5
current_date	'validee'	6	6
current_date	'validee'	7	7
current_date	'validee'	8	8
current_date	'validee'	9	9
current_date	'validee'	10	10
current_date	'attente'	11	11
current_date	'attente'	12	12
current_date	'attente'	13	13
current_date	'attente'	14	14
current_date	'attente'	15	15
\.





