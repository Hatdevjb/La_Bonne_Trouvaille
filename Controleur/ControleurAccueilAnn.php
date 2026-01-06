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
            $vue = new Vue("AccueilAnnonce");
            $vue->generer(array('annonces' => $annonces));
        }

    }

