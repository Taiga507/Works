<?php
/**
Template Name: Услуги
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
				<a href="javascript: void(0);" class="page__link" data-toggle="modal" data-target="#page__link">Записаться на прием</a>
			</div>
			<div class="col-lg-7 col-md-6"></div>
		</div>
	</div>
	<img src="<?=the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
</section>

<section class="services__wrapper">
	<div class="container">
			<?php
			$children =  wp_list_pages( 'title_li=&child_of=' . $post->ID . '&echo=0' );

			if( $children ){
				?>
					<ul class="row justify-content-center">
						<?php echo $children; ?>
					</ul>
				<?php
			}
			?>
		</div>
	</div>
</section>

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
					<?php while( have_rows('faq', 'option') ): the_row(); ?>
		            <?php
		                $question = get_sub_field('question');
		                $answer = get_sub_field('answer');
		            ?>
					<div class="faq__item">
						<div class="faq__question">
							<div class="faq__title">Вопрос</div>
							<?php echo $question; ?>
						</div>
						<div class="faq__answer">
							<div class="faq__title">Ответ</div>
							<?php echo $answer; ?>
						</div>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('template-parts/rating.php'); ?>

<?php include('template-parts/reviews.php'); ?>

<section class="grade">
	<div class="container">
		<div class="grade__wrapper">
			<div class="row">
				<div class="col-12 text-center">
					<h2 class="h2">Оцените работу</h2>
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

<?php include('template-parts/questions.php'); ?>

<?php get_footer(); ?>