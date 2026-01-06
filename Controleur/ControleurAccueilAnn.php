<?php

require_once 'Modele/Annonce.class.php';
require_once 'Vue/VueAnnonce.php';

class ControleurAccueilAnn{

    private $annonce;

    public function __construct() {
        $this->annonce = new Annonce();
    }

// Affiche la liste de tous les annonces du blog
    public function accueil() {
        $annonces = $this->annonce->getAnnonces();
        $vue = new Vue("Accueil");
        $vue->generer(array('annonces' => $annonces));
    }

}

