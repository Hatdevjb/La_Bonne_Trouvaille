<?php

    require_once 'modele/ModeleAnnoce.class.php';
    require_once 'modele/ModeleAnnoceException.class.php';


    class Annonce extends ModeleAnnonce {
        
        /**
         * Renvoie la liste des annonces
         * 
         *
         */ 
        public function getlistAnnonces() {
            $sql = 'SELECT * FROM annonces ORDER BY id DESC';
            $annonces = $this->executerRequete($sql);
            return $annonces;
        }

        /**
         * Renvoie une annonce spécifique
         * 
         * @param int $idAnnonce L'identifiant de l'annonce
         */ 
        public function getAnnonceById($idAnnonce) {
            $sql = 'SELECT * FROM annonces WHERE id = ?';
            $annonce = $this->executerRequete($sql, array($idAnnonce));
            if ($annonce->rowCount() == 1)
                return $annonce->fetch();  // Accès à la première ligne de résultat
            else
                throw new ModeleAnnonceException("Aucune annonce ne correspond à l'identifiant '$idAnnonce'");
        }
    }
