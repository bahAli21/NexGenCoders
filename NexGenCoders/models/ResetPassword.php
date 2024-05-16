<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * La classe ResetPassword gère l'envoi de mails pour la réinitialisation de mot de passe.
 */
class ResetPassword {
    private $mail ;
    private $dba;
    
    /**
     * Constructeur de la classe ResetPassword.
     * @param string $email L'adresse email du destinataire.
     */
    public function __construct($email )
    {
          $this->dba = (new Database)->getConnexion();
          $this->mail =new PHPMailer(true);// true pour activer les exceptions 

        try {
            // Paramètres du serveur SMTP
            $this->mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Activer la sortie de débogage verbose
            $this->mail->isSMTP();                                         // Envoi via SMTP
            $this->mail->Host       = 'smtp.gmail.com';                     // Serveur SMTP
            $this->mail->SMTPAuth   = true;                                 // Activer l'authentification SMTP
            $this->mail->Username   = 'diallosidymohamed99@gmail.com';      // Nom d'utilisateur SMTP
            $this->mail->Password   = 'iryk krer tzch kinc';               // Mot de passe SMTP
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          // Activer le chiffrement SSL/TLS
            $this->mail->Port       = 465;                                 // Port TCP pour se connecter
        
            // Paramètres du message
            $this->mail->setFrom('diallosidymohamed99@gmail.com', '');     // Adresse email de l'expéditeur
            $this->mail->addAddress($email);                               // Adresse email du destinataire
            $this->mail->isHTML(true);                                     // Format du message HTML
            $this->mail->Subject = 'Réinitialisation';                      // Sujet du message
            $this->mail->Body    = 'Voici le lien';                         // Corps du message

            echo 'Le message a été envoyé';
        } catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Erreur du serveur de messagerie : {$this->mail->ErrorInfo}";
        }
    }

    /**
     * Envoie le message de réinitialisation de mot de passe.
     * @return bool Retourne true si le message a été envoyé avec succès, sinon false.
     */
    public function send(): bool {
        return $this->mail->send();
    }

    /**
     * Vérifie si l'email existe déjà dans la base de données.
     * @param string $email L'adresse email à vérifier.
     * @return bool Retourne true si l'email existe, sinon false.
     */
    public function AlreadyExit($email): bool {
        try {
            $req ="SELECT * From users Where email = ?";
            $statement =$this->dba->prepare($req);
            $statement->execute([$email]);
        } catch (Exception $e) {
            error_log("L'email n'existe pas dans notre base de données : ". $e->getMessage());
            return false;
        }
        return $statement->rowCount() > 0;
    }
}