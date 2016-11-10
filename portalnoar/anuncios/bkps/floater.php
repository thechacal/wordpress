	<?php
	$aux=FALSE;
	if($_SERVER ['REQUEST_URI']=='/'){
		$value = 'Capa Principal';
	}
	else {
		$value = str_replace("-"," ",str_replace("/","",$_SERVER ['REQUEST_URI']));
	}
	$args2 = array(
			'post_type' => 'anuncios',
			'posts_per_page'=>100,
			'meta_key' => 'capa_do_anuncio',
			'orderby' => array( 'meta_value_num' => 'desc', 'date' => 'desc' ),
			'order' => 'desc',
			'meta_query' => array(
														array(
																		'key'     => 'capa_do_anuncio',
																		'value'   => $value,
																		'compare' => '='
														),
										),
	);
	$query2 = new WP_Query( $args2 );
		if ( $query2->have_posts() ) :
			while ( $query2->have_posts() ) : $query2->the_post();
			$img2 = get_field('banner',get_the_ID());
			if(get_field('tipo_de_anuncio',get_the_ID())=='Banner Flutuante'){
				if(strtotime(get_field('hora_de_entrada',get_the_ID()))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada',get_the_ID())<=date("Ymd")&&(get_field('data_de_saida',get_the_ID())>date("Ymd")||strtotime(get_field('hora_de_saida',get_the_ID()))>=strtotime(date("H:i:s")))){
			 ?>
			 <div style="background-image:url('<?= $img2['url'] ?>')" class="banner_floater">
				 <span class="fechar_banner_floater">Fechar X</span>
		 	</div>
			<?php
				}
			$aux=TRUE;
			}
			endwhile;
			endif;
			?>


<?php
if($aux){
	$tempo_fechar_slide = '8';
	echo "
	<script>
		$(document).ready(function(){

				$('.fechar_banner_floater').click(function(){
						$('.banner_floater').css({'max-height': '0', 'overflow':'hidden' });
						$('.fechar_banner_floater').hide('slow');
				});

		});
	</script>
	";
}
 ?>
