DROP TABLE IF EXISTS infographe ;
CREATE TABLE infographe (id_infographe INT AUTO_INCREMENT NOT NULL,
nom_infographe VARCHAR(250),
prenom_infographe VARCHAR(255),
specialite_infographe VARCHAR(255),
telephone_infographe VARCHAR(255),
email_infographe VARCHAR(300),
date_naissance_infographe DATE,
username_infographe VARCHAR(255),
photo_infographe VARCHAR(255),
date_inscription_infographe DATE,
description_infographe TEXT,
mdp_infographe VARCHAR(255),
contrat_infographe VARCHAR(155),
id_domaine **NOT FOUND**,
id_pays **NOT FOUND**,
id_commune **NOT FOUND**,
id_administrateur **NOT FOUND**,
PRIMARY KEY (id_infographe)) ENGINE=InnoDB;

DROP TABLE IF EXISTS annonceur ;
CREATE TABLE annonceur (id_annonceur INT AUTO_INCREMENT NOT NULL,
nom_annonceur VARCHAR(255),
prenom_annonceur VARCHAR(255),
domaine_activite_annonceur VARCHAR(255),
date_naissance_annonceur DATE,
telephone_annonceur VARCHAR(255),
email_annonceur VARCHAR(255),
photo_annonceur VARCHAR(255),
username_annonceur VARCHAR(255),
date_inscription_annonceur DATE,
mdp_annonceur VARCHAR(255),
id_administrateur **NOT FOUND**,
PRIMARY KEY (id_annonceur)) ENGINE=InnoDB;

DROP TABLE IF EXISTS annonce ;
CREATE TABLE annonce (id_annonce INT AUTO_INCREMENT NOT NULL,
titre_annonce VARCHAR(60),
description_annonce TEXT,
date_annonce DATE,
id_annonceur **NOT FOUND**,
PRIMARY KEY (id_annonce)) ENGINE=InnoDB;

DROP TABLE IF EXISTS commune ;
CREATE TABLE commune (id_commune INT AUTO_INCREMENT NOT NULL,
nom_commune VARCHAR(255),
id_pays **NOT FOUND**,
PRIMARY KEY (id_commune)) ENGINE=InnoDB;

DROP TABLE IF EXISTS pays ;
CREATE TABLE pays (id_pays INT AUTO_INCREMENT NOT NULL,
nom_pays VARCHAR(225),
PRIMARY KEY (id_pays)) ENGINE=InnoDB;

DROP TABLE IF EXISTS domaine ;
CREATE TABLE domaine (id_domaine INT AUTO_INCREMENT NOT NULL,
nom_domaine VARCHAR(255),
PRIMARY KEY (id_domaine)) ENGINE=InnoDB;

DROP TABLE IF EXISTS administrateur ;
CREATE TABLE administrateur (id_administrateur INT AUTO_INCREMENT NOT NULL,
nom_administrateur VARCHAR(255),
prenom_administrateur VARCHAR(255),
username_administrateur VARCHAR(255),
email_administrateur VARCHAR(255),
mdp_administrateur VARCHAR(255),
PRIMARY KEY (id_administrateur)) ENGINE=InnoDB;

DROP TABLE IF EXISTS article ;
CREATE TABLE article (id_article INT AUTO_INCREMENT NOT NULL,
titre_article VARCHAR(255),
description_article TEXT,
illustration_article VARCHAR(255),
date_article DATE,
id_administrateur **NOT FOUND**,
PRIMARY KEY (id_article)) ENGINE=InnoDB;

DROP TABLE IF EXISTS repondre_a ;
CREATE TABLE repondre_a (id_infographe **NOT FOUND** AUTO_INCREMENT NOT NULL,
id_annonce **NOT FOUND** NOT NULL,
PRIMARY KEY (id_infographe,
 id_annonce)) ENGINE=InnoDB;

ALTER TABLE infographe ADD CONSTRAINT FK_infographe_id_domaine FOREIGN KEY (id_domaine) REFERENCES domaine (id_domaine);

ALTER TABLE infographe ADD CONSTRAINT FK_infographe_id_pays FOREIGN KEY (id_pays) REFERENCES pays (id_pays);
ALTER TABLE infographe ADD CONSTRAINT FK_infographe_id_commune FOREIGN KEY (id_commune) REFERENCES commune (id_commune);
ALTER TABLE infographe ADD CONSTRAINT FK_infographe_id_administrateur FOREIGN KEY (id_administrateur) REFERENCES administrateur (id_administrateur);
ALTER TABLE annonceur ADD CONSTRAINT FK_annonceur_id_administrateur FOREIGN KEY (id_administrateur) REFERENCES administrateur (id_administrateur);
ALTER TABLE annonce ADD CONSTRAINT FK_annonce_id_annonceur FOREIGN KEY (id_annonceur) REFERENCES annonceur (id_annonceur);
ALTER TABLE commune ADD CONSTRAINT FK_commune_id_pays FOREIGN KEY (id_pays) REFERENCES pays (id_pays);
ALTER TABLE article ADD CONSTRAINT FK_article_id_administrateur FOREIGN KEY (id_administrateur) REFERENCES administrateur (id_administrateur);
ALTER TABLE repondre_a ADD CONSTRAINT FK_repondre_a_id_infographe FOREIGN KEY (id_infographe) REFERENCES infographe (id_infographe);
ALTER TABLE repondre_a ADD CONSTRAINT FK_repondre_a_id_annonce FOREIGN KEY (id_annonce) REFERENCES annonce (id_annonce);
