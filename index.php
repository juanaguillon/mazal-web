<?php

/**
 * Template Name: Inicio
 */
?>

<?php get_header(); ?>
<section id="section_banner_index">
	<div class="container-fluid p-0">
		<div class="row no-gutters">
			<div class="w-50 left_image_conent">

				<a href="<?php echo get_permalink(11) ?>">
					<div class="banner_img_container">
						<div class="black_background z1"></div>
						<img class="banner_img_left img_fill img_fill_h" src="<?php bloginfo("template_url") ?>/images/image_left.jpg" alt="" />
					</div>

					<div class="banner_context">
						<div class="banner_logo_altern">
							<img src="<?php bloginfo("template_url") ?>/images/icons/logo_min.svg" alt="" />
						</div>
						<div class="banner_logo">
							<img src="<?php bloginfo("template_url") ?>/images/icons/logo.svg" alt="" />
						</div>
						<div class="heading3 text4x font-3 capitalize">
							<h3 class="text-white banner_context_subtitle">Arquitectura</h3>
						</div>
					</div>
					<div class="banner_context_menu_container">

						<div class="banner_context_menu left z2">

							<ul class="ul_banner_menu">
								<li>
									<a class="uppercase text-white" href="<?php echo get_permalink(11) ?>?section=tres60">
										Arquitectura
									</a>
								</li>
								<li>
									<a class="uppercase text-white" href="<?php echo get_permalink(11) ?>?section=arq_sos">
										Arquitectura Sostenible
									</a>
								</li>
								<li>
									<a class="uppercase text-white" href="<?php echo get_permalink(11) ?>?section=lineas1">
										Diseño Interior
									</a>
								</li>
								<li>
									<a class="uppercase text-white" href="<?php echo get_permalink(11) ?>?section=obra_nueva">
										Obra Nueva
									</a>
								</li>
								<li class="no-borders">
									<a class="uppercase text-white" href="<?php echo get_permalink(11) ?>?section=before_after">
										Remodelación
									</a>
								</li>

							</ul>

						</div>
					</div>
				</a>

			</div>
			<div class="w-50 right_image_conent">
				<div class="black_background z1"></div>

				<!-- <div class="banner_right_img_wrapper banner_right_img_top">
					<a href="<?php echo get_permalink(9) ?>">
						<div class="black_background z1"></div>
						<div class="banner_logo_altern z2">
							<img src="<?php bloginfo("template_url") ?>/images/icons/logo.svg" alt="" />
						</div>
						<div class="heading3 text4x font-3 capitalize  z2">
							<h3 class="text-white banner_context_subtitle">Hogar</h3>
						</div>
						<img src="<?php bloginfo("template_url") ?>/images/interna/image12.jpg" alt="">
					</a>

				</div>
				<div class="banner_right_img_wrapper banner_right_img_down">
					<a href="<?php echo get_permalink(25) ?>">
						<div class="black_background z1"></div>
						<div class="banner_logo_altern z2">
							<img src="<?php bloginfo("template_url") ?>/images/icons/logo.svg" alt="" />
						</div>
						<div class="heading3 text4x font-3 capitalize z2">
							<h3 class="text-white banner_context_subtitle ">Corporativo</h3>
						</div>
						<img src="<?php bloginfo("template_url") ?>/images/interna/image13.jpg" alt="">
					</a>
				</div> -->
				<div class="banner_img_container">

					<img class="banner_img_right img_fill img_fill_h" src="<?php bloginfo("template_url") ?>/images/image_right.jpg" alt="" />
				</div>

				<div class="banner_context z2">
					<div class="banner_logo">
						<img src="<?php bloginfo("template_url") ?>/images/icons/logo.svg" alt="" />
					</div>
					<div class="banner_logo_altern z2">
						<img src="<?php bloginfo("template_url") ?>/images/icons/logo_min.svg" alt="" />
					</div>
					<div class="heading3 text4x font-3 capitalize">
						<h3 class="text-white banner_context_subtitle text-bold">
							Mobiliario
						</h3>
					</div>
				</div>
				<div class="banner_context_menu_container">
					<div class="banner_context_menu right z2">

						<ul class="ul_banner_menu">
							<li>
								<a class="uppercase text-white" href="interna.html">
									Hogar
								</a>
							</li>
							<li class="no-borders">
								<a class="uppercase text-white" href="interna.html">
									Corporativo
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- MARGEN ABAJO -->
		<div class="banner_margin_bottom z2">
			<div class="banner_bottom_context text-center">
				<span class="text-white text-2x font-1">Derechos Reservados &#169; <strong>Mazal 2019</strong></span>

			</div>

		</div>

		<!-- FINAL MARGEN ABAJO -->

		<!-- MARGEN DERECHA -->

		<div class="banner_margin_right z2">
			<div class="banner_right_context">
				<div class="aside">
					<button id="banner_right_toggle" class="button">
						<i class="text-white icon-bars hover-white"></i>
					</button>
					<ul class="menu_banner_right">
						<li><i class="text-white icon-facebook hover-white"></i></li>
						<li><i class="text-white icon-instagram hover-white"></i></li>
						<li><i class="text-white icon-houzz hover-white"></i></li>
						<li id="whatsapp_contact"><i class="text-white icon-whatsapp hover-white"></i></li>
					</ul>
				</div>
				<div class="mini_logo">
					<img src="<?php bloginfo("template_url") ?>/images/icons/logo_min.svg" alt="Logo Minify" />
				</div>
			</div>
		</div>

		<!-- FINAL MARGEN DERECHA -->

	</div>
</section>

<!-- POPUP -->

<div class="popup_container z3 flex-center-xy">
	<div class="popup_wrapper">
		<div class="popup_close"><button class="button cuadro text2x">&#x58;</button></div>
		<div class="popup_left">
			<img src="<?php bloginfo("template_url") ?>/images/image_left.jpg" alt="">
		</div>
		<div class="popup_right">
			<div class="poput-title-container flex-center-xy flex-column">
				<div class="popup-icon-container"><i class="icon-house text6x"></i></div>
				<h3 class="popup-title text-center font-2 text4x">
					AGENDA A UN DECORADOR DE INTERIORES
				</h3>
			</div>

			<p class="popup-text text-left font-1 m-0">Desde un pequeño consejo sobre colores hasta la renovación completa
				de tu decoración. <br><br> Nuestros decoradores de interiores
				están listos para ayudarte, en tienda o en la comodidad de tu hogar.</p>
			<div class="popup-button-container text-center">
				<button class="button button_dark general_button font-2 text2x capitalize">

					<span class="text-black" data-title="AGENDAR">AGENDAR</span>
				</button>

			</div>
		</div>
	</div>
</div>

<!-- FINAL POPUP -->

<?php get_footer(); ?>