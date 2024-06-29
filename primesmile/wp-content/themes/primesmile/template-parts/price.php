<?php
    if( have_rows('price1') ):
?>
<section class="price">
	<div class="container">
        <div class="row">
			<div class="col-12">
				<div class="price__wrapper">
                    <h2 class="h2"><?php the_field( 'price1_title' ); ?></h2>
                    <?php while( have_rows('price1') ): the_row(); ?>
                        <?php
                            $title = get_sub_field('title');
                            $country = get_sub_field('country');
                            $price1 = get_sub_field('price1');
                            $price2 = get_sub_field('price2');
                        ?>
                            <div class="price2_item">
                                <div class="title"><?php echo $title; ?></div>
                                <div class="country"><?php echo $country; ?></div>
                                <div class="price1"><?php echo $price1; ?></div>
                                <div class="price2"><?php echo $price2; ?></div>
                            </div>
                    <?php endwhile; ?>
            	</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <a href="javascript: void(0);" class="price__all-link" data-toggle="modal" data-target="#page__links">Записаться на прием</a>
            </div>
        </div>
	</div>
</section>
<?php else :?>
<?php endif; ?>