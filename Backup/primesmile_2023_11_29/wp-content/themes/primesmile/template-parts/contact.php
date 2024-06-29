<section class="contact">

        <div id="chpuc" class="modal-content chpuc">
            <!-- <div class="overlad"></div> -->
            <div class="abobs">
					<?php the_field('find_clinic'); ?>
                <button onclick="document.getElementsByClassName('chpuc')[0].style = 'display: none'" class="close dopclo" type="button" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body">
                
                <div class="wpcf7 js ofnicg" id="wpcf7-f80-o55" lang="ru-RU" dir="ltr">
                    <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
                        <p class="sthing"><br>
                        <input onclick="document.getElementsByClassName('chpuc')[0].style = 'display: none'" class="wpcf7-form-control has-spinner wpcf7-submit" type="submit" value="Закрыть"><span class="wpcf7-spinner"></span>
                        </p><div class="wpcf7-response-output" aria-hidden="true"></div>
                    </div>
                </div>
            </div>
            <script>
            </script>
        </div>


		<div class="row footer-pd-r">
			<div class="col-lg-6 pl-lg-0 pr-lg-0 order-lg-1 order-2">
				<div class="contact__left">
					<div class="contact__left-content">
						<div class="row">
							<div class="col-lg-7 col-md-6">
								<h2 class="h2">Как добраться</h2>
								<div class="address">
									Москва, Ул Бутырская, 46 стр. 2 <br>метро "Савеловская"
								</div>
							</div>
							<div class="col-lg-5 col-md-6">
							</div>
						</div>
                        <div class="cnt-cont">
							<a href="/kontakty/" class="contact__link">Контакты</a>
                            <a onclick="document.getElementsByClassName('chpuc')[0].style = 'display: flex'" class="contact__link new_map_btn">Как найти клинику Prime Smile</a>
                        </div>
					</div>
					<div class="map">
						<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A86362a8811bce9246879a1c0b124eea15e3d89750fa55b6cb8fdc58567cfca46&amp;source=constructor" width="100%" height="300" frameborder="0"></iframe>
						<!--<iframe src="https://yandex.ru/map-widget/v1/-/CCUnmNFxsD" width="100%" height="300" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>-->
					</div>
				</div>
			</div>
			<div class="col-lg-6 pl-lg-0 pr-lg-0 order-lg-2 order-1">
				<div class="contact__right">
					<h2 class="h2"><?php the_field( 'form_title', 'option' ); ?></h2>

					<?php if( get_field('form_subtitle', 'option') ): ?>
						<div class="contact__right__subtext"><?php the_field( 'form_subtitle', 'option' ); ?></div>
					<?php else :?>
                    <?php endif; ?>

					<?php if( get_field('form_deck', 'option') ): ?>
						<div class="contact__right__text"><?php the_field( 'form_deck', 'option' ); ?></div>
					<?php else :?>
                    <?php endif; ?>
                    
					<?php echo do_shortcode( '[contact-form-7 id="61" title="Форма перед подвалом"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>