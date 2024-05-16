<?php

/**
 * La classe ResetPasswordController gère la vérification de l'email et l'envoi de mails pour la réinitialisation de mot de passe.
 */
class ResetPasswordController {
    
    private $method;
    private $ResetPass;

    /**
     * Constructeur de la classe ResetPasswordController.
     * @param array $meth Les données de la requête POST.
     * @param ResetPassword $Reset L'objet ResetPassword pour envoyer le mail de réinitialisation.
     */
    public function __construct($meth, $Reset) {
        $this->method = $meth;
        $this->ResetPass = $Reset;
    }

    /**
     * Vérifie si l'email existe dans la base de données et envoie le mail de réinitialisation.
     * @return bool Retourne true si le mail a été envoyé avec succès, sinon false.
     */
    public function Check(): bool {
        if(isset($this->method["Email"])) {
            $email = $this->method["Email"];
            if($this->ResetPass->AlreadyExit($email)) {
                return $this->ResetPass->send();
            }
        }
        return false;
    }
}

$Reset = new ResetPassword($_POST["Email"]);
$ResetControll = new ResetPasswordController($_POST, $Reset);

$isSuccess = $ResetControll->Check(); 

var_dump($isSuccess);

// Vérification 
if ($isSuccess) {
    echo "Vous avez reçu un mail.";
} else {
    echo "L'email n'est pas valide.";
}
?>