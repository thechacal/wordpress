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
    $imgs_admin = customLoginLogo();
 ?>
<!-- menu-topo -->
<section style="<?php if($menu['ativar_menu'] == false){echo 'display:none;';} ?>" id="menu">
<div class="containter-fluid space-pills hidden-xs">
  <div class="container">
    <div class="col-xs-12 col-sm-5 col-md-5 col-md-offset-4 kill-padding-left">
      <ul class="nav nav-pills style-pills-top">
        <li role="presentation"><div class="bubble"></div><a href="" id="btnempresa">A EMPRESA</a> <!-- EMPRESA -->
          <div class="mega-menu-empresa">

           <?php
             $args_post = array('post_type' => '50anos_corporativo', 'posts_per_page'=>1);
             $myposts_post = get_posts( $args_post );
             foreach ( $myposts_post as $post_post ){
               setup_postdata( $post_post );
               $id = $post_post->ID;
               $aerotur50 = get_aerotur50($id);
             }
           ?>
              
            <div class="col-md-4">
              <ul class="nav nav-tabs mega-menu">
                <li id="mm_historia"><a href="#">50 ANOS</a></li>
                <li id="mm_missao"><a href="#">MISSÃO E VALORES</a></li>
                <li id="mm_equipe"><a href="#">EQUIPE</a></li>
              </ul>
            </div>

            <div id="mm_historia" class="col-md-8 middle-mega-menu"> <!-- HISTORIA -->
              <div class="img-mega-menu-over">
                  <div class="post-destaque-mm logo-mega-menu hover-img" style="background-image: url(<?= $imgs_admin['logo_mega_menu_a_empresa']['url'] ?>);">
                  </div>
              </div>
              <h2>50 anos da Aerotur</h2>
              <p><?= $aerotur50['historia'] ?></p>
            </div>

            <div id="mm_missao" class="col-md-8 middle-mega-menu"> <!-- MISSAO E VALORES -->
              <div class="img-mega-menu-over">
                  <div class="post-destaque-mm logo-mega-menu hover-img" style="background-image: url(<?= $imgs_admin['logo_mega_menu_a_empresa']['url'] ?>);">
                  </div>
              </div>
              <h2>Missão</h2>
              <?= $aerotur50['missao'] ?>
              <h2>Valores</h2>
              <?= $aerotur50['valores'] ?>
            </div>

            <div id="mm_equipe" class="col-md-8 middle-mega-menu"> <!-- EQUIPE -->
              <h2>Equipe</h2>
              <div class="image-destaque-over">
                  <div class="post-destaque-mm equipe-mega-menu hover-img" style="background-image: url(<?= $imgs_admin['equipe_mega_menu']['url'] ?>);">
                  </div>
              </div>

            </div>
      
          </div>
        </li>
        <li role="presentation"><div class="bubble"></div><a href="" id="btnempresa">PACOTES</a> <!-- PACOTES -->
          <div class="mega-menu-pacotes">
              
            <div class="col-md-4">
              <ul class="nav nav-tabs mm-pacotes">
                <a href="#D" data-toggle="tab" id="hiddenthat"><li class="nav">DESTAQUE</li></a>
                <a id="li_nac" data-toggle="tab"><li class="nav text-decor">NACIONAIS</li></a>
                <a id="li_int" data-toggle="tab"><li class="nav text-decor">INTERNACIONAIS</li></a>
                <a id="li_cru" data-toggle="tab"><li class="nav text-decor">CRUZEIROS</li></a>
              </ul>
            </div>

            <?php
               $args_post = array('post_type' => 'pacotes', 'meta_key' => 'destacar_mega_menu', 'meta_value' => 'sim', 'posts_per_page'=> 1);
               $myposts_post = get_posts( $args_post );
               foreach ( $myposts_post as $post_post ){
                   setup_postdata( $post_post );
                   $id = $post_post->ID;
                   $pacotes = get_pacotes($id);
                   $link_post = get_post_permalink($id);
            ?>

            <div class="col-md-4 middle-mm-pacotes tab-pane fade in active" id="D">
              <h2><?= $pacotes['texto_superior_pacote'] ?> <?= $pacotes['texto_inferior_pacote'] ?></h2>

              <div class="condicoes-pacotes">                
                <div class="cond-moeda"><p><?= $pacotes['moeda_de_pagamento']?></p></div>
                <div class="cond-preco">
                  <p><?= $pacotes['valor'] ?></p>
                  <div class="cond-parcelas"><p><?= $pacotes['parcelas']?> de</p></div>
                  <div class="cond-centavos"><p>,<?= $pacotes['centavos']?></p></div>
                </div>
                <div class="texto-condicoes"><?= $pacotes['observacao_mega_menu']?></div>
              </div>

              <p>Pacote Inclui:</p>
              <ul class="pacotes-list">
                <?php
                  $arry_list = explode(";", $pacotes['pacote_inclui_mega_menu']);
                  for ($i = 0; $i < 4; $i++) { 
                    echo '<li>'.$arry_list[$i].'</li>';
                  }
                ?>
              </ul>

              <a class="btn btn-danger btn-lg btn-quero-pacotes center-block" href="<?= $link_post ?>">Quero</a>
            </div>

            <div class="col-md-4 right-mm-pacotes">

              <a href="<?= $link_post ?>"><div class="image-destaque-over">
                    <div class="post-destaque-mm hover-img" style="background-image: url(<?= $pacotes['banner']['url'] ?>);">
                    </div>
              </div></a>

            </div>

            <?php } ?> <!-- fim foreach -->

            <div class="tab-content">
                <div class="tab-pane fade box-pacotes-mm" id="A"> <!-- NACIONAIS -->

                    <?php
                       $cont = 0;
                       $args_post = array('post_type' => 'pacotes', 'cat' => 66, 'posts_per_page'=>10);
                       $myposts_post = get_posts( $args_post );
                       foreach ( $myposts_post as $post_post ){
                           setup_postdata( $post_post );
                           $id = $post_post->ID;
                           $pacotes = get_pacotes($id);
                           $link_post = get_post_permalink($id);
                    ?>
                    <?php if ($pacotes['filtro_eventos'] == 'Pacotes Nacionais') { ?>
                    <div class="col-md-6">
                        <a href="<?= $link_post ?>">
                          <div class="pacote-und-mm" style="text-decoration: none !important;">
                          <?= $pacotes['texto_superior_pacote']?> <?= $pacotes['texto_inferior_pacote']?>
                          </div>
                        </a>
                    </div>
                    <?php } ?>

                  <?php } ?> <!-- fim foreach -->
                </div>
                <div class="tab-pane fade box-pacotes-mm" id="B"> <!-- INTERNACIONAIS -->
                  <?php
                       $cont = 0;
                       $args_post = array('post_type' => 'pacotes', 'cat' => 66, 'posts_per_page'=>10);
                       $myposts_post = get_posts( $args_post );
                       foreach ( $myposts_post as $post_post ){
                           setup_postdata( $post_post );
                           $id = $post_post->ID;
                           $pacotes = get_pacotes($id);
                           $link_post = get_post_permalink($id);
                    ?>
                    <?php if ($pacotes['filtro_eventos'] == 'Pacotes Internacionais') { ?>
                    <div class="col-md-6">
                        <a href="<?= $link_post ?>">
                          <div class="pacote-und-mm" style="text-decoration: none !important;">
                          <?= $pacotes['texto_superior_pacote']?> <?= $pacotes['texto_inferior_pacote']?>
                          </div>
                        </a>
                    </div>
                    <?php } ?>

                  <?php } ?> <!-- fim foreach -->
                </div>
                <div class="tab-pane fade box-pacotes-mm" id="C"> <!-- CRUZEIROS -->
                    <?php
                       $cont = 0;
                       $args_post = array('post_type' => 'pacotes', 'cat' => 66, 'posts_per_page'=>10);
                       $myposts_post = get_posts( $args_post );
                       foreach ( $myposts_post as $post_post ){
                           setup_postdata( $post_post );
                           $id = $post_post->ID;
                           $pacotes = get_pacotes($id);
                           $link_post = get_post_permalink($id);
                    ?>
                    <?php if ($pacotes['filtro_eventos'] == 'Cruzeiros') { ?>
                    <div class="col-md-6">
                        <a href="<?= $link_post ?>">
                          <div class="pacote-und-mm" style="text-decoration: none !important;">
                          <?= $pacotes['texto_superior_pacote']?> <?= $pacotes['texto_inferior_pacote']?>
                          </div>
                        </a>
                    </div>
                    <?php } ?>

                  <?php } ?> <!-- fim foreach -->
                </div>
            </div>

            <!-- -->
      
          </div>
        </li>
        <!-- <li role="presentation"><a href="http://aeroturnovo.quadradigital.com.br/pacotes/">PACOTES</a></li> -->
        <li role="presentation"><div class="bubble"></div><a href="" id="btnblog">BLOG</a> <!-- BLOG -->
          <div class="mega-menu-blog">
            <div class="col-md-12">
            <h1>Últimas postagens</h1>
              <ul class="lista-posts-mm">

              <?php

                $paged = get_query_var('paged');

                if($paged == 0){
                  $paged = 1;
                }
                if(isset($_GET['categoria'])){
                  $custom_args = array(
                      'post_type' => 'post',
                      'posts_per_page' => 3,
                      'category_name' => $_GET['categoria'],
                      'paged' => $paged
                    );
                }else{
                  $custom_args = array(
                      'post_type' => 'post',
                      'posts_per_page' => 3,
                      'paged' => $paged
                    );
                }

                $custom_query = new WP_Query( $custom_args );
                $tam = 0;
                if ( $custom_query->have_posts() ) :
                  while ( $custom_query->have_posts() ) : $custom_query->the_post();
                  $categoria = get_the_category();
                  $img_post = wp_get_attachment_image_src( get_post_thumbnail_id(), array(386,285)) ;
                ?>
                
                <li>
                  <a href="<?= get_post_permalink(); ?>"><div class="image-box-over">
                    <div class="post-unico-mm hover-img" style="background-image: url(<?= $img_post[0]; ?>);">
                    </div>
                  </div></a>
                  <div class="data-post-mm">
                  <p class="date-day-mm-blog text-center"><?= get_the_date('d'); ?></p>
                  <p class="date-MY-mm-blog text-center"><?= get_the_date('M, Y'); ?></p>
                  </div>
                  <div class="categorias-mm">
                    <ul>
                      <?php if ($categoria) {
                            $duascat = 0;
                              foreach($categoria as $categoria) {
                                if ($duascat < 2) { // Limitando exibição de duas categorias por postagem
                                  ?><li><a class="text-link-mm" style="text-decoration: none;" href="/blog/?categoria=<?php echo $categoria->slug." ";?>"><?php echo $categoria->name." ";?></a></li>
                      <?php     } 
                              $duascat++;
                              }                                
                            }   
                      ?>
                    </ul>
                  </div>
                  <div class="rodape-post-mm text-center">
                    <span><a style="text-decoration: none;" href="<?= get_post_permalink(); ?>"><?= get_the_title(); ?></a></span>
                  </div>
                </li>
                <?php
                  endwhile;
                  endif;
                ?>
              </ul>
            </div>
            <div class="row text-center">
              <a class="btn btn-danger btn-lg btn-menu-lojas" href="<?= get_site_url()."/blog/"?>" style="margin-top: 65px; width: 220px; color: #FFF !important; font-family: AileronHeavy, Helvetica, Verdana, Sans-Serif !important;">Todas postagens</a>  
            </div>
          </div>
        </li>
        <li role="presentation"><div class="bubble"></div><a href="" id="btnlojas">LOJAS</a> <!-- LOJAS -->
          <div class="mega-menu-lojas">
          <div class="col-md-12">
            <h1>Onde estamos</h1>
            <ul>
              <?php
                 $args_post = array('post_type' => 'endereco', 'posts_per_page'=>4, 'order'=>'ASC');
                 $myposts_post = get_posts( $args_post );
                 foreach ( $myposts_post as $post_post ){
                     setup_postdata( $post_post );
                       $id2 = $post_post->ID;
                       $enderecos = get_enderecos($id2);
              ?>
              <li class="img-mega-menu-loja">
                <div class="image-box-over"> <div class="img-mega-menu-loja hover-img" style="background-image: url(<?= $enderecos['img_loja_mega_menu'] ?>);"></div> </div>
                <div class="loja-titulo-mm"><?= $enderecos['texto_loja']?></div>
                <div class="phone-loja-mm">
                  <span><?= $enderecos['ddd']?> </span>
                  <span><?= $enderecos['telefone']?></span>
                  <div class="endereco-loja-mm">
                    <p><?= $enderecos['endereco_loja']?></p>
                  </div>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div><!--
            <div class="col-md-12 text-center">
              <a class="btn btn-danger btn-lg btn-menu-lojas" href="" style="margin-top: 120px; width: 220px; color: #FFF !important; font-family: AileronHeavy, Helvetica, Verdana, Sans-Serif !important;">Mais detalhes</a>  
            </div> -->
        </div>
        </li>
        <li role="presentation"><div class="bubble"></div><a href="#sessao_contato" id="btncontato">CONTATO</a></li> <!-- CONTATO -->
      </ul>
    </div>
    <!--start REDES SOCIAIS TOPO -->
    <?php include('redes-sociais-topo.php') ?>
    <!--end REDES SOCIAIS TOPO -->
  </div>
</div>
</section>