<?php

/**
 * Classe SignController pour gérer le processus de vérification et d'ajout d'utilisateurs.
 */
class SignController {
    
    /**
     * @var array $method Les données du formulaire soumises via la méthode POST.
     */
    private $method;
    
    /**
     * @var SignUp $signUp Une instance de la classe SignUp pour gérer les opérations d'inscription.
     */
    private $signUp;

    /**
     * Constructeur de la classe SignController.
     * 
     * @param array $meth Les données du formulaire soumises via la méthode POST.
     * @param SignUp $signU Une instance de la classe SignUp.
     */
    public function __construct($meth, $signU){
        $this->method = $meth;
        $this->signUp = $signU;
    }

    /**
     * Vérifie les données du formulaire et ajoute un nouvel utilisateur si les conditions sont remplies.
     * 
     * @return bool Retourne true si l'utilisateur a été ajouté avec succès, sinon false.
     */
    public function Check(){
        if(isset($this->method["fullname"]) && isset($this->method["email"]) && isset($this->method["password"])){
            if(!$this->signUp->AlreadyExist($this->method["fullname"])){
                return $this->signUp->AddUser($this->method["fullname"], $this->method["email"], $this->method["password"]);
            }
        }
    }
}

// Création d'une instance de la classe SignUp
$signU = new SignUp();

// Création d'une instance de la classe SignController avec les données POST et l'instance de SignUp
$sigUpController = new SignController($_POST, $signU);

// Appel de la méthode Check() pour vérifier et ajouter l'utilisateur
$isSuccess = $sigUpController->Check(); 
var_dump($isSuccess);

// Vérification du succès de l'opération
if ($isSuccess) {
    echo "Ajout !";
} else {
    echo "Erreur .";
}
