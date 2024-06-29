<?php
/**
Template Name: О клинике
 */
get_header(); ?>

<?php include('template-parts/breadcrumbs.php'); ?>

<section class="about__text-block">
	<div class="container">
		<div class="row mb__30">
			<div class="col-12">
			<?/* <h1 class="page__h1"><?php the_title(); ?></h1> */?>
				<?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>

			</div>
		</div>
		<div class="about__button">
		<a href="javascript: void(0);" class="about_btn" data-toggle="modal" data-target="#page__link">Записаться на прием</a>
		</div>
	</div>
</section>

<?php
    if( have_rows('why') ):
?>
<section class="why">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="h2 why-title">Почему Prime Smile?</h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="offset-lg-1"></div>
			<div class="col-lg-10 col-md-12">
				<div class="row justify-content-center">
					<?php while( have_rows('why') ): the_row(); ?>
                        <?php
                            $icon = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                        ?>
                        <div class="col-lg-4 col-md-6 text-center">
                        	<div class="why__item">
                        		<img src="<?php echo $icon; ?>" alt="">
                        		<div class="why__title"><?php echo $title; ?></div>
                        		<div class="why__text"><?php echo $text; ?></div>
                        	</div>
                        </div>
					<?php endwhile; ?>
				</div>
			</div>
			<div class="offset-lg-1"></div>
		</div>
	</div>
</section>
<?php else :?>
<?php endif; ?>

<section class="aboutrating">
	<div class="container">
	<?/* <div class="row"> */?>
	<?/* <div class="col-lg-8 offset-lg-2 text-center"> */?>
			<div class="aboutrating__wrapper text-center">
			<?/* <h2 class="h2 aboba-left"> */?>
				<h2 class="aboutrating-h2 aboba-left">
					<div class="text-center"><img src="<?php echo get_template_directory_uri(); ?>/images/stars.svg" alt=""></div>
					<div class='rating-title'>Нас рекомендуют 99% пациентов</div>
				</h2>

				<div class="aboutrating__icons">
					<a class="yandex" href="https://yandex.ru/maps/org/stomatologicheskiy_tsentr_prime_smile/1577849667/reviews/?ll=37.584125%2C55.800982&source=wizbiz_new_text_single&z=18"><img src="<?php echo get_template_directory_uri(); ?>/images/yandeks.png" alt="yandex"></a>
					<a class="gis" href="https://2gis.ru/moscow/firm/70000001020632793"><img src="<?php echo get_template_directory_uri(); ?>/images/2gis.png" alt="2gis"></a>
					<a class="prodoktorov" href="https://prodoctorov.ru/moskva/lpu/43486-praym-smayl/#otzivi"><img src="<?php echo get_template_directory_uri(); ?>/images/prodoktorov.png" alt="prodoktorov"></a>
					<a class="sber" href="https://docdoc.ru/clinic/praym_smayl#reviews"><img src="<?php echo get_template_directory_uri(); ?>/images/sber.png" alt="sber"></a>
					<a class="kleos" href="https://www.kleos.ru/meditsina/stomatologicheskiij-tsentr-prime-smile/"><img src="<?php echo get_template_directory_uri(); ?>/images/kleos.png" alt="kleos"></a>
					<a class="zun" href="https://zoon.ru/msk/medical/stomatologicheskij_tsentr_prime_smile_na_metro_dmitrovskaya/"><img src="<?php echo get_template_directory_uri(); ?>/images/zun.png" alt="zoon"></a>
					<a class="yell" href="https://yellmed.ru/stomatologii/praym-smayl"><img src="<?php echo get_template_directory_uri(); ?>/images/el.png" alt="yell"></a>
					<a class="doktu" href="https://doctu.ru/msk/clinic/stomatologija-prajjm-smajjl/services"><img src="<?php echo get_template_directory_uri(); ?>/images/doktu.png" alt="doktu"></a>
					<a class="lajk" href="https://like.doctor/moskva/kliniki/stomatologicheskiy-tsentr-praym-smayl"><img src="<?php echo get_template_directory_uri(); ?>/images/lajk.png" alt="lajk"></a>
				</div>

			</div>
			<?/* </div>*/?>

