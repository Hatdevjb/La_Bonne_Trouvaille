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

// On appelle la fonction correspondante dans le contrôleur
if ($action === 'connexion') {
    connexion(); //appel de la fonction connexion dans userControler.php
} 
elseif ($action === 'profil') {
    profil(); // Appel de la fonction profil dans userControler.php
} 
else {
    // Si l'action n'existe pas, on peut renvoyer vers la connexion
    connexion();
}