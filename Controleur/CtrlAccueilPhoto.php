<?php

    require_once 'models/ModelePhoto.php';
    require_once 'models/ModeleAnnonce.php';
    require_once 'vues/Vue.php';

    class CtrlAccueilPhoto {

        private $photo;
    

        public function __construct() {
            $this->photo = new Photo();
          
        }

    // Affiche la liste de tous les photos du blog
        // public function accueilPhoto() {
        //     $photos = $this->photo->getlistPhotos();
        //     $vue = new Vue("AccueilAnnonce");
        //     $vue->generer(array('photos' => $photos));
        // }

    // Affiche les détails sur un photo en fonction de l'annonce
        public function photo($idAnnonce) {
            $photo = $this->photo->getImagePhoto($idAnnonce);
            $vue = new Vue("Annonce");
            $vue->generer(array('photo' => $photo));
        }
    }

