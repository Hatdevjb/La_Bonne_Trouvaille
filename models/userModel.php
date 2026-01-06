<?php
    
    function getBdd(){
        // Chargement des paramètres depuis le fichier param.ini
        $param = parse_ini_file(__DIR__ . '/../param.ini', true);

        // Récupération des paramètres de connexion
        $host = $param['database']['HOST'];
        $dbname = $param['database']['DBNAME'];
        $username = $param['database']['USERNAME'];
        $password = $param['database']['PASSWORD'];
        $charset = $param['database']['CHARSET'];

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


    //recuperer tout les utilisateurs
        function getAllUsers(){
            //on se connecte à la bdd
            $bdd = getBdd();

            //on prépare la requête de sélection
            $sql = "SELECT * FROM utilisateur";
            
            $stmt = $bdd->prepare($sql);// prepare de la requete
            $stmt->execute(); //execution
            
            //récupération de tous les utilisateurs
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
?>