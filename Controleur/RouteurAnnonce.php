<?php

    require_once 'Controleur/ControleurAnnonce.php';
    require_once 'Controleur/ControleurAccueilAnn.php';
    require_once 'vues/Vue.php';

    class RouteurAnnonce {

        private $ctrlAccueilAnn;
        private $ctrlAnnonce;

        public function __construct() {
            $this->ctrlAccueilAnn = new ControleurAccueilAnn();
            $this->ctrlAnnonce = new ControleurAnnonce();
        }

        // Route une requête entrante : exécution l'action associée
        public function routerRequete() {
            try {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'annonce') {
                        $idAnnonce = intval($this->getParametre($_GET, 'id'));
                        if ($idAnnonce != 0) {
                            $this->ctrlAnnonce->annonce($idAnnonce);
                        }
                        else
                            throw new Exception("Identifiant de annonce non valide");
                    }
                    else
                        throw new Exception("Action non valide");
                }
                else {  // aucune action définie : affichage de l'AccueilAnnonce
                    $this->ctrlAccueilAnn->AccueilAnn();
                }
            }
            catch (Exception $e) {
                $this->erreur($e->getMessage());
            }
        }

        // Affiche une erreur
        private function erreur($msgErreur) {
            $vue = new Vue("Erreur");
            $vue->generer(array('msgErreur' => $msgErreur));
        }

        // Recherche un paramètre dans un tableau
        private function getParametre($tableau, $nom) {
            if (isset($tableau[$nom])) {
                return $tableau[$nom];
            }
            else
                throw new Exception("Paramètre '$nom' absent");
        }
    }