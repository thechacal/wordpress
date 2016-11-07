<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
 $ativar_acesso_exclusivo = get_ativar();
 ?>
<div class=" slide_all_div container-fluid">
<div class="row">
<ul id="slider-topo">
  <?php
  $args_post = array('post_type' => 'banner_topo', 'posts_per_page'=>400);
  $myposts_post = get_posts( $args_post );
  foreach ( $myposts_post as $post_post ){
    setup_postdata( $post_post );
    $id2 = $post_post->ID;
    $banner_topo = get_banner_topo($id2);
    if(!empty($banner_topo['banner']['url']&&$banner_topo['local']=='Corporativo')){
  ?>
  <li style="width: 100%;height: 500px;background-image:url('<?= $banner_topo['banner']['url']?>')">
    <section style="<?php if($ativar_acesso_exclusivo['ativar_acesso_exclusivo'] == false){echo 'display:none;';} ?>" id="acesso_exclusivo">
    <div class="form_all_slide">
       <div class="form_all_slide2">
            <h4 class="titulo_form_slide">Acesso exclusivo</h4>
            <div class="div_form_all_b">
                <p>Sistema de Gestão de Viagens Corporativas</p>
                <form>
                    <p class="corpora_p">Digite seu login</p>
                    <input name="login" placeholder="">
                    <p class="corpora_p">Digite sua senha</p>
                    <input placeholder="">
                    <button type="submit">ENTRAR</button>
                </form>
            </div>
        </div>
       <div id="sessao_empresa"></div>
    </div>
  </section>
  </li>
  <?php }
} ?>
</ul>
</div>
</div>
