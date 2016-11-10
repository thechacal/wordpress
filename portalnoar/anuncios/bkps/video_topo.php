	<div class="banner_video_topo">

		<span class="fechar_banner_video"></span>
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
				if(get_field('tipo_de_anuncio',get_the_ID())=='Video do Youtube'){
					if(strtotime(get_field('hora_de_entrada',get_the_ID()))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada',get_the_ID())<=date("Ymd")&&(get_field('data_de_saida',get_the_ID())>date("Ymd")||strtotime(get_field('hora_de_saida',get_the_ID()))>=strtotime(date("H:i:s")))){
						$link_do_youtube = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", get_field('video',get_the_ID()));
				 ?>
		<iframe width="100%" height="390" src="<?= $link_do_youtube ?>" frameborder="0" allowfullscreen></iframe>
		<?php
			}
			$aux=TRUE;
		}
		endwhile;
		endif;
		?>
	</div>
<?php
if($aux){
	$tempo_fechar_slide = '5';
	echo "
	<script>
		$(document).ready(function(){

			$('.fechar_banner_video').text(".$tempo_fechar_slide.");
			var tempo_total_fe = ".$tempo_fechar_slide.";


				 	 var inter = setInterval(
					 	function(){

					 		$('.fechar_banner_video').text(tempo_total_fe);

					 		if(tempo_total_fe == 0){
					 			clearInterval(inter);

								$('.fechar_banner_video').text('Fechar X');

								$('.fechar_banner_video').click(function(){
										$('.banner_video_topo').css({'max-height': '0', 'overflow':'hidden' });
										$('.fechar_banner_video').hide('slow');
								});
					 		}

					 		tempo_total_fe = tempo_total_fe-1;
					 }
				 	, 1000);


		});
	</script>
	";
}
 ?>
