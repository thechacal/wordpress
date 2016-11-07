<?php
/**
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */

add_theme_support( 'post-thumbnails' );

function customLoginLogo() {
	$args_post = array('post_type' => 'logo_painel_admin', 'posts_per_page'=>1);
	$myposts_post = get_posts( $args_post );
	foreach ( $myposts_post as $post_post ){
		setup_postdata( $post_post );
		$id = $post_post->ID;
	  $arr['logo_painel_admin'] = get_field('logo_painel_admin', $id);
	  $arr['logo_mega_menu_a_empresa'] = get_field('logo_mega_menu_a_empresa', $id);
	  $arr['equipe_mega_menu'] = get_field('equipe_mega_menu', $id);
	echo '<style type="text/css">
		h1 a { background-image: url("'.$arr['logo_painel_admin']['url'].'") !important; background-size:auto !important; width:300px !important; height:100px !important; padding-bottom:20px !important; }
	</style>';
	return $arr;
	}
}
add_action('login_head', 'customLoginLogo');

function get_newletter($id){
		$arr['link_mailchimp'] = get_field('link_mailchimp',$id);
		$arr['tipo_de_newsletter'] = get_field('tipo_de_newsletter',$id);

	return $arr;
}

function get_ativar(){
	$args_post = array('post_type' => 'secoes', 'posts_per_page'=>1);
	$myposts_post = get_posts( $args_post );
	foreach ( $myposts_post as $post_post ){
		setup_postdata( $post_post );
		$id = $post_post->ID;
	  $arr['ativar_banner_topo'] = get_field('ativar_banner_topo', $id);
		$arr['ativar_footer'] = get_field('ativar_footer', $id);
		$arr['ativar_grupo'] = get_field('ativar_grupo', $id);
		$arr['ativar_enderecos'] = get_field('ativar_enderecos', $id);
		$arr['ativar_redes_sociais'] = get_field('ativar_redes_sociais', $id);
		$arr['ativar_mapa'] = get_field('ativar_mapa', $id);
		$arr['ativar_contato_plantao'] = get_field('ativar_contato_plantao', $id);
		$arr['ativar_razao'] = get_field('ativar_razao', $id);
		$arr['ativar_news'] = get_field('ativar_news', $id);
		$arr['ativar_recomendacoes'] = get_field('ativar_recomendacoes', $id);
		$arr['ativar_blog'] = get_field('ativar_blog', $id);
		$arr['ativar_pacotes'] = get_field('ativar_pacotes', $id);
		$arr['ativar_ofertas'] = get_field('ativar_ofertas', $id);
		$arr['ativar_monte'] = get_field('ativar_monte', $id);
		$arr['ativar_menu'] = get_field('ativar_menu', $id);
		$arr['ativar_acesso_exclusivo'] = get_field('ativar_acesso_exclusivo', $id);

		/*
			PÁGINA SALINAS
		*/

		$arr['ativar_salinas_tour'] = get_field('ativar_salinas_tour', $id);
		$arr['ativar_salinas_online'] = get_field('ativar_salinas_online', $id);
		$arr['ativar_restrito'] = get_field('ativar_restrito', $id);
		$arr['ativar_fones'] = get_field('ativar_fones', $id);

		/*
			PÁGINA CORPORATIVO
		*/

		return $arr;
	}
}

function get_rodape($id){
	    $arr['texto_topico_rodape_horizontal'] = get_field('texto_topico_rodape_horizontal', $id);
	    $arr['texto_topico_rodape_vertical1'] = get_field('texto_topico_rodape_vertical1', $id);
		$arr['link1'] = get_field('link1', $id);
	    $arr['texto_topico_rodape_vertical2'] = get_field('texto_topico_rodape_vertical2', $id);
		$arr['link2'] = get_field('link2', $id);
	    $arr['texto_topico_rodape_vertical3'] = get_field('texto_topico_rodape_vertical3', $id);
		$arr['link3'] = get_field('link3', $id);
	    $arr['texto_topico_rodape_vertical4'] = get_field('texto_topico_rodape_vertical4', $id);
		$arr['link4'] = get_field('link4', $id);
	    $arr['texto_topico_rodape_vertical5'] = get_field('texto_topico_rodape_vertical5', $id);
		$arr['link5'] = get_field('link5', $id);

  	return $arr;
}

function get_grupo_aerotur($id){
	  $arr['logo'] = get_field('logo', $id);
	  $arr['linklogo'] = get_field('linklogo', $id);

		return $arr;
}

