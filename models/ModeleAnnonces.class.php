<?php

    require_once 'models/ModeleAnnonceException.class.php';
    require_once 'param2.ini';

    /**
     * Classe abstraite ModeleAnnonces
     * Centralise les services d'accès à une base de données.
     *
     *  connexion et d'exécution des requêtes SQL
     * 
     */
    abstract class ModeleAnnonce {

        /** Objet PDO d'accès à la BD */
        private $bdd;

        /**
         * Exécute une requête SQL éventuellement paramétrée
         * 
         * @param string $sql La requête SQL
         * @param array $valeurs Les valeurs associées à la requête
         * @return PDOStatement Le résultat renvoyé par la requête
         */
        protected function executerRequete($sql, $params = null) {
            if ($params == null) {
                $resultat = $this->getBdd()->query($sql); // exécution directe
            }
            else {
                $resultat = $this->getBdd()->prepare($sql);  // requête préparée
                $resultat->execute($params);
            }
            return $resultat;
        }

        /**
         * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
         * 
         * @return PDO L'objet PDO de connexion à la BDD
         */
        private function getBdd() {
            if ($this->bdd == null) {
                    $file_ini = "param.ini";
                if (!file_exists($file_ini)) 
                    throw new ModeleAnnonceException('Le fichier de paramètre est absent.');

                $tParam = parse_ini_file($file_ini, true);
                extract($tParam['BDD']);

                $dsn = "mysql:host=$DBHOST;port=$DBPORT;dbname=$DBNAME;charset=$DBCHAR";

                try {
                    $this->$bdd = new PDO($dsn, $DBUSER,
                            $DBPASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                } catch(PDOException $e) {
                    throw new ModeleAnnonceException('Connexion à la BDD impossible.');
                }
            }
            return $this->bdd;
        }

    }