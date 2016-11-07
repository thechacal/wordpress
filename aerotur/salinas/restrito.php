<?php
/*
  * Template Name: Salinas
  * @package aerotur
  * @subpackage aerotur
  * @since Aerotur 1.0
  * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
  */
  $restrito = get_ativar();
 ?>
 <section style="<?php if($restrito['ativar_restrito'] == false){echo 'display:none;';} ?>" id="restrito">
<div class="container-fluid space-down">
  <div class="row">
    <div class="container">
      <div class="box-newsletter center-block border-newsletter">
        <div class="col-xs-12 col-md-6" id="acesso-box">
          <div class="col-xs-4 col-md-2 acesso-img">
            <img src="<?php bloginfo('template_url') ?>/assets/img/cadeado.png">
          </div>
          <div class="col-xs-4 col-md-4 acesso-titulo">
            <h2>ACESSO</h2>
          </div>
          <div class="col-md-6 acesso-texto hidden-xs">
            <p>Preencha os campos ao lado para acessar o sistema</p>
          </div>
          <div class="col-xs-12 hidden-lg">
            <p>Preencha os campos abaixo para acessar o sistema</p>
          </div>
        </div>
        <div class="col-xs-12 col-md-6 newsletter-form-position">
          <form class="form-inline">
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputName2" placeholder="Login">
            </div>
            <div class="form-group senha-alinhamento">
              <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Senha">
              <span id="helpBlock2" class="help-block"><small><a href="#">Esqueceu a senha?</a></small></span>
            </div>
            <button type="submit" class="btn btn-danger">OK</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="sessao_lojas"></div>
</section>
