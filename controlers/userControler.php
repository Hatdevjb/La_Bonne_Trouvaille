<?php 
// On charge le model 
require_once 'models/userModel.php';

// On recupere les données du formulaire
function connexion() {
    // Initialisation de la variable $contenu et $message
    $contenu = ""; 
    $message = null; 

    // On verifie que le formulaire est soumis
    if (isset($_POST['email'])) {
        // Recupere l'utilisateur par son email
        $user = getUserByEmail($_POST['email']);

        // Verification du mot de passe
        if ($user) { 
            if ($_POST['password'] === $user['mot_de_passe']) {
                // Si la connexion est ok alors on demarre une session
                session_start();

                // Stockage de l'utilisateur dans la session active
                $_SESSION['user'] = $user; 
                header('Location: index.php?action=profil');
                exit();
            } else {
                // Erreur de connexion
                $message = "Email/ Mot de passe incorrect";
            }
        } else {
            // Cas où l'email n'existe pas
            $message = "Email/ Mot de passe incorrect";
        }
    }

    // Affichage du formulaire
    ob_start();

    // chargement la vue de la connexion 
    require 'vues/vueConnexion.php';

    // Récupération du contenu généré
    $contenu = ob_get_clean();

    // Chargement du gabarie pour la strucuture de la page
    require 'vues/gabarie.php';
}

function deconnexion(){
    //demarre la session
    session_start();

    //vidage des varibales de session
    $_SESSION = array(); 

    //destruction de la session
    session_destroy();
    
    //redirection vers la page de connexion
    header('Location: index.php?action=connexion');
    exit();// arret du script 

}

function profil(){

    //verifie si l'utilisateur est connecté
    session_start();

    //si l'utlilisateur est connecté alors on affiche son profil
    if (isset($_SESSION['user'])){
        //recuperation des infos de l'utilisateur
        $user = $_SESSION['user']; 

        ob_start(); // enregstrement 
        //chargement de la vue du profil
        require 'vues/vueProfil.php';

        //récupération du contenu généré
        $contenu = ob_get_clean(); 
        require 'vues/gabarie.php';
    } else {
        header('Location: index.php?action=connexion'); // redirection vers la page de connexion
    }
}