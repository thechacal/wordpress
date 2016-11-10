	<div class="all_banner_laterais all_banner_lateral_200_446 all_fechar_lateral_topo">

		<span class="fechar_banner_lateral" id="box_banner_lateral_fechar_topo"></span>
		<div id="box_banner_lateral_200_446_topo">

			<?php
			$aux=FALSE;
			$args = array(
					'post_type' => 'anuncios',
					'posts_per_page'=>20,
					'orderby' => 'date',
					'order' => 'desc',
			);
			$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
					$img = get_field('banner',get_the_ID());
					if(get_field('tipo_de_anuncio',get_the_ID())=='Banner Vertical Topo'){
						if(strtotime(get_field('hora_de_entrada',get_the_ID()))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada',get_the_ID())<=date("Ymd")&&(get_field('data_de_saida',get_the_ID())>date("Ymd")||strtotime(get_field('hora_de_saida',get_the_ID()))>=strtotime(date("H:i:s")))){
					 ?>
							<div class="item_banner_lateral_200_446" onclick="window.open('#');" style="background-image:url('<?= $img['url'] ?>');"></div>
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

			$('#box_banner_lateral_fechar_topo').text(".$tempo_fechar_slide.");
			var tempo_total_fe = ".$tempo_fechar_slide.";


				 	 var inter = setInterval(
					 	function(){

					 		$('#box_banner_lateral_fechar_topo').text(tempo_total_fe);

					 		if(tempo_total_fe == 0){
					 			clearInterval(inter);

								$('#box_banner_lateral_fechar_topo').text('Fechar X');

								$('#box_banner_lateral_fechar_topo').click(function(){
										$('.all_fechar_lateral_topo').css({'max-height': '0', 'overflow':'hidden' });
										$('#box_banner_lateral_fechar_topo').hide('slow');
								});
					 		}

					 		tempo_total_fe = tempo_total_fe-1;
					 }
				 	, 1000);


		});

		$(document).ready(function(){
			$('#box_banner_lateral_200_446_topo').cycle({
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
