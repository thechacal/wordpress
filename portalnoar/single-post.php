<?php
/**
 * Template Name: single-post
 * @package portalnoar
 * @subpackage portalnoar
 * @since Portal no AR 1.0
 * Author: Beto Canuto [ Web Design / beto@quadradigital.com.br ], Douglas Boza [ Front-end / douglas@quadradigital.com.br ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */

 get_header();
	$id = $post->ID;

setup_postdata($post);

	$cont = get_post_meta($post->ID,'_contViews');
	 if (!add_post_meta($post->ID, '_contViews', '1', true ) ) {
		update_post_meta($post->ID, '_contViews', $cont[0]+1);
	 }else{
     add_post_meta($post->ID, '_contViews', '1', true );
   }

   $contShares=get_post_meta($post->ID,'_contShares');

   if($contShares[0] == ""){
      $contShares[0] = '0';
   }

	$img = wp_get_attachment_image_src(get_post_thumbnail_id($id), array(2000,2000));
	$posttags = get_the_tags();

	if((get_field('largura_imagem_destacada', $id) == 1) || (get_field('largura_imagem_destacada', $id) == "")){
		$destaque100 = true;
	}else{
		$destaque100 = false;
	}



    $content_all = get_the_content($id);

    $content_all = apply_filters( 'the_content', $content_all );
    $content_all = str_replace( ']]>', ']]&gt;', $content_all );

    if(get_field('ativar_veja_tambem')){

      if(get_field('posicao_veja_tambem', $id) == 'direita' ){
          $class_po = 'box_veja_tambem_right';
      }else{
          $class_po = 'box_veja_tambem_left';
      }

      $vejatmb = '<div class="'.$class_po.' box_veja_tambem">
                  <p class="titulo_tmb">'.get_field('titulo_veja_tambem', $id).'</p>';

                $page1 = get_page_by_title('Capa principal');
                $id1 = $page1->ID;
                $posts1=get_field('veja_tambem_imgs',$id1);
                if( $posts1 ):
                  foreach( $posts1 as $post1 ):
                    setup_postdata($post1);
                    $id_post1 = $post1->ID;
                    $img1 = wp_get_attachment_image_src(get_post_thumbnail_id($id_post1), array(2000,2000));

                   $vejatmb = $vejatmb.'<div class="item_veja_tambem">
                        <div class="img_veja_tambem" style="background-image:url('.$img1[0].')"></div>
                        <div class="text_veja_tambem">
                          <a href="'.get_the_permalink($id_post1).'"><p class="titulo_item_tmb">'. get_the_title($id_post1).'</p></a>

                        </div>
                      </div>';
// <p class="desc_item_tmb">'. cutText(get_the_excerpt(get_the_ID()),100) .'</p>
                  endforeach;
                  wp_reset_postdata();
                endif;



                $vejatmb = $vejatmb.'<div class="veja_tambem_all_ultimas">';

                  $page2 = get_page_by_title('Capa principal');
                  $id2 = $page2->ID;
                  $posts2=get_field('veja_tambem_sem_imgs',$id2);
                  if( $posts2 ):
                    foreach( $posts2 as $post2 ):
                      setup_postdata($post2);
                     $id_post2 = $post2->ID;
                      $link_img_i = get_site_url().'/wp-content/themes/portalnoar/imgs/sim_ultimas_not.png';
                      $vejatmb = $vejatmb.'

                  <div class="veja_tambem_ultimas_item">
                    <div class="veja_tambem_ultimas_item_img">
                      <img src="'. $link_img_i .'">
                    </div>
                    <div class="veja_tambem_ultimas_item_text">
                      <a href="'. get_the_permalink($id_post2) .'"><p class="veja_tambem_ultimas_item_titulo">'. get_the_title($id_post2) .'</p></a>

                    </div>
                  </div>';
// <p class="veja_tambem_ultimas_item_desc">'. cutText(get_the_excerpt(get_the_ID()),100) .'</p>
                    endforeach;
                    wp_reset_postdata();
                  endif;



                $vejatmb = $vejatmb.'</div> </div>';

         if(strripos ($content_all,'[vejatambem]') === false){

            $onde = strpos($content_all, '. ');
            $tamanho = strlen('. ');

            $content_all =  substr_replace($content_all, '. '.$vejatmb,$onde, $tamanho);
         }else{
            $content_all = str_replace('[vejatambem]', $vejatmb , $content_all );
         }


      }




