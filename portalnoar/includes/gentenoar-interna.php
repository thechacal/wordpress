			<div id="int_gentear_all_slider">

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

				<div class="int_gentenoar_item">
					<div class="int_bloco_gentear int_ga_l30xa100" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">

						<div class="int_gentear_desc_item">
							<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
							<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
							<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
						</div>

					</div>

					<div class="int_gentear_box30" >
						<div class="int_bloco_gentear int_ga_l20xa70" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">

							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>

						</div>

						<div class="int_bloco_gentear int_ga_l20xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">

						</div>
					</div>
					<div class="int_gentear_box20">

						<div class="int_bloco_gentear int_ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="int_bloco_gentear int_ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="int_bloco_gentear int_ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>

					</div>

				</div>
				<!-- fim item -->

				<!-- inicio item -->
				<div class="int_gentenoar_item">
					<div class="int_bloco_gentear int_ga_l30xa100" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
						<div class="int_gentear_desc_item">
							<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
							<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
							<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
						</div>
					</div>

					<div class="int_gentear_box20">

						<div class="int_bloco_gentear int_ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="int_bloco_gentear int_ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="int_bloco_gentear int_ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>

					</div>

					<div class="int_gentear_box30" >
						<div class="int_bloco_gentear int_ga_l20xa70" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>

						<div class="int_bloco_gentear int_ga_l20xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
					</div>

				</div>
				<!-- fim item -->

				<!-- inicio item -->
				<div class="int_gentenoar_item">
					<div class="int_gentear_box30" >
						<div class="int_bloco_gentear int_ga_l20xa70" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>

						<div class="int_bloco_gentear int_ga_l20xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
					</div>


					<div class="int_gentear_box20">

						<div class="int_bloco_gentear int_ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="int_bloco_gentear int_ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>
						<div class="int_bloco_gentear int_ga_l30xa30" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
							<div class="int_gentear_desc_item">
								<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
								<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
								<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
							</div>
						</div>

					</div>

					<div class="int_bloco_gentear int_ga_l30xa100" style="background-image:url(<?= $myarray['img'][$i-=1] ?>)">
						<div class="int_gentear_desc_item">
							<p class="int_gentear_desc_item_titulo"><?= $myarray['title'][$j-=1] ?></p>
							<p class="int_gentear_desc_item_comts"><i class="fa fa-comment-o" aria-hidden="true"></i> <?= $myarray['contWpFb'][$z-=1] ?></p>
							<p class="int_gentear_desc_item_desc"><?= $myarray['desc'][$k-=1] ?></p></a>
						</div>
					</div>

				</div>
				<!-- fim item -->

			</div>

				<div class="int_gentear_slide_p_const">

					<div id="int_gentear_slide_p_prev">
						<img src="<?php bloginfo('template_url') ?>/imgs/gentear_prev.png">
					</div>

					<div id="int_gentear_slide_p_next">
						<img src="<?php bloginfo('template_url') ?>/imgs/gentear_next.png">
					</div>

				</div>
