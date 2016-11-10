	<div class="all_banner_mini" id="all_box_banner_lateral_300_100_<?= $id_mini ?>">


		<div id="box_banner_lateral_300_100_<?= $id_mini ?>">

			<?php
			$aux=FALSE;
			if($_SERVER['REQUEST_URI']=='/'){
				$value = 'Capa Principal';
			}
			else {
				$value = str_replace("-"," ",str_replace("/","",$_SERVER['REQUEST_URI']));
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
					if(get_field('tipo_de_anuncio',get_the_ID())=='Mini Banner'){
						if(strtotime(get_field('hora_de_entrada',get_the_ID()))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada',get_the_ID())<=date("Ymd")&&(get_field('data_de_saida',get_the_ID())>date("Ymd")||strtotime(get_field('hora_de_saida',get_the_ID()))>=strtotime(date("H:i:s")))){
					 ?>
					<div class="item_banner_lateral_300_100" onclick="window.open('<?= get_field('link',get_the_ID()) ?>');" style="background-image:url('<?= $img2['url'] ?>');"></div>
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
				
			if($(window).width() <= 950){

			 	var html_mini_banner = $('#all_box_banner_lateral_300_100_1');
			 	$('#all_box_banner_lateral_300_100_1').remove();
			 	$('header').append(html_mini_banner);

			 	var html_mini_banner2 = $('#all_box_banner_lateral_300_100_2');
			 	$('#all_box_banner_lateral_300_100_2').remove();
			 	$('#colunistas_blogs').append(html_mini_banner2);

		    }


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
