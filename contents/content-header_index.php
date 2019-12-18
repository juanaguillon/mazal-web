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
				</ul>
				<button id="icon_bars" class="button">
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