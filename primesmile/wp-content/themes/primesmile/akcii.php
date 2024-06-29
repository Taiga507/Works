<?php
/**
Template Name: Акции
 */

get_header(); ?>

<?php include('template-parts/breadcrumbs.php'); ?>

<section class="page__header services">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<h1 class="h1"><?php the_title(); ?></h1>
				<div class="page__header-deck">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
				</div>
				<a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Записаться на прием</a>
			</div>
			<div class="col-lg-7 col-md-6"></div>
		</div>
	</div>
	<img src="<?=the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
</section>

<section class="akcii">
	<div class="container">
		<div class="row">
			<?php while( have_rows('akcii') ): the_row(); ?>
                <?php
                    $img = get_sub_field('img');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $old_price = get_sub_field('old_price');
                    $new_price = get_sub_field('new_price');
                    $date = get_sub_field('date');
                ?>
					<div class="col-lg-6">
						<div class="akcii__item" style="background-image: url(<?php echo $img; ?>);">
							<div class="akcii__title"><?php echo $title; ?></div>
							<?php if( get_sub_field('text') ): ?>
								<div class="akcii__text"><?php echo $text; ?></div>
							<?php else :?>
							<?php endif; ?>
							<div class="akcii__price">
								<?php if( get_sub_field('old_price') ): ?>
									<span class="old_price"><?php echo $old_price; ?></span>
								<?php else :?>
								<?php endif; ?>
								<span class="new_price"><?php echo $new_price; ?></span>
							</div>
							<div class="akcii__date"><?php echo $date; ?></div>
						</div>
					</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>




<section class="examples">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="h2">Примеры работ</h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="offset-lg-1"></div>
			<div class="col-lg-10 col-md-12">
				<div class="examples__slider">
					<?php while( have_rows('examples', 'option') ): the_row(); ?>
                        <?php
                            $before = get_sub_field('before');
                            $after = get_sub_field('after');
                            $title = get_sub_field('title');
                            $name = get_sub_field('name');
                            $age = get_sub_field('age');
                            $deck = get_sub_field('deck');
                        ?>
						<div class="examples__slider-item">
							<div class="row">
								<div class="col-md-6">
									<h3 class="h3 och-stranno"><?php echo $title ?></h3>
									<div class="examples__photo">
										<div class="before">
											<img src="<?php echo $before ?>" alt="">
										</div>
										<div class="after">
											<img src="<?php echo $after ?>" alt="">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-6">
											<strong>Пациент</strong>
											<div class="name"><?php echo $name ?></div>
										</div>
										<div class="col-6">
											<strong>Возраст</strong>
											<div class="age"><?php echo $age ?></div>
										</div>
									</div>
									<div class="deck"><?php echo $deck ?></div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
			<div class="offset-lg-1"></div>
		</div>
	</div>
</section>

<section class="sign-up open-on-mobas">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="sign-up__wrpper">
					<div class="row">
						<div class="col-lg-7">
							<h2 class="h2"><?php the_field( 'form_title', 'option' ); ?></h2>
							<?php if( get_field('form_subtitle', 'option') ): ?>
								<div class="sign-up__sub-title"><?php the_field( 'form_subtitle', 'option' ); ?></div>
							<?php else :?>
                    		<?php endif; ?>
							<div class="sign-up__text"><?php the_field( 'form_deck', 'option' ); ?></div>
						</div>
						<div class="col-lg-5">
							<?php echo do_shortcode( '[contact-form-7 id="80" title="Запишитесь на осмотр"]' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('template-parts/rating.php'); ?>


<section class="review">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<h2 class="h2">Отзывы</h2>
				<div class="review__sub-title"><?php the_field( "before_reviews" ); ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="review__slider">
					<?php while( have_rows('reviews') ): the_row(); ?>
                        <?php
                            $img = get_sub_field('img');
                            $name = get_sub_field('name');
                            $text = get_sub_field('text');
                            $all_text = get_sub_field('all_text');
                            $re = get_sub_field('re');
                            $all_re = get_sub_field('all_re');
                        ?>
					<div class="review__item">
						<div class="review__text">
							<div class="review__name">
								<div class="review__logo" style="background-image: url(<?php echo $img; ?>);"></div>
								<?php echo $name; ?>
							</div>
							<div class="review__slider-title">Отзыв</div>
							<?php echo $text; ?>
							<span class="review__all-link">Читать больше</span>
							<div class="review__all_text">
								<?php echo $all_text; ?>
							</div>
						</div>
						<div class="review__re">
							<div class="review__slider-title">Ответ клиники</div>
							<?php echo $re; ?>
							<span class="review__all-link">Читать больше</span>
							<div class="review__all_re">
								<?php echo $all_re; ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="grade">
	<div class="container full-width-mobas">
		<div class="grade__wrapper">
			<div class="row">
				<div class="col-12 text-center">
					<h2 class="h2 h2-diaboshka">Оцените работу</h2>
				</div>
			</div>
			<div class="row">
				<div class="offset-lg-2 offset-md-1"></div>
				<div class="col-lg-8 col-md-10 text-center">
					<div class="grade__text">Уделите несколько минут тому, чтобы оставить отзыв о лечении у доктора. Рассказав о своих впечатлениях, вы поможете нам стать лучше. Мы всегда готовы развиваться и с нетерпением ждём ваших комментариев.</div>
					<a href="javascript: void(0);" class="grade__link" data-toggle="modal" data-target="#grade__link">Оставить отзыв</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('template-parts/contact.php'); ?>

<?php include('template-parts/questions.php'); ?>

<?php get_footer(); ?>