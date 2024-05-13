// events.js

import { SignIn, SignUp, backToSignin, resetPasswordLink } from './variables.js';

import {BackToSignInClick, ResetPasswordClick, SignInClick, SignUpClick} from './functions.js';

// Gestionnaire d'événement pour le bouton "Retour à la connexion"
backToSignin.addEventListener('click', (e) => {
    e.preventDefault();
    BackToSignInClick();
});

// Gestionnaires d'événements pour le bouton "Se connecter"
SignIn.addEventListener('click', (e) => {
    e.preventDefault();
    SignInClick();
});

// Gestionnaires d'événements pour le bouton "S'inscrire"
SignUp.addEventListener('click', (e) => {
    e.preventDefault();
    SignUpClick();
});

resetPasswordLink.addEventListener('click', (e)=>{
    e.preventDefault();
    ResetPasswordClick();
});

export { SignIn, SignUp, backToSignin, resetPasswordLink };