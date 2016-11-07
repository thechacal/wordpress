
<div class="all_coluna2_principal">
	<?php
	$page = get_page_by_title('Capa principal');
	$id = $page->ID;
	$posts=get_field('manchetes_com_imagens',$id);
	if( $posts ):
		foreach( $posts as $post ):
			setup_postdata($post);
			$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
	?>
			<div class="bo6_notbig">
				<div class="bo6_notbig_img" style="background-image:url(<?= $img[0] ?>)"></div>
				<div class="bo6_notbig_text">
					<p class="bo6_notbig_titulo" ><?= the_title(); ?></p>
					<p class="bo6_notbig_desc" ></p>
				</div>
			</div>
			<?php
				endforeach;
				wp_reset_postdata();
			endif;
			$page = get_page_by_title('Capa principal');
			$id = $page->ID;
			$posts=get_field('manchetes_sem_imagens',$id);
			if( $posts ):
				foreach( $posts as $post ):
					setup_postdata($post);
			?>

			<div class="bo6_not_subitem">
						<div class="bo6_not_subitem_img">
							<img src="http://dev.portalnoar.com.br/wp-content/themes/portalnoar/imgs/sim_ultimas_not.png">
						</div>
						<div class="bo6_not_subitem_texto">
							<a href=""><p class="bo6_not_subitem_titulo"><?= the_title(); ?></p></a>
							<p class="bo6_not_subitem_desc"></p>
						</div>
			</div>


			<?php
				endforeach;
				wp_reset_postdata();
			endif;
			?>


</div>
