
<?php


class Database {
    private $config;
    private $connexion;

    public function __construct() {
       $this->config = require "Config.php";

    }

    public function getConnexion() {

        try {
        
            $connexion= new PDO("mysql:host={$this->config['host']};dbname={$this->config['dbname']}",
                $this->config['uid'],
                $this->config['password']);
            if($connexion){
                echo ("connexion reussie");

            }

        } catch(PDOException $e) {
        
            die("La connexion à la base de données a échoué : " . $e->getMessage());
        }
        return $this->connexion;
    }
}

?>