<?php
/**
 * Template Name: single-tvnoar
 * @package portalnoar
 * @subpackage portalnoar
 * @since Portal no AR 1.0
 * Author: Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
 	get_header();
  $id = $post->ID;

  setup_postdata($post);

  $cont = get_post_meta($post->ID,'_contViewsTv');
   if (!add_post_meta($post->ID, '_contViewsTv', '1', true ) ) {
    update_post_meta($post->ID, '_contViewsTv', $cont[0]+1);
   }

   get_post_meta($post->ID,'_contWpFb');
    if (!add_post_meta($post->ID, '_contWpFb', '1', true ) ) {
      update_post_meta($post->ID, '_contWpFb', getCoutCommentsWpFb(get_the_ID()));
    }

 	$link_do_youtube = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", get_field('link_do_youtube',get_the_ID()));
  ?>


 <section id="chapeu_noticia">
 		<div class="cha_int_titulo" style="background-image:url(<?php bloginfo('template_url') ?>/imgs/barra_topo_cate.png)">
 			<div class="container">
 				<h1 style="color: <?= getColor($title) ?> !important; " >TV no AR</h1>
 			</div>
 		</div>

 	<div class="container">
 	 	 <div class="chapeu_all_box">

 				<div class="ch_noticia_principal">
            <iframe width="100%" height="500" src="<?= $link_do_youtube ?>" frameborder="0" allowfullscreen></iframe>
 					<p style="background-color:<?= getColor($title) ?> !important;"><?= the_title() ?></p>
 				</div>

 				<div style="color: <?= getColor($title) ?> !important; " class="chapeu_ultimas_noticias_all">
 					<p style="border-bottom: 1px solid <?= getColor($title) ?>; color: <?= getColor($title) ?> !important; " class="chapeu_ul_not_titulo">últimas</p>
 						<div class="ch_col3">
              <?php
       	        $args = array(
       	  					'post_type' => 'tvnoar',
       	            'posts_per_page'=>3,
       	  					'meta_key' => 'listar_video',
       	  					'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
       	  					'order' => 'DESC',
       	  					'meta_query' => array(
       	  																array(
       	  																				'key'     => 'listar_video',
       	  																				'value'   => true,
       	  																				'compare' => '='
       	  																),
       	  												),
       	  			);
       					$myposts = get_posts( $args );
       					foreach ( $myposts as $post ):
       						setup_postdata( $post );
       						$id = $post->ID;
       				?>

 							<div class="ch_col3_item">
 								<div class="ch_col3_item_img" style="background-image:url(<?= $img[0] ?>)"></div>
 								<div class="ch_col3_item_text">
 									<p style="color: <?= getColor($title) ?> !important; " class="ch_col3_item_chapeu"><?= get_field('chapeu_da_noticia',$id_post); ?></p>
 									<p class="ch_col3_item_titulo"><?= the_title() ?></p>
 									<p class="ch_col3_item_desc"><?//= the_excerpt() ?></p>
 								</div>
 							</div>

   						<?php
   							endforeach;
   							wp_reset_postdata();
   						 ?>
 						</div>
 				</div>



 				<div style="color: <?= getColor($title) ?> !important; " class="chapeu_ultimas_noticias_all">
 					<p style="border-bottom: 1px solid <?= getColor($title) ?>; color: <?= getColor($title) ?> !important; " class="chapeu_ul_not_titulo">leia também</p>
 						<div class="ch_col3">
              <?php
       	        $args = array(
       	  					'post_type' => 'tvnoar',
       	            'posts_per_page'=>6,
       	  					'meta_key' => 'listar_video',
       	  					'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
       	  					'order' => 'DESC',
       	  					'meta_query' => array(
       	  																array(
       	  																				'key'     => 'listar_video',
       	  																				'value'   => true,
       	  																				'compare' => '='
       	  																),
       	  												),
       	  			);
       					$myposts = get_posts( $args );
       					foreach ( $myposts as $post ):
       						setup_postdata( $post );
       						$id = $post->ID;
       				?>

 							<div class="ch_col3_item">
 								<div class="ch_col3_item_img" style="background-image:url(<?= $img[0] ?>)"></div>
 								<div class="ch_col3_item_text">
 									<p style="color: <?= getColor($title) ?> !important; " class="ch_col3_item_chapeu"><?= get_field('chapeu_da_noticia',$id_post); ?></p>
 									<p class="ch_col3_item_titulo"><?= the_title() ?></p>
 									<p class="ch_col3_item_desc"><?//= the_excerpt() ?></p>
 								</div>
 							</div>

 							<?php
 								endforeach;
 								wp_reset_postdata();
 							 ?>
 						</div>
 				</div>


 				<div class="chapeu_ver_todas_not_box" style="background-color: <?= getColor($title) ?> !important;">
 					<a class="chapeu_ver_todas_not" href="#">ver todos os vídeos</a>
 				</div>

 	 	 </div>

 	 	 <div class="ultimas_chapeu_box">
 	 	 	<h1 class="ultimas_chapeu_titulo">últimos vídeos</h1>

 	 	 	<div class="all_ult_not">
 				<?php
 	        $args = array(
 	  					'post_type' => 'tvnoar',
 	            'posts_per_page'=>5,
 	  					'meta_key' => 'listar_video',
 	  					'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
 	  					'order' => 'DESC',
 	  					'meta_query' => array(
 	  																array(
 	  																				'key'     => 'listar_video',
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

 <section id="comentarios_noticias">
  <div class="container box_coments_not">
    <h1 class="tit_coments_noticias">comentários</h1>
    <?php
    $page = get_page_by_title('Capa principal');
    $id = $page->ID;
    ?>
    <p class="regras_coments"><?= get_field('regras_dos_comentarios',$id);?></p>

    <div class="fb-comments fb_not_coments" expr:data-href="<?php the_permalink() ?>" data-num-posts="10" data-width="100%"></div>
  </div>
 </section>



 <?php
 	get_footer();
  ?>
