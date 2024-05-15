
const cards = document.querySelectorAll('.card');
const right_arrow = document.querySelector('.arrow.right');
const left_arrow = document.querySelector('.arrow.left');

const shopping_cart = document.querySelector('.shopping-cart');
const cart_btns = document.querySelectorAll('.add-to-cart');

let left = 0;
let card_size = 25.4;
let total_card_size = cards.length * card_size - card_size * 4;

if (window.matchMedia('(max-width: 768px)').matches) {
    card_size = 52;
    total_card_size = cards.length * card_size - card_size * 2;
}

left_arrow.onclick = () => {
    left -= card_size;

    if (left <= 0) left = 0;
    moveCards(left);
    checkArrowVisibility(left);
}

left_arrow.style.opacity = '0';

right_arrow.onclick = () => {
    left += card_size;

    if (left >= total_card_size) left = total_card_size;
    moveCards(left);
    checkArrowVisibility(left);
}

function moveCards(left) {
    cards.forEach(card =>{
        card.style.left = -left + "%";
    });
}

function checkArrowVisibility(pos) {
    if (pos === 0) {
        left_arrow.style.opacity = '0';
    } else {
        left_arrow.style.opacity = '1';
    }
    if (pos >= total_card_size) {
        right_arrow.style.opacity = '0';
    } else {
        right_arrow.style.opacity = '1';
    }
}
//Très important , pour les evenements il faut juste importer le modules events qui gère les evenements

/*J'importe le module functions*/
import {showMenu} from './functions.js';

import {} from './events'

showMenu('nav-toggle','nav-menu'); //Est coder dans le module Functions qui est ensuite exporter par Functions donc on a acces ici