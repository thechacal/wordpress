<?php
	// Template name: Notícias

	get_header();
 ?>
<div class="container">
	<div class="all_posts_interna">
			<?php
			if(isset($_GET['cat'])){
				$args = array(
						'post_type' => 'post',
						'category_name' => $_GET['cat'],
						'posts_per_page'=>100,
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
			} else if(isset($_GET['tag'])){
				$args = array(
						'post_type' => 'post',
						'tag' => $_GET['tag'],
						'posts_per_page'=>100,
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
			}else{
						$args = array(
								'post_type' => 'post',
								'posts_per_page'=>100,
								'meta_key' => 'listar_noticia',
								'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ),
								'order' => 'DESC',
								'meta_query' => array(
																			array(
																							'key'     => 'listar_noticia',
																							'value'   => true,
																							'compare' => '!='
																			),
															),
						);
						//n da pra postar 2 post types em uma única sql
						$args2 = array(
								'post_type' => 'tvnoar',
								'posts_per_page'=>100,
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
						$query = new WP_Query( $args );
						$query2 = new WP_Query( $args2 );
						$result = new WP_Query();
						$result->posts = array_merge( $query->posts, $query2->posts );
						$result->post_count = count( $result->posts );
						if ( $result->have_posts() ) :
							while ( $result->have_posts() ) : $result->the_post();
								$excluir[]=get_the_ID();
							endwhile;
						endif;
						$args = array(
								'orderby' => 'date',
								'order' => 'DESC',
								's' => $_GET['busca'], // esse parâmetro não permite meta_query, tem que pegar os posts que não podem ser listados e excluir via array
								'post__not_in' => $excluir,
						);
			}
			$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$query = new WP_Query( $args );
			$temp_query = $wp_query;
			$wp_query   = NULL;
			$wp_query   = $query;
			if ( $query->have_posts() ) :
			?>
			<h1><?php if(isset($_GET['busca'])){ printf( __( 'Resultados de Busca para: %s' ), $_GET['busca'] ); } ?></h1>
			<h1><?php if(isset($_GET['cat'])){ printf( __( 'Resultados de Busca para: %s' ), str_replace('-',' ',$_GET['cat']) ); } ?></h1>
			<h1><?php if(isset($_GET['tag'])){ printf( __( 'Resultados de Busca para: %s' ), str_replace('-',' ',$_GET['tag']) ); } ?></h1>
			<?
				while ( $query->have_posts() ) : $query->the_post();
				$posttags = get_the_tags();
				if ($posttags) {
						foreach($posttags as $tag) {
							$all_tags[] = $tag->term_id;
						}
				}
				$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
			?>
			<div class="item_all_post_interna">
				<div class="box_item_post_int">
					<p class="dataall_all_posts">
							 <span class="data_all_posts"><?= get_the_date('j/m/Y'); ?></span>
							 <span class="hora_all_posts"><i class="fa fa-clock-o" aria-hidden="true"></i><?= get_the_date('H:i:s'); ?></span>
					</p>
				</div>
				<div class="box_infs_all_post">
					<div style="background-image:url('<?= $img[0] ?>')" class="img_post_all"></div>
					<div class="conteudo_post_all_interna">
						<p class="titulo_all_post_interna"><?= the_title(); ?></p>
						<p class="desc_all_post_interna"><?= get_the_excerpt(); ?></p>
					</div>
					<div class="num_coments_all_post">
						<i class="fa fa-comments" aria-hidden="true"></i>
						<p><?= getCoutCommentsWpFb(); ?></p>
					</div>
					<a class="btn_ver_post_all_int" href="<?= the_permalink(); ?>"><img src="<?= bloginfo('template_directory'); ?>/imgs/simb_mais.png"></a>
				</div>

			</div>

			<?php
				endwhile;
				else :
				?>
				<h1><?php if(isset($_GET['busca'])){ printf( __( 'Nenhum Resultado para: %s' ), $_GET['busca'] ); } ?></h1>
				<h1><?php if(isset($_GET['cat'])){ printf( __( 'Nenhum Resultado para: %s' ), $_GET['cat'] ); } ?></h1>
				<h1><?php if(isset($_GET['tag'])){ printf( __( 'Nenhum Resultado para: %s' ), $_GET['tag'] ); } ?></h1>
					<?php
			endif;
			wp_reset_postdata();
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page' ),
				'next_text'          => __( 'Next page' ),
			) );
			$wp_query = NULL;
			$wp_query = $temp_query;
			?>

	</div>

	<!-- <div class="lateral_posts_interna">
		<div class="lista_categorias">
			<p class="titulo_cats_tags">editorias</p>
			<div class="all_categorias">
				<?php
				// $args = array('hide_empty'=>0, 'orderby' => 'name', 'order' => 'ASC', 'parent' => 0);
				// $categorias = get_categories( $args );
				// foreach($categorias as $categoria) {
				// $categoria->category_nicename;
				//$categoria->name;

				?>
				<li class="cat-item"><a href="">/a></li>
				<?php
				// } 
				?>


			</div>
		</div>
 -->
		<!--<div class="lista_categorias">
			<p class="titulo_cats_tags">categorias</p>
			<div class="all_categorias">
				<li class="cat-item"><a href="http://dev.portalnoar.com.br/quadra/?cat=casa">Casa</a></li>
				<li class="cat-item"><a href="http://dev.portalnoar.com.br/quadra/?cat=cidades">Cidades</a></li>
				<li class="cat-item"><a href="http://dev.portalnoar.com.br/quadra/?cat=comercial">Comercial</a></li>
				<li class="cat-item"><a href="http://dev.portalnoar.com.br/quadra/?cat=cultura">Cultura</a></li>
				<li class="cat-item"><a href="http://dev.portalnoar.com.br/quadra/?cat=eco-urbanismo">Eco-urbanismo</a></li>
				<li class="cat-item"><a href="http://dev.portalnoar.com.br/quadra/?cat=esporte">Esporte</a></li>
				<li class="cat-item"><a href="http://dev.portalnoar.com.br/quadra/?cat=eventos">Eventos</a></li>
				<li class="cat-item"><a href="http://dev.portalnoar.com.br/quadra/?cat=nacional">Nacional</a></li>
				<li class="cat-item"><a href="http://dev.portalnoar.com.br/quadra/?cat=opiniao">Opinião</a></li>
				<li class="cat-item"><a href="http://dev.portalnoar.com.br/quadra/?cat=politica">Política</a></li>
				<li class="cat-item"><a href="http://dev.portalnoar.com.br/quadra/?cat=tecnologia">Tecnologia</a>
				</li>
			</div>
		</div>-->

<!-- 		<div class="lista_categorias">
			<p class="titulo_cats_tags">Tags</p>
			<div class="all_tags">
				<?php
				//wp_tag_cloud( array('include'=>$all_tags,'smallest'=>14,'largest'=>14,'number'=>6,'unit'=>'px', 'orderby'=>'count', 'order'=>'DESC', 'format'=>'list'));
				?>
			</div>
		</div>

	</div> -->
</div>



 <?php
 	get_footer();
  ?>