function get_enderecos($id){
  $arr['texto_loja'] = get_field('texto_loja', $id);
  $arr['ddd'] = get_field('ddd', $id);
  $arr['telefone'] = get_field('telefone', $id);
  $arr['endereco_loja'] = get_field('endereco_loja', $id);
  $arr['img_loja_mega_menu'] = get_field('img_loja_mega_menu', $id);

  return $arr;
	}

function get_contato_plantao($id){
	  $arr['cidade'] = get_field('cidade', $id);
	  $arr['telefone'] = get_field('telefone', $id);
	  $arr['telefone2'] = get_field('telefone2', $id);

		return $arr;
}

function get_redes_sociais($id){
  $arr['facebook'] = get_field('facebook', $id);
  $arr['instagram'] = get_field('instagram', $id);
  $arr['twitter'] = get_field('twitter', $id);
  $arr['vimeo'] = get_field('vimeo', $id);
  $arr['flickr'] = get_field('flickr', $id);

  return $arr;
}

function get_recomendacoes($id){
	$arr['banner'] = get_field('banner', $id);
	$arr['imagem_autor'] = get_field('imagem_autor', $id);
	$arr['autor'] = get_field('autor', $id);
	$arr['palavra_chave_recomendacao'] = get_field('palavra_chave_recomendacao', $id);
	$arr['recomendacao'] = get_field('recomendacao', $id);

  return $arr;
}

function get_razoes($id){
  $arr['banner'] = get_field('banner', $id);

  return $arr;
}

function get_pacotes($id){
	$arr['promocional'] = get_field('promocional', $id);
    $arr['banner'] = get_field('banner', $id);
    $arr['texto_superior_pacote'] = get_field('texto_superior_pacote', $id);
    $arr['texto_inferior_pacote'] = get_field('texto_inferior_pacote', $id);
    $arr['parcelas'] = get_field('parcelas', $id);
    $arr['valor'] = get_field('valor', $id);
    $arr['centavos'] = get_field('centavos', $id);
	$arr['destino'] = get_field('destino', $id);
	$arr['saidas'] = get_field('saidas', $id);
	$arr['deadline'] = get_field('deadline', $id);
	$arr['observacoes'] = get_field('observacoes', $id);
	$arr['imagem'] = get_field('imagem', $id);
	$arr['local_saida'] = get_field('local_saida', $id);
	$arr['condicoes'] = get_field('condicoes', $id);
	$arr['palavra_chave_pacote'] = get_field('palavra_chave_pacote', $id);
	$arr['moeda_de_pagamento'] = get_field('moeda_de_pagamento', $id);
	$arr['condições_especiais_de_pagamento'] = get_field('condições_especiais_de_pagamento', $id);
	$arr['estadia'] = get_field('estadia', $id);
	$arr['pacote_inclui'] = get_field('pacote_inclui', $id);
	$arr['resumo'] = get_field('resumo', $id);
	$arr['filtro_eventos'] = get_field('filtro_eventos', $id);
	$arr['filtro_moeda'] = get_field('filtro_moeda', $id);
	$arr['filtro_preco'] = get_field('filtro_preco', $id);
	$arr['filtro_localidade'] = get_field('filtro_localidade', $id);
	$arr['destacar_mega_menu'] = get_field('destacar_mega_menu', $id);
	$arr['observacao_mega_menu'] = get_field('observacao_mega_menu', $id);
	$arr['pacote_inclui_mega_menu'] = get_field('pacote_inclui_mega_menu', $id);

  return $arr;
}

function get_ofertas($id){
  $arr['cidade_origem'] = get_field('cidade_origem', $id);
  $arr['companhia_aerea'] = get_field('companhia_aerea', $id);
  $arr['destino_companhia_aerea'] = get_field('destino_companhia_aerea', $id);
  $arr['valor_inicial_passagem'] = get_field('valor_inicial_passagem', $id);

	$arr['companhia_aerea2'] = get_field('companhia_aerea2', $id);
  $arr['destino_companhia_aerea2'] = get_field('destino_companhia_aerea2', $id);
  $arr['valor_inicial_passagem2'] = get_field('valor_inicial_passagem2', $id);

	$arr['companhia_aerea3'] = get_field('companhia_aerea3', $id);
  $arr['destino_companhia_aerea3'] = get_field('destino_companhia_aerea3', $id);
  $arr['valor_inicial_passagem3'] = get_field('valor_inicial_passagem3', $id);

	$arr['companhia_aerea4'] = get_field('companhia_aerea4', $id);
  $arr['destino_companhia_aerea4'] = get_field('destino_companhia_aerea4', $id);
  $arr['valor_inicial_passagem4'] = get_field('valor_inicial_passagem4', $id);

	$arr['companhia_aerea5'] = get_field('companhia_aerea5', $id);
  $arr['destino_companhia_aerea5'] = get_field('destino_companhia_aerea5', $id);
  $arr['valor_inicial_passagem5'] = get_field('valor_inicial_passagem5', $id);
	$arr['link'] = get_field('link', $id);

  return $arr;
}

