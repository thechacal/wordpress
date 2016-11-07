	<div style="background-image:url('http://dev.portalnoar.com.br/wp-content/uploads/2016/10/summer_banner.jpg')" class="banner_floater">
		<span class="fechar_banner_floater">Fechar X</span>

		

	</div>


<?php
	$tempo_fechar_slide = '8';

	
	echo "
	<script>
		$(document).ready(function(){
			
				$('.fechar_banner_floater').click(function(){
						$('.banner_floater').css({'max-height': '0', 'overflow':'hidden' }); 
						$('.fechar_banner_floater').hide('slow');
				});
					
		});
	</script>
	";



 ?>
