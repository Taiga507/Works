const handleAccordionDesktop = () => {
	const width = window.innerWidth;
	
	const footerAccordion = document.getElementById('accordionFooter');
	const footerAccordionItem = document.querySelectorAll('.footer .col-md-3')
	const footerAccordionButton = document.querySelectorAll('.footer .accordion-button');
	const footerAccordionUls = [
		document.getElementById('footer_first'),
		document.getElementById('footer_second'),
		document.getElementById('footer_third')
	];

	if (width >= 768) {
		footerAccordion.classList.remove('accordion', 'accordion-flush');
		footerAccordionItem.forEach(e => {
			e.classList.remove('accordion-item');
		})
		footerAccordionButton.forEach(e => {
			e.classList.remove('collapsed');
			e.removeAttribute('data-bs-toggle');
		})
		footerAccordionUls.forEach(e => {
			e.classList.remove('accordion-collapse', 'collapse');
		});
	} else {
		footerAccordion.classList.add('accordion', 'accordion-flush');
		footerAccordionItem.forEach(e => {
			e.classList.add('accordion-item');
		})
		footerAccordionButton.forEach(e => {
			e.classList.add('collapsed');
			e.setAttribute('data-bs-toggle', 'collapse');
		})
		footerAccordionUls.forEach(e => {
			e.classList.add('accordion-collapse', 'collapse');
		});
	}
};

document.addEventListener('DOMContentLoaded', () => {
	window.addEventListener('resize', handleAccordionDesktop);
	handleAccordionDesktop();
});