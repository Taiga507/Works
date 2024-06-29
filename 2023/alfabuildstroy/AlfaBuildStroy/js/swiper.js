const brendsSlider = new Swiper('.brends__slider', {
    // Optional parameters
    slidesPerView: 'auto',
    direction: 'horizontal',
    spaceBetween: 20,
    grabCursor: true,
    // autoplay: {
    //     delay: 3000,
    // },
    // speed: 800,

    // And if we need scrollbar
    scrollbar: {
      el: '.brends__slider-scroll-bar'
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
});