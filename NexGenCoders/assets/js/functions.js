//Les fonctions ici

// Import des variables depuis le fichier variables.js
import {loginDiv, registerDiv, resetPassword, HomePage} from './variables.js';

function BackToSignInClick() {
    resetPassword.style.display = "none";
    loginDiv.style.display = "flex";
    registerDiv.style.display = "none";
    HomePage.style.display = "none";
}

function SignInClick(){
    resetPassword.style.display = "none";
    if (loginDiv.style.display === "none") {
        loginDiv.style.display = "flex";
        registerDiv.style.display = "none";
        HomePage.style.display = "none";
    }
}

function SignUpClick(){
    resetPassword.style.display = "none";
    if (registerDiv.style.display === "none") {
        loginDiv.style.display = "none";
        registerDiv.style.display = "flex";
        HomePage.style.display = "none";
    }
}


function ResetPasswordClick(){
    if(registerDiv.style.display === "flex"){
        HomePage.style.display = "none";
        registerDiv.style.display = "none";
    }else{
        HomePage.style.display = "none";
        loginDiv.style.display = "none";
    }
    resetPassword.style.display = "flex";
}

/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId)

    toggle.addEventListener('click', () =>{
        // Add show-menu class to nav menu
        nav.classList.toggle('show-menu');

        // Add show-icon to show and hide the menu icon
        toggle.classList.toggle('show-icon');
    })
}

export { BackToSignInClick, SignInClick, SignUpClick, showMenu, ResetPasswordClick };