	<div class="all_banner_laterais all_banner_lateral_200_446 all_fechar_lateral_meio">
		<span class="fechar_banner_lateral" id="box_banner_lateral_fechar_meio"></span>

		<div id="box_banner_lateral_200_446">

			<?php
			$page = get_page_by_title('Capa principal');
			$id = $page->ID;
			$posts=get_field('banner_vertical_gente_no_ar',$id);
			if( $posts ):
				foreach( $posts as $post ):
					setup_postdata($post);
					$idpost = $post->ID;
					$img = get_field('banner_vertical_gente_no_ar',$idpost);
					if(strtotime(get_field('hora_de_entrada_vertical_gente_no_ar',$idpost))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada_vertical_gente_no_ar',$idpost)<=date("Ymd")&&(get_field('data_de_saida_vertical_gente_no_ar',$idpost)>date("Ymd")||strtotime(get_field('hora_de_saida_vertical_gente_no_ar',$idpost))>=strtotime(date("H:i:s")))){
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
	</script>
	";




	echo "
	<script>
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

 ?>
