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
            $annonces = $this->annonce->getlistAnnonces();
            
            // Ajoute l'image à chaque annonce
            // $annonce['id-photo'] = $this->annonce->getImageAnnonce($annonce['id_annonce']);
            // <?= $annonce['id-photo']?
            
            $vue = new Vue("AccueilAnnonce");
            $vue->generer(array('annonces' => $annonces));
        }

    }

