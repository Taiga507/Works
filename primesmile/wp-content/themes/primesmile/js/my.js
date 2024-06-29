(function( $ ) {
  $('.header__toggle_menu').click(function(){
      $('.header__toggle_menu').toggleClass('is-close');
      $('.nav').toggleClass('active');
  });


  $('.video iframe').addClass('embed-responsive-item');

  $('.services__wrapper ul > li').addClass('col-lg-4 col-md-6');
  $('.services__wrapper ul > li').append('<div class="services__item">');
  $('.services__wrapper .col-lg-4.col-md-6 a').addClass('title');
  $('.services__wrapper ul > li > ul > li').removeClass('col-lg-4 col-md-6');
  $('.services__wrapper ul > li > ul > li > a').removeClass('title');

  $('.review__text').click(function(){
      $(this).find('.review__all_text').toggleClass('active');
  });
  $('.review__re').click(function(){
      $(this).find('.review__all_re').toggleClass('active');
  });


  $('.faq__question').click(function(){
      $(this).find('.faq__all').toggleClass('active');
  });
  $('.faq__answer').click(function(){
      $(this).find('.faq__re').toggleClass('active');
  });




  /*классы на кнопки*/
  $('.first__link').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.specialists__all').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.service__all').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.service__item').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.rating__item').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.contact__link').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.page__link').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.grade__link').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.call-back').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.telegram').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.whatsapp').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.price__all-link').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.doctor__link').mouseenter(function(){
    $(this).addClass('animated pulse');
  });
  $('.contacts__link').mouseenter(function(){
    $(this).addClass('animated pulse');
  });

  $('.first__link').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.specialists__all').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.service__all').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.service__item').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.rating__item').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.contact__link').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.page__link').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.grade__link').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.call-back').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.telegram').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.whatsapp').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.price__all-link').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.doctor__link').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });
  $('.contacts__link').mouseleave(function(){
    $(this).removeClass('animated pulse');
  });


  /*блоки одинаковой высоты*/
  if(window.matchMedia('(min-width: 991px)').matches){
    function setEqualHeight(columns){
      var tallestcolumn = 0;
      columns.each(
        function(){
          currentHeight = $(this).height();
          if(currentHeight > tallestcolumn){
            tallestcolumn = currentHeight;
          }
        }
      );
      columns.height(tallestcolumn);
    }
    $(document).ready(function() {
      setEqualHeight($(".stage__item-header.height"));
    });
  } 

  /*слайдеры*/
  $('.slider').slick({
        speed: 700,
        fade: true,
        dots: true,
        arrows: true,
        autoplay: true,
        infinite: true,
        slidesToShow: 1,
        centerMode: true,
        cssEase: 'linear',
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        adaptiveHeight: true,
        responsive: [
              {
                  breakpoint: 767,
                  settings: {
                    arrows: false,
                  }
              },
        ]
  });      

  $('.technologies__slider').slick({
        speed: 700,
        fade: true,
        dots: false,
        arrows: true,
        autoplay: true,
        infinite: true,
        slidesToShow: 1,
        centerMode: true,
        cssEase: 'linear',
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        adaptiveHeight: true,
        responsive: [
              {
                  breakpoint: 767,
                  settings: {
                    arrows: false,
                  }
              },
        ]
  });  

  $('.examples__slider').slick({
        speed: 700,
        fade: true,
        dots: true,
        arrows: true,
        autoplay: true,
        infinite: true,
        slidesToShow: 1,
        centerMode: true,
        cssEase: 'linear',
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        adaptiveHeight: true,
        responsive: [
              {
                  breakpoint: 767,
                  settings: {
                    centerMode: true,
                    arrows: false,
                  }
              },
        ]
  });

  $('.about__technologies-slider').slick({
        speed: 700,
        dots: true,
        arrows:  true,
        autoplay: true,
        slidesToShow: 3,
        //centerMode: true,
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        responsive: [
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 2
              }
            },
            // {
            //   breakpoint: 767,
            //   settings: {
            //     arrows: false,
            //     slidesToShow: 2
            //   }
            // },
            // {
            //   breakpoint: 540,
            //   settings: {
            //     arrows: false,
            //     slidesToShow: 1
            //   }
            // },
            {
              breakpoint: 767,
              settings: "unslick"
            }
          ]
  });

  $('.specialists__slider').slick({
        speed: 700,
        dots: false,
        arrows:  true,
        autoplay: true,
        slidesToShow: 4,
        //centerMode: true,
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        responsive: [
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 767,
              settings: {
                //arrows: false,
                slidesToShow: 1
              }
            },
            {
              breakpoint: 540,
              settings: {
                //arrows: false,
                slidesToShow: 1
              }
            }
          ]
  });

  $('.specialists__slider-centerMode').slick({
       speed: 700,
        dots: false,
        arrows:  true,
        autoplay: true,
        slidesToShow: 4,
        centerMode: true,
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        responsive: [
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 991,
              settings: {
                arrows: false,
                slidesToShow: 2
              }
            },
            {
              breakpoint: 540,
              settings: {
                arrows: false,
                slidesToShow: 1
              }
            }
          ]
  });

  $('.diploms__slider').slick({
        speed: 700,
        dots: false,
        arrows:  true,
        autoplay: true,
        slidesToShow: 7,
        //centerMode: true,
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        responsive: [
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 5,
              }
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 4
              }
            },
            {
              breakpoint: 767,
              settings: {
                arrows: false,
                slidesToShow: 2
              }
            }
          ]
  });

  // $('.pay .row.justify-content-center').slick({
  //       responsive: [
  //           {
  //             breakpoint: 767,
  //             settings: {
  //               speed: 700,
  //               dots: true,
  //               arrows: true,
  //               autoplay: true,
  //               slidesToScroll: 1,
  //               autoplaySpeed: 6000,
  //               slidesToShow: 1
  //             }
  //           }
  //         ]
  // });

  $('.page-template-about .pay .row.justify-content-center').slick({
    responsive: [
        {
          breakpoint: 767,
          settings: {
            speed: 700,
            dots: true,
            arrows: false,
            autoplay: true,
            slidesToScroll: 1,
            autoplaySpeed: 6000,
            slidesToShow: 1
          }
        },
        {
          breakpoint: 30000,
          settings: "unslick"
        }
      ]
    });

    $('.page-template-about .why .row.justify-content-center').slick({
      responsive: [
          {
            breakpoint: 767,
            settings: {
              speed: 700,
              dots: true,
              arrows: false,
              autoplay: true,
              slidesToScroll: 1,
              autoplaySpeed: 6000,
              slidesToShow: 1
            }
          },
          {
            breakpoint: 30000,
            settings: "unslick"
          }
        ]
      });

  $('.diploms__slider_about').slick({
        speed: 700,
        dots: false,
        arrows:  true,
        autoplay: true,
        slidesToShow: 3,
        //centerMode: true,
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        responsive: [
            {
              breakpoint: 767,
              settings: {
                arrows: true,
                dots: true,
                slidesToShow: 1
              }
            }
          ]
  });

  $('.service__slider').slick({
        speed: 700,
        dots: false,
        arrows:  true,
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        responsive: [
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 767,
              settings: {
                arrows: false,
                slidesToShow: 1
              }
            }
          ]
  });

  $('.review__slider').slick({
        speed: 700,
        dots: false,
        arrows:  false,
        autoplay: true,
        slidesToShow: 3,
        //centerMode: true,
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        responsive: [
        {
              breakpoint: 1300,
              settings: {
                arrows: false,
              }
            },
            {
              breakpoint: 991,
              settings: {
                arrows: false,
                slidesToShow: 2
              }
            },
            {
              breakpoint: 767,
              settings: {
                arrows: false,
                slidesToShow: 1
              }
            }
          ]
  });

  $('.reviews__slider').slick({
        speed: 700,
        dots: true,
        arrows:  true,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        responsive: [
        {
              breakpoint: 1300,
              settings: {
                arrows: false,
              }
            },
            {
              breakpoint: 991,
              settings: {
                arrows: false,
              }
            },
            {
              breakpoint: 767,
              settings: {
                arrows: false,
              }
            }
          ]
  });

  $('.faq__slider').slick({
        speed: 700,
        dots: true,
        arrows:  false,
        autoplay: true,
        slidesToShow: 3,
        //centerMode: true,
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        responsive: [
            {
              breakpoint: 991,
              settings: {
                arrows: false,
                slidesToShow: 2
              }
            },
            {
              breakpoint: 767,
              settings: {
                arrows: false,
                slidesToShow: 1
              }
            }
          ]
  });

  $('.type__slider').slick({
        speed: 700,
        dots: false,
        arrows:  true,
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        responsive: [
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 2
              }
            },
            /*{
              breakpoint: 991,
              settings: {
                arrows: false,
                slidesToShow: 2
             }
            },*/
            {
              breakpoint: 767,
              settings: {
                arrows: false,
                slidesToShow: 1
              }
            }
          ]
  });

})(jQuery);