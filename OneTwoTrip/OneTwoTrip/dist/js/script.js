// $(document).ready(function() {
// 	$('.dropdown').hover(
// 		function() {
// 			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
// 		},
// 		function() {
// 			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
// 	});
// });

$document.addEventListener('DOMContentLoaded', function () {
	const handleResize = () => {
		const width = window.innerWidth;
		const footerButton = document.getElementById('footerButton');
		const footerCollapse = document.getElementById('footerCollapse');

		if (width >= 768) {
			footerButton.style.display = 'none';
			footerCollapse.classList.add('show');
		} else {
			footerButton.style.display = 'block';
			footerCollapse.classList.remove('show');
		}
	};

	window.addEventListener('resize', handleResize);
	handleResize();
});

// // Функция для настройки аккордеона на мобильных устройствах
// const setupAccordion = () => {
// 	if (window.innerWidth < 768) { // меньше md (768px)
// 	// Создаем HTML для аккордеона
// 	const accordionHTML = `
// 		<div class="col-md-3 accordion accordion-flush" id="accordionFlushExample">
// 			<div class="accordion-item">
// 				<h5>
// 					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#footer_first" aria-expanded="false" aria-controls="footer_first">
// 						Компания
// 					</button>
// 				</h5>
// 				<div id="footer_first" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
// 					<ul class="list-unstyled footer__contacts-items">
// 						<li><a class="footer__contacts-title" href="#">Отзывы</a></li>
// 						<li><a class="footer__contacts-title" href="#">Помощь</a></li>
// 						<li><a class="footer__contacts-title" href="#">Оферта</a></li>
// 						<li><a class="footer__contacts-title" href="#">Конфиденциальность</a></li>
// 					</ul>
// 				</div>
// 			</div>
// 		</div>
// 	`;

// 	// Вставляем аккордеон перед основным контентом
// 	document.getElementById('footerContent').insertAdjacentHTML('beforebegin', accordionHTML);
// 	}
// };

// // Вызываем функцию при загрузке страницы и при изменении размера окна
// setupAccordion();
// window.addEventListener('resize', setupAccordion);