<?php
	/**
	Template Name: Статьи видео
	*/

	get_header(); ?>

	<?php include('template-parts/breadcrumbs.php'); ?>

	<section class="page__header services videoposts">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
                    <div class="atl"></div>
					<h1 class="h1">Видео</h1>
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

    <section class="post-video">
        <div class="container">
            <div class="video-block">
                <div class="vidos">
                    <div class="vidos-img"></div>
                    <div class="vidos-text">
                        <h3>Lorem ipsum dolor sit amet, consectetuer adipiscing</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,  ridiculus mus. </p>
                    </div>
                </div>
                <div class="vidos">
                    <div class="vidos-img"></div>
                    <div class="vidos-text">
                        <h3>Lorem ipsum dolor sit amet, consectetuer adipiscing</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,  ridiculus mus. </p>
                    </div>
                </div>
                <div class="vidos">
                    <div class="vidos-img"></div>
                    <div class="vidos-text">
                        <h3>Lorem ipsum dolor sit amet, consectetuer adipiscing</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,  ridiculus mus. </p>
                    </div>
                </div>
                <div class="vidos">
                    <div class="vidos-img"></div>
                    <div class="vidos-text">
                        <h3>Lorem ipsum dolor sit amet, consectetuer adipiscing</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,  ridiculus mus. </p>
                    </div>
                </div>
                <div class="vidos">
                    <div class="vidos-img"></div>
                    <div class="vidos-text">
                        <h3>Lorem ipsum dolor sit amet, consectetuer adipiscing</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,  ridiculus mus. </p>
                    </div>
                </div>
                <div class="vidos">
                    <div class="vidos-img"></div>
                    <div class="vidos-text">
                        <h3>Lorem ipsum dolor sit amet, consectetuer adipiscing</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,  ridiculus mus. </p>
                    </div>
                </div>
            </div>
            <a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Загрузить ещё</a>
        </div>
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