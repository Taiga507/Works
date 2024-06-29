<?php
/**
Template Name: Услуга - INC
 */

get_header(); ?>

<?php include('template-parts/breadcrumbs.php'); ?>

<section class="page__header service">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-7 new-rules">
				<h1 class="h1"><?php the_title(); ?></h1>
				<div class="row align-items-center page__header-price-wrapper">
					<div class="col-lg-5">
						<div class="page__header-price">
							<div class="page__header-price-title">
								<?php the_field( 'min_price_title' ); ?>	
							</div>
							<?php the_field( 'min_price' ); ?>
						</div>
					</div>
					<div class="col-lg-7 d-lg-block d-none">
						<a href="javascript: void(0);" class="page__link" data-toggle="modal" data-target="#page__links">Записаться на прием</a>
					</div>
				</div>
				<div class="utp">
					<div class="row">
						<?php while( have_rows('utp') ): the_row(); ?>
							<?php while( have_rows('utp_item') ): the_row(); ?>
			                <?php
			                    $img = get_sub_field('img');
			                    $title = get_sub_field('title');
			                    $text = get_sub_field('text');
			                ?>
							<div class="col-lg-4">
								<div class="utp__item">
									<div class="utp__item-title d-flex align-items-center">
										<img src="<?php echo $img ?>" alt="<?php echo $title ?>">
										<?php echo $title ?>
									</div>
									<div class="utp__item-text"><?php echo $text ?></div>
								</div>
							</div>
							<?php endwhile; ?>
						<?php endwhile; ?>
					</div>
				</div>
				<div class="d-lg-none d-block align-mobas">
					<a href="javascript: void(0);" class="page__link" data-toggle="modal" data-target="#page__links">Записаться на прием</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-5"></div>
		</div>
	</div>
	<?php 
		if(has_post_thumbnail()) {?>
			<div class="page__header__img-wrapper">
				<img src="<?=the_post_thumbnail_url();?>" alt="<?php the_title(); ?>" class="page__header__img">
			</div>
		<?php }
		else {}
	?>
</section>

<?php if( get_field("title") ): ?>
<section class="servicess__title">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<?php the_field( 'title' ); ?>
			</div>
		</div>
	</div>
</section>
<?php else :?>
<?php endif; ?>




<?php if( get_field("title_text") ): ?>
<section class="servicess__title">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<?php the_field( 'title_text' ); ?>
			</div>
		</div>
	</div>
</section>
<?php else :?>
<?php endif; ?>




<?php
    if( get_field("stages_prompt1") ):
	//if( have_rows('stage1') ):
?>

<section class="stage">
	<div class="container">
		<!--<div class="row justify-content-center align-items-center">-->
		<div class="row justify-content-center">
			<?php while( have_rows('stage1') ): the_row(); ?>
	            <?php
	                $title = get_sub_field('title');
	            ?>
		            <div class="col-lg-5">
		            	<div class="stage__item <?php
								if( get_field("stages_prompt2") ):
							?>
							<?php else :?>
								mb__0
							<?php endif; ?>">
		            		<div class="stage__item-header <?php
								if( get_field("stages_prompt2") ):
							?>
							height
							<?php else :?>
								
							<?php endif; ?> ">
			            		<div
				            		<?php
									    if( get_field("stages_prompt2") ):
									?>
										class="numb"
									<?php else :?>
										class="numbs"
									<?php endif; ?>
								>1</div>
			            		<h3 class="h3"><?php echo $title ?></h3>
			            		<?php if( get_field("stages_prompt1") ): ?>
			            			<div class="stage__sub_title">Как это происходит
			            				<i>
			            					<div class="stages_prompt">
												<?php //the_field( 'stages_prompt1' ); ?>
											</div>
			            				</i>
			            			</div>
								<?php else :?>
								<?php endif; ?>
							</div>

		            		<ul>
		            			<?php while( have_rows('stages') ): the_row(); ?>
					            	<?php
						                $icon = get_sub_field('icon');
						                $title = get_sub_field('title');
						            ?>
		            			<li>
		            				<img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>">
		            				<span><?php echo $title; ?></span>
		            			</li>
		            			<?php endwhile; ?>
		            		</ul>
		            	</div>
		            </div>
		    <?php endwhile; ?>

		    <?php
			    if( get_field("stages_prompt2") ):
		    	//if( have_rows('stage2') ):
			?>
			    <?php while( have_rows('stage2') ): the_row(); ?>
		            <?php
		                $title = get_sub_field('title');
		            ?>
			            <div class="col-lg-2 text-center align-self-center">
			            	<div class="stage__time"><?php the_field( 'time' ); ?></div>
			            </div>

			            <div class="col-lg-5">
			            	<div class="stage__item">
			            		<div class="stage__item-header height">
				            		<div class="numb">2</div>
				            		<h3 class="h3"><?php echo $title ?></h3>
				            		<?php if( get_field("stages_prompt2") ): ?>
				            			<div class="stage__sub_title">Как это происходит<i></i>
				            				<div class="stages_prompt">
												<?php //the_field( 'stages_prompt2' ); ?>
											</div>
				            			</div>
									<?php else :?>
									<?php endif; ?>
			            		</div>
			            		<ul>
			            			<?php while( have_rows('stages') ): the_row(); ?>
						            	<?php
							                $icon = get_sub_field('icon');
							                $title = get_sub_field('title');
							            ?>
			            			<li>
			            				<img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>">
			            				<span><?php echo $title; ?></span>
			            			</li>
			            			<?php endwhile; ?>
			            		</ul>
			            	</div>
			            </div>
			    <?php endwhile; ?>
			<?php else :?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php else :?>
