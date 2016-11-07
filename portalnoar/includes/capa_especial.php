<?php
$page = get_page_by_title('Capa principal');
$id = $page->ID;
$bg=get_field('imagem_de_fundo',$id);
?>

<section style="background-image:url(<?= $bg['url'] ?>)" id="capa_especial">

	<div class="container">
		<div class="box_capa_esp_ab">
				<div class="capa_esp_box1">
					<p class="titulo_capa_esp"><a href="<?= getNews(get_field('titulo_da_capa_especial',$id)); ?>"><?= get_field('titulo_da_capa_especial',$id) ?></a></p>

					<div class="slide_box1_capa_esp">


							<div class="slideshow_capa_esp_const">
								<div id="slideshow_capa_esp_prev">
									<img src="<?php bloginfo('template_url') ?>/imgs/slideshow_p_prev.png">
								</div>
								<div id="slideshow_capa_esp_next">
									<img src="<?php bloginfo('template_url') ?>/imgs/slideshow_p_next.png">
								</div>
							</div>

							<div id="slideshow_capa_esp_all">

								<?php
								$posts=get_field('manchete_seca_capa_especial',$id);
								if( $posts ):
									foreach( $posts as $post ):
										setup_postdata($post);
										$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
								?>
								<div>
									<div style="background-image:url('<?= $img[0] ?>')" class="slideshow_capa_esp_item"></div>
									<div class="all_text_slide_capa_esp">
										<a href="<?= the_permalink() ?>"><p class="titulo_p_capa_esp"><?= the_title() ?></p></a>
										<p class="desc_p_capa_esp"><?= get_the_excerpt(); ?></p>
									</div>
								</div>

								<?php
									endforeach;
									wp_reset_postdata();
								endif;
								?>

							</div>




					</div>


				</div>
				<div class="capa_esp_box2">

					<?php
					$aux=TRUE;
					$posts=get_field('manchetes_secundarias_linha_1',$id);
					if( $posts ):
						foreach( $posts as $post ):
							setup_postdata($post);
							$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
							if($aux){
					?>
					<div class="post_top_capa_esp">
						<p class="chapeu_capa_esp"><a href="<?= getNews(get_field('chapeu_da_noticia')); ?>"><?= get_field('chapeu_da_noticia'); ?></a></p>
						<a href="<?= the_permalink() ?>"><p class="tituloo_post_capa_esp"><?= the_title(); ?></p></a>
						<div class="img_desc_post_capa_esp">
							<div class="box_imgce" style="background-image:url('<?= $img[0] ?>')" ></div>
							<p class="desc_post_capa_esp"><?= get_field('sutia_da_noticia'); ?></p>
						</div>
					</div>

					<?php
					$aux=FALSE;
					}else{
					?>
					<div class="post_top_capa_esp">
						<p class="chapeu_capa_esp"><?= get_field('chapeu_da_noticia'); ?></p>
						<a href="<?= the_permalink() ?>"><p class="tituloo_post_capa_esp"><?= the_title(); ?></p></a>
						<div class="sub_post_capa_esp">
							<p><?= get_field('sutia_da_noticia'); ?></p>
						</div>
					</div>

					<?php
					}
						endforeach;
						wp_reset_postdata();
					endif;
					?>

					<div class="box3_post_capa_esp">
						<?php
						$posts=get_field('manchetes_secundarias_linha_2',$id);
						if( $posts ):
							foreach( $posts as $post ):
								setup_postdata($post);
								$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
						?>
						<div class="post_box3_ce">
							<div style="background-image:url('<?= $img[0] ?>')" ></div>
							<a href="<?= the_permalink() ?>"><p><?= the_title(); ?></p></a>
						</div>
						<?php
							endforeach;
							wp_reset_postdata();
						endif;
						?>
					</div>

				</div>
		</div>
	</div>

</section>
