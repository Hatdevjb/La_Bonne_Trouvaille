<?php 
require_once 'models/userModel.php';

function connexion(){
    $contenu = ""; 
    
    // Soumission du formulaire
    if (isset($_POST['email'])){
        //recupere l'utilisateur par son email
        $user = getUserByEmail($_POST['email']);

        //verifie le mot de passe
        if ($user && $_POST['password'] === $user['mot_de_passe']){

            // si la connexion est ok alors on demarre une session
           session_start();

           $_SESSION['user'] = $user; // stockagge de l'utilisateur dans la session active
           header('Location: index.php?action=profil');
           exit();
        } else {
            //erreur de connexion
            $erreur = 'Email/ Mot de passe incorrect';
        }
    }

    // Affichage du formulaire
    ob_start();
    // chargement la vue
    require 'vues/vueConnexion.php';

    // Récupération du contenu généré
    $contenu = ob_get_clean();

    // Chargement du gabarie
    require 'vues/gabarie.php';
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
        header('Location: index.php?action=connexion');
    }
}