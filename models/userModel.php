<?php
    
    function getBdd(){
        // Chargement des paramètres depuis le fichier param.ini
        $config = parse_ini_file(__DIR__ . '/../param.ini', true);

        // Récupération des paramètres de connexion
        $host = $config['database']['HOST'];
        $dbname = $config['database']['DBNAME'];
        $username = $config['database']['USERNAME'];
        $password = $config['database']['PASSWORD'];
        $charset = $config['database']['CHARSET'];

        //connexion a la bdd 
       $dsn = "mysql:dbname=" . $dbname . ";host=" . $host . ";charset=" . $charset;
         try {
              $bdd = new PDO($dsn, $username, $password);
              // Définir le mode d'erreur de PDO sur Exception
              $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Ajouté pour la gestion des erreurs
              return $bdd;
         } catch (PDOException $e) {
              echo "Erreur " . $e->getMessage();
            die();
         }
    }

    //Creation d'un utilistateur
        function creerUser( $email, $username, $password){
            // On se connecte à la BDD
            $bdd = getBdd();

            // On prépare la requête d'insertion
            $sql = "INSERT INTO utilisateur (email, username, mot_de_passe) VALUES (:email, :username, :mot_de_passe)";
            $stmt = $bdd->prepare($sql);
            
            // Execution 
            $stmt->execute([':email'=>$email, ':username'=>$username, ':mot_de_passe'=>$password]);
        }

    //Supprimer un utilisateur
        function supprimerUser($id){
            //on se connecte à la bdd
            $bdd = getBdd();

            //on prépare la requête de suppression
            $sql = "DELETE FROM utilisateur WHERE id_utilisateur = :id";
            $stmt = $bdd->prepare($sql);
            //execution
            $stmt->execute([':id'=>$id]);
        }
    
    //recupere un utilisateur par son email
        function getUserByEmail($email){
            // On se connecte à la BDD
            $bdd = getBdd();

            // On prépare la requête de sélection
            $sql = "SELECT * FROM utilisateur WHERE email = :email";
            $stmt = $bdd->prepare($sql);
            
            // Execution 
            $stmt->execute([':email'=>$email]);

            // Récupérer l'utilisateur
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

    //recupere un utilisateur par son id
        function getUserById($id) {
            // On se connecte à la BDD
            $bdd = getBdd();

            // On prépare la requête de sélection
            $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = :id";
            $stmt = $bdd->prepare($sql);
            
            // Execution 
            $stmt->execute([':id'=>$id]);

            // Récupérer l'utilisateur
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }


?>