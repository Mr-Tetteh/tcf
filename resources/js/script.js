'use strict'

const menuItems = document.querySelectorAll('.menu-item');
menuItems.forEach(item => {
    const button = item.querySelector('button');
    if (button) {
        button.addEventListener('click', () => {
            item.classList.toggle('open');

            const submenu = item.querySelector('.submenu');
            if (submenu) {
                submenu.classList.toggle('open');
            }
        });
    }
});


const hand_bugger = document.querySelector('.hand_bugger')
const nav_menu = document.querySelector('.nav_menu')
hand_bugger.addEventListener('click', function () {
    nav_menu.classList.toggle('hidden')
    nav_menu.style.scrollBehavior = "smooth"
})

