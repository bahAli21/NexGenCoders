<?php

/**
 * Classe SignUp pour gérer les opérations d'inscription des utilisateurs.
 */
class SignUp {
    
    /**
     * @var PDO $dba La connexion à la base de données.
     */
    private $dba;
    
    /**
     * Constructeur de la classe SignUp.
     * Initialise la connexion à la base de données.
     */
    public function __construct() {
        $this->dba = (new Database)->getConnexion();
    }

    /**
     * Vérifie si un utilisateur existe déjà dans la base de données.
     * 
     * @param string $users Le nom complet de l'utilisateur à vérifier.
     * @return bool Retourne true si l'utilisateur existe déjà, sinon false.
     */
    public function AlreadyExist($users): bool {
        try {
            $req = "SELECT * FROM users WHERE fullname = ?";
            $statement = $this->dba->prepare($req);
            $statement->execute([$users]);
        } catch (Exception $e) {
            error_log("l'utilisateur existe déjà : " . $e->getMessage());
            return false;
        }
        return $statement->rowCount() > 0;
    }

    /**
     * Ajoute un nouvel utilisateur à la base de données.
     * 
     * @param string $fullname Le nom complet de l'utilisateur à ajouter.
     * @param string $email L'adresse email de l'utilisateur.
     * @param string $password Le mot de passe de l'utilisateur.
     * @return bool Retourne true si l'utilisateur a été ajouté avec succès, sinon false.
     */
    public function AddUser($fullname, $email, $password): bool {
        try {
            $req = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
            $statement = $this->dba->prepare($req);
            $statement->bindParam(1, $fullname);
            $statement->bindParam(2, $email);
            $statement->bindParam(3, $password);
            $statement->execute();
            if ($statement) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            error_log("Error adding user: " . $e->getMessage());
            return false;
        }
    }
}
