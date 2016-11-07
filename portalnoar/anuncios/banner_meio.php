<div id="container_box_banner_meio" class="container container_box_banner_topo">
	<span class="fechar_banner_topo" id="box_banner_meio_fechar"></span>
	<div id="box_banner_meio"  class="box_banner_topo">
		<!--<div class="banner_topo_expandi item_banner_topo" onclick="window.open('#');" style="background-image:url(<?//php bloginfo('template_url') ?>/imgs/bannertopo.png);">-->

		<?php
		$page = get_page_by_title('Capa principal');
		$id = $page->ID;
		$posts=get_field('banner_horizontal_meio',$id);
		if( $posts ):
			foreach( $posts as $post ):
				setup_postdata($post);
				$idpost = $post->ID;
				$img = get_field('banner_horizontal_meio',$idpost);
				if(strtotime(get_field('hora_de_entrada_meio',$idpost))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada_meio',$idpost)<=date("Ymd")&&(get_field('data_de_saida_meio',$idpost)>date("Ymd")||strtotime(get_field('hora_de_saida_meio',$idpost))>=strtotime(date("H:i:s")))){
				 ?>
				<div class="item_banner_topo" onclick="window.open('#');" style="background-image:url('<?= $img['url'] ?>');"></div>
				<?php
				}
			endforeach;
		endif;
		 ?>
	</div>
</div>
<?php
	$tempo_fechar_slide = '8';

	

	$tempo_abrir_slide = '5000';
	echo "
	<script>
		$(document).ready(function(){
			
			$('#box_banner_meio_fechar').text(".$tempo_fechar_slide.");
			var tempo_total_fe = ".$tempo_fechar_slide.";

			setTimeout(
				function(){
				 	$('#container_box_banner_meio, #box_banner_meio').css({'max-height': '158px'}); 

				 	$('#container_box_banner_meio').css({'overflow':'visible'}); 

				 	 var inter = setInterval(
					 	function(){ 

					 		$('#box_banner_meio_fechar').text(tempo_total_fe);

					 		if(tempo_total_fe == 0){
					 			clearInterval(inter);
								
								$('#box_banner_meio_fechar').text('Fechar X');
								
								$('#box_banner_meio_fechar').click(function(){
										$('#container_box_banner_meio, #box_banner_meio').css({'max-height': '0'}); 
										$('#box_banner_meio_fechar').hide('slow');
								});
					 		}

					 		tempo_total_fe = tempo_total_fe-1;
					 }
				 	, 1000);
					

				}
			 , ".$tempo_abrir_slide.");

		});
	</script>
	";


	echo "
	<script>
		$(document).ready(function(){
			$('#box_banner_meio').cycle({
				fx:   		'scrollHorz',
				speed:  600,
				timeout: 4000,
				rev:true,
			});
			$('#box_banner_meio').css({'max-height': '0px'}); 
		});
	</script>
	";
 ?>
