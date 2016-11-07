	<div class="all_banner_laterais all_banner_lateral_200_446 all_fechar_lateral_topo">

		<span class="fechar_banner_lateral" id="box_banner_lateral_fechar_topo"></span>
		<div id="box_banner_lateral_200_446_topo">

			<?php
			$page = get_page_by_title('Capa principal');
			$id = $page->ID;
			$posts=get_field('banner_vertical_topo',$id);
			if( $posts ):
				foreach( $posts as $post ):
					setup_postdata($post);
					$idpost = $post->ID;
					$img = get_field('banner_vertical_topo',$idpost);
					if(strtotime(get_field('hora_de_entrada_vertical_topo',$idpost))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada_vertical_topo',$idpost)<=date("Ymd")&&(get_field('data_de_saida_vertical_topo',$idpost)>date("Ymd")||strtotime(get_field('hora_de_saida_vertical_topo',$idpost))>=strtotime(date("H:i:s")))){
					 ?>
					<div class="item_banner_lateral_200_446" onclick="window.open('#');" style="background-image:url('<?= $img['url'] ?>');"></div>
					<?php
					}
				endforeach;
			endif;
			 ?>
		</div>

	</div>


<?php
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
	</script>
	";



	echo "
	<script>
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
 ?>
