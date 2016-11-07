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
 <section style="<?php if($menu['ativar_menu'] == false){echo 'display:none;';} ?>" id="menu">
<div class="containter-fluid space-pills hidden-xs">
  <div class="container">
    <div class="col-xs-12 col-sm-5 col-md-5 col-md-offset-4 kill-padding-left">
      <ul class="nav nav-pills style-pills-top">
        <li role="presentation"><div class="bubble-s"></div><a href="http://aeroturnovo.quadradigital.com.br/corporativo/#sessao_empresa" id="btnempresa">A EMPRESA</a></li>
  <!-- <li role="presentation"><a href="http://aeroturnovo.quadradigital.com.br/pacotes/">PACOTES</a></li> -->
        <li role="presentation"><div class="bubble-s"></div><a href="http://aeroturnovo.quadradigital.com.br/blog/" id="btnblog">BLOG</a></li>
        <li role="presentation"><div class="bubble-s"></div><a href="#sessao_lojas" id="btnlojas">LOJAS</a></li>
        <li role="presentation"><div class="bubble-s"></div><a href="#sessao_contato" id="btncontato">CONTATO</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class='row'>
    <div class="linha-under-navbars">
    </div>
  </div>
</div>
    
</section>