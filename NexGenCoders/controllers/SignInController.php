
<?php


/**
 * Class SignInController
 * This class handles user sign-in functionality.
 */
class SignInController {
    
    private $signIn; // Instance of the SignIn class
    private $method; // Request method (e.g., POST)

    /**
     * SignInController constructor.
     * @param array $meth The request method data
     * @param SignIn $signI An instance of the SignIn class
     */
    public function __construct($meth, $signI) {
        $this->signIn = $signI;
        $this->method = $meth;
    }

    /**
     * SuccessConnect method.
     * Verifies user sign-in credentials.
     * @return int User ID if sign-in successful, -1 otherwise
     */
    public function SuccessConnect(): int {
        // Check if email and password are set in the request method
        if (isset($this->method["Email"]) && isset($this->method["Password"])) {
            // Call VerifieConnect method of the SignIn class to verify user credentials
            return $this->signIn->VerifieConnect($this->method["Email"], $this->method["Password"]);
        }
        // Return -1 if email or password is not provided in the request
        return -1;
    }
}

// Instantiate the SignIn class
$signI = new SignIn();

// Instantiate the SignInController class with POST data and SignIn instance
$signInController = new SignInController($_POST, $signI);

// Call SuccessConnect method to verify sign-in and get user ID
$isSuccess = $signInController->SuccessConnect();
var_dump($isSuccess);

// Display success or error message based on the result
if ($isSuccess != -1) {
    echo "Vous êtes désormais connecté !"; // You are now connected!
} else {
    echo "Oups, vos identifiants sont incorrects"; // Oops, your credentials are incorrect
}