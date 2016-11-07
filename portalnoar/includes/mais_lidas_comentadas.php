<section id="mais_lidas">
	<div class="container">

		<div class="lidas_comentadas">
			<div class="lidas_box">
					<?php
					$page = get_page_by_title('Capa principal');
					$id = $page->ID;
					$periodicidade=get_field('lidas_comentadas',$id);
					switch ($periodicidade) {
    				case "Dia":
								$args = array(
															'post_type' => 'post',
															'posts_per_page'=>5,
															'meta_key' => '_contViews',
															'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
															'order' => 'DESC',
															'date_query' => array(
																										array(
																													'year'  => date( 'Y' ),
																													'month' => date( 'n' ),
																													'day'   => date( 'j' ),
																											),
																									),
															'meta_query' => array(
																										'relation' => 'AND',
																										array(
																														'key'     => 'listar_noticia',
																														'value'   => true,
																														'compare' => '='
																										),
																										array(
																														'key'     => '_contViews',
																										),
																						),
														);
								$lidas='+ Lidas '.$periodicidade;
        				break;
    				case "Semana":
								$args = array(
															'post_type' => 'post',
															'posts_per_page'=>5,
															'meta_key' => '_contViews',
															'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
															'order' => 'DESC',
															'date_query' => array(
																										array(
																													'year' => date( 'Y' ),
																													'week' => date( 'W' ),
																											),
																									),
															'meta_query' => array(
																										'relation' => 'AND',
																										array(
																														'key'     => 'listar_noticia',
																														'value'   => true,
																														'compare' => '='
																										),
																										array(
																														'key'     => '_contViews',
																										),
																						),
														);
								$lidas='+ Lidas '.$periodicidade;
								break;
    				case "Mes":
								$args = array(
															'post_type' => 'post',
															'posts_per_page'=>5,
															'meta_key' => '_contViews',
															'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
															'order' => 'DESC',
															'date_query' => array(
																										array(
																													'year'  => date( 'Y' ),
																													'month' => date( 'n' ),
																											),
																									),
															'meta_query' => array(
																										'relation' => 'AND',
																										array(
																														'key'     => 'listar_noticia',
																														'value'   => true,
																														'compare' => '='
																										),
																										array(
																														'key'     => '_contViews',
																										),
																						),
														);
								$lidas='+ Lidas '.$periodicidade;
		        		break;
						case "Ano":
								$args = array(
															'post_type' => 'post',
															'posts_per_page'=>5,
															'meta_key' => '_contViews',
															'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
															'order' => 'DESC',
															'date_query' => array(
																										array(
																													'year'  => date( 'Y' ),
																											),
																									),
															'meta_query' => array(
																										'relation' => 'AND',
																										array(
																														'key'     => 'listar_noticia',
																														'value'   => true,
																														'compare' => '='
																										),
																										array(
																														'key'     => '_contViews',
																										),
																						),
														);
								$lidas='+ Lidas '.$periodicidade;
								break;
					}
					?>
				<h1 class="lidas_comentadas_titulo"><?=$lidas?></h1>
				<div class="posts_mais_lc">
					<?php
					$cont=1;
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) : $query->the_post();
							$contViews=get_post_meta(get_the_ID(),'_contViews');
							update_post_meta(get_the_ID(), '_contWpFb', getCoutCommentsWpFb(get_the_ID()));
							$contWpFb=get_post_meta(get_the_ID(),'_contWpFb');
					?>
					<div class="item_post_lc">
						<p class="num_post_lc"><?= $cont ?></p>
						<div class="item_post_text_lc">
							<a href="<?= the_permalink(get_the_ID()); ?>"><p class="titulo_post_lc"><?= cutText(get_the_title(get_the_ID()),50) ?></p></a>
							<!-- <p class="desc_post_lc"><?//= cutText(get_the_excerpt(get_the_ID()),100) ?></p> -->
							<!-- <p class="desc_post_lc">Visualizações: <span><?//= $contViews[0] ?></span></p> -->
							<!-- <p class="desc_post_lc">Comentários: <span><?//= $contWpFb[0] ?></span></p> -->
							<p class="desc_post_lc"><span><?= get_the_date('j \d\e F \d\e Y \à\s H:i:s'); ?></span></p>
						</div>
					</div>
					<?php
						$cont+=1;
					endwhile;
				endif;
				?>
				</div>


			</div>
			<div class="lidas_box">
				<?php
							switch ($periodicidade) {
								case "Dia":
										$args = array(
																	'post_type' => 'post',
																	'posts_per_page'=>5,
																	'meta_key' => '_contWpFb',
																	'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
																	'order' => 'DESC',
																	'date_query' => array(
																												array(
																															'year'  => date( 'Y' ),
																															'month' => date( 'n' ),
																															'day'   => date( 'j' ),
																													),
																											),
																	'meta_query' => array(
																												'relation' => 'AND',
																												array(
																																'key'     => 'listar_noticia',
																																'value'   => true,
																																'compare' => '='
																												),
																												array(
																																'key'     => '_contWpFb',
																												),
																								),
																);
										$comentadas='+ Comentadas '.$periodicidade;
										break;
								case "Semana":
										$args = array(
																	'post_type' => 'post',
																	'posts_per_page'=>5,
																	'meta_key' => '_contWpFb',
																	'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
																	'order' => 'DESC',
																	'date_query' => array(
																												array(
																															'year' => date( 'Y' ),
																															'week' => date( 'W' ),
																													),
																											),
																	'meta_query' => array(
																												'relation' => 'AND',
																												array(
																																'key'     => 'listar_noticia',
																																'value'   => true,
																																'compare' => '='
																												),
																												array(
																																'key'     => '_contWpFb',
																												),
																								),
																);
										$comentadas='+ Comentadas '.$periodicidade;
										break;
								case "Mes":
										$args = array(
																	'post_type' => 'post',
																	'posts_per_page'=>5,
																	'meta_key' => '_contWpFb',
																	'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
																	'order' => 'DESC',
																	'date_query' => array(
																												array(
																															'year'  => date( 'Y' ),
																															'month' => date( 'n' ),
																													),
																											),
																	'meta_query' => array(
																												'relation' => 'AND',
																												array(
																																'key'     => 'listar_noticia',
																																'value'   => true,
																																'compare' => '='
																												),
																												array(
																																'key'     => '_contWpFb',
																												),
																								),
																);
										$comentadas='+ Comentadas '.$periodicidade;
										break;
								case "Ano":
										$args = array(
																	'post_type' => 'post',
																	'posts_per_page'=>5,
																	'meta_key' => '_contWpFb',
																	'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
																	'order' => 'DESC',
																	'date_query' => array(
																												array(
																															'year'  => date( 'Y' ),
																													),
																											),
																	'meta_query' => array(
																												'relation' => 'AND',
																												array(
																																'key'     => 'listar_noticia',
																																'value'   => true,
																																'compare' => '='
																												),
																												array(
																																'key'     => '_contWpFb',
																												),
																								),
																);
										$comentadas='+ Comentadas '.$periodicidade;
										break;
							}
				 ?>
				<h1 class="lidas_comentadas_titulo"><?=$comentadas?></h1>
				<div class="posts_mais_lc">
					<?php
						$cont=1;
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) : $query->the_post();
								$contViews=get_post_meta(get_the_ID(),'_contViews');
								$contWpFb=get_post_meta(get_the_ID(),'_contWpFb');
					?>
					<div class="item_post_lc">
						<p class="num_post_lc"><?= $cont?></p>
						<div class="item_post_text_lc">
							<a href="<?= the_permalink(get_the_ID()); ?>"><p class="titulo_post_lc"><?= get_the_title(get_the_ID()) ?></p></a>
							<!--<p class="desc_post_lc"><?//= cutText(get_the_excerpt(get_the_ID()),100) ?></p>-->
							<!-- <p class="desc_post_lc">Comentários: <span><?//= $contWpFb[0] ?></span></p> -->
							<!-- <p class="desc_post_lc">Visualizações: <span><?//= $contViews[0] ?></span></p> -->
							<p class="desc_post_lc"><span><?= get_the_date('j \d\e F \d\e Y \à\s H:i:s'); ?></span></p>
						</div>
					</div>
					<?php
						$cont+=1;
					endwhile;
				endif;
				?>
				</div>
			</div>
		</div>

		<div class="voce_viu">
			<h1 class="voce_viu_titulo">Você viu?</h1>

			<div class="all_box_voce">
				<?php
				$page = get_page_by_title('Capa principal');
				$id = $page->ID;
				$posts=get_field('vcviu_com_imagens',$id);
				if( $posts ):
					foreach( $posts as $post ):
						setup_postdata($post);
						$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
				?>
				<div class="item_voce_viu item_voce_viu_left">
					<div class="img_vv" style="background-image:url(<?= $img[0] ?>)">
					</div>

					<div class="cont_voce_viu">
						<a href=""><p class="tit_voce_viu"><?= the_title(); ?></p></a>
						<p class="desc_voce_viu"></p>
					</div>
				</div>
				<?php
					endforeach;
					wp_reset_postdata();
				endif;
				?>
			</div>

			<?php
			$page = get_page_by_title('Capa principal');
			$id = $page->ID;
			$posts=get_field('vcviu_sem_imagens',$id);
			if( $posts ):
				foreach( $posts as $post ):
					setup_postdata($post);
			?>

				<div class="voce_viu_subitem">
						<div class="voce_viu_subitem_img">
							<img src="<?php bloginfo('template_url') ?>/imgs/voce_viu_simb.png">
						</div>
						<div class="voce_viu_subitem_texto">
							<a href=""><p class="voce_viu_subitem_titulo"><?= the_title(); ?></p></a>
							<p class="voce_viu_subitem_desc"></p>
						</div>
				</div>

				<?php
					endforeach;
					wp_reset_postdata();
				endif;
				?>

		</div>

	</div>
</section>
