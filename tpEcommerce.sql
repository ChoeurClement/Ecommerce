CREATE DATABASE TPEcommerce;
USE TPEcommerce;

CREATE TABLE Client(
	idClient INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    eMail VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    adresse VARCHAR(100) NOT NULL,
    codePostal CHAR(5) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    telephone CHAR(10) NOT NULL
);

CREATE TABLE Panier(
	idPanier INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    panierClient INT NOT NULL,
    panierMaillot INT NOT NULL,
    quantiteTotal INT NOT NULL,
    montantTotal DECIMAL(7,2)
);

CREATE TABLE Maillot(
	idMaillot INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    equipe VARCHAR(50) NOT NULL,
    domExt CHAR(3) NOT NULL,
    couleurPrincipal VARCHAR(30) NOT NULL,
    marque VARCHAR(50) NOT NULL,
    prix DECIMAL(5,2) NOT NULL,
    quantite INT NOT NULL,
    taille VARCHAR(10) NOT NULL
);

CREATE TABLE Promotion(
	idPromotion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    promotionMaillot INT NOT NULL,
    pourcentageReduction INT NOT NULL
);

ALTER TABLE Panier ADD CONSTRAINT FK_Panier FOREIGN KEY (panierClient) REFERENCES Client;
ALTER TABLE Panier ADD CONSTRAINT FK_PanierMaillot FOREIGN KEY (panierMaillot) REFERENCES Maillot;

ALTER TABLE Promotion ADD CONSTRAINT FK_Promo FOREIGN KEY (promotionMaillot) REFERENCES Maillot;

INSERT INTO `maillot` (`equipe`, `domExt`, `couleurPrincipale`, `marque`, `prix`, `marque`, `quantite`, `taille`) VALUES
	();