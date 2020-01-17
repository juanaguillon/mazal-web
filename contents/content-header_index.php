<div class="search_modal_form">
	<button class="button button-cuadro button_abs home-button-close"><i class="icon-cross"></i></button>
	<div class="search_modal_form_wrap">
		<?php
		if (mazal_is_language()) {
			$suffix = "es";
		} else {
			$suffix = "en";
		}
		$placeholder = get_field("campo_buscar_-_" . $suffix, "option");
		$search = get_field("boton_enviar_-_" . $suffix, "option");


		?>
		<form id="form_search_general" action="<?php echo home_url() ?>">
			<div class="field">
				<?php
				if (mazal_is_language("es")) {
					$debeProporcionar = "Debe proporcionar un texto";
				} else {
					$debeProporcionar = "You must provide a text";
				}


				?>
				<input data-message="<?= $debeProporcionar ?>" id="form_search_text" name="s" placeholder="<?php echo $placeholder; ?>" type="text" class="text">
				<div class="danger_form d-none" id="danger_form_search" id=""><span></span></div>
			</div>
			<div class="field">
				<button type="submit" class="button general_button text-white"><span data-title="<?php echo $search; ?>"><?php echo $search; ?></span></button>
			</div>
		</form>
	</div>

</div>
<header>
	<div class="black_background"></div>
	<nav class="header_top">
		<div class="header_top_left">
			<div class="menu_logo_li">
				<h1 class="menu_logo">
					<a class="text-white">
						<i class="icon-logo"></i>
					</a>
				</h1>
			</div>

		</div>
		<?php
		$pages = mazal_get_pages_ids();
		$hogarLink = get_permalink($pages["hogar"]);
		$corpLink = get_permalink($pages["corporativo"]);
		$arqLink = get_permalink($pages["arquitectura"]);

		$mostBiggerCats = mazal_get_most_biggests_categories();
		$hogarChildrens = get_terms(array(
			"taxonomy" => "categoria",
			"hide_empty" => false,
			"parent" => $mostBiggerCats["hogar"]->term_id
		));
		$archChildrens = get_terms(array(
			"taxonomy" => "categoria",
			"hide_empty" => false,
			"parent" => $mostBiggerCats["arquitectura"]->term_id
		));
		$corpChildrens = get_terms(array(
			"taxonomy" => "categoria",
			"hide_empty" => false,
			"parent" => $mostBiggerCats["corporativo"]->term_id
		));

		// printcode($hogarChildrens);
		// printcode($archChildrens);
		// printcode($corpChildrens);


		// printcode( $mostBiggerCats);

		?>
		<div class="header_top_right flex-center-xy">
			<button id="icon_search2" class="button button_small direct_header_button">
				<i class="icon-search text-white hover-white"></i>
			</button>

			<ul class="header_top_list">
				<li>
					<a href="<?= $arqLink ?>" class="text-white">Arquitectura</a>
					<ul class="header_top_submenu">
						<?php foreach ($archChildrens as $arqChild) : ?>
							<li>
								<a href="<?= get_term_link($arqChild, "categoria") ?>">
									<?= $arqChild->name ?>
								</a>
							</li>
						<?php endforeach; ?>

					</ul>
				</li>
				<li>
					<a href="<?= $corpLink ?>" class="text-white">Corporativo</a>
					<ul class="header_top_submenu">
						<?php foreach ($corpChildrens as $corChild) : ?>
							<li>
								<a href="<?= get_term_link($corChild, "categoria") ?>">
									<?= $corChild->name ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
				<li>
					<a href="<?= $hogarLink ?>" class="text-white">Hogar</a>
					<ul class="header_top_submenu">
						<?php foreach ($hogarChildrens as $hogChild) : ?>
							<li>
								<a href="<?= get_term_link($hogChild, "categoria") ?>">
									<?= $hogChild->name ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
				<li>
					<div class="">
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

						<a class="languages_toggle d-flex" rel="nofollow" href="<?php echo esc_attr($link); ?>">
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
				</li>

			</ul>
			<button class="button hover-white button_small direct_header_button" id="open_shares">
				<i class="icon-share"></i>
				<ul>
					<?php mazal_get_socials() ?>
				</ul>
			</button>
			<button id="icon_bars" class="button button_small">
				<i class="text-white icon-bars hover-white"></i>
			</button>

		</div>

	</nav>


	<div class="dynamic_header_top">
		<div class="dynamic_data dynamic_data_1">
			<div class="row no-gutters">


				<div class="offset-md-3 col-md-9">
					<div class="dynamic_images">
						<div class="dynamic_image_single left_to_right_container">
							<div class="dynamic_image_container ">
								<img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image11.jpg" alt="">
								<img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image11.jpg" alt="">
							</div>
							<div class="dynamic_image_text">
								Muebles
							</div>
						</div>
						<div class="dynamic_image_single left_to_right_container">
							<div class="dynamic_image_container ">
								<img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image10.jpg" alt="">
								<img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image10.jpg" alt="">
							</div>
							<div class="dynamic_image_text">
								Superfice
							</div>
						</div>
						<div class="dynamic_image_single left_to_right_container">
							<div class="dynamic_image_container ">
								<img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image9.jpg" alt="">
								<img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image9.jpg" alt="">
							</div>
							<div class="dynamic_image_text">
								Techos
							</div>
						</div>
						<div class="dynamic_image_single left_to_right_container">
							<div class="dynamic_image_container ">
								<img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image8.jpg" alt="">
								<img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image8.jpg" alt="">
							</div>
							<div class="dynamic_image_text">
								Alineaciones
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dynamic_data dynamic_data_2">
			<div class="row no-gutters">

				<!-- <div class="col-md-4">
                      <ul class="dynamic_list">
                        <li>Videos</li>
                        <li>Imágenes</li>
                        <li>Galería</li>
                        <li>Proyectos</li>
                      </ul>
                    </div> -->
				<div class="offset-md-3 col-md-9">
					<div class="dynamic_images">
						<div class="dynamic_image_single left_to_right_container">
							<div class="dynamic_image_container ">
								<img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image7.jpg" alt="">
								<img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image7.jpg" alt="">
							</div>
							<div class="dynamic_image_text">
								Muebles
							</div>
						</div>
						<div class="dynamic_image_single left_to_right_container">
							<div class="dynamic_image_container ">
								<img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image6.jpg" alt="">
								<img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image6.jpg" alt="">
							</div>
							<div class="dynamic_image_text">
								Superfice
							</div>
						</div>
						<div class="dynamic_image_single left_to_right_container">
							<div class="dynamic_image_container ">
								<img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image5.jpg" alt="">
								<img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image5.jpg" alt="">
							</div>
							<div class="dynamic_image_text">
								Techos
							</div>
						</div>
						<div class="dynamic_image_single left_to_right_container">
							<div class="dynamic_image_container ">
								<img class="img_fill left" src="<?php bloginfo("template_url") ?>/images/interna/image4.jpg" alt="">
								<img class="img_fill right" src="<?php bloginfo("template_url") ?>/images/interna/image4.jpg" alt="">
							</div>
							<div class="dynamic_image_text">
								Alineaciones
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</header>