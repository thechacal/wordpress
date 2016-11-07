<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */

   $args_post = array('post_type' => 'pacotes', 'order' => 'ASC', 'posts_per_page'=>500);
   $myposts_post = get_posts( $args_post );
   foreach ( $myposts_post as $post_post ){
       setup_postdata( $post_post );
       $id = $post_post->ID;
       $pacotes = get_pacotes($id);
       if(get_field('palavra_chave_pacote', get_the_ID())==$pacotes['palavra_chave_pacote']&&get_the_ID()!=$id){
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
               <div class="col-xs-12 col-sm-12 col-md-12" id="titulo-recomendacoes">
                  <p id="titulo-color">PACOTES</p>
                  <h2 id="subtitulo-color">RELACIONADOS</h2>
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
               <div class="col-xs-12 col-sm-6 col-md-12">
                 <!-- INICIA AQUI O LAÇO -->
                 <?php
                 $args_post = array('post_type' => 'pacotes', 'order' => 'DESC', 'posts_per_page'=>500);
                 $myposts_post = get_posts( $args_post );
                 foreach ( $myposts_post as $post_post ){
                     setup_postdata( $post_post );
                     $id = $post_post->ID;
                     $link_post = get_post_permalink($id);
                     $pacotes = get_pacotes($id);
                     if(get_field('palavra_chave_pacote', get_the_ID())==$pacotes['palavra_chave_pacote']&&get_the_ID()!=$id){
                  ?>
                  <a href="<?= $link_post ?>">
                 <div class="col-xs-12 col-md-3 promo-img" style="background-image:url(<?= $pacotes['banner']['url']?>)">
                   <div class="promo-dados">
                     <div class="col-xs-6 col-sm-8 col-md-6">
                       <h5 class="promo-title"><?= $pacotes['texto_superior_pacote']?></h5>
                       <h4 class="promo-subtitle"><?= $pacotes['texto_inferior_pacote']?></h4>
                     </div>
                     <div class="col-xs-5 col-sm-3 col-md-5 pacote-valor-l">
                       <h5 class="promo-parcelas text-right">A partir de <?= $pacotes['parcelas']?> de</h5>
                       <h4 class="promo-valor text-right"><?= $pacotes['moeda_de_pagamento'].$pacotes['valor']?></h4>
                     </div>
                     <div class="col-xs-1 col-sm-1 col-md-1 promo-centavos">
                       <span class="text-left">,<?= $pacotes['centavos']?></span>
                     </div>
                     <div class="col-xs-12">
                       <p class="media-info"><?php
                       if (strlen($pacotes['resumo']) > 100){
                         $pacotes['resumo'] = substr($pacotes['resumo'], 0, 300);
                         $pacotes['resumo'] = trim($pacotes['resumo']) . "...";
                       }
                       echo $pacotes['resumo'];
                       ?></p>
                     </div>
                   </div>
                 </div>
               </a>
                 <?php
                      }
                   }
                   ?>
               </div>
             </div>
           </div>
         </div>
