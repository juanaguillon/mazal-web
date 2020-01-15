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
				<?php
				$idArq = pll_get_post(11);
				$idCorp = pll_get_post(25);
				$idHog = pll_get_post(9);
				$linkArquitectura = get_permalink($idArq);
				$linkCorp = get_permalink($idCorp);
				$linkHogar = get_permalink($idHog);
				$archTerm = get_term(pll_get_term(91));
				$hogarTerm = get_term(pll_get_term(89));
				$corpTerm = get_term(pll_get_term(93));
				?>
				<a href="<?php echo $linkArquitectura ?>">
					<div class="banner_img_container">
						<div class="black_background z1"></div>
						<img class="banner_img_left img_fill img_fill_h" src="<?php echo get_field("imagen", $archTerm)["url"] ?>" alt="" />
					</div>

					<div class="banner_context">
						<div class="banner_logo_altern">
							<img src="<?php bloginfo("template_url") ?>/images/icons/logo_min.svg" alt="" />
						</div>
						<div class="banner_logo">
							<img src="<?php bloginfo("template_url") ?>/images/icons/logo.svg" alt="" />
						</div>
						<div class="heading3 text4x font-3 capitalize">
							<h3 class="text-white banner_context_subtitle"><?php echo get_the_title($idArq) ?></h3>
						</div>
					</div>
					<div class="banner_context_menu_container">

						<div class="banner_context_menu left z2">

							<ul class="ul_banner_menu">
								<?php
								$termsArch = get_terms(array(
									"taxonomy" => "categoria",
									"parent" => $archTerm->term_id,
									"hide_empty" => false
								));
								foreach ($termsArch as $chilK => $chilT) :
									$className = "";
									if ($chilK == count($termsArch) - 1) {
										$className = "no-borders";
									}
									?>
									<li class="<?php echo $className ?>">
										<a class="uppercase text-white" href="<?php echo $linkArquitectura ?>?section=<?php echo $chilT->slug ?>">
											<?php echo $chilT->name ?>
										</a>
									</li>
								<?php endforeach; ?>

								<!-- <li>
									<a class="uppercase text-white" href="<?php echo $linkArquitectura ?>?section=arq_sos">
										Arquitectura Sostenible
									</a>
								</li>
								<li>
									<a class="uppercase text-white" href="<?php echo $linkArquitectura ?>?section=lineas1">
										Diseño Interior
									</a>
								</li>
								<li>
									<a class="uppercase text-white" href="<?php echo $linkArquitectura ?>?section=obra_nueva">
										Obra Nueva
									</a>
								</li>
								<li class="no-borders">
									<a class="uppercase text-white" href="<?php echo $linkArquitectura ?>?section=before_after">
										Remodelación
									</a>
								</li> -->

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

				<div class="banner_context z2 mobiliario">
					<div class="banner_logo">
						<img src="<?php bloginfo("template_url") ?>/images/icons/logo.svg" alt="" />
					</div>
					<div class="banner_logo_altern z2">
						<img src="<?php bloginfo("template_url") ?>/images/icons/logo_min.svg" alt="" />
					</div>
					<div class="heading3 text4x font-3 capitalize">
						<h3 class="text-white banner_context_subtitle text-bold">
							<?php
							if (mazal_is_language()) : ?>
								MOBILIARIO
							<?php else : ?>
								FURNITURE
							<?php endif; ?>
						</h3>
					</div>
				</div>
				<!-- <div class="banner_context_menu_container">
					<div class="banner_context_menu right z2">

						<ul class="ul_banner_menu">
							<li>
								<a class="uppercase text-white" href="<?php echo get_permalink(9) ?>">
									Hogar
								</a>
							</li>
							<li class="no-borders">
								<a class="uppercase text-white" href="<?php echo get_permalink(25) ?>">
									Corporativo
								</a>
							</li>
						</ul>
					</div>
				</div>  -->
			</div>
		</div>

		<!-- MARGEN ABAJO -->
		<div class="banner_margin_bottom z2">

			<?php
			$isEs = mazal_is_language();
			if ($isEs) {
				$suffix = "_-_es";
			} else {
				$suffix = "_-_en";
			}
			$rigths1 = explode(" - ", get_field("copyright" . $suffix, "option"))[0];
			$rigths2 = explode(" - ", get_field("copyright" . $suffix, "option"))[1];
			?>
			<div class="banner_bottom_context text-center">
				<span class="text-white text-2x font-1"><?php echo $rigths1 ?> - <strong><?php echo $rigths2 ?></strong></span>

			</div>

		</div>

		<!-- FINAL MARGEN ABAJO -->

		<!-- MARGEN DERECHA -->

		<div class="banner_margin_right z2">
			<div class="banner_right_context">
				<div class="aside">
					<div class="aside_language">
						<?php
						if (is_page() || is_singular("producto")) {
							$chLink =  get_queried_object()->ID;
							if (mazal_is_language()) {
								$linkID = pll_get_post($chLink, "en");
							} else {
								$linkID = pll_get_post($chLink, "es");
							}
							$link = get_permalink($linkID);
						} else if (is_tax("categoria")) {
							$chLink =  get_queried_object()->term_id;
							if (mazal_is_language()) {
								$linkID = pll_get_term($chLink, "en");
							} else {
								$linkID = pll_get_term($chLink, "es");
							}
							$link = get_term_link($linkID);
						}
						?>

						<a class="languages_toggle" rel="nofollow" href="<?php echo esc_attr($link); ?>">
							<?php $isEs = mazal_is_language(); ?>
							<span class="language <?php echo $isEs ? "language_active" : "" ?>" id="language_es">
								ES
							</span>
							<span>/</span>
							<span class="language <?php echo !$isEs ? "language_active" : "" ?>" id="language_en">
								EN
							</span>
						</a>
					</div>
					<button id="banner_right_toggle" class="button">
						<i class="text-white icon-bars hover-white"></i>
					</button>

					<ul class="menu_banner_right">
						<?php
						foreach (get_field("redes_sociales", "option") as $social) : ?>
							<li><a target="_blank" href="<?= $social["url"] ?>"><img src="<?= $social["icono"]["url"] ?>" alt=""></a> </li>
						<?php endforeach; ?>
						<!-- <li><a target="_blank" href="https://www.instagram.com/mazal_mobiliario_disenoint/?hl=es-la"><i class="text-white icon-instagram hover-white"></i></a> </li>
						<li><a target="_blank" href="https://www.houzz.com/pro/sebastian-camacho/mazal-diseno-interior-and-arquitectura"><i class="text-white icon-houzz hover-white"></i></a> </li>
						<li id="whatsapp_contact"><a href="https://wa.me/573108613043?text=Hola, estoy interesad@ en los productos de mazal." target="_blank"><i class="text-white icon-whatsapp hover-white"></i></a></li> -->
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

