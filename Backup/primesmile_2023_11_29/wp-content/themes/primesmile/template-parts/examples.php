<section class="examples">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center left-mb">
				<h2 class="h2">Примеры работ</h2>
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