<?php

/**
 * Classe SignIn pour vérifier la connexion d'un utilisateur.
 */
class SignIn {
    /** @var PDO L'objet de connexion à la base de données. */
    private $dba;

    /**
     * Constructeur de la classe SignIn.
     */
    public function __construct() {
        // Initialise la connexion à la base de données.
        $this->dba = (new Database)->getConnexion();
    }

    /**
     * Vérifie si un utilisateur avec l'email et le mot de passe donnés existe dans la base de données.
     *
     * @param string $email L'email de l'utilisateur.
     * @param string $password Le mot de passe de l'utilisateur.
     * @return int L'ID de l'utilisateur s'il existe, sinon -1.
     */
    public function VerifieConnect($email, $password) : int {
        try {
            // Prépare la requête SQL pour récupérer l'ID de l'utilisateur en fonction de l'email.
            $req = "SELECT id, passwor FROM users WHERE email = ?";
            $statement = $this->dba->prepare($req);
            // Exécute la requête avec la valeur de l'email.
            $statement->execute([$email]);
            // Récupère la première ligne de résultat sous forme d'objet.
            $data = $statement->fetchObject();
            // Si aucun résultat n'est trouvé, retourne -1.
            if (!$data) {
                return -1;
            }
            // Vérifie si le mot de passe fourni correspond au mot de passe haché stocké dans la base de données.
            if (password_verify($password, $data->passwor)) {
                // Si les mots de passe correspondent, retourne l'ID de l'utilisateur.
                return $data->id;
            } else {
                // Si les mots de passe ne correspondent pas, retourne -1.
                return -1;
            }
        } catch (Exception $e) {
            // En cas d'erreur, enregistre l'erreur dans les logs et retourne -1.
            error_log("Erreur lors de la vérification de la connexion : " . $e->getMessage());
            return -1; // Erreur de traitement
        }
    }

}