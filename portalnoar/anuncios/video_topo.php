	<div class="banner_video_topo">

		<span class="fechar_banner_video"></span>
			
		<iframe width="100%" height="390" src="https://www.youtube.com/embed/ZDrEEZ21b9Q" frameborder="0" allowfullscreen></iframe>

	</div>


<?php
	$tempo_fechar_slide = '5';

	
	echo "
	<script>
		$(document).ready(function(){
			
			$('.fechar_banner_video').text(".$tempo_fechar_slide.");
			var tempo_total_fe = ".$tempo_fechar_slide.";

		
				 	 var inter = setInterval(
					 	function(){ 

					 		$('.fechar_banner_video').text(tempo_total_fe);

					 		if(tempo_total_fe == 0){
					 			clearInterval(inter);
								
								$('.fechar_banner_video').text('Fechar X');
								
								$('.fechar_banner_video').click(function(){
										$('.banner_video_topo').css({'max-height': '0', 'overflow':'hidden' }); 
										$('.fechar_banner_video').hide('slow');
								});
					 		}

					 		tempo_total_fe = tempo_total_fe-1;
					 }
				 	, 1000);
				

		});
	</script>
	";



 ?>
