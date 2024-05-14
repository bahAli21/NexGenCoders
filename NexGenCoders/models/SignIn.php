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
            // Prépare la requête SQL pour récupérer l'ID de l'utilisateur.
            $req = "SELECT id FROM users WHERE email = ? AND passwor = ?";
            $statement = $this->dba->prepare($req);
            // Exécute la requête avec les valeurs des paramètres.
            $statement->execute([$email, $password]);
            // Récupère la première ligne de résultat sous forme d'objet.
            $data = $statement->fetchObject();
            // Si un résultat est trouvé, retourne l'ID de l'utilisateur.
            if ($data) {
                return $data->id;
            } else {
                return -1; // Aucun résultat trouvé
            }
        } catch (Exception $e) {
            // En cas d'erreur, enregistre l'erreur dans les logs et retourne -1.
            error_log("Erreur lors de la vérification de la connexion : " . $e->getMessage());
            return -1; // Erreur de traitement
        }
    }

}