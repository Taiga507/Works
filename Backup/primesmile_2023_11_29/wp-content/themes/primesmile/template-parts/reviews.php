<section class="reviews" id="reviews">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<h2 class="h2">Отзывы <br>наших клиентов</h2>
				<div class="reviews__text"><?php the_field( 'text', 'option' ); ?></div>
				<a href="javascript: void(0);" class="reviews__all">Смотреть все отзывы</a>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-6">
				<div class="reviews__slider">
					<?php while( have_rows('reviews', 'option') ): the_row(); ?>
                        <?php
                            $name = get_sub_field('name');
                            $video = get_sub_field('video');
                        ?>
						
						<div class="reviews__slider__item">
							<div class="embed-responsive embed-responsive-16by9">
							<iframe allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen
								srcdoc="
									<style>
										body, .full {
											width: 100%;
											height: 100%;
											margin: 0;
											position: absolute;
											display: flex;
											justify-content: center;
											object-fit: cover;
										}
									</style>

								
<?/* <iframe width="560" height="315" src="<?php echo $video; ?>" title="YouTube video player" frameborder="0" 
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> */?>

									<a
										href='<?php echo $video; ?>?autoplay=1' class='full'
									><?php
										//	parse_str( parse_url( $video, PHP_URL_QUERY ), $my_array_of_vars );

											preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video, $match);
											$youtube_id = $match[1];

									?>
										<img
											src='https://vumbnail.com/<?=$youtube_id?>.jpg'
											class='full'>
										<svg
											version='1.1'
											viewBox='0 0 68 48'
											width='68px'
											style='position: relative;'
										>
											<path d='M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z' fill='#f00'></path>
											<path d='M 45,24 27,14 27,34' fill='#fff'></path>
										</svg>
									</a>
								"
								style=" width: 100%; aspect-ratio: 16/9;"
								frameborder="0"
							></iframe>
							</div>
							<div class="name"><?php echo $name; ?></div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</section>