
<?php

    require_once 'Modele/Annonce.php';
    require_once 'Vue/VueAnnnoce.php';

    class ControleurAnnonce {

        private $annonce;
        

        public function __construct() {
            $this->annonce = new Annonce();
        }

        // Affiche les détails sur un annonce
        public function annonce($idAnnonce) {
            $annonce = $this->annonce->getAnnonce($idAnnonce);
            $vue = new Vue("Annonce");
            $vue->generer(array('annonce' => $annonce));
        }

      

    }

