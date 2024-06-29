// $(document).ready(function(){

    // Выезжает меню по гамбургеру + фон бледнеет - меню можно закрыть
    const hamburger = document.querySelector('.hamburger'),
      menu = document.querySelector('.menu'),
      closeElem = document.querySelector('.menu__close');

    hamburger.addEventListener('click', () => {
        menu.classList.add('active');
    });

    closeElem.addEventListener('click', () => {
        menu.classList.remove('active');
    });

    // Прописанные проценты переходят в область и показывается % области
    const counters = document.querySelectorAll('.skills__ratings-counter'),
        lines = document.querySelectorAll('.skills__ratings-line span'); /* span внутри класса */

    counters.forEach( (item, i) => {
        lines[i].style.width = item.innerHTML;
    });

//     new WOW().init();
// });