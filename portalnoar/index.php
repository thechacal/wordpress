<?php
/**
 * The main template file
 *
 * @package portalnoar
 * @subpackage portalnoar
 * @since Portal no AR 1.0
 * Author: Beto Canuto [ Web Design / beto@quadradigital.com.br ], Douglas Boza [ Front-end / douglas@quadradigital.com.br ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
?>
<!--start  HEADER  -->
<?php get_header(); ?>
<!--end  HEADER  -->

<style type="text/css">
	.menu_pit_topo.fa{
		display: inline-block;
	}
	.box_pit_all{
		display: block;
	}
</style>

<script type="text/javascript">
	index = true;
</script>

<?php


include('anuncios/banner_topo.php');
$page = get_page_by_title('Capa principal');
$id = $page->ID;
if (get_field('ativar_capa_especial',$id)) {
	include('includes/capa_especial.php');
}

include('anuncios/lateral_200_446_topo.php');



 ?>

<section id="principal">
	<div class="container">

		<div class="principal_box1">
			<?php 
				include('anuncios/video_topo.php');
			 ?>
			<div class="noticia_principal">
				<?php
				$page = get_page_by_title('Capa principal');
				$id = $page->ID;
				$posts=get_field('manchete-seca',$id);
				if( $posts ):
					foreach( $posts as $post ):
						setup_postdata($post);
						$idpost = $post->ID;
				?>
				<h4 class="np_chapeu" ><a href="<?= getNews(get_field('chapeu_da_noticia',$id)); ?>"><?= get_field('chapeu_da_noticia',$id); ?></a></h4>
				<a class="np_titulo" href="<?php the_permalink(); ?>"><h1><?= the_title(); ?></h1></a>
				<p class="np_descricao"><?= get_field('sutia_da_noticia',$id); ?></p>
				<div class="np_img_mobile" style="background-image:url(<?php bloginfo('template_url') ?>/imgs/img_not1.jpg)"></div>
				<?php
					endforeach;
					wp_reset_postdata();
				endif;
				?>
				<div class="np_subs_box">

					<?php
					$posts=get_field('manchetes-relacionadas',$idpost);
					if( $posts ):
						foreach( $posts as $post ):
							setup_postdata($post);
					?>
        <a class="marcador_mais" href="<?php the_permalink(); ?>"><p><?= the_title(); ?></p></a>
			<?php
							endforeach;
						endif;
			?>

				</div>

			</div>

			<div class="coluna1_p">
				<?php
				$page = get_page_by_title('Capa principal');
				$id = $page->ID;
				$posts=get_field('grupo_noticias_destaque',$id);
				if( $posts ):
					foreach( $posts as $post ):
						setup_postdata($post);
						$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
				?>
				<div class="coluna1_p_not_hori">
					<p class="colun1_p_chapeu"><a href="<?= getNews(get_field('chapeu_da_noticia')); ?>"><?= get_field('chapeu_da_noticia'); ?></p></a>
					<h3><a href="<?php the_permalink(); ?>"><?= the_title(); ?></a></h3>
					<img src="<?= $img[0] ?>">
					<p><?= get_field('sutia_da_noticia',$id); ?></p>
				</div>
				<?php
					endforeach;
					wp_reset_postdata();
				endif;
				$posts=get_field('grupo_noticias',$id);
				if( $posts ):
					foreach( $posts as $post ):
						setup_postdata($post);
				?>
				<a class="marcador_mais coluna1_p_noticia_rel" href="<?php the_permalink(); ?>"><p><?= the_title(); ?></p></a>
				<?php
					endforeach;
					wp_reset_postdata();
				endif;
				?>
				<div class="coluna1_p_3col_all">
					<?php
					$posts=get_field('grupo_noticias_horizontal',$id);
					if( $posts ):
						foreach( $posts as $post ):
							setup_postdata($post);
							$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
					?>
					<div class="coluna1_p_box">
						<div style="background-image:url(<?= $img[0] ?>)"></div>
						<p><a href="<?php the_permalink(); ?>"><?= the_title(); ?></a></p>
					</div>
					<?php
						endforeach;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>

			<div class="slideshow_p">

				<div class="slideshow_p_const">

					<div id="slideshow_p_prev">
						<img src="<?php bloginfo('template_url') ?>/imgs/slideshow_p_prev.png">
					</div>

					<div id="slideshow_p_next">
						<img src="<?php bloginfo('template_url') ?>/imgs/slideshow_p_next.png">
					</div>

				</div>

				<div id="slideshow_p_all">
					<?php
					$posts=get_field('slideshow_manchetes',$id);
					if( $posts ):
						foreach( $posts as $post ):
							setup_postdata($post);
							$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
					?>
					<div class="slideshow_p_item">
						<div class="slideshow_p_item_img" style="background-image:url('<?= $img[0] ?>')"></div>
						<h3 class="slideshow_p_item_title"><a href="<?php the_permalink(); ?>"><?= the_title(); ?></a></h3>
						<p class="slideshow_p_item_desc"><?= get_the_excerpt(get_the_ID()); ?></p>
					</div>
					<?php
						endforeach;
						wp_reset_postdata();
					endif;
					?>
				</div>

			</div>

		</div>

		<div class="principal_box2">
				<?php
				include('anuncios/floater.php');



				$page = get_page_by_title('Capa principal');
				$id = $page->ID;
				switch (get_field('modelo_de_exibição',$id)) {
					case "Modelo 1":
							include('includes/plantaoredacao.php');
							?>
							<div class="esp_box_wid"></div>
							<?php
							include('includes/opiniao.php');
							?>
							<div class="esp_box_wid"></div>
							<?php
							break;
					case "Modelo 2":
							include('includes/box6noticias.php');
							?>
							<div class="esp_box_wid"></div>
							<?php
							include('includes/opiniao.php');
							?>
							<div class="esp_box_wid"></div>
							<?php
							break;
					case "Modelo 3":
							include('includes/painel_leitor.php');
							?>
							<div class="esp_box_wid"></div>
							<?php
									include('includes/tvnoar.php');
							?>
									<div class="esp_box_wid"></div>
							<?php
									include('includes/opiniao.php');
							?>
									<div class="esp_box_wid"></div>
							<?php
					}
				 ?>


				 			<?php
				 				$id_mini = 1;
								include('anuncios/mini_300_100.php');
							?>


		</div>


	</div>
</section>



<section id="colunistas_blogs">

	<div class="box_pit_all box_pit_colunistas">
		<div class="faixa_menu_pit_colunistas"></div>

		<div class="menu_pit_colunista_box">
			<p class="titulo_colunista_menu_pit">colunistas</p>

			<div class="menu_pit_colunista_item">
			<?php
			$args = array(
					'post_type' => 'post',
					'posts_per_page'=>10,
					'orderby' => 'date',
					'order' => 'DESC'
			);
			$myposts = get_posts( $args );
			foreach ( $myposts as $post ){
				setup_postdata( $post );
				$idsite = $post->ID;
				$colunista=get_field('autor_fonte_noticia',get_the_ID());
			 ?>
					<a href="<?= the_permalink() ?>"><li><?= $colunista ?></li></a>
			<?php
			}
			 ?>
			</div>


		</div>

		<div class="menu_pit_colunista_box">
			<p class="titulo_colunista_menu_pit">blogs</p>

			<div class="menu_pit_colunista_item">

				<?php
				$args = array(
											'post_type' => 'blogueiros',
											'posts_per_page'=>-1,
											'orderby' => 'date',
											'order' => 'DESC',
										);
										$query = new WP_Query( $args );
										if ( $query->have_posts() ) :
											while ( $query->have_posts() ) : $query->the_post();
												$nome=get_field('nome',get_the_ID());
												$link_do_blog=get_field('link_do_blog',get_the_ID());
				 ?>
				<a target="_blank" href="<?= $link_do_blog ?>"><li><?= $nome ?></li></a>
				<?php
											endwhile;
										endif;
				 ?>

			</div>


		</div>



	</div>

	<div class="container">
		<!-- <i class="fa fa-bars menu_pit_colunistas menu_pit_all" aria-hidden="true"></i> -->
		<div class="cb_box">
			<h1>colunistas</h1>

			<div class="cb_itens_box">

				<?php
				$args = array(
											'number' => 4,
											'orderby'=> 'last_updated',
											'order' => 'DESC',
				);
				$sites = get_sites( $args );
				foreach ( $sites as $site ) {
			    switch_to_blog( $site->blog_id );
					$args = array(
	  					'post_type' => 'post',
	            		'posts_per_page'=>1,
	  					'orderby' => 'date',
	  					'order' => 'DESC'
	  			);
					$myposts = get_posts( $args );
					foreach ( $myposts as $post ){
						setup_postdata( $post );
						$idsite = $post->ID;
						$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
				 ?>

				<div class="item_cb">
					<div style="background-image:url(<?= $img[0] ?>)" class="item_cb_img">

					</div>
					<div class="item_cb_text">
						<p class="item_cb_text_titulo"><?= ($site->path)=='/' ? get_field('autor_fonte_noticia',$idsite) : 'Blog '.str_replace("/"," ",$site->path); ?></p>
						<p class="item_cb_text_desc"><a href="<?= the_permalink($idsite) ?>"><?= get_the_title($idsite) ?></a></p>
					</div>
				</div>

				<?php
					}
					restore_current_blog(1);
				}
				//echo get_current_blog_id();
			 	?>

			</div>


		</div>

		<div class="cb_box">
			<h1>blogueiros</h1>

			<div class="cb_itens_box">

				<?php
				$args = array(
											'number' => 4,
											'orderby'=> 'last_updated',
											'order' => 'DESC',
											'site__not_in' => 1
				);
				$sites = get_sites( $args );
				foreach ( $sites as $site ) {
			    switch_to_blog( $site->blog_id );
					$args = array(
	  					'post_type' => 'post',
	            'posts_per_page'=>1,
	  					'orderby' => 'date',
	  					'order' => 'DESC'
	  			);
					$myposts = get_posts( $args );
					foreach ( $myposts as $post ){
						setup_postdata( $post );
						$idsite = $post->ID;
						$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
				 ?>

				<div class="item_cb">
					<div style="background-image:url(<?= $img[0] ?>)" class="item_cb_img">

					</div>

					<div class="item_cb_text">
						<p class="item_cb_text_titulo"><?= str_replace("/"," ",$site->path) ?></p>
						<p class="item_cb_text_desc"><a href="<?= the_permalink($idsite) ?>"><?= get_the_title($idsite) ?></a></p>
					</div>
				</div>

				<?php
					}
					restore_current_blog(1);
				}
				//echo get_current_blog_id();
			 	?>

			</div>

		</div>

	</div>
</section>

<?php
include('anuncios/banner_meio.php');


include('anuncios/lateral_200_446.php');
?>

<section id="gentear">
	<div class="box_pit_all box_pit_gentear">
		<div class="faixa_menu_pit_gentear"></div>
		<form action="<?= get_site_url(); ?>/noticias" class="form_busca_celebridade">
			<input type="text" name="busca" placeholder="BUSCAR CELEBRIDADE">
		</form>
		<div class="menu_pit_gentear_box">
			<p class="titulo_gentear_menu_pit">Editoria</p>

			<div class="menu_pit_gentear_item">

				<?php
						$args = array('child_of'=>28974,'hide_empty'=>0);
						$my_categories = get_categories($args);
				?>
				<?php foreach( $my_categories as $category ): ?>
				 	<a href="<?= 'http://dev.portalnoar.com.br/noticias/?cat='.$category->slug ?>"><li><?php echo $category->name;?></li></a>
				<?php endforeach;
				?>

			</div>


		</div>

		<div class="menu_pit_gentear_box">
			<p class="titulo_gentear_menu_pit">mais faladas</p>

			<div class="menu_pit_gentear_item">

				<?php
				$page = get_page_by_title('Capa principal');
				$id = $page->ID;
				$posts=get_field('manchetes_gente_no_ar',$id);
				if( $posts ):
					foreach( $posts as $post ):
						setup_postdata($post);
						$posttags = get_the_tags();
						if ($posttags) {
								foreach($posttags as $tag) {
									$all_tags[] = $tag->term_id;
								}
						}
					endforeach;
				endif;
				wp_tag_cloud( array('include'=>$all_tags,'smallest'=>14,'largest'=>14,'number'=>6,'unit'=>'px', 'orderby'=>'count', 'order'=>'DESC', 'format'=>'list'));
				 ?>



			</div>


		</div>

	</div>

	<div class="container">
		<!-- <i class="fa fa-bars menu_pit_gentear menu_pit_all" aria-hidden="true"></i> -->
		<div class="gentear_slide" style="border-top: 1px solid <?= getColor("Gente no ar") ?> !important">
			<h1 class="titulo_gentear" style="border-color: <?= getColor("Gente no ar") ?> !important; color: <?= getColor("Gente no ar") ?> !important; ">gente no ar</h1>

			<div id="gentear_all_slider_mobile">

					<div class="bloco_gentear_mobile" style="background-image:url(<?php bloginfo('template_url') ?>/imgs/img_not1.jpg)">
						<div class="gentear_desc_item">
							<p class="gentear_desc_item_titulo">LOREM IPSUM</p>
							<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> 20</p>
							<p class="gentear_desc_item_desc"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
						</div>
					</div>
					<!-- <div class="bloco_gentear_mobile" style="background-image:url(<?php bloginfo('template_url') ?>/imgs/img_not1.jpg)">
						<div class="gentear_desc_item">
							<p class="gentear_desc_item_titulo">LOREM IPSUM</p>
							<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> 20</p>
							<p class="gentear_desc_item_desc"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
						</div>
					</div> -->
			</div>

			<div id="gentear_all_slider">

				<!-- inicio item -->

					<?php
					$page = get_page_by_title('Capa principal');
					$id = $page->ID;
					$posts=get_field('manchetes_gente_no_ar',$id);
					if( $posts ):
						foreach( $posts as $post ):
							setup_postdata($post);
							$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
							$myarray['img'][] = $img[0];
							$myarray['title'][] = get_the_title();
							$myarray['desc'][] = get_field('descricao_da_imagem');
							$contWpFb = get_post_meta('_contWpFb');
							$myarray['contWpFb'][] = $contWpFb[0];

						endforeach;
						wp_reset_postdata();
					endif;
					$i=sizeof($myarray['img']);
					$j=sizeof($myarray['title']);
					$k=sizeof($myarray['desc']);
					$z=sizeof($myarray['contWpFb']);
					?>
				<div class="gentenoar_item">
					<div class="bloco_gentear ga_l30xa100" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">

						<div class="gentear_desc_item">
							<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
							<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
							<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
						</div>

					</div>

					<div class="gentear_box30" >
						<div class="bloco_gentear ga_l20xa70" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">

							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p>
							</div>

						</div>

						<div class="bloco_gentear ga_l20xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p>
							</div>
						</div>
					</div>

					<div class="gentear_box20">

						<div class="bloco_gentear ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="bloco_gentear ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="bloco_gentear ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
					</div>

				</div>

				<div class="gentenoar_item">
					<div class="gentear_box20">

						<div class="bloco_gentear ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="bloco_gentear ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="bloco_gentear ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>

					</div>

					<div class="bloco_gentear ga_l30xa100" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">

						<div class="gentear_desc_item">
							<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
							<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
							<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
						</div>

					</div>

					<div class="gentear_box30" >
						<div class="bloco_gentear ga_l20xa70" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">

							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p>
							</div>

						</div>

						<div class="bloco_gentear ga_l20xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p>
							</div>
						</div>
					</div>

				</div>

				<div class="gentenoar_item">

					<div class="gentear_box30" >
						<div class="bloco_gentear ga_l20xa70" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">

							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p>
							</div>

						</div>

						<div class="bloco_gentear ga_l20xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p>
							</div>
						</div>
					</div>

					<div class="gentear_box20">

						<div class="bloco_gentear ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="bloco_gentear ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="bloco_gentear ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="gentear_desc_item">
								<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>

					</div>

					<div class="bloco_gentear ga_l30xa100" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">

						<div class="gentear_desc_item">
							<p class="gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
							<p class="gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
							<p class="gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
						</div>

					</div>

				</div>

			</div>

				<div class="gentear_slide_p_const">

					<div id="gentear_slide_p_prev">
						<img src="<?php bloginfo('template_url') ?>/imgs/gentear_prev.png">
					</div>

					<div id="gentear_slide_p_next">
						<img src="<?php bloginfo('template_url') ?>/imgs/gentear_next.png">
					</div>

				</div>

		</div>
		<div class="gentear_ultimas">
			<p class="titulo_gentear_ultimas" style="border-bottom: 1px solid <?= getColor("Gente no ar") ?>; color: <?= getColor("Gente no ar") ?> !important; ">top celebridades</p>

			<div class="gentear_all_ultimas">
				<?php
					//as últimas postagens ( data decrescente )
					//for ($i = sizeof($myarray['title'])-1; $i >= sizeof($myarray['title'])-5; $i--) {
					//as últimas postagens ( data crescente )
					for ($i = 0; $i < 5; $i++) {
				 ?>
				<div class="gentear_ultimas_item">
					<div class="gentear_ultimas_item_img">
						<img src="<?php bloginfo('template_url') ?>/imgs/marc_gentear.png">
					</div>
					<div class="gentear_ultimas_item_text">
						<a href=""><p class="gentear_ultimas_item_titulo"><?= $myarray['title'][$i] ?></p></a>
						<!-- <p class="gentear_ultimas_item_desc"><?= $myarray['desc'][$i] ?></p> -->
					</div>
				</div>
				<?php
					}
				 ?>
			</div>
			<?php
			$id_mini = 2;
			include('anuncios/mini_300_100.php');
			?>
		</div>

	</div>
</section>

<?php



			    if($_COOKIE['editoria1'] == ""){
			    		$cate_cookie1_name = 'Esportes';
						$cate_cookie2_name = 'Brasil e Mundo';
						$cate_cookie3_name = 'Lazer';
			    }else{
						$cate_cookie1_name = $_COOKIE['editoria1'];
						$cate_cookie2_name = $_COOKIE['editoria2'];
						$cate_cookie3_name = $_COOKIE['editoria3'];
			    }


				$cate_cookie1 = str_replace(' ','', $cate_cookie1_name);
				$cate_cookie2 = str_replace(' ','', $cate_cookie2_name);
				$cate_cookie3 = str_replace(' ','', $cate_cookie3_name);

				$cate_cookie1_id = get_cat_ID($cate_cookie1_name);
				$cate_cookie2_id = get_cat_ID($cate_cookie2_name);
				$cate_cookie3_id = get_cat_ID($cate_cookie3_name);

				$args1 = array('parent' => 0, 'child_of' => get_cat_ID('post'), 'exclude'=>' '.$cate_cookie1_id.', '.$cate_cookie2_id.', '.$cate_cookie3_id.' ', 'hide_empty'=>FALSE);
				$categories1 = get_categories( $args1 );


				$args2 = array('parent' => 0, 'child_of' => get_cat_ID('post'), 'include'=>' '.$cate_cookie1_id.', '.$cate_cookie2_id.', '.$cate_cookie3_id, 'hide_empty'=>FALSE);
				$categories2 = get_categories( $args2 );

				  // print_r($categories2);




				  // echo "   cate_cookie1_id = ".$cate_cookie1_id;
				  // echo "   cate_cookie2_id = ".$cate_cookie2_id;
				  // echo "   cate_cookie3_id = ".$cate_cookie3_id;

				for ($i=0; $i < count($categories2); $i++) {
					if($categories2[$i]->cat_ID == $cate_cookie1_id){
						$categories[0] = $categories2[$i];
					}
				}
				for ($i=0; $i < count($categories2); $i++) {
					if($categories2[$i]->cat_ID == $cate_cookie2_id){
						$categories[1] = $categories2[$i];
					}
				}
				for ($i=0; $i < count($categories2); $i++) {
					if($categories2[$i]->cat_ID == $cate_cookie3_id){
						$categories[2] = $categories2[$i];
					}
				}

				 // print_r($categories);

				for ($i=0; $i < count($categories1); $i++) {
						$categories[$i+3] = $categories1[$i];
				}


 ?>
<section id="editoriais">
	<div class="box_pit_all box_pit_editoriais">

			<form action="">

				<p class="select_editorial_menu_pit select_editorial1">coluna 1</p>
				<select class="select_editoria select_editoria_item1" name="coluna1_editoria">
						<?php

							foreach($categories as $category) {
								$categoria_value = str_replace(' ','', $category->name);
						 ?>

						 <option <?php if($categoria_value == $cate_cookie1 ){echo"selected";} ?> <?php if(($categoria_value == $cate_cookie2 ) || ($categoria_value == $cate_cookie3 )){echo"disabled";} ?> value="<?= $categoria_value ?>"><?= $category->name ?></option>

						 <?php
						 	}
						  ?>
				</select>

				<p class="select_editorial_menu_pit select_editorial2">coluna 2</p>
				<select class="select_editoria select_editoria_item2" name="coluna2_editoria">
						<?php

							foreach($categories as $category) {
								$categoria_value = str_replace(' ','', $category->name);

						 ?>

						 <option  <?php if($categoria_value == $cate_cookie2 ){echo"selected";} ?> <?php if(($categoria_value == $cate_cookie1 ) || ($categoria_value == $cate_cookie3 )){echo"disabled";} ?>  value="<?= $categoria_value?>"><?= $category->name ?></option>

						 <?php
						 	}
						  ?>
				</select>

				<p class="select_editorial_menu_pit select_editorial3">coluna 3</p>
				<select class="select_editoria select_editoria_item3" name="coluna3_editoria">
						<?php

							foreach($categories as $category) {
								$categoria_value = str_replace(' ','', $category->name);

						 ?>

						 <option  <?php if($categoria_value == $cate_cookie3 ){echo"selected";} ?> <?php if(($categoria_value == $cate_cookie1 ) || ($categoria_value == $cate_cookie2 )){echo"disabled";} ?>  value="<?= $categoria_value ?>"><?= $category->name ?></option>

						 <?php
						 	}
						  ?>
				</select>

			</form>


			<div class="div_all_parse_editorial">
				<i id="next_editorial" class="fa fa-angle-left" aria-hidden="true"></i>
				<i id="prev_editorial" class="fa fa-angle-right" aria-hidden="true"></i>
			</div>

	</div>


	<div class="container">
		<!-- <i class="fa fa-bars menu_pit_editoriais menu_pit_all" aria-hidden="true"></i> -->

		<div id="editorial_all_id" class="editorial_all">
				<?php
				// $args = array('child_of' => get_cat_ID('post'), 'hide_empty'=>FALSE);
				// $categories = get_categories( $args );
				$teste =0;
				$posi_item = 0;
				foreach($categories as $category) {
					$teste = $teste +1;
					$posi_item = $posi_item+1;

					if($teste == 1){
						echo "<li>";
						$posi_item = 1;
					}

					?>

					<div style="color: <?= getColor($category->name) ?> !important; " class="item_editorial posi_item_edit_<?= $posi_item ?> cate_<?php echo str_replace(' ','', $category->name); ?>">
						<p style="border-bottom: 1px solid <?= getColor($category->name) ?>; color: <?= getColor($category->name) ?> !important; " class="titulo_editorialin"><?= $category->name?></p>
							<?php
	        $args = array(
	  					'post_type' => 'post',
	            'posts_per_page'=>5,
							'cat' => $category->cat_ID,
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
					foreach ( $myposts as $post ):
						setup_postdata( $post );
						$id = $post->ID;
				?>
							<div class="editorial_subitem">
								<div class="editorial_subitem_img">
									<img src="<?php bloginfo('template_url') ?>/imgs/marc_tvnoar.png">
								</div>
								<div class="editorial_subitem_texto">
									<a href="<?= the_permalink(); ?>"><p class="editorial_subitem_titulo"><?= the_title();?></p></a>
									<p class="editorial_subitem_desc"><?//= get_the_excerpt(get_the_ID()) ?></p>
								</div>
							</div>

							<?php
								endforeach;
								wp_reset_postdata();
							?>

					</div>
				<?php
					if($teste == 3){
						echo "</li>";
						$teste = 0;
					}

				}
					wp_reset_postdata();
				?>
		</div>
	</div>
</section>

<section id="agendacultural">
	<div class="box_pit_all box_pit_agendacultural">
		<div class="faixa_menu_pit_agendacultural"></div>
		<form action="<?= get_site_url(); ?>/noticias" class="form_busca_evento">
				<input type="text" name="busca" placeholder="BUSCAR EVENTO">
		</form>
		<div class="menu_pit_agendacultural_box">
			<p class="titulo_agendacultural_menu_pit">Categorias</p>

			<div class="menu_pit_agendacultural_item">

				<?php
						$args = array('child_of'=>28984,'hide_empty'=>0);
						$my_categories = get_categories($args);
				?>
				<?php foreach( $my_categories as $category ): ?>
				 	<a href="<?= 'http://dev.portalnoar.com.br/noticias/?cat='.$category->slug ?>"><li><?php echo $category->name;?></li></a>
				<?php endforeach;
				?>

			</div>


		</div>

		<div class="menu_pit_agendacultural_box">
			<p class="titulo_agendacultural_menu_pit">Mais Agitadas</p>

			<div class="menu_pit_agendacultural_item">

				<?php
				$page = get_page_by_title('Capa principal');
				$id = $page->ID;
				$posts=get_field('manchetes_agenda_cultural_destaque',$id);
				if( $posts ):
					unset($all_tags);
					foreach( $posts as $post ):
						setup_postdata($post);
						$posttags = get_the_tags();
						if ($posttags) {
								foreach($posttags as $tag) {
									$all_tags[] = $tag->term_id;
								}
						}
					endforeach;
				endif;
				wp_tag_cloud( array('include'=>$all_tags,'smallest'=>14,'largest'=>14,'number'=>6,'unit'=>'px', 'orderby'=>'count', 'order'=>'DESC', 'format'=>'list'));
				?>

			</div>


		</div>
	</div>

	<div class="container">
		<h1 class="titulo_p_agenda">agenda cultural</h1>
		<div class="agenda_box_all">

			<div class="agenda_box">

				<?php
				$page = get_page_by_title('Capa principal');
				$id = $page->ID;
				$posts=get_field('manchetes_agenda_cultural',$id);
				if( $posts ):
					foreach( $posts as $post ):
						setup_postdata($post);
						$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
				?>

				<div class="agenda_subitem">
					<div class="agenda_subitem_img">
						<img src="<?php bloginfo('template_url') ?>/imgs/marc_agenda.png">
					</div>
					<div class="agenda_subitem_texto">
						<a href="<?= the_permalink(); ?>"><p class="agenda_subitem_titulo"><?= the_title(); ?></p></a>
						<p class="agenda_subitem_desc"><?//= get_field('descrição_do_evento') ?></p>
					</div>
				</div>

				<?php
					endforeach;
				endif;
				?>

			</div>

			<?php
			$page = get_page_by_title('Capa principal');
			$id = $page->ID;
			$posts=get_field('manchetes_agenda_cultural_destaque',$id);
			if( $posts ):
				foreach( $posts as $post ):
					setup_postdata($post);
					$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
			?>

			<div class="agenda_box">

				<div class="agenda_box_img" style="background-image: url('<?= $img[0] ?>')"></div>
				<div class="agenda_box_text">
					<p class="data_agenda"><?= date('d \/\ m',strtotime(get_field('data'))); ?></p>
					<a href=""><p class="titulo_agenda"><?= the_title() ?></p></a>
					<p class="desc_agenda"><?//= get_field('descrição_do_evento') ?></p>
				</div>

			</div>
			<?php
				endforeach;
			endif;
			?>

		</div>
	</div>

</section>

<section id="tvnoarin">
	<div class="box_pit_all box_pit_tvnoarin">
		<div class="box_pit_all box_pit_tvnoarin">
			<div class="faixa_menu_pit_tvnoarin"></div>
			<form action="<?= get_site_url(); ?>/noticias" class="form_busca_evento">
					<input type="text" name="busca" placeholder="BUSCAR VÍDEO">
			</form>
		<div class="menu_pit_tvnoarin_box">
			<p class="titulo_tvnoarin_menu_pit">mais comentadas</p>

			<div class="menu_pit_tvnoarin_item">

				<?php
				$args = array(
											'post_type' => 'tvnoar',
											'posts_per_page'=>5,
											'meta_key' => '_contWpFb',
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
																										'key'     => '_contWpFb',
																						),
																		),
										);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						$contWpFb=get_post_meta(get_the_ID(),'_contWpFb');
				 ?>
					<a href="<?= the_permalink(); ?>"><li><?= get_the_title(get_the_ID())." (".$contWpFb[0].")"; ?></li></a>
					<?php
					endwhile;
				endif;
				?>

			</div>


		</div>

		<div class="menu_pit_tvnoarin_box">
			<p class="titulo_tvnoarin_menu_pit">mais vistas</p>

			<div class="menu_pit_tvnoarin_item">
					<?php
					$args = array(
												'post_type' => 'tvnoar',
												'posts_per_page'=>5,
												'meta_key' => '_contViewsTv',
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
																											'key'     => '_contViewsTv',
																							),
																			),
											);
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) : $query->the_post();
							$contViews=get_post_meta(get_the_ID(),'_contViewsTv');
					 ?>
						<a href="<?= the_permalink(); ?>"><li><?= get_the_title(get_the_ID())." (".$contViews[0].")"; ?></li></a>
						<?php
						endwhile;
					endif;
					?>
			</div>


		</div>
	</div>
	</div>

	<div class="container">
			<h1 class="tvnoarin_titulo">tv no ar</h1>
			<div class="tvnoar_boxall">
				<?php
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
				<div class="tvnoarin_box1">
						<iframe width="100%" height="250" src="<?= $link_do_youtube ?>" frameborder="0" allowfullscreen></iframe>
						<a href="<?= the_permalink() ?>"><p class="tvnoarin_box1_titulo"><?= $titulo ?></p></a>
				</div>
							<?php
									break;
								endwhile;
							endif;
							?>
					<div class="tvnoarin_box2">
						<?php
						$args = array(
								'post_type' => 'tvnoar',
								'posts_per_page' => 2,
								'post__not_in' => $excluir,
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
								$titulo = cutText(get_the_title(get_the_ID()),30);
								$descricao_do_video = cutText(get_field('descricao_do_video',get_the_ID()),30);
								$link_do_youtube = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", get_field('link_do_youtube',get_the_ID()));
						?>
								<div class="video_div_all">
										<div class="video_div_tvnoar_text">
											<a href="<?= the_permalink() ?>"><p class="subtitulo_tvnoarin"><?= $titulo ?></p></a>
											<p class="subdesc_tvnoarin"><?= $descricao_do_video ?></p>
										</div>
										<div class="video_div_tvnoar_frame">
												<iframe width="100%" height="100" src="<?= $link_do_youtube ?>" frameborder="0" allowfullscreen></iframe>
										</div>
							 </div>
			<?php
							endwhile;
						endif;
			 ?>
							 <div class="tvnoarin_lista_posts">
								 <?php
								$args = array(
										'post_type' => 'tvnoar',
										'posts_per_page' => 2,
										'post__not_in' => $excluir,
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
										$titulo = cutText(get_the_title(get_the_ID()),25);
										$descricao_do_video = cutText(get_field('descricao_do_video',get_the_ID()),25);
										$link_do_youtube = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", get_field('link_do_youtube',get_the_ID()));
								?>

									 <div class="tvnoar_subitem">
											 <div class="tvnoar_subitem_img">
												 <img src="<?php bloginfo('template_url') ?>/imgs/marc_tvnoar.png">
											 </div>
											 <div class="tvnoar_subitem_texto">
												 <a href="<?= the_permalink() ?>"><p class="tvnoar_subitem_titulo"><?= $titulo ?></p></a>
												 <p class="tvnoar_subitem_desc"><?= $descricao_do_video ?></p>
											 </div>
									 </div>
									 <?php
						 							endwhile;
						 						endif;
						 			 ?>
							</div>

					</div>
			</div>
	</div>
</section>




<?php
	include('includes/mais_lidas_comentadas.php')

 ?>



<section id="galerianoar">
	<div class="container">

		<div class="gentenoar_titulos">
			<h1 class="galerianoar_titulo">galeria no ar</h1>
			<h1 class="contador_slide"><span class="slide_atual_gente">1</span> de <span class="slide_total_gente"></span></h1>
		</div>

		<div id="galerianoar_all">
			<?php
		 $args = array(
				 'post_type' => 'galerianoar',
				 'posts_per_page' => 50,
				 'orderby' => 'date',
				 'order' => 'DESC',
		 );
		 $query = new WP_Query( $args );
		 if ( $query->have_posts() ) :
			 while ( $query->have_posts() ) : $query->the_post();
			  $imagem = get_field('imagem',get_the_ID());
		 ?>
			<div style="background-image:url(<?= $imagem['url'] ?>)" class="item_galerianoar">
				<p class="gentenoar_barra"><a href=""><?= the_title() ?></a></p>
			</div>
			<?php
				endwhile;
			endif;
			?>
		</div>

		<div class="galerianoar_slide_p_const">

			<div id="galerianoar_slide_p_prev">
				<img src="<?php bloginfo('template_url') ?>/imgs/slideshow_p_prev.png">
			</div>

			<div id="galerianoar_slide_p_next">
				<img src="<?php bloginfo('template_url') ?>/imgs/slideshow_p_next.png">
			</div>

		</div>

	</div>
</section>




<!--start  FOOTER  -->
<?php get_footer(); ?>
<!--end  FOOTER  -->
