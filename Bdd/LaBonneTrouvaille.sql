-- Création de la base de données LaBonneTrouvaille
CREATE DATABASE IF NOT EXISTS labonnetrouvaille;
USE labonnetrouvaille;
 
/*table UTILISATEUR*/
CREATE TABLE Utilisateur (
   id_utilisateur INT AUTO_INCREMENT,
   email VARCHAR(100) UNIQUE,
   username VARCHAR(50) UNIQUE,
   mot_de_passe VARCHAR(100),
   PRIMARY KEY(id_utilisateur)
);

/*TABLE ANNONCE*/
CREATE TABLE Annonce (
   id_annonce INT AUTO_INCREMENT,
   titre VARCHAR(50),
   description TEXT,
   prix DECIMAL(15,2) CHECK(prix >= 0),
   date_publication DATE,
   id_utilisateur INT NOT NULL,
   PRIMARY KEY(id_annonce),
   FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

/*TABLE PHOTO*/
CREATE TABLE Photo (
   id_photo INT AUTO_INCREMENT,
   id_annonce INT NOT NULL,
   chemin VARCHAR(100) NOT NULL,
   PRIMARY KEY(id_photo),
   FOREIGN KEY(id_annonce) REFERENCES Annonce(id_annonce)
);

/* CREATION D'UTILISATEURS POUR  TEST IMPLEMENTATION   */
INSERT INTO Utilisateur (email, username, mot_de_passe)
VALUES
('luc.ture@example.com', 'LucTure', 'Luc76_'),        
('anne.onyme@example.com', 'AnneOnyme', 'Mdp99'),         
('sal.lemand@example.com', 'SalLemand', 'Sallemand33D'),       
('chris.tal@example.com', 'ChrisTal', 'ClairNet321!');        




/* avant le mergre faire un pull et importer un seul BDD /* apres le merge faire un pull et importer les 2 BDD */