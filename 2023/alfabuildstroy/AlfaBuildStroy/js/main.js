// Маска телефона для формы
$.mask.definitions['h'] = "[0|1|2|3|4|5|6|7|9]"
$(".phone-mask").mask("+7 (h99) 999-99-99");


window.addEventListener('hashchange', function() {
    var hash = document.location.hash;
    if(hash) {
        var anchor = hash.split("_")[1]; 
        console.log(anchor);
        pageScroll(anchor);
    }
}, false);

function pageScroll(anchor) {
    var target = $("#" + anchor); 
    $('html, body').animate({
        scrollTop: target.offset().top + 1
    }, 1500);
    document.location.hash = "";
}

// Увеличение фото
$(document).ready(function() {

	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}
		
	});

	$('.image-popup-fit-width').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		image: {
			verticalFit: false
		}
	});

	$('.image-popup-no-margins').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});

});