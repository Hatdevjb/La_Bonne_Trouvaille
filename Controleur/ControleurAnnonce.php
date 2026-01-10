
<?php

    require_once 'models/ModeleAnnonce.php';
    require_once 'vues/Vue.php';

    class ControleurAnnonce {

        private $annonce;
        

        public function __construct() {
            $this->annonce = new Annonce();
        }

        // Affiche les détails sur un annonce
        public function annonce($idAnnonce) {
            $annonce = $this->annonce->getAnnonceById($idAnnonce);
            // Récupère l'image associée à l'annonce
            $annonce['image'] = $this->annonce->getImageAnnonce($idAnnonce);
            $vue = new Vue("Annonce");
            $vue->generer(array('annonce' => $annonce));
        }

        // Affiche le formulaire d'ajout d'annonce
        public function formulaireAjout() {
            $vue = new Vue("AjoutAnnonce");
            $vue->generer(array());
        }

        // Traite l'ajout d'une nouvelle annonce
        public function ajoutAnnonce() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupération des données du formulaire
                $titre = isset($_POST['titre']) ? trim($_POST['titre']) : '';
                $description = isset($_POST['description']) ? trim($_POST['description']) : '';
                $prix = isset($_POST['prix']) ? floatval($_POST['prix']) : 0;
                
                // Validation basique
                if (empty($titre) || empty($description) || $prix <= 0) {
                    throw new ModeleAnnonceException("Tous les champs sont obligatoires et le prix doit être positif");
                }
                
                // Gestion du fichier image
                if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                    throw new ModeleAnnonceException("Une erreur est survenue lors de l'upload du fichier");
                }
                
                $fichier = $_FILES['image'];
                
                // Validation du fichier
                $typesAcceptes = ['image/jpeg', 'image/png', 'image/gif'];
                
                if (!in_array($fichier['type'], $typesAcceptes)) {
                    throw new ModeleAnnonceException("Type de fichier non accepté. Acceptés: JPG, PNG, GIF");
                }
                
                // Création d'un nom unique pour le fichier
                $extension = pathinfo($fichier['name'], PATHINFO_EXTENSION);
                $nomFichier = uniqid('annonce_') . '.' . $extension;
                $cheminUpload = 'images/ImgAnnonce/' . $nomFichier;
                
             
                // Déplacement du fichier uploadé
                if (!move_uploaded_file($fichier['tmp_name'], $cheminUpload)) {
                    throw new ModeleAnnonceException("Impossible de sauvegarder l'image");
                }

                
        
                
                
                // Insertion en base de données
                // TODO: Récupérer l'ID de l'utilisateur connecté (remplacer 1 par la vraie valeur)
                $idUtilisateur = 1; // À adapter selon votre système d'authentification
            
                $idAnnonce = $this->annonce->creerAnnonce($titre, $description, $prix, $idUtilisateur);
                $this->annonce->ajouterPhoto($idAnnonce, $nomFichier);
                
                // Redirection vers la nouvelle annonce
                header('Location: index.php?action=annonce&id=' . $idAnnonce);
                   
               
            }
        }

      

    }

