//Les evenement ici

//j'importe la variable qui gere les 4 item du header qui ont un sub-menu

import {dropdownItems} from "./variables";

// Parcour tous les éléments dropdown__item
dropdownItems.forEach(item => {
    // Ajoute un écouteur d'événements de clic à chaque élément dropdown__item
    item.addEventListener('click', function() {
        // Supprime la classe 'add' de tous les dropdown__menu
        document.querySelectorAll('.dropdown__menu').forEach(menu => {
            menu.classList.remove('sub-menu-click-on-mobile');
        });

        // Ajouter la classe 'add' au dropdown__menu correspondant à cet élément dropdown__item
        const menu = this.querySelector('.dropdown__menu');
        menu.classList.add('sub-menu-click-on-mobile');
    });
});

export {dropdownItems};
