<?php 
// On charge le model 
require_once 'models/userModel.php';

//==========CONNEXION ==========//
    function connexion() {
        // Initialisation de la variable $contenu et $message
        $contenu = ""; 
        $message = null; 

        // On verifie que le formulaire est soumis
        if (isset($_POST['email'], $_POST['password'])) {
            // Verifier l'utilisateur par son email
            $user = getUserByEmail($_POST['email']);

            // Verification du mot de passe haché 
            if ($user && password_verify($_POST['password'], $user['mot_de_passe'])) {

                // Si la connexion est ok alors on demarre une session
                session_start();

                // Stockage de l'utilisateur dans la session active
                $_SESSION['user'] = $user; 
                
                // redirection vers la page admin si l'email correspond
                if ($_SESSION['user']['email'] === 'admin@lbt.fr') {
                    header('Location: index.php?action=admin');
                } else {
                    header('Location: index.php?action=profil');
                }
                exit(); // On arrête le script après la redirection

            } else {
                // Erreur de connexion (email ou mdp faux)
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
        $contenu = "";
        $message = null;

        if(isset($_POST['email'], $_POST['username'], $_POST['password'])){

            // verification si l'username ou l'email entré est "admin" 
            if(strtolower($_POST['email']) == "admin" || strtolower($_POST['username']) == "admin") {  // on force minuscule pour éviter les contournements avec strtolower
                $message = "Le nom d'utilisateur ou l'email 'admin' est réservé, veuillez en choisir un autre.";
            } 
            // verification si l'email existe deja
            elseif(getUserByEmail($_POST['email'])){
                $message = "L'email est déjà pris, veuillez en choisir un autre.";
            } 
            else {
                // On hache le mot de passe avant la création
                $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

                // creation de l'utilisateur avec le mot de passe haché
                creerUser($_POST['email'], $_POST['username'], $pass_hache);

                // renvoie vers la page de connexion
                header('Location: index.php?action=connexion');
                exit(); // arret du script
            }
        }

        ob_start(); // enregistrement

        // chargement de la vue d'inscription
        require 'vues/vueInscription.php';
        
        // récupération du contenu généré
        $contenu = ob_get_clean();

        // chargement du gabarie pour la structure de la page
        require 'vues/gabarie.php';
    }

//==========ADMIN===========
    function admin(){

        // Verification si l'utilisateur est admin
        if(!isset($_SESSION['user']) || $_SESSION['user']['email'] !== 'admin@lbt.fr'){
            header('Location:index.php');
            exit();
        }

        // connection à la bdd
        $connexion = getBdd();

        if (isset($_GET['supprimer_id'])){
            //appel de la fonction de suppression
            supprimerUser($_GET['supprimer_id']);

            //redirection vers la page admin
            header('Location:index.php?action=admin');
            
            exit(); // arret du script
        }

        // Récupération de la liste des utilisateurs
        $users = getAllUsers();
        
        // Affichage de la vue admin
        ob_start();

        require 'vues/vueAdmin.php'; //chargement de la vue admin

        $contenu = ob_get_clean(); //récupération du contenu généré

        require 'vues/gabarie.php'; // chargement du gabarie pour la structure de la page
    }