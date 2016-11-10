<div id="container_box_banner_topo" class="container container_box_banner_topo">
	<span class="fechar_banner_topo" id="box_banner_topo_fechar"></span>
	<div id="box_banner_topo" class="box_banner_topo">
		<!--<div class="banner_topo_expandi item_banner_topo" onclick="window.open('#');" style="background-image:url(<?//php bloginfo('template_url') ?>/imgs/bannertopo.png);">-->

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
				'meta_key' => 'local_do_anuncio',
				'orderby' => array( 'meta_value_num' => 'desc', 'date' => 'desc' ),
				'order' => 'desc',
				'meta_query' => array(
															array(
																			'key'     => 'local_do_anuncio',
																			'value'   => $value,
																			'compare' => '='
															),
											),
		);
		$query2 = new WP_Query( $args2 );
			if ( $query2->have_posts() ) :
				while ( $query2->have_posts() ) : $query2->the_post();
				$img2 = get_field('banner',get_the_ID());
				if(get_field('tipo_de_anuncio',get_the_ID())=='Super Banner'&&get_field('local_de_exibicao',get_the_ID())=='Topo do Site'){
					if(strtotime(get_field('hora_de_entrada',get_the_ID()))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada',get_the_ID())<=date("Ymd")&&(get_field('data_de_saida',get_the_ID())>date("Ymd")||strtotime(get_field('hora_de_saida',get_the_ID()))>=strtotime(date("H:i:s")))){
				 ?>
					<div class="item_banner_topo" onclick="window.open('<?= get_field('link',get_the_ID()) ?>');" style="background-image:url('<?= $img2['url'] ?>');"></div>
				<?php
					}
					$aux=TRUE;
				}
				endwhile;
			endif;
		 ?>
	</div>
</div>
<?php
if($aux){
	$tempo_fechar_slide = '8';
	$tempo_abrir_slide = '5000';
	echo "
	<script>
		$(document).ready(function(){

			$('#box_banner_topo_fechar').text(".$tempo_fechar_slide.");
			var tempo_total_fe = ".$tempo_fechar_slide.";

			setTimeout(
				function(){
				 	$('#container_box_banner_topo, #box_banner_topo').css({'max-height': '158px'});

				 	$('#container_box_banner_topo').css({'overflow':'visible'});

				 	 var inter = setInterval(
					 	function(){

					 		$('#box_banner_topo_fechar').text(tempo_total_fe);

					 		if(tempo_total_fe == 0){
					 			clearInterval(inter);

								$('#box_banner_topo_fechar').text('Fechar X');

								$('#box_banner_topo_fechar').click(function(){
										$('#container_box_banner_topo, #box_banner_topo').css({'max-height': '0'});
										$('#box_banner_topo_fechar').hide('slow');
								});
					 		}

					 		tempo_total_fe = tempo_total_fe-1;
					 }
				 	, 1000);


				}
			 , ".$tempo_abrir_slide.");

		});

		$(document).ready(function(){
			$('#box_banner_topo').cycle({
				fx:   		'scrollHorz',
				speed:  600,
				timeout: 4000,
				rev:true,
			});
			$('#box_banner_topo').css({'max-height': '0px'});
		});
	</script>
	";
}
 ?>
