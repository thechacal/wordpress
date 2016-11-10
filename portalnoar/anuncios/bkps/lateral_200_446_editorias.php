	<div class="all_banner_laterais all_banner_lateral_200_446 all_fechar_lateral_meio">
		<span class="fechar_banner_lateral" id="box_banner_lateral_fechar_meio"></span>

		<div id="box_banner_lateral_200_446">

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
					if(get_field('tipo_de_anuncio',get_the_ID())=='Banner Vertical Interna Editorias'){
						if(strtotime(get_field('hora_de_entrada',get_the_ID()))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada',get_the_ID())<=date("Ymd")&&(get_field('data_de_saida',get_the_ID())>date("Ymd")||strtotime(get_field('hora_de_saida',get_the_ID()))>=strtotime(date("H:i:s")))){
					 ?>
							<div class="item_banner_lateral_200_446" onclick="window.open('#');" style="background-image:url('<?= $img2['url'] ?>');"></div>
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


	echo "
	<script>
		$(document).ready(function(){

			$('#box_banner_lateral_fechar_meio').text(".$tempo_fechar_slide.");
			var tempo_total_fe = ".$tempo_fechar_slide.";


				 	 var inter = setInterval(
					 	function(){

					 		$('#box_banner_lateral_fechar_meio').text(tempo_total_fe);

					 		if(tempo_total_fe == 0){
					 			clearInterval(inter);

								$('#box_banner_lateral_fechar_meio').text('Fechar X');

								$('#box_banner_lateral_fechar_meio').click(function(){
										$('.all_fechar_lateral_meio').css({'max-height': '0', 'overflow':'hidden' });
										$('#box_banner_lateral_fechar_meio').hide('slow');
								});
					 		}

					 		tempo_total_fe = tempo_total_fe-1;
					 }
				 	, 1000);


		});

		$(document).ready(function(){
			$('#box_banner_lateral_200_446').cycle({
				fx:   		'scrollHorz',
				speed:  600,
				timeout: 4000,
				rev:true,
			});

			var valor = ( $('.container').offset().left ) + 970;

			$('.all_banner_laterais').css({
				left: valor+'px'
			})


		});
	</script>
	";
}
 ?>
