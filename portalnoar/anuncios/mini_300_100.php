	<div class="all_banner_mini" id="all_box_banner_lateral_300_100_<?= $id_mini ?>">


		<div id="box_banner_lateral_300_100_<?= $id_mini ?>">

			<?php
			$page = get_page_by_title('Capa principal');
			$id = $page->ID;
			$posts=get_field('banner_horizontal_top_celebridades',$id);
			if( $posts ):
				foreach( $posts as $post ):
					setup_postdata($post);
					$idpost = $post->ID;
					$img = get_field('banner_horizontal_top_celebridades',$idpost);
					if(strtotime(get_field('hora_de_entrada_horizontal_top_celebridades',$idpost))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada_horizontal_top_celebridades',$idpost)<=date("Ymd")&&(get_field('data_de_saida_horizontal_top_celebridades',$idpost)>date("Ymd")||strtotime(get_field('hora_de_saida_horizontal_top_celebridades',$idpost))>=strtotime(date("H:i:s")))){
					 ?>
					<div class="item_banner_lateral_300_100" onclick="window.open('#');" style="background-image:url('<?= $img['url'] ?>');"></div>
					<?php
					}
				endforeach;
			endif;
			 ?>
		</div>

		<span class="fechar_banner_mini" id="box_banner_mini_fechar_<?= $id_mini ?>"></span>

	</div>


<?php

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
	</script>
	";



	echo "
	<script>
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

 ?>