<div class="popup_container z3 flex-center-xy" id="agendar">
	<div class="popup_wrapper">
		<div class="popup_close"><button class="button cuadro text2x"><i class="icon-cross"></i></button></div>
		<div class="popup_left">
			<img src="<?php bloginfo("template_url") ?>/images/image_left.jpg" alt="">
		</div>
		<div class="popup_right">
			<div class="poput-title-container flex-center-xy flex-column">
				<!-- <div class="popup-icon-container"><i class="icon-house text6x"></i></div> -->
				<h3 class="popup-title text-center font-1 text4x">
					<?php 
					if ( mazal_is_language()){
						echo "AGENDA A UN DECORADOR DE INTERIORES";
					}else{
						echo "SCHEDULE AN INTERIOR DECORATOR";
					}
					 ?>
					
				</h3>
			</div>

			<p class="popup-text text-left font-2 m-0">
				<?php 
				$buttonAgendar = "";
				if ( mazal_is_language()){
					$buttonAgendar = "Agendar";
					echo "Desde un pequeño consejo sobre colores hasta la renovación completa
					de tu decoración. <br><br> Nuestros decoradores de interiores
					están listos para ayudarte, en tienda o en la comodidad de tu hogar.";
				}else{
					$buttonAgendar = "Schedule";
					echo "From a little advice about colors to the complete renovation of your decoration.<br><br>
					Our interior decorators are ready to help you, in the store or in the comfort of your home.";
				} ?>
				
			
			</p>
			<div class="popup-button-container text-center">
				<!-- <button class="button button-gold button-fill button-m general_button font-2  capitalize">

					
				</button> -->
				<a target="_blank" class="button button-gold button-fill button-m general_button font-2  capitalize" href="https://wa.me/573108613043?text=Hola, estoy interesado en agendar una cita, me gustaría recibir más información." id="share_whatsapp_product" class="share-whatsapp"><span class="text-black"><?= $buttonAgendar ?></span></a>

			</div>
		</div>
	</div>
</div>

<!-- FINAL POPUP -->

<!-- POPUP MOBILIARIO-->

<div class="popup_container z3 flex-center-xy" id="mobiliario_popup">
	<div class="popup_wrapper">
		<!--<div class="screen_black"></div>-->
		<div class="popup_close"><button class="button cuadro text2x"><i class="icon-cross"></i></button></div>
		<a class="popup_left" href="<?php echo $linkHogar ?>">
			<h3 class="text-white banner_context_subtitle text-bold">
				<?php echo get_the_title($idHog) ?>
			</h3>
			<img src="<?php echo get_field("imagen", $hogarTerm)["url"] ?>" alt="">
		</a>
		<a class="popup_right" href="<?php echo $linkCorp ?>">
			<h3 class="text-white banner_context_subtitle text-bold">
				<?php echo get_the_title($idCorp) ?>
			</h3>
			<img src="<?php echo get_field("imagen", $corpTerm)["url"] ?>" alt="">
		</a>
	</div>
</div>

<!-- FINAL POPUP MOBILIARIO -->

<?php get_footer(); ?>