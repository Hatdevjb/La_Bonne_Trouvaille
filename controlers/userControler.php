<?php 
// On charge le model 
require_once 'models/userModel.php';

//==========CONNEXION ==========//
    function connexion() {
        // Initialisation de la variable $contenu et $message
        $contenu = ""; 
        $message = null; 

        // On verifie que le formulaire est soumis
        if (isset($_POST['email'])) {
            // Verifier l'utilisateur par son email
            $user = getUserByEmail($_POST['email']);

            // Verification du mot de passe
            if ($user) { 
                if ($_POST['password'] === $user['mot_de_passe']) {
                    // Si la connexion est ok alors on demarre une session
                    session_start();

                    // Stockage de l'utilisateur dans la session active
                    $_SESSION['user'] = $user; 
                    // if()//nom utilisateur admin)
                    //     //redirection vers la page admin
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

//==========DECONNEXION ==========//
    function deconnexion(){

        //vidage des varibales de session
        $_SESSION = array(); 

        //destruction de la session
        session_destroy();

        //redirection vers la page de connexion
        header('Location: index.php?action=connexion');
        exit();// arret du script 

    }

//==========PROFIL ==========//
function profil(){

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

//==========INSCRIPTION ==========//
    function inscription(){

        // Initialisation de la variable $contenu et $message
        $contenu= "";
        $message = null;

        if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])){
            //verificatio n si l'email existe deja
            $ifExists = getUserByEmail($_POST['email']); 

            if($ifExists){
                $message ="L'email est déja pris, veuillez en choisir un autre.";

            }else {
                //creation de l'utilisateur 
                creerUser($_POST['email'], $_POST['username'], $_POST['password']);

                //renvoie vers la page de connexion
                header('Location: index.php?action=connexion');
                exit(); //arret du script

            }
        }

        ob_start(); //enregistrement

        //chargement de la vue d'inscription
        require 'vues/vueInscription.php';
        //récupération du contenu généré
        $contenu = ob_get_clean();

        //chargement du gabarie pour la structure de la page
        require 'vues/gabarie.php';
    }