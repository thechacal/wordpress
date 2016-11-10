<!--
	Template Name: Single category
-->
<?php

	get_header();

	//str_replace("","",str_replace("/","",$_SERVER ['REQUEST_URI']));
	$args = array('hide_empty'=>0, 'orderby' => 'name', 'order' => 'ASC');
	$categorias = get_categories( $args );
	foreach($categorias as $categoria) {
		if(str_replace("/","",$_SERVER ['REQUEST_URI'])==$categoria->category_nicename){
			$title = $categoria->name;
			$slug = $categoria->category_nicename;
			$idObj = get_category_by_slug($slug);
  		$id_cat = $idObj->term_id;
			break;
		}
	}

	$page = get_page_by_title($title);
	$id = $page->ID;
	$posts=get_field('manchete-seca',$id);
	if( $posts ):
		foreach( $posts as $post ):
			setup_postdata($post);
			$id_post = $post->ID;
		endforeach;
		wp_reset_postdata();
	endif;
	$img = wp_get_attachment_image_src(get_post_thumbnail_id($id_post), array(2000,2000));
	include('anuncios/banner_topo.php');

 ?>


<section id="chapeu_noticia">
		<div class="cha_int_titulo" style="background-image:url(<?php bloginfo('template_url') ?>/imgs/barra_topo_cate.png)">
			<div class="container">
				<h1 style="color: <?= getColor($title) ?> !important; " ><?= $title ?></h1>
			</div>
		</div>

	<div class="container">

	 	 <div class="chapeu_all_box">

				<div class="ch_noticia_principal">
					<div class="ch_noticia_principal_img" style="background-image:url(<?= $img[0] ?>)">
					</div>
					<a href=""><p style="background-color:<?= getColor($title) ?> !important;"><?= get_field('sutia_da_noticia',$id_post); ?></p></a>
				</div>
				<?php
					include('anuncios/floater.php');
					include('anuncios/video_topo.php');
				 ?>
				<?php
					if($title=='Gente no AR'){
						include('includes/gentenoar-interna.php');
						echo "<div class='int_espaco_gente_ar'></div>";
						?>
						<div style="color: <?= getColor($title) ?> !important; " class="chapeu_ultimas_noticias_all">
							<p style="border-bottom: 1px solid <?= getColor($title) ?>; color: <?= getColor($title) ?> !important; " class="chapeu_ul_not_titulo">top celebridades</p>
				<?php }else{
				?>
				<div style="color: <?= getColor($title) ?> !important; " class="chapeu_ultimas_noticias_all">
					<p style="border-bottom: 1px solid <?= getColor($title) ?>; color: <?= getColor($title) ?> !important; " class="chapeu_ul_not_titulo">últimas</p>
					<?php } ?>
						<div class="ch_col3">
						<?php
						$page = get_page_by_title($title);
						$id = $page->ID;
						$posts=get_field('manchete_ultimas',$id);
						if( $posts ):
							foreach( $posts as $post ):
								setup_postdata($post);
								$id_post = $post->ID;
								$img = wp_get_attachment_image_src(get_post_thumbnail_id($id_post), array(2000,2000));
						 ?>

							<div class="ch_col3_item">
								<div class="ch_col3_item_img" style="background-image:url(<?= $img[0] ?>)"></div>
								<div class="ch_col3_item_text">
									<p style="color: <?= getColor($title) ?> !important; " class="ch_col3_item_chapeu"><?= get_field('chapeu_da_noticia',$id_post); ?></p>
									<p onclick="location.href = '<?= get_the_permalink($id_post) ?>' " class="ch_col3_item_titulo"><?= the_title() ?></p>
									<p class="ch_col3_item_desc"><?//= the_excerpt() ?></p>
								</div>
							</div>

						<?php
							endforeach;
							wp_reset_postdata();
						endif;
						 ?>
						</div>
				</div>



				<div style="color: <?= getColor($title) ?> !important; " class="chapeu_ultimas_noticias_all">
					<p style="border-bottom: 1px solid <?= getColor($title) ?>; color: <?= getColor($title) ?> !important; " class="chapeu_ul_not_titulo">leia também</p>
						<div class="ch_col3">
							<?php
							$posts=get_field('manchete_leia_tambem',$id);
							if( $posts ):
								foreach( $posts as $post ):
									setup_postdata($post);
									$id_post = $post->ID;
									$img = wp_get_attachment_image_src(get_post_thumbnail_id($id_post), array(2000,2000));
							 ?>

							<div class="ch_col3_item">
								<div class="ch_col3_item_img" style="background-image:url(<?= $img[0] ?>)"></div>
								<div class="ch_col3_item_text">
									<p style="color: <?= getColor($title) ?> !important; " class="ch_col3_item_chapeu"><?= get_field('chapeu_da_noticia',$id_post); ?></p>
									<p onclick="location.href = '<?= get_the_permalink($id_post) ?>' " class="ch_col3_item_titulo"><?= the_title() ?></p>
									<p class="ch_col3_item_desc"><?//= the_excerpt() ?></p>
								</div>
							</div>

							<?php
								endforeach;
								wp_reset_postdata();
							endif;
							 ?>
						</div>
				</div>


				<div class="chapeu_ver_todas_not_box" style="background-color: <?= getColor($title) ?> !important;">
					<a class="chapeu_ver_todas_not" href="/noticias/?cat=<?= $slug ?>">ver todas as notícias</a>
				</div>

	 	 </div>

	 	 <div class="ultimas_chapeu_box">
			 <?php
 			include('anuncios/lateral_200_446_editorias.php');
 			?>
	 	 	<h1 class="ultimas_chapeu_titulo">últimas notícias</h1>

	 	 	<div class="all_ult_not">
				<?php
	        $args = array(
	  					'post_type' => 'post',
	            'posts_per_page'=>5,
	  					'meta_key' => 'listar_noticia',
	  					'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
	  					'order' => 'DESC',
							'cat' => $id_cat,
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

	 	 		<div class="item_ult_not_chap">
	 	 			<div class="item_ult_img_chap" style="background-image:url(<?php bloginfo('template_url') ?>/imgs/sim_ultimas_not.png)"></div>
	 	 			<div class="item_ult_text_chap">
	 	 				<p class="item_ult_text_titulo_p_chap"><?= $title ?></p>
	 	 				<a href="<?= the_permalink(); ?>"><p class="item_ult_text_titulo_chap"><?= the_title() ?></p></a>
	 	 				<p class="item_ult_text_subtitulo_chap"><?= get_field('resumo_da_noticia')?></p>
	 	 				<p class="item_ult_text_data_chap"> <span class="data_ult_not_chap"><?= get_the_date('d/m/Y'); ?></span> <span class="hora_ult_not_chap"><i class="fa fa-clock-o" aria-hidden="true"></i><?= get_the_date('H:i'); ?></span> </p>
	 	 			</div>
	 	 		</div>

	 	 		<?php
	 	 			}
	 	 		 ?>
	 	 	</div>

	 	 </div>

 	</div>
	 	 		<?php
					include('includes/mais_lidas_comentadas.php');
				 ?>

</section>





<?php
	get_footer();
 ?>