?>
 <section class="interna_post">
 	<div class="container">
 	 	<div class="noticias_all_box">
		 		<div class="infs_post_interna">
		 			<?= (get_field('chapeu_da_noticia',get_the_ID())!='' ? "<p class=\"chapeu_noticia\">".get_field('chapeu_da_noticia',get_the_ID())."</p>" : ''); ?>
		 			<p class="data_noticia"><?= get_the_date('d/m/Y'); ?></p>
		 			<p class="hora_noticia"><i class="fa fa-clock-o" aria-hidden="true"></i><?= get_the_date('H:i'); ?></p>

		 		</div>
		 		<h1><?= get_the_title(get_the_ID()) ?></h1>
		 		<p class="desc_noticia"><?= get_field('sutia_da_noticia')?></p>
				<p style="<?php if(get_field('autor_fonte_noticia') == "" )echo'display:none'; ?>;" class="desc_noticia">Por <?= get_field('autor_fonte_noticia')?></p>

		 		<div class="noticia_conteudo">

		 			<div style="<?php if($img[0] == "" )echo'display:none'; ?>; <?php if($destaque100 === true )echo'width:100%'; ?>;" class="img_destaque_noticia img_destaque_noticia_50">
		 				<p class="post_autor"><?//= get_the_author(); ?></p>
		 				<div style="background-image:url(<?= $img[0]?>);"> </div>
		 			<!-- 	<?php// if($destaque100 === true){
              ?> -->
							<p class="desc_img_noticia"><?= get_field('texto_sobre_img')?></p>
						<!-- 	// <?php //}
              ?> -->
		 			</div>

		 			<div class="text_sub_noticia">
		 				<p><?= get_field('texto_imagem_lado')?></p>
		 			</div>

		 			<div id="count" class="redes_sociais_noticia">
		 				 <a href="http://www.facebook.com/sharer/sharer.php?u=<?= get_the_permalink($id) ?>" target="_blank" class="compar_facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Compartilhar</a>
             <a href="http://twitter.com/intent/tweet?text=<?= get_the_permalink($id) ?>" class="compar_post_rede" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
             <a href="#" class="compar_post_rede" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
             <a href="whatsapp://send?text=<?= the_title(); ?> : <?= get_the_permalink($id) ?>" class="compar_post_rede" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
             <a id="printNews" href="#" class="compar_post_rede" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>
             <span class="infs_compar_post infs_compar_post1">} </span>
             <span id="idpost" value="<?= $id ?>" class="infs_compar_post infs_compar_post2"><?= $contShares[0] ?></span>
             <span class="infs_compar_post infs_compar_post3"> Compartilhamentos</span>
		 			</div>


		 			<div class="text_noticia" id="noticias_all_box">
		 				<p><?= $content_all; ?> </p>
		 			</div>

          <div id="count2" class="redes_sociais_noticia">
             <a href="http://www.facebook.com/sharer/sharer.php?u=<?= get_the_permalink($id) ?>" target="_blank" class="compar_facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Compartilhar</a>
             <a href="http://twitter.com/intent/tweet?text=<?= get_the_permalink($id) ?>" class="compar_post_rede" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
             <a href="#" class="compar_post_rede" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
             <a href="whatsapp://send?text=<?= the_title(); ?>: <?= the_permalink(); ?>" class="compar_post_rede" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
             <a id="printNews" href="#" class="compar_post_rede" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>
             <span class="infs_compar_post infs_compar_post1">} </span>
             <span id="idpost2" value="<?= $id ?>" class="infs_compar_post infs_compar_post2"><?= $contShares[0] ?></span>
             <span class="infs_compar_post infs_compar_post3"> Compartilhamentos</span>
          </div>

					<div class="list_tags_noticia">
					<?php if ($posttags) {
						foreach($posttags as $tag) {
							?><li><a href="/noticias/?tag=<?php echo $tag->slug." ";?>"><?php echo $tag->name." ";?></a></li>
			<?php }
					}?>
		 			</div>

		 		</div>
 	 </div>

 	 <div class="ultimas_noticias_box">
 	 	<h1 class="ultimas_noticias_titulo">últimas notícias</h1>

 	 	<div class="all_ult_not">
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

 	 		<div class="item_ult_not">
 	 			<div class="item_ult_img" style="background-image:url(<?php bloginfo('template_url') ?>/imgs/sim_ultimas_not.png)"></div>
 	 			<div class="item_ult_text">
 	 				<p class="item_ult_text_chapeu"><a href="<?= the_permalink(); ?>"><?= get_the_title($id) ?></a></p>
 	 				<a href="<?= the_permalink(); ?>"><p class="item_ult_text_titulo"><?= get_field('sutia_da_noticia')?></p></a>
 	 				<p class="item_ult_text_subtitulo"><?= get_field('resumo_da_noticia')?></p>
 	 				<p class="item_ult_text_data">
						 <span class="data_ult_not"><?= get_the_date('d/m/Y'); ?></span>
						 <span class="hora_ult_not"><i class="fa fa-clock-o" aria-hidden="true"></i><?= get_the_date('H:i'); ?></span>
					</p>
 	 			</div>
 	 		</div>

 	 		<?php
 	 			}
 	 		 ?>
 	 	</div>
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
		<h1 class="ultimas_noticias_titulo"><?=$lidas?></h1>

 	 	<div class="all_ult_not">
			<?php
				$cont=1;
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ){
					setup_postdata( $post );
					$id = $post->ID;
					//$contViews=get_post_meta($id,'_contViews');
					//$contWpFb=get_post_meta($id,'_contWpFb');
			?>

 	 		<div class="item_ult_not">
 	 			<div class="item_ult_img" style="background-image:url(<?php bloginfo('template_url') ?>/imgs/sim_ultimas_not.png)"></div>
 	 			<div class="item_ult_text">
 	 				<p class="item_ult_text_chapeu"><a href="<?= the_permalink(); ?>"><?= get_the_title($id) ?></a></p>
 	 				<a href="<?= the_permalink(); ?>"><p class="item_ult_text_titulo"><?= get_field('sutia_da_noticia')?></p></a>
 	 				<p class="item_ult_text_subtitulo"><?= get_field('resumo_da_noticia')?></p>
 	 				<p class="item_ult_text_data">
						<span class="data_ult_not"><?= get_the_date('d/m/Y'); ?></span>
						<span class="hora_ult_not"><i class="fa fa-clock-o" aria-hidden="true"></i><?= get_the_date('H:i'); ?></span>
						<!--<span class="hora_ult_not">Visualizações: <?//= $contViews[0] ?></span><br />-->
						<!--<span class="hora_ult_not">Comentários: <?//= $contWpFb[0] ?></span>-->
					</p>
 	 			</div>
 	 		</div>

 	 		<?php
 	 			}
 	 		 ?>
 	 	</div>
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
		<h1 class="ultimas_noticias_titulo"><?=$comentadas?></h1>

		<div class="all_ult_not">
			<?php
				$cont=1;
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ){
					setup_postdata( $post );
					$id = $post->ID;
					//$contViews=get_post_meta($id,'_contViews');
					//$contWpFb=get_post_meta($id,'_contWpFb');
			?>

 	 		<div class="item_ult_not">
 	 			<div class="item_ult_img" style="background-image:url(<?php bloginfo('template_url') ?>/imgs/sim_ultimas_not.png)"></div>
 	 			<div class="item_ult_text">
 	 				<p class="item_ult_text_chapeu"><a href="<?= the_permalink(); ?>"><?= get_the_title($id) ?></a></p>
 	 				<a href="<?= the_permalink(); ?>"><p class="item_ult_text_titulo"><?= get_field('sutia_da_noticia')?></p></a>
 	 				<p class="item_ult_text_subtitulo"><?= get_field('resumo_da_noticia')?></p>
 	 				<p class="item_ult_text_data">
						<span class="data_ult_not"><?= get_the_date('d/m/Y'); ?></span>
						<span class="hora_ult_not"><i class="fa fa-clock-o" aria-hidden="true"></i><?= get_the_date('H:i'); ?></span>
						<!--<span class="hora_ult_not">Comentários: <?//= $contWpFb[0] ?></span><br />
						<span class="hora_ult_not">Visualizações: <?//= $contViews[0] ?></span>-->
					</p>
 	 			</div>
 	 		</div>

 	 		<?php
 	 			}
 	 		 ?>
 	 	</div>

 	 </div>

 	</div>

 </section>

 <section id="recomendamos_noticias">
 	<div class="container box_tit_recn">
 		<h1 class="tit_recn_noticias">recomendamos</h1>
 	</div>

 	<div class="container all_rec_not">

    <?php
    $page = get_page_by_title('Capa principal');
    $id = $page->ID;
    $posts=get_field('manchetes_em_recomendamos',$id);
    if( $posts ):
      foreach( $posts as $post ):
        setup_postdata($post);
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
    ?>
    <div class="recn_box">
 			<div class="item_recn">
 				<div class="item_recn_img" style="background-image:url(<?= $img[0] ?>)"></div>
 				<div class="item_recn_text">
 					<p class="item_recn_titulo"><a href="<?= the_permalink(); ?>"><?= get_the_title(get_the_ID()) ?></a></p>
 					<!-- <p class="item_recn_desc"><?= cutText(get_the_excerpt(get_the_ID()),100) ?></p> -->
 				</div>
 			</div>

 		</div>
    <?php
      endforeach;
      wp_reset_postdata();
    endif;
    ?>

 	</div>
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
