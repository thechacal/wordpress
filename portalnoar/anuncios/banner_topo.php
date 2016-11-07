<div id="container_box_banner_topo" class="container container_box_banner_topo">
	<span class="fechar_banner_topo" id="box_banner_topo_fechar"></span>
	<div id="box_banner_topo" class="box_banner_topo">
		<!--<div class="banner_topo_expandi item_banner_topo" onclick="window.open('#');" style="background-image:url(<?//php bloginfo('template_url') ?>/imgs/bannertopo.png);">-->

		<?php
		$page = get_page_by_title('Capa principal');
		$id = $page->ID;
		$posts=get_field('banner_horizontal_topo',$id);
		if( $posts ):
			foreach( $posts as $post ):
				setup_postdata($post);
				$idpost = $post->ID;
				$img = get_field('banner_horizontal_topo',$idpost);
				if(strtotime(get_field('hora_de_entrada_topo',$idpost))<=strtotime(date("H:i:s"))&&get_field('data_de_entrada_topo',$idpost)<=date("Ymd")&&(get_field('data_de_saida_topo',$idpost)>date("Ymd")||strtotime(get_field('hora_de_saida_topo',$idpost))>=strtotime(date("H:i:s")))){
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
	</script>
	";


	echo "
	<script>
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
 ?>
