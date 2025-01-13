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