function get_monte_sua_viagem($id){
  $arr['texto_botao'] = get_field('texto_botao', $id);

  return $arr;
}

function get_banner_topo($id){
	  $arr['banner'] = get_field('banner', $id);
		$arr['local'] = get_field('local', $id);
		$arr['frase_avulsa'] = get_field('frase_avulsa', $id);
		$arr['linha1'] = get_field('linha1', $id);
		$arr['linha2'] = get_field('linha2', $id);
		$arr['parcela'] = get_field('parcela', $id);
		$arr['moeda'] = get_field('moeda', $id);
		$arr['valor'] = get_field('valor', $id);
		$arr['centavos'] = get_field('centavos', $id);

  	return $arr;
}

function get_passagens($id){
	  $arr['imagem'] = get_field('imagem', $id);
		$arr['texto_superior_passagens'] = get_field('texto_superior_passagens', $id);
		$arr['texto_inferior_passagens'] = get_field('texto_inferior_passagens', $id);
		$arr['resumo'] = get_field('resumo', $id);
		$arr['parcelas'] = get_field('parcelas', $id);
		$arr['valor'] = get_field('valor', $id);
		$arr['centavos'] = get_field('centavos', $id);
		$arr['moeda_de_pagamento'] = get_field('moeda_de_pagamento', $id);
		$arr['link'] = get_field('link', $id);

  	return $arr;
}

function get_filtro($id){
	  $arr['tipo_evento'] = get_field('tipo_evento', $id);
		$arr['tipo_preco'] = get_field('tipo_preco', $id);
		$arr['tipo_moeda'] = get_field('tipo_moeda', $id);
		$arr['tipo_localidade'] = get_field('tipo_localidade', $id);


  	return $arr;
}

/*
				PÁGINA SALINAS
*/

function get_salinas_tour($id){
	$arr['texto_superior'] = get_field('texto_superior', $id);
	$arr['texto_inferior'] = get_field('texto_inferior', $id);
	$arr['descricao_secao'] = get_field('descricao_secao', $id);
	$arr['logo_salinas_tour'] = get_field('logo_salinas_tour', $id);

	return $arr;
}

function get_salinas_online($id){
	$arr['categoria'] = get_field('categoria', $id);
	$arr['descricao'] = get_field('descricao', $id);

	return $arr;
}

function get_fones($id){
	$arr['ddd'] = get_field('ddd', $id);
	$arr['telefone'] = get_field('telefone', $id);
	$arr['ddd2'] = get_field('ddd2', $id);
	$arr['telefone2'] = get_field('telefone2', $id);
	$arr['ddd3'] = get_field('ddd3', $id);
	$arr['telefone3'] = get_field('telefone3', $id);
	$arr['ddd4'] = get_field('ddd4', $id);
	$arr['telefone4'] = get_field('telefone4', $id);

	return $arr;
}

/*
				PÁGINA CORPORATIVO
*/

function get_empresa($id){
	$arr['texto_superior'] = get_field('texto_superior', $id);
	$arr['texto_inferior'] = get_field('texto_inferior', $id);

	return $arr;
}

function get_aerotur50($id){
	$arr['historia'] = get_field('historia', $id);
	$arr['missao'] = get_field('missao', $id);
	$arr['visao'] = get_field('visao', $id);
	$arr['valores'] = get_field('valores', $id);
	$arr['motivacao'] = get_field('motivacao', $id);

	return $arr;
}

function get_equipe($id){
	$arr['foto'] = get_field('foto', $id);
	$arr['nome'] = get_field('nome', $id);
	$arr['cargo'] = get_field('cargo', $id);

	return $arr;
}

function get_razoes_corp($id){
	$arr['imagem'] = get_field('imagem', $id);
	$arr['texto_superior'] = get_field('texto_superior', $id);
	$arr['texto_inferior'] = get_field('texto_inferior', $id);

	return $arr;
}
?>
