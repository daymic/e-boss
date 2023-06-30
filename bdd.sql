CREATE DATABASE eboss;

USE DATABASE eboss;

--CREATION DE TABLE UTILISATEURS

CREATE TABLE utilisateurs(
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    mdp VARCHAR(20) NOT NULL,
    role VARCHAR(30),
    PRIMARY KEY (id)
);


CREATE TABLE cours(
    id INT NOT NULL AUTO_INCREMENT,
    titre VARCHAR(50) NOT NULL,
    description VARCHAR(255) NOT NULL,
    enseignant_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (enseignant_id) REFERENCES utilisateurs(id)
);


CREATE TABLE  inscriptions(
    id INT PRIMARY KEY AUTO_INCREMENT,
    etudiant_id INT NOT NULL,
    cours_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY(etudiant_id) REFERENCES utilisateurs(id),
    FOREIGN KEY(cours_id) REFERENCES cours(id) 
);


CREATE TABLE devoirs(
    id INT NOT NULL AUTO_INCREMENT,
    titre VARCHAR(30) NOT NULL,
    description VARCHAR(255) NOT NULL,
    cours_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (cours_id) REFERENCES cours(id)
);


CREATE TABLE rendu(
    id INT NOT NULL AUTO_INCREMENT,
    fichier BLOB,
    etudiant_id INT NOT NULL,
    devoir_id INT NOT NULL,
    date_rendu DATETIME,
    PRIMARY KEY(id),
    FOREIGN KEY (etudiant_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (devoir_id) REFERENCES devoirs(id) 
);


