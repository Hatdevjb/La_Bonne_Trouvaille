<?php
// On importation du contrôleur
require_once 'controlers/userControler.php';

// action a realiser
$action = 'connexion'; 
// On verifie si une action est demandée dans l'URL
if (isset($_GET['action'])) {
    // On recupere l'action
    $action = $_GET['action'];
}

//  appelle de la fonction correspondante dans le contrôleur
    if ($action === 'connexion') {
        connexion(); // Appel de la fonction connexion dans userControler.php
    } 
    elseif ($action === 'profil') {
        profil(); // Appel de la fonction profil dans userControler.php
    } 
    elseif ($action === 'deconnexion') {
        deconnexion(); // Appel de la fonction deconnexion dans userControler.php
    }
    elseif ($action === 'inscription') {
        inscription(); // Appel de la fonction inscription (a creer) dans userControler.php
    }
    else {
        // Si l'action n'existe pas ou n'est pas précisée (le "par défaut")
        // On renvoie vers la connexion
        connexion();
    }