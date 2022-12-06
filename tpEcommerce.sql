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
    tailleMaillot VARCHAR(10),
    montantTotal DECIMAL(7,2)
);

CREATE TABLE Maillot(
	idMaillot INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    equipe VARCHAR(50) NOT NULL,
    domExt CHAR(3) NOT NULL,
    couleurPrincipal VARCHAR(30) NOT NULL,
    marque VARCHAR(50) NOT NULL,
    prix DECIMAL(5,2) NOT NULL,
    nomFichier VARCHAR(300) NOT NULL
);

CREATE TABLE Promotion(
	idPromotion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    promotionMaillot INT NOT NULL,
    pourcentageReduction INT NOT NULL
);

ALTER TABLE Panier ADD CONSTRAINT FK_Panier FOREIGN KEY (panierClient) REFERENCES Client;
ALTER TABLE Panier ADD CONSTRAINT FK_PanierMaillot FOREIGN KEY (panierMaillot) REFERENCES Maillot;

ALTER TABLE Promotion ADD CONSTRAINT FK_Promo FOREIGN KEY (promotionMaillot) REFERENCES Maillot;

INSERT INTO `maillot` (`equipe`, `domExt`, `couleurPrincipal`, `marque`, `prix`, `nomFichier`) VALUES
	('Allemagne', 'dom', 'blanc', 'adidas', 90, 'maillot_allemagne_coupe_du_monde_2022_adidas_domicile.jpg'),
    ('Allemagne', 'ext', 'noir', 'adidas', 90, 'maillot_allemagne_coupe_du_monde_2022_adidas_exterieur.jpg'),
    ('Angleterre', 'dom', 'blanc', 'nike', 89.99, 'maillot-angleterre-coupe-du-monde-2022.jpg'),
    ('Angleterre', 'ext', 'rouge', 'nike', 89.99, 'maillot-angleterre-coupe-du-monde-2022-exterieur.jpeg'),
    ('Belgique', 'dom', 'rouge', 'adidas', 90, 'maillot-belgique-coupe-du-monde-2022-adidas-domicile.jpg'),
    ('Belgique', 'ext', 'blanc', 'adidas', 90, 'maillot-belgique-exterieur-coupe-du-monde-2022.jpg'),
    ('Croatie', 'dom', 'blanc', 'nike', 89.99, 'maillot-croatie-coupe-du-monde-2022-nike.jpg'),
    ('Croatie', 'ext', 'bleu', 'nike', 89.99, 'maillot-croatie-coupe-du-monde-2022.jpg'),
    ('Danemark', 'dom', 'rouge', 'hummel', 79.95, 'maillot-danemark-coupe-du-monde-2022-860x1024.jpg'),
    ('Danemark', 'ext', 'blanc', 'hummel', 79.95, 'maillot-danemark-coupe-du-monde-2022-exterieur-860x1024.jpg'),
    ('Espagne', 'dom', 'rouge', 'adidas', 90, 'maillot_espagne_coupe_du_monde_2022_adidas_domicile.jpg'),
    ('Espagne', 'ext', 'bleu', 'adidas', 90, 'maillot_espagne_coupe_du_monde_2022_adidas_exterieur.jpg'),
    ('France', 'dom', 'bleu', 'nike', 89.99, 'maillot-equipe-de-france-coupe-du-monde-2022-1024x1024.jpeg'),
    ('France', 'ext', 'blanc', 'nike', 89.99, 'maillot-equipe-de-france-coupe-du-monde-2022-nike-1024x868.jpeg'),
    ('Pays-Bas', 'dom', 'orange', 'nike', 89.99, 'maillot-pays-bas-coupe-du-monde-2022-nike.jpg'),
    ('Pays-Bas', 'ext', 'bleu', 'nike', 89.99, 'maillot-pays-bas-coupe-du-monde-2022.jpg'),
    ('Pays de Galles', 'dom', 'rouge', 'adidas', 80, 'maillot-pays-de-galles-coupe-du-monde-2022-1024x1024.jpeg'),
    ('Pays de Galles', 'ext', 'blanc', 'adidas', 80, 'maillot-pays-de-galles-coupe-du-monde-2022-exterieur-1024x1024.jpg'),
    ('Pologne', 'dom', 'blanc', 'nike', 89.99, 'maillot-pologne-2022-nike.jpg'),
    ('Pologne', 'ext', 'rouge', 'nike', 89.99, 'maillot-pologne-2022.jpeg'),
    ('Portugal', 'dom', 'rouge', 'nike', 89.99, 'maillot-portugal-coupe-du-monde-2022.jpeg'),
    ('Portugal', 'ext', 'blanc', 'nike', 89.99, 'maillot-portugal-coupe-du-monde-2022-exterieur.jpg'),
    ('Suisse', 'dom', 'rouge', 'puma', 90, 'maillot_suisse_coupe_du_monde_2022-1024x1024.jpg'),
    ('Suisse', 'ext', 'blanc', 'puma', 90, 'maillot_suisse_coupe_du_monde_2022_puma_exterieur-1024x1024.jpg'),
    ('Serbie', 'dom', 'rouge', 'puma', 70, 'maillot_serbie_coupe_du_monde_2022_puma_domicile-1024x1024.jpg'),
    ('Serbie', 'ext', 'blanc', 'puma', 70, 'maillot_serbie_coupe_du_monde_2022_puma_exterieur-1024x1024.jpg'),
    ('Argentine', 'dom', 'blanc', 'adidas', 90, 'maillot_argentine_coupe_du_monde_2022_adidas_8.jpg'),
    ('Argentine', 'ext', 'bleu', 'adidas', 90, 'maillot_argentine_coupe_du_monde_2022_adidas_exterieur.jpeg'),
    ('Brésil', 'dom', 'jaune', 'nike', 89.99, 'maillot-bresil-2022-nike-1024x1024.png'),
    ('Brésil', 'ext', 'bleu', 'nike', 89.99, 'maillot-bresil-2022-1024x1024.png'),
    ('Équateur', 'dom', 'jaune', 'marathon', 45, 'maillot_equateur_coupe_du_monde_2022_marathon_1-1024x1021.jpg'),
    ('Équateur', 'ext', 'bleu', 'marathon', 45, 'maillot_equateur_coupe_du_monde_2022_marathon_2-1024x1022.jpg'),
    ('Uruguay', 'dom', 'bleu', 'puma', 85, 'maillot_uruguay_coupe_du_monde_2022-1024x1024.jpg'),
    ('Uruguay', 'ext', 'blanc', 'puma', 85, 'maillot-uruguay-coupe-du-monde-2022-1024x1024.jpeg'),
    ('Arabie Saoudite', 'dom', 'blanc', 'nike', 89.99, 'maillot-arabie-saoudite-coupe-du-monde-2022-nike.jpg'),
    ('Arabie Saoudite', 'ext', 'vert', 'nike', 89.99, 'maillot-arabie-saoudite-coupe-du-monde-2022.jpg'),
    ('Australie', 'dom', 'jaune', 'nike', 89.99, 'maillot-australie-coupe-du-monde-2022-nike-819x1024.jpg'),
    ('Australie', 'ext', 'bleu', 'nike', 89.99, 'maillot-australie-coupe-du-monde-2022-nike-exterieur-819x1024.jpg'),
    ('Corée du Sud', 'dom', 'rouge', 'nike', 89.99, 'maillot-coree-du-sud-coupe-du-monde-nike.jpeg'),
    ('Corée du Sud', 'ext', 'noir', 'nike', 89.99, 'maillot-coree-du-sud-coupe-du-monde.jpg'),
    ('Iran', 'dom', 'blanc', 'Merooj', 50, 'maillot-iran-coupe-du-monde-marque-merooj-963x1024.jpg'),
    ('Iran', 'ext', 'rouge', 'Merooj', 50, 'maillot-iran-coupe-du-monde-marque-merooj-1.jpg'),
    ('Japon', 'dom', 'bleu', 'adidas', 90, 'maillot_japon_coupe_du_monde_2022_adidas_domicile.jpeg'),
    ('Japon', 'ext', 'blanc', 'adidas', 90, 'maillot_japon_coupe_du_monde_2022_adidas_exterieur.jpg'),
    ('Qatar', 'dom', 'rouge', 'nike', 89.99, 'maillot-qatar-coupe-du-monde-2022-nike.jpg'),
    ('Qatar', 'ext', 'blanc', 'nike', 89.99, 'maillot-qatar-coupe-du-monde-2022.jpg'),
    ('Canada', 'dom', 'rouge', 'nike', 89.99, 'maillot-canada-coupe-du-monde-2022-domicile-nike.jpeg'),
    ('Canada', 'ext', 'blanc', 'nike', 89.99, 'maillot-canada-coupe-du-monde-2022-exterieur-nike.jpeg'),
    ('Costa Rica', 'dom', 'rouge', 'new balance', 80, 'maillot-costa-rica-coupe-du-monde-2022.jpeg'),
    ('Costa Rica', 'ext', 'blanc', 'new balance', 80, 'maillot-costa-rica-coupe-du-monde-2022-new-balance.jpeg'),
    ('Mexique', 'dom', 'vert', 'adidas', 90, 'maillot_mexique_coupe_du_monde_2022_adidas.jpg'),
    ('Mexique', 'ext', 'blanc', 'adidas', 90, 'maillot_mexique_coupe_du_monde_2022_adidas (1).jpg'),
    ('USA', 'dom', 'blanc', 'nike', 89.99, 'maillot-usa-coupe-du-monde-2022.jpg'),
    ('USA', 'ext', 'bleu', 'nike', 89.99, 'maillot-usa-coupe-du-monde-2022-exterieur.jpg'),
    ('Sénégal', 'dom', 'blanc', 'puma', 85, 'maillot_senegal_coupe_du_monde_2022-1024x1024.jpg'),
    ('Sénégal', 'ext', 'vert', 'puma', 85, 'maillot_senegal_coupe_du_monde_2022_puma_exterieur-1024x1024.jpg'),
    ('Ghana', 'dom', 'blanc', 'puma', 85, 'maillot_ghana_coupe_du_monde_2022-1024x1024.jpg'),
    ('Ghana', 'ext', 'rouge', 'puma', 85, 'maillot_ghana_coupe_du_monde_2022_puma_exterieur-1024x1024.jpg'),
    ('Maroc', 'dom', 'rouge', 'puma', 85, 'maillot-maroc-2022-coupe-du-monde.jpeg'),
    ('Maroc', 'ext', 'blanc', 'puma', 85, 'maillot-maroc-2022-coupe-du-monde-exterieur.jpeg'),
    ('Tunisie', 'dom', 'rouge', 'kappa', 65, 'maillot_tunisie_2022_2023_domicile_kappa.jpg'),
    ('Tunisie', 'ext', 'blanc', 'kappa', 65, 'maillot_tunisie_2022_2023_exterieur_kappa.jpg'),
    ('Cameroun', 'dom', 'vert', 'One All Sports', 70, 'maillot-cameroun-coupe-du-monde-2022-one-all-sports-924x1024.jpg'),
    ('Cameroun', 'ext', 'blanc', 'One All Sports', 70, 'maillot-cameroun-blanc-coupe-du-monde-2022-one-all-sports-859x1024.jpg');