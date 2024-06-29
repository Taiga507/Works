<section class="rating">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center left-mb">
				<h2 class="h2"><?php the_field( 'rating_title', 'option' ); ?></h2>
			</div>
		</div>

        <div class="row">
			<div class="col-12">
				<div class="rating__wrapper">
                    <?php while( have_rows('rating', 'option') ): the_row(); ?>
                        <?php
                            $img = get_sub_field('img');
                            $link = get_sub_field('link');
                        ?>
                            <a class="rating__item" href="<?php echo $link ?>" target="_blank" rel="nofollow">
                                <img src="<?php echo $img ?>" alt="">
                            </a>
                    <?php endwhile; ?>
            	</div>
            </div>
        </div>
	</div>
</section>