<?php
/**
Template Name: Страница врача
 */

get_header(); ?>

<?php include('template-parts/breadcrumbs.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-4 padding-state fon-doct">
				<div class="doctor__photo">
					<img src="<?=the_post_thumbnail_url();?>" alt="" width="100%" height="auto">
				</div>
				<div class="page__h1 d-md-none d-block padding-state-as doctor-galvn-text"><?php the_title(); ?></div>
				<div class="d-md-none d-block padding-state-as vredn-text">
					<div class="doctor__price">
						<div class="title">Стоимость консультации</div>
						<?php the_field( "price" ); ?>
					</div>
					<a href="javascript: void(0);" class="doctor__link doctor-sibir" data-toggle="modal" data-target="#page__link">Записаться на прием</a>
				</div>
				<?php if( get_field("about") ): ?>
                    <div class="doctor__about" id="doctor-strange">
                    	<div class="doctor__about-title">Доктор о себе</div>
                        <?php the_field( "about" ); ?>
                    </div>
                <?php else :?>
                <?php endif; ?>
			</div>
			<div class="col-md-8 padding-state-as" id="new-reality">
				<h1 class="page__h1 d-md-block d-none"><?php the_title(); ?></h1>
				<div class="d-md-block d-none">
					<div class="doctor__price">
						<div class="title">Стоимость консультации</div>
						<?php the_field( "price" ); ?>
					</div>
					<a href="javascript: void(0);" class="doctor__link" data-toggle="modal" data-target="#page__link">Записаться на прием</a>
					<hr class="doctor__hr">
				</div>
				<div class="row">
					<div class="col-lg-6 flex-aboba">
						<?php if( get_field("specialty") ): ?>
		                    <div class="doctor__specialty flex-chpuka">
		                    	<div class="doctor__specialty-title">Специальность</div>
		                        <?php the_field( "specialty" ); ?>
		                    </div>
		                <?php else :?>
		                <?php endif; ?>
		                <div class="doctor__experience">Врачебный стаж  <span><?php the_field( "experience" ); ?></span></div>
					</div>
					<div class="col-lg-6">
						<?php if( get_field("specialization") ): ?>
		                    <div class="doctor__specialization">
		                    	<div class="doctor__specialization-title">Профессиональные навыки</div>
		                        <?php the_field( "specialization" ); ?>
		                    </div>
		                <?php else :?>
		                <?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="education">
							<h2 class="h2">Образование и профессиональные достижения</h2>
							<hr>
							<div class="accordion" id="accordionExample">
								<?php 
								$a=0;
								while( have_rows('education') ): the_row(); ?>
					                <?php
					                    $title = get_sub_field('title');
					                    $deck = get_sub_field('deck');
					                    $a++;
					                ?>
									<div class="card">
										<div class="card-header" id="heading1">
											<div data-toggle="collapse" data-target="#collapse<?php echo $a; ?>" aria-expanded="true" aria-controls="collapse<?php echo $a; ?>" class="collapsed">
												<?php echo $title; ?><i></i>
											</div>
										</div>

										<div id="collapse<?php echo $a; ?>" class="collapse"  data-parent="#accordionExample">
											<div class="card-body">
												<?php echo $deck; ?>
											</div>
										</div>
									</div>
					            <?php endwhile; ?>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</div>
			<script>
				function space_jump() {
					var doctor = document.getElementById('doctor-strange')
					var reality = document.getElementById('new-reality')
					reality.appendChild(doctor)
				}
				if (window.screen.width < 700) {
					space_jump()
				}
			</script>
		</div>
	</div>
</section>

<section class="diploma">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center left-zagolovoc">
				<h2 class="h2">Дипломы и сертификаты</h2>
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
				    <ul class="diploms__slider">
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

<?php if( get_field("video") ): ?>
	<section class="video">
		<div class="container">
			<div class="row">
				<div class="offset-md-1"></div>
				<div class="col-md-10 text-center">
					<h2 class="h2"><?php the_field( "video__title" ); ?></h2>
				</div>
			</div>
			<div class="row">
				<div class="offset-md-1"></div>
				<div class="col-md-10 text-center">
					<div class="embed-responsive embed-responsive-16by9">
					  <?php the_field( "video" ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php else :?>
<?php endif; ?>

<section class="service doctor-srvp">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center left-zagolovoc">
				<h2 class="h2">Услуги</h2>
			</div>
		</div>

        <div class="row">
        	<div class="offset-md-1 col-md-10">
	        	<div class="service__slider">
		            <?php while( have_rows('service') ): the_row(); ?>
		                <?php
		                    $img = get_sub_field('img');
		                    $title = get_sub_field('title');
		                    $deck = get_sub_field('deck');
		                    $link = get_sub_field('link');
		                ?>
		                    <div class="service__item" href="<?php echo $link ?>">
		                        <div class="service__title"><?php echo $title ?></div>
		                        <div class="service__deck service__deck_a"><?php echo $deck ?></div>
		                        <a href="<?php echo $link ?>" class="service__link">Перейти в раздел Услуги и цены</a>
		                    </div>
		            <?php endwhile; ?>
		        </div>
            </div>
        </div>
	</div>
</section>

<section class="sign-up sign-up-servp">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="sign-up__wrpper">
					<div class="row">
						<div class="col-lg-7">
							<h2 class="h2"><?php the_field( "form_title" ); ?></h2>
							<div class="sign-up__sub-title"><?php the_field( "form_subtitle" ); ?></div>
							<div class="sign-up__text"><?php the_field( "form_deck" ); ?></div>
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

<?php
    if( have_rows('examples') ):
?>
<section class="examples examples-servp">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center left-zagolovoc">
				<h2 class="h2">Примеры работ</h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="offset-lg-1"></div>
			<div class="col-lg-10 col-md-12">
				<div class="examples__slider">
					<?php while( have_rows('examples') ): the_row(); ?>
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
								<div class="col-md-6 ne-znau-cac-nazvat">
									<h3 class="h3 bobas-invise"><?php echo $title ?></h3>
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
<?php else :?>
<?php endif; ?>


<?php
    if( have_rows('reviews') ):
?>
<section class="review">
	<div class="container">
		<div class="row">
			<div class="offset-md-1 col-md-10 text-center left-zagolovoc">
				<h2 class="h2">Отзывы о враче</h2>
				<div class="review__sub-title"><?php the_field( "before_reviews" ); ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 dobav-strel">
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
						<div class="togle-boshka">
							<div class="review__text">
								<div class="review__name">
									<div class="review__logo" style="background-image: url(<?php echo $img; ?>);"></div>
									<h3 class="otxiv-text"><?php echo $name; ?></h3>
								</div>
								<div class="review__slider-title">Отзыв</div>
								<?php echo $text; ?>
								<div class="review__all_text">	
									<?php echo $all_text; ?>
								</div>
							</div>
							<span class="review__all-link review__all-link-chpuc" id="change-text">Читать больше</span>
						</div>
						
						<div class="togle-diabosha">
							<div class="review__re">
								<div class="review__slider-title">Ответ клиники</div>
								<?php echo $re; ?>
								<div class="review__all_re">
									<?php echo $all_re; ?>
								</div>
							</div>
							<span class="review__all-link review__all-bibbibo" id="change-text">Читать больше</span>
						</div>

					</div>
					<script>
						let num = 0
						document.body.addEventListener('click', e => {
							if(e.target.id === 'change-text') {
								if(e.target.classList.contains('chouc-activ')) {
									e.target.textContent = 'Читать больше'
									e.target.classList.remove('chouc-activ')
								} else {
									e.target.textContent = 'Скрыть';
									e.target.classList.add('chouc-activ')
								}
							}
						})
					</script>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<a href="javascript: void(0);" class="grade__link" data-toggle="modal" data-target="#grade__link">Оставить отзыв</a>
			</div>
		</div>
	</div>
</section>
<?php else :?>
<?php endif; ?>

<section class="grade">
	<div class="container">
		<div class="grade__wrapper">
			<div class="row">
				<div class="col-12 text-center">
					<h2 class="h2 h2-slozno">Оцените работу Гамлета Ваниковича</h2>
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

<?php get_footer(); ?>