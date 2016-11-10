<!--  

pode ser a altura 250px ou 450px
no anúncios quem cadastra escolhe

colocar container_banner_slide_250 ou container_banner_slide_450 como classe na div abaixo

 -->
<div style="background-image:url('http://portalnoar.com.br/wp-content/uploads/2016/10/Crown-Banner-Ad.jpg');" class="container_banner_slide_250 container_banner_slide">
	<span class="fechar_banner_slide">Fechar X</span>
	
</div>
<?php

	echo "
	<script>
		$(document).ready(function(){

				var teste_banner = true;
			
				$('.fechar_banner_slide').click(function(){
						$('.container_banner_slide').css({'max-height': '0'});
						$('.fechar_banner_slide').hide('slow');
				});
				 
				setTimeout(function(){ 

					$('.slideshow_p_const .bx-next, .slideshow_p_const .bx-prev').click(function(){
						
						if( teste_banner === true){
							$('.container_banner_slide').css({'max-height': '450px'});	
							teste_banner = false;
						}

					});



				 }, 2000);

				
			

		});

	
	</script>
	";

 ?>
