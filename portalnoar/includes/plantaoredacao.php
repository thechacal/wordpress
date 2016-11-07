
<div class="all_coluna2_principal">
		<h4 class="titulo_colula2_principal">plantão da redação</h4>
		<div class="all_itens_plantao_redacao">
			<?php
				$args = array(
						'post_type' => 'post',
						'posts_per_page'=>6,
						'meta_key' => 'listar_noticia',
						'orderby' => array( 'meta_value_num' => 'desc', 'date' => 'desc' ),
						'order' => 'desc',
						'meta_query' => array(
																	array(
																					'key'     => 'listar_noticia',
																					'value'   => true,
																					'compare' => '='
																	),
													),
				);
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ){
					setup_postdata( $post );
					$id = $post->ID;
			?>

			<div class="item_plantao_redacao">
				<div class="img_plantao_redacao">
					<img src="<?php bloginfo('template_url') ?>/imgs/sim_ultimas_not.png">
				</div>

				<div class="text_plantao_redacao">
					<p class="chapeu_plantao_redacao"><?= get_field('chapeu_da_noticia'); ?></p>
					<p class="desc_plantao_redacao"><a href="<?= the_permalink(); ?>"><?= cutText(get_the_title(),100) ?></a></p>
					<p class="subdesc_plantao_redacao"><?= cutText(get_field('sutia_da_noticia'),100) ?></p>
					<p class="data_plantao_redacao"><?= get_the_date('d/m/Y'); ?><i class="fa fa-clock-o" aria-hidden="true"></i> <?= get_the_date('H:i'); ?></p>
				</div>
			</div>

			<?php
				}
				wp_reset_postdata();
			?>
		</div>
</div>