<?php endif; ?>

<?php
    if( have_rows('text_stage') ):
?>
<section class="text_stage">
	<div class="container">
		<div class="row">
			<?php while( have_rows('text_stage') ): the_row(); ?>
	            <?php
	                $title = get_sub_field('title');
	                $text = get_sub_field('text');
	            ?>
	            <div class="col-lg-6">
	            	<div class="text_stage__item">
	            		<h3 class="h3"><?php echo $title ?></h3>
	            		<?php echo $text ?>
	            	</div>
	            </div>
	        <?php endwhile; ?>
		</div>
	</div>
</section>
<?php else :?>
<?php endif; ?>



<?php
    if( have_rows('text_col') ):
?>
<section class="text_col">
	<div class="container">
		<?php if( get_field("text_col_title") ): ?>
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="h2"><?php the_field( 'text_col_title' ); ?></h2>
			</div>
		</div>
		<?php else :?>
		<?php endif; ?>
		<div class="row justify-content-center">
			<?php while( have_rows('text_col') ): the_row(); ?>
	            <?php
	                $title = get_sub_field('title');
	                $text = get_sub_field('text');
	            ?>
	            <div class="col-lg-6">
	            	<div class="text_col__item">
	            		<h3 class="h3"><?php echo $title ?></h3>
	            		<?php echo $text ?>
	            	</div>
	            </div>
	        <?php endwhile; ?>
		</div>
	</div>
</section>
<?php else :?>
<?php endif; ?>

<?php
    if( have_rows('price') ):
?>
<section class="price">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="h2"><?php the_field( 'price_title' ); ?></h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php while( have_rows('price') ): the_row(); ?>
				<?php while( have_rows('price_item') ): the_row(); ?>
		            <?php
		                $title = get_sub_field('title');
		                $icon = get_sub_field('icon');
		                $after_title = get_sub_field('after_title');
		                $link = get_sub_field('link');
		            ?>
		            <div class="col-lg-4 col-md-6">
		            	<div class="price_item">
		            		<h3 class="h3"><?php echo $title ?></h3>
		            		<div class="after_title"><?php echo $after_title ?></div>
		            		<img src="<?php echo $icon ?>" class="price_item_icon">
		            		<?php while( have_rows('type') ): the_row(); ?>
					            <?php
					                $type_title = get_sub_field('type_title');
					                $type_deck = get_sub_field('type_deck');
					            ?>
					            	<div class="type-line row align-items-center">
					            		<div class="col-6 type_title"><?php echo $type_title ?></div>
					            		<div class="col-6 type_deck text-right"><?php echo $type_deck ?></div>
					            	</div>
				            <?php endwhile; ?>
				            <a href="<?php echo $link; ?>" class="price__link">Узнать подробнее</a>
		            	</div>
		            </div>
	            <?php endwhile; ?>
	        <?php endwhile; ?>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<a href="javascript: void(0);" class="price__all-link" data-toggle="modal" data-target="#page__links">Записаться на прием</a>
			</div>
		</div>
	</div>
