<?php

    require_once 'modele/ModeleAnnoces.class.php';
    require_once 'modele/ModeleAnnocesException.class.php';


    class Annonces extends ModeleAnnonces {
        
        public function getlistAnnonces() {
            $sql = 'SELECT * FROM annonces ORDER BY id DESC';
            $annonces = $this->executerRequete($sql);
            return $annonces;
        }

        public function getAnnonceById($idAnnonce) {
            $sql = 'SELECT * FROM annonces WHERE id = ?';
            $annonce = $this->executerRequete($sql, array($idAnnonce));
            if ($annonce->rowCount() == 1)
                return $annonce->fetch();  // Accès à la première ligne de résultat
            else
                throw new ModeleAnnoncesException("Aucune annonce ne correspond à l'identifiant '$idAnnonce'");
        }
    }