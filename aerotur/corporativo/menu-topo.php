<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
    $menu = get_ativar();
 ?>
 <!-- menu-topo -->
 <div class="containter-fluid space-pills hidden-xs">
	<div class="menu_div2 container cont_largura">
		 <div class="menu_2_divul col-xs-12 col-sm-5 col-md-5 col-md-offset-4 kill-padding-left">
		   <ul class="nav nav-pills style-pills-top">
		     	<li role="presentation"><div class="bubble-c"></div><a href="#sessao_empresa" id="btnempresa">A EMPRESA</a></li>
		        <!-- <li role="presentation"><a href="http://aeroturnovo.quadradigital.com.br/pacotes/">PACOTES</a></li> -->
		        <li role="presentation"><div class="bubble-c"></div><a href="http://aeroturnovo.quadradigital.com.br/blog/">BLOG</a></li>
		        <li role="presentation"><div class="bubble-c"></div><a href="#sessao_lojas" id="btnlojas">LOJAS</a></li>
		        <li role="presentation"><div class="bubble-c"></div><a href="#sessao_contato" id="btncontato">CONTATO</a></li>
		   </ul>
		 </div>
 		<!--start REDES SOCIAIS TOPO -->
 		<?php include('redes-sociais-topo.php') ?>
 	<!--end REDES SOCIAIS TOPO -->
 	</div>
</div>