</section>
<?php else :?>
	<?php include('template-parts/price.php'); ?>
<?php endif; ?>

<?php
    if( have_rows('type') ):
?>
<section class="type">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<h2 class="h2"><?php the_field( 'type_title' ); ?></h2>
				<?php if( get_field('type_text') ): ?>
					<div class="type_text"><?php the_field( 'type_text' ); ?></div>
				<?php else :?>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="type__slider">
					<?php while( have_rows('type') ): the_row(); ?>
		            <?php
		                $icon = get_sub_field('icon');
		                $title = get_sub_field('title');
		                $text = get_sub_field('text');
		                $link = get_sub_field('link');
		            ?>
					<a href="<?php echo $link ?>" class="type__item">
						<div class="type__title">
							<?php if( get_sub_field('icon') ): ?>
								<img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>">
							<?php else :?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/check.svg" alt="<?php echo $title; ?>">
							<?php endif; ?>
							<?php echo $title; ?>
						</div>
						<?php echo $text; ?>
					</a>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<?php if( get_field('type_text2') ): ?>
					<div class="type_text2"><?php the_field( 'type_text2' ); ?></div>
				<?php else :?>
				<?php endif; ?>
				<a href="javascript: void(0);" class="price__all-link mb__0" data-toggle="modal" data-target="#page__links">Записаться на прием</a>
			</div>
		</div>
	</div>
</section>
<?php else :?>
<?php endif; ?>

<section class="specialists">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<h2 class="h2"><?php the_field( 'specialists_title' ); ?></h2>
				<div class="specialists_text"><?php the_field( 'specialists_text'); ?></div>
			</div>
		</div>

        <div class="row justify-content-center align-items-center">
        	<div class="col-12">
	        	<div class="specialists__slider-centerMode">
		            <?php while( have_rows('specialists') ): the_row(); ?>
		                <?php
		                    $link = get_sub_field('link');
		                    $img = get_sub_field('img');
		                    $surname = get_sub_field('surname');
		                    $name = get_sub_field('name');
		                    $post = get_sub_field('post');
		                    $experience = get_sub_field('experience');
		                ?>
		                    <a href="<?php echo $link ?>" class="specialists__item text-center">
		                        <img src="<?php echo $img ?>">
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

<?php
    if( have_rows('examples') ):
?>
<section class="examples">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="h2">Клинические кейсы</h2>
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
								<div class="col-md-6">
									<h3 class="h3"><?php echo $title ?></h3>
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
    if( have_rows('guarantees') ):
?>
<section class="guarantees">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="h2">Наши гарантии</h2>
			</div>
		</div>
		<div class="row">
			<?php while( have_rows('guarantees') ): the_row(); ?>
                <?php
                    $title = get_sub_field('title');
                    $deck = get_sub_field('deck');
                ?>
                <div class="col-md-6">
                	<div class="guarantees__item">
                		<div class="guarantees__title"><?php echo $title?></div>
                		<div class="guarantees__deck"><?php echo $deck?></div>
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

<?php include('template-parts/rating.php'); ?>

<?php
    if( have_rows('reviews') ):
?>
<section class="review">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<h2 class="h2">Отзывы о враче</h2>
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
<?php else :?>
<?php endif; ?>

<section class="grade">
	<div class="container">
		<div class="grade__wrapper">
			<div class="row">
				<div class="col-12 text-center">
					<h2 class="h2">Оцените работу</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1 text-center">
					<div class="grade__text">Уделите несколько минут тому, чтобы оставить отзыв о лечении у доктора. Рассказав о своих впечатлениях, вы поможете нам стать лучше. Мы всегда готовы развиваться и с нетерпением ждём ваших комментариев.</div>
					<a href="javascript: void(0);" class="grade__link" data-toggle="modal" data-target="#grade__link">Оставить отзыв</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('template-parts/questions.php'); ?>

<section class="servicess__title inc">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<?
$id = $page_id = get_queried_object_id();

?>
				<p class="tc"><?= CFS()->get('block_seo_text',$id); ?></p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>