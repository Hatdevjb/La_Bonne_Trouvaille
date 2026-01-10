<?php

    require_once 'models/ModeleAnnonce.php';
    require_once 'vues/Vue.php';

    class ControleurAccueilAnn{

        private $annonce;
    

        public function __construct() {
            $this->annonce = new Annonce();
          
        }

    // Affiche la liste de tous les annonces du blog
        public function accueilAnn() {
            $result = $this->annonce->getlistAnnonces();
            $annonces = array();
            
            // Traite chaque résultat et ajoute l'image
            while ($annonce = $result->fetch()) {
                $annonce['image'] = $this->annonce->getImageAnnonce($annonce['id_annonce']);
                $annonces[] = $annonce;
            }
            
            $vue = new Vue("AccueilAnnonce");
            $vue->generer(array('annonces' => $annonces));
        }

    }