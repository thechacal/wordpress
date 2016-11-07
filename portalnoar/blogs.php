<?php
	// Template name: Blogs
	get_header();

 ?>


<div class="faixa_topo_blogs">
	<div class="container">
		<p>BLOGS NO AR</p>
	</div>
</div>

<div class="container">
	<div class="box_blogs_all">
		<?php
			$args = array(
					'post_type' => 'blogueiros',
					'order' => 'DESC'
			);
			$myposts = get_posts( $args );
			foreach ( $myposts as $post ){
				setup_postdata( $post );
				$id = $post->ID;
				$img=get_field('foto',$id);
		?>
		<div class="blog_item_box">
			<div class="img_autor_blog" style="background-image:url('<?= $img['url'] ?>');"></div>
			<div class="text_autor_blog">
				<p class="nome_autor_blog"><?= get_field('nome',$id) ?></p>
				<p class="desc_autor_blog"><?= get_field('descricao',$id) ?></p>
				<div class="redes_sociais_blogs">
					<a href="<?= get_field('facebook',$id) ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="<?= get_field('twitter',$id) ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href="<?= get_field('instagram',$id) ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					<a href="<?= get_field('google',$id) ?>" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a>
					<i class="fa fa-whatsapp whatsapp_rede_btn" aria-hidden="true"></i>
					<i class="fa fa-envelope email_rede_btn" aria-hidden="true"></i>

					<p class="desc_reds_blog email_rede"><?= get_field('email',$id) ?></p>
					<p class="desc_reds_blog whatsapp_rede"><?= get_field('telefone',$id) ?></p>

				</div>
			</div>
		</div>
		<?php
			}
		 ?>
	</div>

	<div class="box_lateral_blogs">
		<div class="ultimas_noticias_box_blogs">
	 	 	<h1 class="ultimas_noticias_titulo_blogs">últimas notícias</h1>

	 	 	<div class="all_ult_not_blogs">

				<?php
	        $args = array(
	  					'post_type' => 'post',
	            'posts_per_page'=>5,
	  					'meta_key' => 'listar_noticia',
	  					'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
	  					'order' => 'DESC',
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

	 	 		<div class="item_ult_not_blogs">
	 	 			<div class="item_ult_img_blogs"></div>
	 	 			<div class="item_ult_text_blogs">
	 	 				<p class="item_ult_text_chapeu_blogs"><a href="<?= the_permalink(); ?>"><?= get_the_title($id) ?></a></p>
	 	 				<a href="<?= the_permalink(); ?>"><p class="item_ult_text_titulo_blogs"><?= get_field('sutia_da_noticia')?></p></a>
	 	 				<p class="item_ult_text_subtitulo_blogs"><?= get_field('resumo_da_noticia')?></p>
	 	 				<p class="item_ult_text_data_blogs">
							 <span class="data_ult_not_blogs"><?= get_the_date('d/m/Y'); ?></span>
							 <span class="hora_ult_not_blogs"><i class="fa fa-clock-o" aria-hidden="true"></i><?= get_the_date('H:i'); ?></span>
						</p>
	 	 			</div>
	 	 		</div>

				<?php
					}
				 ?>

	 	 	</div>

		</div>

	</div>

</div>


 <?php
 	get_footer();
  ?>
