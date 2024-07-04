// document.addEventListener('DOMContentLoaded', () => {
// 	const handleAccordionDesktop = () => {
// 		const width = window.innerWidth;
// 		const footerAccordion = document.querySelectorAll(
// 			'.footer .accordion, ' +
// 			'.footer .accordion-item, ' +
// 			'.footer .accordion-button, ' +
// 			'.footer .accordion-collapse'

// 		);

// 		if (width >= 768) {
// 			footerAccordion.forEach(accordion => {
// 				accordion.classList.remove(
// 					'accordion',
// 					'accordion-flush',
// 					'accordion-item',
// 					'accordion-button',
// 					'collapsed',
// 					'accordion-collapse',
// 					'collapse'
// 				);
// 				accordion.removeAttribute('data-bs-toggle');
// 			});
// 		}
// 	};

// 	window.addEventListener('resize', handleAccordionDesktop);
// 	// console.log('resize');
// 	window.addEventListener('orientationchange', handleAccordionDesktop);
// 	// console.log('orientationchange');
// 	handleAccordionDesktop();
// });

const handleAccordionDesktop = () => {
	const width = window.innerWidth;
	
	const footerAccordion = document.getElementById('accordionFooter');
	const footerAccordionItem = document.getElementById('accordionItemFooter');
	// const footerAccordionButton = document.getElementById('accordionFooterButton');
	const footerAccordionUlFirst = document.getElementById('footer_first');
	const footerAccordionUlSecond = document.getElementById('footer_second');
	const footerAccordionUlThird = document.getElementById('footer_third');

	const footerAccordionButton = document.getElementById('accordionFooterButton');

	console.log('footerAccordion:', footerAccordionButton.attributes);

	if (width >= 768) {
		footerAccordion.classList.remove('accordion', 'accordion-flush');
		footerAccordionItem.classList.remove('accordion-item');
		// footerAccordionButton.classList.remove('accordion-button', 'collapsed');
		footerAccordionUlFirst.classList.remove('accordion-collapse', 'collapse');
		footerAccordionUlSecond.classList.remove('accordion-collapse', 'collapse');
		footerAccordionUlThird.classList.remove('accordion-collapse', 'collapse');

		footerAccordionButton .removeAttribute('data-bs-toggle');
		console.log('footerAccordion:', footerAccordionButton.attributes);
	} else {
		footerAccordion.classList.add('accordion', 'accordion-flush');
		footerAccordionItem.classList.add('accordion-item');
		// footerAccordionButton.classList.add('accordion-button', 'collapsed');
		footerAccordionUlFirst.classList.add('accordion-collapse', 'collapse');
		footerAccordionUlSecond.classList.add('accordion-collapse', 'collapse');
		footerAccordionUlThird.classList.add('accordion-collapse', 'collapse');

		footerAccordionButton.setAttribute('data-bs-toggle', 'collapse');
	}
};

document.addEventListener('DOMContentLoaded', () => {
	window.addEventListener('resize', handleAccordionDesktop);
	window.addEventListener('orientationchange', handleAccordionDesktop);
	handleAccordionDesktop();
});


// const footerAccordion2 = document.querySelectorAll(
// 	'.footer .accordion, ' +
// 	'.footer .accordion-item, ' +
// 	'.footer .accordion-button, ' +
// 	'.footer .accordion-collapse'
// );

// footerAccordion2.forEach(accordion => {
		// 	accordion.classList.remove(
		// 		'accordion',
		// 		'accordion-flush',
		// 		'accordion-item',
		// 		'accordion-button',
		// 		'collapsed',
		// 		'accordion-collapse',
		// 		'collapse'
		// 	);
		// 	accordion.removeAttribute('data-bs-toggle');
		// });

		// footerAccordion.forEach(footerAccordion => {
		// 	footerAccordion.classList.remove('accordion', 'accordion-flush');
		// })