<?php
	/**
	Template Name: Наши технологии
	*/

	get_header(); ?>

	<?php include('template-parts/breadcrumbs.php'); ?>

	<section class="page__header services tech diabothrch">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="atl"></div>
					<h1 class="h1">Наши
технологии</h1>
					<div class="page__header-deck">
                    Lorem ipsum dolor sit amet,
consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
					</div>
					<a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Записаться на прием</a>
				</div>
				<div class="col-lg-7 col-md-6"></div>
			</div>
		</div>
        <img src="<?=the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
	</section>

    <section class="news-tech">
        <div class="container container-agent">
            <div class="news-tech-c">
                <div class="new-tech">
                    <div class="new-texh-text">
                        <h3>Системы имплантов</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis </p>
                        <a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Читать статью</a>
                    </div>
                    <div class="new-texh-img">
                    </div>
                </div>
                <div class="new-tech">
                    <div class="new-texh-text">
                        <h3>Системы имплантов</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis </p>
                        <a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Читать статью</a>
                    </div>
                    <div class="new-texh-img">
                    </div>
                </div>
                <div class="new-tech">
                    <div class="new-texh-text">
                        <h3>Системы имплантов</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis </p>
                        <a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Читать статью</a>
                    </div>
                    <div class="new-texh-img">
                    </div>
                </div>
                <div class="new-tech">
                    <div class="new-texh-text">
                        <h3>Системы имплантов</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis </p>
                        <a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Читать статью</a>
                    </div>
                    <div class="new-texh-img">
                    </div>
                </div>
                <div class="new-tech">
                    <div class="new-texh-text">
                        <h3>Системы имплантов</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis </p>
                        <a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Читать статью</a>
                    </div>
                    <div class="new-texh-img">
                    </div>
                </div>
                <div class="new-tech">
                    <div class="new-texh-text">
                        <h3>Системы имплантов</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis </p>
                        <a href="javascript: void(0);" class="page__link center-abobacins" data-toggle="modal" data-target="#page__link">Читать статью</a>
                    </div>
                    <div class="new-texh-img">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="examples">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center left-mb">
                    <h2 class="h2">Клинические кейсы по имплантации зубов</h2>
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
                                        <h3 class="h3 d-lg-block d-none"><?php echo $title ?></h3>
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
                                        <div class="h3 d-lg-none d-block"><?php echo $title ?></div>
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

	<?php include('template-parts/questions.php'); ?>

	<?php get_footer(); ?>