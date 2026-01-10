<?php

    require_once 'models/DAO.php';
    require_once 'models/ModeleAnnonceException.php';


    class Annonce extends DAO {
        
        /**
         * Renvoie la liste des annonces
         * 
         *
         */ 
        public function getlistAnnonces() {
            $sql = 'SELECT * FROM annonce';
            $annonces = $this->executerRequete($sql);
            return $annonces;
        }

        /**
         * Renvoie une annonce spécifique
         * 
         * @param int $idAnnonce L'identifiant de l'annonce
         */ 
        public function getAnnonceById($idAnnonce) {
            $sql = 'SELECT * FROM annonce WHERE id_annonce = ?';
            $annonce = $this->executerRequete($sql, array($idAnnonce));
            if ($annonce->rowCount() == 1)
                return $annonce->fetch();  // Accès à la première ligne de résultat
            else
                throw new ModeleAnnonceException("Aucune annonce ne correspond à l'identifiant '$idAnnonce'");
        }
        
      /**
         * Récupère le chemin de l'image d'une annonce
         * 
         * @param int $idAnnonce L'identifiant de l'annonce
         * @return string Le chemin de l'image ou une image par défaut
         */
        public function getImageAnnonce($idAnnonce) {
            $sql = 'SELECT chemin FROM photo WHERE id_annonce = ? LIMIT 1';
            $result = $this->executerRequete($sql, array($idAnnonce));
            
            if ($result->rowCount() > 0) {
                $photo = $result->fetch();
                return $photo['chemin'];
            } else {
                return 'default.png';  // Image par défaut
            }
        }

        /**
         * Crée une nouvelle annonce
         * 
         * @param string $titre Le titre de l'annonce
         * @param string $description La description de l'annonce
         * @param float $prix Le prix de l'annonce
         * @param int $idUtilisateur L'identifiant de l'utilisateur
         * @return int L'identifiant de la nouvelle annonce
         */
        public function creerAnnonce($titre, $description, $prix, $idUtilisateur) {
            $sql = 'INSERT INTO annonce (titre, description, prix, date_publication, id_utilisateur) 
                    VALUES (?, ?, ?, NOW(), ?)';
            $this->executerRequete($sql, array($titre, $description, $prix, $idUtilisateur));
            
            // Retourne l'ID de l'annonce créée
            return $this->getBdd()->lastInsertId();
        }

        /**
         * Ajoute une photo à une annonce
         * 
         * @param int $idAnnonce L'identifiant de l'annonce
         * @param string $cheminPhoto Le chemin du fichier image
         */
        public function ajouterPhoto($idAnnonce, $cheminPhoto) {
            $sql = 'INSERT INTO photo (id_annonce, chemin) VALUES (?, ?)';
            $this->executerRequete($sql, array($idAnnonce, $cheminPhoto));
        }
    }