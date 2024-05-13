// variables.js

// Variables récupérées depuis le DOM
const SignIn = document.getElementById('signin');
const SignUp = document.getElementById('signup');
const loginDiv = document.querySelector('.login');
const registerDiv = document.querySelector('.register');
const backToSignin = document.querySelector('#back-to-sign-in');

// Export des variables pour les rendre disponibles pour d'autres modules
export { SignIn, SignUp, loginDiv, registerDiv, backToSignin };