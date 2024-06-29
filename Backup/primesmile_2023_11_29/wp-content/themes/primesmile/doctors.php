<?php
/**
Template Name: Страница врачей
 */

get_header(); ?>

<?php include('template-parts/breadcrumbs.php'); ?>

<section class="specialists specialists__page">
	<div class="container">
        <div class="doctors-text">
            <h1>Наши специалисты</h1>
            <?php the_content(); ?>
        </div>
        <div class="row justify-content-center">
            <?php while( have_rows('specialists', 'option') ): the_row(); ?>
                <?php
                    $link = get_sub_field('link');
                    $img = get_sub_field('img');
                    $surname = get_sub_field('surname');
                    $name = get_sub_field('name');
                    $post = get_sub_field('post');
                    $experience = get_sub_field('experience');
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <a href="<?php echo $link ?>" class="specialists__item text-center">
                        <img src="<?php echo $img ?>">
                        <div class="specialists__item-text">
                            <div class="specialists__item-name familia-magazin chpkskaa"><?php echo $name ?></div>
                        	<div class="specialists__item-surname ima-magazin chpksk"><?php echo $surname ?></div>
                        	<div class="specialists__item-post"><?php echo $post ?></div>
                        	<div class="specialists__item-experience"><?php echo $experience ?></div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
	</div>
</section>

<?php get_footer(); ?>