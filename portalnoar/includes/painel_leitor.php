
<div class="all_coluna2_principal">
		<h4 class="titulo_colula2_principal">Painel do leitor</h4>
		<?php
		$args = array(
									'post_type' => 'leitores',
									'posts_per_page'=>1,
									'orderby' => 'date',
									'order' => 'DESC',
								);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
					$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
					if(get_field('video_ou_imagem_destacada')=='Imagem Destacada'){
		 ?>
					<div class="img_painel_leitor" style="background-image:url(<?= $img[0] ?>)" ></div>
		<?php }else{ ?>
					<div class="img_painel_leitor">
						<?php
						$link_do_youtube = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", get_field('video_do_youtube', get_the_ID()));
						?>
									<iframe width="100%" height="130" src="<?= $link_do_youtube ?>" frameborder="0" allowfullscreen></iframe>
					</div>
		<?php } ?>
		<a href=""><p class="titulo_painel_leitor"><?= the_title(); ?></p></a>
		<img class="ico_painel_leitor" src="<?php bloginfo('template_url') ?>/imgs/painelleitorico.png">
		<p class="desc_painel_leitor"><?= get_the_excerpt(get_the_ID()); ?></p>
		<?php
		endwhile;
		endif;
		?>
</div>
