<?php
	/**
	Template Name: Статьи
	*/

	get_header(); ?>

	<?php include('template-parts/breadcrumbs.php'); ?>

	<section class="page__header services diablo">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
                    <div class="atl"></div>
					<h1 class="h1">Статьи, новости, видео</h1>
					<div class="page__header-deck">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
					</div>
					<a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Записаться на прием</a>
				</div>
				<div class="col-lg-7 col-md-6"></div>
			</div>
		</div>
		<img src="<?=the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
	</section>

    <section class="posts-block">
        <div class="container container-post">
            <div class="post-new post-new-stat">
                <h2>Статьи</h2>
                <div class="post-new-text">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo</p>
                    <a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Читать</a>
                </div>
                <div class="post-new-img"></div>
            </div>
            <div class="post-new post-new-news">
                <h2>Новости</h2>
                <div class="post-new-text">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo</p>
                    <a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Читать</a>
                </div>
                <div class="post-new-img"></div>
            </div>
            <div class="post-new post-new-viseo">
                <h2>Видео</h2>
                <div class="post-new-text">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo</p>
                    <a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Читать</a>
                </div>
                <div class="post-new-img"></div>
            </div>
        </div>
    </section>

    <section class="posts-off-m">
        <?php include('template-parts/questions.php'); ?>
    </section>
    
    <section class="sign-up zaois-na-priem">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign-up__wrpper">
                        <div class="row">
                            <div class="col-lg-7">
                                <h2 class="h2"><?php the_field( 'form_title', 'option' ); ?></h2>
                                <div class="sign-up__sub-title">чтобы расчитать стоимость и составить план лечения</div>    
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

	<?php get_footer(); ?>