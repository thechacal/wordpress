<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
    $pacotes = get_ativar();
 ?>
 <section style="<?php if($pacotes['ativar_pacotes'] == false){echo 'display:none;';} ?>" id="pacotes">
   <?php
   $args_post = array('post_type' => 'passagens_promocao', 'posts_per_page'=>400);
   $myposts_post = get_posts( $args_post );
   foreach ( $myposts_post as $post_post ){
      setup_postdata( $post_post );
       $id2 = $post_post->ID;
       $pacotes = get_passagens($id2);
       if($pacotes['imagem']['url']!=''){
    ?>
    <div class="container-fluid">
         <div class="row">
           <div class="container">
             <div class="col-xs-12 col-sm-12 col-md-12" id="titulo-recomendacoes">
               <p id="titulo-color">PASSAGENS AÉREAS</p>
               <h2 id="subtitulo-color">PROMOCIONAIS</h2>
               <p id="promocoes-subtitulo">Confira as melhores promoções do mercado de viagens:</p>
             </div>
           </div>
         </div> <!-- FIM row -->
       </div> <!-- FIM container-fluid -->
       <div class="container-fluid space-down">
         <div class="row">
           <div class="container">
             <div class="slider4">
                 <?php
                 $args_post = array('post_type' => 'passagens_promocao', 'posts_per_page'=>400);
                 $myposts_post = get_posts( $args_post );
                 foreach ( $myposts_post as $post_post ){
                    setup_postdata( $post_post );
                     $id2 = $post_post->ID;
                     $pacotes = get_passagens($id2);
                 if(!empty($pacotes['imagem']['url'])){
                 ?>
               <a href="<?= $pacotes['link']?>"><div class="slide">
                   <div class="col-xs-12 col-md-3 promocionais-img" style="background-image:url(<?= $pacotes['imagem']['url']?>)">
                     <div class="promo-dados">
                       <div class="col-xs-6 col-sm-8 col-md-7">
                         <h5 class="promo-title"><?= $pacotes['texto_superior_passagens']?></h5>
                         <h4 class="promo-subtitle"><?= $pacotes['texto_inferior_passagens']?></h4>
                       </div>
                       <div class="col-xs-5 col-sm-3 col-md-4">
                         <h5 class="promo-parcelas text-right">A partir de <?= $pacotes['parcelas']?> de</h5>
                         <h4 class="promo-valor text-right"><?= $pacotes['moeda_de_pagamento']?><?= $pacotes['valor']?><span class="promo-centavos">,<?= $pacotes['centavos']?></span></h4>
                       </div>
                         <p class="desc_pacote"><?= $pacotes['resumo']?></p>
                     </div>
                   </div>
                 </div></a>

                 <?php }
                 }
                 ?>
               </div>
             </div>
           </div>
         </div>
   <?php
     break;
     }
   }
   ?>
</section>
