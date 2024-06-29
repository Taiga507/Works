<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<section class="rating">
				<div class="container">
				<div class="row">
					<div class="col-12">
				<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ); ?></h1>
				</div>
            </div>
				<div class="row">
					<div class="col-12">
						<div class="rating__wrapper">
						<?php echo do_shortcode("[wp_sitemap_page]"); ?>
                    </div>
            </div>
			<div class="row">
					<div class="col-12">
						<div class="rating__wrapper">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentysixteen' ); ?></p>
                    </div>
            </div>

        </div>
	</div>
</section>
			

		</main><!-- .site-main -->


	</div><!-- .content-area -->

<?php get_footer(); ?>
