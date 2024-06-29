<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner&display=swap" rel="stylesheet">
	<?php endif; ?>
	<?php wp_head(); ?>

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
	   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	   m[i].l=1*new Date();
	   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
	   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	   ym(29646580, "init", {
	        clickmap:true,
	        trackLinks:true,
	        accurateTrackBounce:true,
	        webvisor:true
	   });
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/29646580" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
</head>

<body <?php body_class(); ?>>
	<header>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-3 col-md-4 text-md-left text-center">
						<div class="header__toggle_menu">
						    <span class="header__toggle_wrapper_elements" >
						        <span class="header__toggle_element_first"></span>
						        <span class="header__toggle_element_second"></span>
						        <span class="header__toggle_element_third"></span>
						    </span>
			            </div>
					<a href="/" class="header__logo">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="">
					</a>
					<hr class="d-md-none d-block hr__line">
				</div>
				<div class="col-lg-1 d-lg-block d-none"></div>
				<div class="col-lg-8 col-md-8 col-12">
					<div class="row">
						<div class="col-lg-4 col-6">
							<div class="address">
								Москва, <br>Ул Бутырская, 46 стр.&nbsp;2 <br>метро&nbsp;"Савеловская"
							</div>
						</div>
						<div class="col-lg-4 d-lg-block d-none">
							<div class="mode">
								Пн-Вс с 09.00 до 21.00 <br>(без выходных)
							</div>
						</div>
						<div class="col-lg-4 col-6 text-right">
							<a href="tel:+74952550525" class="phone">+7 (495) 255 05 25</a>
							<a href="javascript: void(0);" class="call-back" data-toggle="modal" data-target="#exampleModalCenter">Обратный звонок</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="nav">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<hr>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col-lg-6">
					<?php wp_nav_menu('menu=main menu'); ?>
				</div>
				<div class="col-lg-6 text-lg-right d-lg-block d-none">
					<a href="https://t.me/+79855250575" class="telegram" target="_blank" rel="nofollow">Написать в Telegram</a>
					<a href="https://wa.me/79855250575" class="whatsapp" target="_blank" rel="nofollow">Написать в WhatsApp</a>
				</div>
			</div>
		</div>
	</div>