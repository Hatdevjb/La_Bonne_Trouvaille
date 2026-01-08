<?php

    require_once 'models/DAO.php';
    require_once 'models/ModeleAnnonce.php';


    class Photo extends DAO {
        
        /**
         * Renvoie la liste des Photos
         * 
         *
         */ 
        public function getlistPhotos() {
            $sql = 'SELECT * FROM photo';
            $photos = $this->executerRequete($sql);
            return $Photos;
        }


        /**
         * Récupère le chemin de l'image d'une photo
         * 
         * @param int $idPhoto L'identifiant de l'photo
         * @return string Le chemin de l'image ou une image par défaut
         */
        public function getImagePhoto($idAnnonce) {
            $sql = 'SELECT id_photo FROM photo WHERE id_annonce = ? LIMIT 1';
            $result = $this->executerRequete($sql, array($idAnnonce));
            
            if ($result->rowCount() > 0) {
                $photo = $result->fetch();
                return $photo['id_photo'];
            } else {
                return 'images/ImgAnnonce/default.png';  // Image par défaut
            }
        }
    }
