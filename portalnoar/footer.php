	<footer>
		<div class="footer_geral">
			<div class="container">
					<div class="footer_geral_col1">
						<?php
						$args = array('hide_empty'=>0, 'orderby' => 'name', 'order' => 'ASC', 'parent' => 0, 'exclude' => 28994);
						$categorias = get_categories( $args );
						foreach($categorias as $categoria) {
						?>
						<a href="<?= $categoria->category_nicename; ?>" class="lista_footer_cats"><?= $categoria->name; ?></a>
						<?php } ?>

						<button>ANÚNCIE JÁ</button>

						<div class="div_all_redes_footer">
							 <i class="fa fa-whatsapp whatsapp_rede_btn_footer" aria-hidden="true"></i>
							 <p class="desc_reds_blog_footer whatsapp_rede_footer">Envie sua notícia: 848448484848</p>
							 <a href="https://pt-br.facebook.com/PortalNoArBR/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							 <a href="https://twitter.com/portalnoarbr"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							 <a href="https://plus.google.com/105605278984900938670"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
						</div>



						<!-- <img style="width: 80%;" src="http://dev.portalnoar.com.br/wp-content/themes/portalnoar/imgs/redes_com.png"> -->


					</div>

					<div class="footer_geral_col2">
						<p class="endereco_footer">RUA DESEMBARGADOR BENÍCIO FILHO, N° 465 PETRÓPOLIS
							<br>CEP: 59014-470<br>PABX: <br><span>2020-1200</span>
							<br>REDAÇÃO: <br><span>2020-1200</span>
							<br>COMERCIAL: <br><span>(84) 99408-1871</span>
							<p>
						<p class="lista_footer_tit_blog">BLOGS</p>
						<?php
						$args = array(
													'post_type' => 'blogueiros',
													'posts_per_page'=>5,
													'orderby' => 'date',
													'order' => 'DESC',
												);
												$query = new WP_Query( $args );
												if ( $query->have_posts() ) :
													while ( $query->have_posts() ) : $query->the_post();
														$nome=get_field('nome',get_the_ID());
						 ?>
						<a href="" class="lista_footer_blogs"><?= $nome ?></a><br>
						<?php
													endwhile;
												endif;
						 ?>
					</div>

					<div class="footer_geral_col3">
						<form class="form_search_fo">
							<input type="text"><i class="fa fa-search" aria-hidden="true"></i>
						</form>

							<div class="all_tags_footer">
								<?php
								switch_to_blog( 1 );
								wp_tag_cloud('smallest=14&largest=14&number=20&unit=px&orderby=count&format=list');
								restore_current_blog();
								 ?>

								<!--<li><a href="http://dev.portalnoar.com.br/blog/tag/economia-2/" class="tag-link-25 tag-link-position-1" title="588 tópicos" style="font-size: 14px;">economia</a></li>
								<li><a href="http://dev.portalnoar.com.br/blog/tag/economia-2/" class="tag-link-25 tag-link-position-1" title="588 tópicos" style="font-size: 14px;">economia</a></li>
								<li><a href="http://dev.portalnoar.com.br/blog/tag/economia-2/" class="tag-link-25 tag-link-position-1" title="588 tópicos" style="font-size: 14px;">economia</a></li>
								<li><a href="http://dev.portalnoar.com.br/blog/tag/economia-2/" class="tag-link-25 tag-link-position-1" title="588 tópicos" style="font-size: 14px;">economia</a></li>
								<li><a href="http://dev.portalnoar.com.br/blog/tag/economia-2/" class="tag-link-25 tag-link-position-1" title="588 tópicos" style="font-size: 14px;">economia</a></li>
								<li><a href="http://dev.portalnoar.com.br/blog/tag/economia-2/" class="tag-link-25 tag-link-position-1" title="588 tópicos" style="font-size: 14px;">economia</a></li>
								<li><a href="http://dev.portalnoar.com.br/blog/tag/economia-2/" class="tag-link-25 tag-link-position-1" title="588 tópicos" style="font-size: 14px;">economia</a></li>
								<li><a href="http://dev.portalnoar.com.br/blog/tag/economia-2/" class="tag-link-25 tag-link-position-1" title="588 tópicos" style="font-size: 14px;">economia</a></li>
								<li><a href="http://dev.portalnoar.com.br/blog/tag/economia-2/" class="tag-link-25 tag-link-position-1" title="588 tópicos" style="font-size: 14px;">economia</a></li>
								-->

							</div>

							<div class="fb-page div_face_footer" data-href="https://www.facebook.com/PortalNoArBR" data-tabs="timeline" data-adapt-container-width="true" data-width="220" data-height="100" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>

					</div>
					<div class="footer_geral_col4">
						<p class="fale_conosco_tit">FALE CONOSCO</p>

						<form>
							<span class="fale_conosco_label fale_conosco_ne">NOME</span>
							<input class="fc_nome_email" type="text">

							<span class="fale_conosco_label fale_conosco_tel">TELEFONE</span>
							<input class="fc_tel" type="text">

							<span class="fale_conosco_label fale_conosco_ne">NOME</span>
							<input class="fc_nome_email" type="text">

							<textarea class="fale_conosco_msg"></textarea>

							<button type="submit">ENVIAR</button>

						</form>


					</div>
			</div>

		</div>

		<div class="footer_envie_titulo bt_envie_noticia">
			<p>ENVIE SUA NOTÍCIA</p>
		</div>


		<div class="footer_envie">
			<div class="envie_box1 bt_envie_foto">
				<img src="http://dev.portalnoar.com.br/wp-content/themes/portalnoar/imgs/fotos_envie.png">
				<p>FOTOS</p>
			</div>
			<div class="envie_box2 bt_envie_video">
				<img src="http://dev.portalnoar.com.br/wp-content/themes/portalnoar/imgs/videos_envie.png">
				<p>VÍDEOS</p>
			</div>
			<div class="envie_box3 bt_envie_relato">
				<img src="http://dev.portalnoar.com.br/wp-content/themes/portalnoar/imgs/relatos_envie.png">
				<p>RELATOS</p>
			</div>

		</div>

		<div class="box_envie_foto box_envie_algo">
			<div class="form_envie_foto form_envie_footer">

				<form action="">
					<p class="titulo_form_footer titulo_form_foto">Envie sua foto</p>
					<span class="box_fechar_foto box_fechar_footer">X</span>
				  <!-- <p class="titulo_input_footer">Nome:</p> -->
				  <input class="input_text_footer" name="nome" placeholder="Nome">
				  <!-- <p class="titulo_input_footer">Email</p> -->
				  <input class="input_text_footer" name="email" placeholder="E-mail">
				  <!-- <p class="titulo_input_footer">Telefone</p> -->
				  <input class="input_text_footer" name="telefone" placeholder="Telefone">
				  <!-- <p class="titulo_input_footer">Mensagem</p> -->
				  <textarea class="input_textarea_footer" name="mensagem" placeholder="Mensagem"></textarea>
				  <p class="titulo_input_footer">Selecione as fotos para o envio:</p>
				  <input type="file" name="img" multiple>
				  <input class="btn_enviar_foto_footer btn_enviar_footer" type="submit" value="enviar foto">
				</form>

			</div>

		</div>

		<div class="box_envie_video box_envie_algo">
			<div class="form_envie_video form_envie_footer">
				<form action="">
					<p class="titulo_form_footer titulo_form_video">Envie seu vídeo</p>
					<span class="box_fechar_video box_fechar_footer">X</span>
				  <!-- <p class="titulo_input_footer">Nome:</p> -->
				  <input class="input_text_footer" name="nome" placeholder="nome">
				  <!-- <p class="titulo_input_footer">Email</p> -->
				  <input class="input_text_footer" name="email" placeholder="E-mail">
				  <!-- <p class="titulo_input_footer">Telefone</p> -->
				  <input class="input_text_footer" name="telefone" placeholder="Telefone">
				  <!-- <p class="titulo_input_footer">Mensagem</p> -->
				  <textarea class="input_textarea_footer" name="mensagem" placeholder="Mensagem"></textarea>
				  <p class="titulo_input_footer">Selecione o vídeo:</p>
				  <input type="file" name="img" multiple>
				  <input class="btn_enviar_video_footer btn_enviar_footer" type="submit" value="enviar vídeo">
				</form>
			</div>
		</div>

		<div class="box_envie_relato box_envie_algo">
			<div class="form_envie_relato form_envie_footer">
				<form action="">
					<p class="titulo_form_footer titulo_form_relato">Envie seu relato</p>
					<span class="box_fechar_relato box_fechar_footer">X</span>
				  <!-- <p class="titulo_input_footer">Nome:</p> -->
				  <input class="input_text_footer" name="nome" placeholder="Nome">
				  <!-- <p class="titulo_input_footer">Email</p> -->
				  <input class="input_text_footer" name="email" placeholder="E-mail">
				  <!-- <p class="titulo_input_footer">Telefone</p> -->
				  <input class="input_text_footer" name="telefone" placeholder="Telefone">
				  <!-- <p class="titulo_input_footer">Relato</p> -->
				  <textarea class="input_textarea_footer" name="relato" placeholder="Relato"></textarea>
				  <input class="btn_enviar_relato_footer btn_enviar_footer" type="submit" value="enviar relato">
				</form>

			</div>
		</div>

	<!-- 	<div class="box_envie_noticia box_envie_algo">
			<div class="form_envie_noticia form_envie_footer">
				<form action="">
					<p class="titulo_form_footer titulo_form_noticia">Envie sua notícia</p>
					<span class="box_fechar_noticia box_fechar_footer">X</span>
					<input class="input_text_footer" name="nome" placeholder="Nome">
					<input class="input_text_footer" name="email" placeholder="E-mail">
					<input class="input_text_footer" name="telefone" placeholder="Telefone">
					<textarea class="input_textarea_footer" name="noticia" placeholder="Notícia"></textarea>
					<p class="titulo_input_footer">Selecione o arquivo:</p>
				  <input type="file" name="img" multiple>
					<input class="btn_enviar_noticia_footer btn_enviar_footer" type="submit" value="enviar noticia">
				</form>

			</div>
		</div> -->

		<div class="novidades_email">
			<div class="container">
				<p class="novidades_email_tit">RECEBA NOSSAS NOVIDADES</p>

				<form class="novidades_email_form">
					<span>E-MAIL</span>
					<input type="text">
					<button>RECEBER</button>
				</form>


			</div>
		</div>

		<div class="faixa_assinatura">
			<a href=""><img class="img_assinatura" src="http://dev.portalnoar.com.br/wp-content/themes/portalnoar/imgs/ass_quadradigital.png"></a>

		</div>

	</footer>


	<script src="<?php bloginfo('template_url') ?>/js/scripts.js" type="text/javascript"></script>

	<script type="text/javascript">


		jQuery(document).ready(function($) {

			$('.bt_envie_foto').click(function(event) {
				$('.box_envie_foto').animate({
					'opacity': '1'},
					500, function() {
				}).toggle();
			});
			$('.box_fechar_foto').click(function(event) {
				$('.box_envie_foto').animate({
					'opacity': '0'},
					500, function() {
				}).toggle();
			});



			$('.bt_envie_video').click(function(event) {
				$('.box_envie_video').animate({
					'opacity': '1'},
					500, function() {
				}).toggle();
			});
			$('.box_fechar_video').click(function(event) {
				$('.box_envie_video').animate({
					'opacity': '0'},
					500, function() {
				}).toggle();
			});

			$('.bt_envie_relato').click(function(event) {
				$('.box_envie_relato').animate({
					'opacity': '1'},
					500, function() {
				}).toggle();
			});

			$('.box_fechar_relato').click(function(event) {
				$('.box_envie_relato').animate({
					'opacity': '0'},
					500, function() {
				}).toggle();
			});

			// $('.bt_envie_noticia').click(function(event) {
			// 	$('.box_envie_noticia').animate({
			// 		'opacity': '1'},
			// 		500, function() {
			// 	}).toggle();
			// });

			// $('.box_fechar_noticia').click(function(event) {
			// 	$('.box_envie_noticia').animate({
			// 		'opacity': '0'},
			// 		500, function() {
			// 	}).toggle();
			// });

			$('#count').click(function() {
    		$('#idpost').html(function() {
						var formData = {
									'idpost' 				: $('#idpost').attr('value'),
								};
		        $.ajax({
		            url: 'http://www.portalnoar.com.br/contador-de-compartilhamentos/',
		            type: 'POST',
		            data: formData,
		        });
    		});

			});

			$('#count2').click(function() {
    		$('#idpost2').html(function() {
						var formData = {
									'idpost' 				: $('#idpost').attr('value'),
								};
		        $.ajax({
		            url: 'http://www.portalnoar.com.br/contador-de-compartilhamentos/',
		            type: 'POST',
		            data: formData,
		        });
    		});

			});

		});


	</script>

	<script>
	        document.getElementById('printNews').onclick = function() {
	            var conteudo = document.getElementById('noticias_all_box').innerHTML,
	                tela_impressao = window.open('about:blank');

	            tela_impressao.document.write(conteudo);
	            tela_impressao.window.print();
	            tela_impressao.window.close();
	        };
	</script>


</body>

</html>
