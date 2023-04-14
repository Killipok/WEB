const but_menu = document.querySelector('#button-menu');
const menu = document.querySelector('#slide-menu');

but_menu.addEventListener('click', () => {
    menu.classList.toggle('disp')
});