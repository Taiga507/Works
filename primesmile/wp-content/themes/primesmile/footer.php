<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 order-lg-1 order-1">
				<img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" alt="Стоматологический центер" class="footer__logo">
				<div class="copyright">Лицензия на осуществление медицинской деятельности № ЛО-77-01-010070 от 16 апреля 2015 г.</div>
			</div>
			<div class="col-lg-3 col-md-6 order-lg-2 order-4 d-md-block d-none">
				<div class="row">
					<div class="col-lg-6">
						<?php wp_nav_menu('menu=footer_menu'); ?>
					</div>
					<div class="col-lg-6">
						<h6>Услуги</h6>
						<?php wp_nav_menu('menu=footer_menu_service'); ?>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 order-lg-3 order-2">
				<div class="address">
					Москва, Ул Бутырская, 46 стр.&nbsp;2 <br>метро&nbsp;"Савеловская"
				</div>
				<div class="mode">
					Пн-Вс с 09.00 до 21.00 <br>(без выходных)
				</div>
			</div>
			<div class="col-lg-3 col-md-6 text-lg-right order-lg-4 order-2">
				<a href="tel:+74952550525" class="phone">+7 (495) 255 05 25</a><br class="d-md-none d-block">
				<a href="javascript: void(0);" class="call-back" data-toggle="modal" data-target="#exampleModalCenter">Обратный звонок</a>
				<div><a href="https://t.me/+79855250575" class="telegram" target="_blank" rel="nofollow">Написать в Telegram</a></div>
				<div><a href="https://wa.me/79855250575" class="whatsapp" target="_blank" rel="nofollow">Написать в WhatsApp</a></div>
			</div>
		</div>
	</div>
</footer>


<!-- Обратный звонок -->
<div class="modal call-back__modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
	<h2 class="h2">Обратный звонок</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  <div class="modal-body">
    <?php echo do_shortcode( '[contact-form-7 id="373" title="Обратный звонок"]' ); ?>
  </div>
</div>
</div>
</div>


<!-- Запишитесь на осмотр -->
<div class="modal call-back__modal fade" id="page__link" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
	<h2 class="h2">Запишитесь на осмотр</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  <div class="modal-body">
    <?php echo do_shortcode( '[contact-form-7 id="80" title="Запишитесь на осмотр"]' ); ?>
  </div>
</div>
</div>
</div>

<!-- Записаться на прием -->
<div class="modal call-back__modal fade" id="page__links" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
	<h2 class="h2">Записаться на прием</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  <div class="modal-body">
    <?php echo do_shortcode( '[contact-form-7 id="80" title="Запишитесь на осмотр"]' ); ?>
  </div>
</div>
</div>
</div>

<!-- Оставить отзыв -->
<div class="modal call-back__modal fade" id="grade__link" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
	<h2 class="h2">Оставить отзыв</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  <div class="modal-body">
    <?php echo do_shortcode( '[contact-form-7 id="589" title="Оставить отзыв"]' ); ?>
  </div>
</div>
</div>
</div>


<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/my.js"></script>

<?php wp_footer(); ?>
</body>
</html>
