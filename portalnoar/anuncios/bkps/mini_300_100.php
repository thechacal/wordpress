	<div class="all_banner_mini" id="all_box_banner_lateral_300_100_<?= $id_mini ?>">


		<div id="box_banner_lateral_300_100_<?= $id_mini ?>">

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
					if(get_field('tipo_de_anuncio',get_the_ID())=='Banner Horizontal TOP Celebridades'){
						if(strtotime(get_field('hora_de_entrada',get_the_ID()))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada',get_the_ID())<=date("Ymd")&&(get_field('data_de_saida',get_the_ID())>date("Ymd")||strtotime(get_field('hora_de_saida',get_the_ID()))>=strtotime(date("H:i:s")))){
					 ?>
					<div class="item_banner_lateral_300_100" onclick="window.open('#');" style="background-image:url('<?= $img['url'] ?>');"></div>
					<?php
						}
					$aux=TRUE;
					}
					endwhile;
				endif;
			 ?>
		</div>

		<span class="fechar_banner_mini" id="box_banner_mini_fechar_<?= $id_mini ?>"></span>

	</div>

<?php
if($aux){
	$tempo_fechar_slide = '8';
	echo "
	<script>
		$(document).ready(function(){

			$('#box_banner_mini_fechar_".$id_mini."').text(".$tempo_fechar_slide.");
			var tempo_total_fe = ".$tempo_fechar_slide.";


				 	 var inter = setInterval(
					 	function(){

					 		$('#box_banner_mini_fechar_".$id_mini."').text(tempo_total_fe);

					 		if(tempo_total_fe == 0){
					 			clearInterval(inter);

								$('#box_banner_mini_fechar_".$id_mini."').text('Fechar X');

								$('#box_banner_mini_fechar_".$id_mini."').click(function(){
										$('#all_box_banner_lateral_300_100_".$id_mini."').css({'max-height': '0', 'overflow':'hidden' });
										$('#box_banner_mini_fechar_".$id_mini."').hide('slow');
								});
					 		}

					 		tempo_total_fe = tempo_total_fe-1;
					 }
				 	, 1000);


		});

		$(document).ready(function(){
			$('#box_banner_lateral_300_100_". $id_mini ."').cycle({
				fx:   		'scrollHorz',
				speed:  600,
				timeout: 4000,
				rev:true,
			});

		});
	</script>
	";
}
 ?>