<?/* Изначальный блок вывода изображений рейтинга с звездочками строкой */?>
<?/* <div class="row">
			<div class="col-12">
				<div class="rating__wrapper">
                    <?php while( have_rows('rating', 'option') ): the_row(); ?>
                        <?php
                            $img = get_sub_field('img');
                            $link = get_sub_field('link');
                        ?>
                            <a class="rating__item" href="<?php echo $link ?>">
                                <img src="<?php echo $img ?>">
                            </a>
                    <?php endwhile; ?>
            	</div>
            </div>
        </div> */?>
	</div>
</section>

<?php
    if( have_rows('technologies') ):
?>
<section class="about__technologies">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center aboba-left">
				<h2 class="h2 about-title">Наши технологии</h2>
			</div>
		</div>
	</div>
	<div class="container">
	<?/* <div class="row">
			<div class="offset-md-1 col-md-10"> */?>
				<div class="about__technologies-slider">
					<?php while( have_rows('technologies') ): the_row(); ?>
                        <?php
                            $img = get_sub_field('img');
                            $link = get_sub_field('link');
                        ?>
                        	<a href="<?php echo $link; ?>" class="about__technologies_item">
                        		<img src="<?php echo $img; ?>" alt="">
                        	</a>
					<?php endwhile; ?>
				</div>
				<?/* </div>
		</div> */?>
	</div>
</section>
<?php else :?>
<?php endif; ?>

<section class="diploma">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center aboba-left">
				<h2 class="diploma-title">Лицензии и сертификаты</h2>
			</div>
		</div>
		<?php if( get_field("diploma") ): ?>
			<div class="row">
				<div class="offset-lg-2 offset-md-1"></div>
				<div class="col-lg-8 col-md-10 text-center">
					<div class="diploma__text"><?php the_field( "diploma" ); ?></div>
				</div>
			</div>
        <?php else :?>
        <?php endif; ?>
        <div class="row">
        	<div class="offset-md-1 col-md-10">
        		<?php

				$images = get_field('diploms');

				if( $images ): ?>
				    <ul class="diploms__slider_about">
				        <?php foreach( $images as $image ): ?>
				            <li>
				                <a href="#diploms__img<?php echo $c++; ?>" class="fancybox gallery" rel="group">
				                     <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" id="diploms__img<?php echo $b++; ?>" width="100%" height="auto">
				                </a>
				            </li>
				        <?php endforeach; ?>
				    </ul>
				<?php endif; ?>
        	</div>
        </div>
	</div>
</section>

<?php
    if( have_rows('pay') ):
?>
<section class="pay">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center aboba-left">
				<h2 class="pay-title">Способы оплаты</h2>
			</div>
		</div>
		<?php if( get_field("pay_text") ): ?>
			<div class="row">
				<div class="offset-lg-2 offset-md-1"></div>
				<div class="col-lg-8 col-md-10 text-center">
					<div class="pay_text"><?php the_field( "pay_text" ); ?></div>
				</div>
			</div>
        <?php else :?>
        <?php endif; ?>
	</div>
	<div class="container">
		<div class="row justify-content-center pay__slider">
			<?php while( have_rows('pay') ): the_row(); ?>
                <?php
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                ?>
                <div class="col-lg-4 col-md-6">
                	<div class="pay__item">
                		<div class="pay__img">
                			<img src="<?php echo $icon; ?>" alt="">
                		</div>
                		<div class="pay__title"><?php echo $title; ?></div>
                		<div class="pay__text"><?php echo $text; ?></div>
                	</div>
                </div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php else :?>
<?php endif; ?>

<?php
    if( have_rows('faq') ):
?>
<section class="faq">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="h2">Часто задаваемые вопросы</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="faq__slider">
					<?php while( have_rows('faq') ): the_row(); ?>
		            <?php
		                $question1 = get_sub_field('question1');
		                $question2 = get_sub_field('question2');
		                $answer1 = get_sub_field('answer1');
		                $answer2 = get_sub_field('answer2');
		            ?>
					<div class="faq__item">
						<div class="faq__question">
							<div class="faq__title">Вопрос</div>
							<?php echo $question1; ?>
							<span class="faq__all-link">Читать больше</span>
							<div class="faq__all">
								<?php echo $question2; ?>
							</div>
						</div>
						<div class="faq__answer">
							<div class="faq__title">Ответ</div>
							<?php echo $answer1; ?>
							<span class="faq__all-link">Читать больше</span>
							<div class="faq__re">
								<?php echo $answer2; ?>
							</div>

						</div>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php else :?>
<?php endif; ?>

<?php include('template-parts/contact.php'); ?>

<?php get_footer(); ?>