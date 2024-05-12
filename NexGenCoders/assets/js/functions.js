//Les fonctions ici

// Import des variables depuis le fichier variables.js
import {loginDiv, registerDiv } from './variables.js';

function BackToSignInClick() {
    loginDiv.style.display = "flex";
    registerDiv.style.display = "none";
}

function SignInClick(){
    if (loginDiv.style.display === "none") {
        loginDiv.style.display = "flex";
        registerDiv.style.display = "none";
    } else {
        loginDiv.style.display = "none";
    }
}

function SignUpClick(){
    if (registerDiv.style.display === "none") {
        loginDiv.style.display = "none";
        registerDiv.style.display = "flex";
    } else {
        registerDiv.style.display = "none";
    }
}

export { BackToSignInClick, SignInClick, SignUpClick };