<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
 $args_post = array('post_type' => 'pacotes', 'posts_per_page'=>500);
 $myposts_post = get_posts( $args_post );
 foreach ( $myposts_post as $post_post ){
    setup_postdata( $post_post );
     $id = $post_post->ID;
     $pacotes = get_pacotes($id);
     if($pacotes['promocional']){
 ?>
      <div class="container-fluid">
        <div class="row">
          <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <p id="titulo-color">PROMOÇÕES</p>
              <h2 id="subtitulo-color">IMPERDÍVEIS</h2>
            </div>
          </div>
        </div> <!-- FIM row -->
      </div> <!-- FIM container-fluid -->
      <?php
        break;
        }
      }
      ?>
      <div class="container-fluid space-down">
        <div class="row">
          <div class="container">
            <div class="col-xs-12 col-md-12">
              <?php
              $args_post = array('post_type' => 'pacotes', 'posts_per_page'=>500);
              $myposts_post = get_posts( $args_post );
              foreach ( $myposts_post as $post_post ){
                 setup_postdata( $post_post );
                  $id2 = $post_post->ID;
                  $pacotes = get_pacotes($id2);
                  $link_post = get_post_permalink($id2);
              ?>
              <!-- SÓ EXIBE A PROMOÇÃO SE ELA FOI DEFINIDA COMO PROMOÇÃO NA SEÇÃO PACOTES -->
              <?php if($pacotes['promocional']){ ?>
              <a href="<?= $link_post ?>">
               <div class="promocao-imper" style="background-image:url(<?= $pacotes['banner']['url']?>)">
                <div class="col-xs-12 col-md-8 box-v-valor-imperdivel">
                   <h5>A PARTIR DE</h5>
                   <span id="imperdivel-moeda"><?= $pacotes['moeda_de_pagamento']?></span>
                   <span id="imperdivel-valor"><?= $pacotes['valor']?></span>
                   <span id="imperdivel-centavos">,<?= $pacotes['centavos']?></span>
                   <span id="imperdivel-astesrisco">*</span>
                 </div>
                 <div class="caixa-cinza">
                   <div class="col-xs-12 col-md-4 box-l-promo-imperdivel">
                     <h2><?= $pacotes['destino']?></h2>
                     <h4>Emissões até <?= $pacotes['deadline']?></h4>
                     <h5>Saídas de <?= $pacotes['local_saida']?></h5>
                     <p>*<?php
                     if (strlen($pacotes['condicoes']) > 50){
                       $pacotes['condicoes'] = substr($pacotes['condicoes'], 0, 100);
                       $pacotes['condicoes'] = trim($pacotes['condicoes']) . "...";
                     }
                     echo $pacotes['condicoes'];
                     ?></p>
                   </div>
                 </div>
               </div>
              </a>
              <?}
            }?>
            </div>
          </div>
        </div> <!-- FIM row -->
      </div> <!-- FIM container-fluid -->
