<?php
/**
Template Name: Контакты
 */

get_header(); ?>

<section class="breadcrumbs__wrapper">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div>
		</div>
	</div>
</section>

<section class="contact__title">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="h1"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="contact__map">
					<div class="row">
						<div class="col-12 order-lg-1 order-2">
							<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A86362a8811bce9246879a1c0b124eea15e3d89750fa55b6cb8fdc58567cfca46&amp;source=constructor" width="100%" height="300" frameborder="0"></iframe>
							<!--<iframe src="https://yandex.ru/map-widget/v1/-/CCUnmNFxsD" width="100%" height="auto" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>-->
						</div>
						<div class="col-12 older-lg-2 order-1">
							<div class="contact__content">
								<h2 class="h2">Стоматологический центр Prime Smile</h2>
								<div class="contact__text">
									<?php if (have_posts()): while (have_posts()): the_post(); ?>
				                        <?php the_content(); ?>
				                    <?php endwhile; endif; ?>
								</div>
								<div>
									<a href="jhttps://t.me/+79855250575" class="telegram" target="_blank" rel="nofollow">Написать в Telegram</a>
									<a href="https://wa.me/79855250575" class="whatsapp" target="_blank" rel="nofollow">Написать в WhatsApp</a>
								</div>
								<a href="javascript: void(0);" class="contacts__link" data-toggle="modal" data-target="#page__links">Записаться на прием</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>