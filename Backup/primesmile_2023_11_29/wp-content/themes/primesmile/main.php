<?php
/**
Template Name: Главаная страница
 */

get_header(); ?>

<section class="first">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="first__wrapper" style="background-image: url('<?=the_post_thumbnail_url();?>');">
					<div class="row">
						<div class="col-lg-7">
							<h1 class="h1" style="text-transform: uppercase;"><?php bloginfo( 'name' ); ?></h1>
							<div class="first__description"><?php $description = get_bloginfo( 'description', 'display' ); echo $description; ?></div>
							<div class="d-lg-none d-block text-center">
								<?/*<a href="javascript: void(0);" class="first__link" data-toggle="modal" data-target="#page__links">Записаться на прием</a>*/?>
								<img src="<?php the_field( 'photo' ); ?>" alt="" class="first__photo mob">
							</div>
							<div class="patient">
								<div class="experience"><b><?php the_field( 'experience' ); ?></b> лет <br>опыта</div>
								<div class="patient__text">><b><?php the_field( 'patient' ); ?></b> пациентов</div>
								<a href="#reviews" class="patient__link">Отзывы</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 d-lg-block d-none">
							<div class="first__content">
								<?php if (have_posts()): while (have_posts()): the_post(); ?>
		                            <?php the_content(); ?>
		                        <?php endwhile; endif; ?>
							</div>
							<div class="row align-items-center">
								<div class="col-lg-6">
									<div class="first__link__text"><?php the_field( 'text_before_button' ); ?></div>
								</div>
								<div class="col-lg-6">
									<a href="javascript: void(0);" class="first__link" data-toggle="modal" data-target="#page__links">Записаться на прием</a>
								</div>
							</div>
						</div>
					</div>
					<img src="<?php the_field( 'photo' ); ?>" alt="" class="first__photo">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="first-m d-lg-none d-block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="first__content">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
				</div>
				<div class="row align-items-center">
					<div class="col-lg-6 text-center">
						<div class="first__link__text"><?php the_field( 'text_before_button' ); ?></div>
					</div>
					<div class="col-lg-6 text-center">
						<a href="javascript: void(0);" class="first__link" data-toggle="modal" data-target="#page__links">Записаться на прием</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="care">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<?php while( have_rows('quote', 'option') ): the_row(); ?>
                    <?php
                        $photo = get_sub_field('photo');
                        $name = get_sub_field('name');
                        $post = get_sub_field('post');
                        $text = get_sub_field('text');
                    ?>
                    <div class="quote text-md-right">
                    	<img src="<?php echo $photo?>" alt="<?php echo $name ?>">
                    	<div class="quote__text"><?php echo $text ?></div>
                    	<div class="quote__name"><?php echo $name ?></div>
                    	<div class="quote__post"><?php echo $post ?></div>
                    	<i></i>
                    </div>
                <?php endwhile; ?>
			</div>
			<div class="col-lg-5">
				<h2 class="h2"><?php the_field( 'care_title', 'option' ); ?></h2>
				<?php while( have_rows('care', 'option') ): the_row(); ?>
                    <?php
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                    ?>
                    <div class="care__item">
                    	<img src="<?php echo $icon ?>" alt="<?php echo $title ?>">
                    	<div class="care__item-title"><?php echo $title ?></div>
                    	<div class="care__item-text"><?php echo $text ?></div>
                    </div>
                <?php endwhile; ?>
			</div>
		</div>
	</div>
</section>

<section class="specialists">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center left-mb">
				<h2 class="h2"><?php the_field( 'specialists_title', 'option' ); ?></h2>
				<div class="specialists_text"><?php the_field( 'specialists_text', 'option' ); ?></div>
			</div>
		</div>

        <div class="row">
        	<div class="offset-md-1 col-md-10">
	        	<div class="specialists__slider">
		            <?php while( have_rows('specialists', 'option') ): the_row(); ?>
		                <?php
		                    $link = get_sub_field('link');
		                    $img = get_sub_field('img');
		                    $surname = get_sub_field('surname');
		                    $name = get_sub_field('name');
		                    $post = get_sub_field('post');
		                    $experience = get_sub_field('experience');
		                ?>
		                    <a href="<?php echo $link ?>" class="specialists__item text-center">
		                        <img src="<?php echo $img ?>" alt="<?php echo $surname ?>">
		                        <div class="specialists__item-text">
		                        	<div class="specialists__item-surname"><?php echo $surname ?></div>
		                        	<div class="specialists__item-name"><?php echo $name ?></div>
		                        	<div class="specialists__item-post"><?php echo $post ?></div>
		                        	<div class="specialists__item-experience"><?php echo $experience ?></div>
		                        </div>
		                    </a>
		            <?php endwhile; ?>
	           	</div>
	        </div>
        </div>
        <div class="row">
        	<div class="col-12 text-center">
        		<a href="/vrachi/" class="specialists__all">Все специалисты</a>
        	</div>
        </div>
	</div>
</section>

<section class="technologies">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="technologies__slider">
					<?php while( have_rows('technologies', 'option') ): the_row(); ?>
						<?php
			                $img = get_sub_field('img');
			            ?>
						<div class="technologies__slider-item" style="background-image: url(<?php echo $img ?>);"></div>
					<?php endwhile; ?>
				</div>
			</div>
			<div class="col-md-6">
				<h3 class="h3"><?php the_field( 'technologies_title', 'option' ); ?></h3>
				<div class="deck"><?php the_field( 'deck', 'option' ); ?></div>
				<a href="javascript: void(0);" class="technologies__all">Подробнее о компании</a>
			</div>
		</div>
	</div>
</section>

<section class="service">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center left-mb">
				<h2 class="h2"><?php the_field( 'service_title', 'option' ); ?></h2>
			</div>
		</div>

        <div class="row justify-content-center">
            <?php while( have_rows('service', 'option') ): the_row(); ?>
                <?php
                    $img = get_sub_field('img');
                    $title = get_sub_field('title');
                    $link = get_sub_field('link');
                ?>
	                <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center">
	                    <a class="service__item" href="<?php echo $link ?>">
	                        <img src="<?php echo $img ?>" alt="<?=$title?>">
	                        <span><?php echo $title ?></span>
	                    </a>
	                </div>
            <?php endwhile; ?>
        </div>
        <div class="row">
        	<div class="col-12 text-center">
        		<a href="/uslugi/" class="service__all">Все услуги</a>
        	</div>
        </div>
	</div>
</section>

<section class="sign-up">
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

<?php include('template-parts/examples.php'); ?>

<?php include('template-parts/rating.php'); ?>

<?php include('template-parts/reviews.php'); ?>

<?php include('template-parts/contact.php'); ?>

<?php get_footer(); ?>