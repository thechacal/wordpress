<div class="all_coluna2_principal">
		<h4 class="titulo_colula2_principal">tv no ar</h4>
<?php
			$aux=FALSE;
			$args = array(
					'post_type' => 'tvnoar',
					'meta_key' => 'video_em_destaque',
					'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
					'order' => 'DESC',
					'meta_query' => array(
																'relation' => 'AND',
																array(
																				'key'     => 'listar_video',
																				'value'   => true,
																				'compare' => '='
																),
																array(
																				'relation' => 'OR',
																				array(
																								'key'     => 'listar_video',
																								'value'   => true,
																								'compare' => '='
																				),
																				array(
																								'key'     => 'video_em_destaque',
																								'value'   => true,
																								'compare' => '='
																				),
																),
												),
			);
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) : $query->the_post();
					$excluir[]=get_the_ID();
					$titulo = get_the_title(get_the_ID());
					$link_do_youtube = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", get_field('link_do_youtube',get_the_ID()));
					?>
							<div class="video_tvnoar">
								<iframe width="100%" height="170" src="<?= $link_do_youtube ?>" frameborder="0" allowfullscreen></iframe>
							</div>
							<p class="titulo_tvnoar"><a href="<?= the_permalink() ?>"><?= $titulo ?></a></p>
			<?php
					break;
				endwhile;
			endif;
			$args = array(
					'post_type' => 'tvnoar',
					'meta_key' => 'video_em_destaque',
					'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
					'order' => 'DESC',
					'post__not_in' => $excluir,
					'posts_per_page' => 2,
					'meta_query' => array(
																'relation' => 'AND',
																array(
																				'key'     => 'listar_video',
																				'value'   => true,
																				'compare' => '='
																),
																array(
																				'relation' => 'OR',
																				array(
																								'key'     => 'listar_video',
																								'value'   => true,
																								'compare' => '='
																				),
																				array(
																								'key'     => 'video_em_destaque',
																								'value'   => true,
																								'compare' => '='
																				),
																),
												),
			);
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) : $query->the_post();
					$titulo = get_the_title(get_the_ID());
					$link_do_youtube = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", get_field('link_do_youtube',get_the_ID()));
					?>
							<img class="ico_tvnoar" src="<?php bloginfo('template_url') ?>/imgs/painelleitorico.png"><p class="desc_tvnoar"><a href="<?= get_post_permalink(get_the_ID()); ?>"><?= $titulo ?></a></p>
					<?php
				endwhile;
			endif;
			?>
</div>
