<div class="all_coluna2_principal">
		<h4 class="titulo_colula2_principal">Opinião</h4>
<?php
$args = array(
							'post_type' => 'opinioes',
							'posts_per_page'=>1,
							'orderby' => 'date',
							'order' => 'DESC',
						);
$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) : $query->the_post();
	$img = wp_get_attachment_image_src(get_post_thumbnail_id(), array(2000,2000));
 ?>
		<div class="img_opiniao" style="background-image:url(<?= $img[0] ?>)" ></div>
		<a href=""><p class="titulo_opiniao"><?= the_title(); ?></p></a>
		<p class="desc_opiniao"><?= get_the_excerpt(get_the_ID()); ?></p>
		<?php
		endwhile;
	endif;
	?>
</div>
