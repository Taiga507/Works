$(document).ready(function(){
    // Modal
    $('[data-modal=consultation]').on('click', function() {
        $('.overlay, #consultation').fadeIn('slow');
    });
    
    $('.modal__close, .modalthanks__white').on('click', function() {
        $('.overlay, #consultation, #thanks').fadeOut('slow');
    });

    // Validate forms
    $('input[name=phone]').mask("+7 (999) 999-99-99");

    // Mailer send from forms
    $('form').submit(function(e) {
        e.preventDefault();

        if (!$(this).valid()) {
            return;
        }

        $.ajax({
            type: "POST",
            url: "mailer/smart.php",
            data: $(this).serialize()
        }).done(function() {
            $(this).find("input").val("");
            $('#consultation, .feedform').fadeOut();
            $('.overlay, #thanks').fadeIn('slow');

            $('form').trigger('reset');
        });
        return false;
    });

    $('.slide-two').owlCarousel({
        speed:1200,
        loop:true,
        margin:50,
        nav:true,
        // navText: ["<img src='icons/arrow_left_r.svg'>", "<img src='icons/arrow_right_r.svg'>"],
        dots:false,
        autoplay:true,
        autoplayTimeout:4000,
        autoWidth: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1400:{
                items:3
            }
        }
    })

    $('.zoom-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});

    new WOW().init();
});