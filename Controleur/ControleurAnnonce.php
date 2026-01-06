
<?php

    require_once 'models/Annonce.php';
    require_once 'vues/Vue.php';

    class ControleurAnnonce {

        private $annonce;
        

        public function __construct() {
            $this->annonce = new Annonce();
        }

        // Affiche les détails sur un annonce
        public function annonce($idAnnonce) {
            $annonce = $this->annonce->getAnnonceById($idAnnonce);
            $vue = new Vue("Annonce");
            $vue->generer(array('annonce' => $annonce));
        }

      

    }

