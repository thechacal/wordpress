<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
    $recomendacoes = get_ativar();
 ?>
 <section style="<?php if($recomendacoes['ativar_recomendacoes'] == false){echo 'display:none;';} ?>" id="recomendacoes">
   <?php
   $args_post = array('post_type' => 'recomendacao', 'order' => 'ASC', 'posts_per_page'=>500);
   $myposts_post = get_posts( $args_post );
   foreach ( $myposts_post as $post_post ){
       setup_postdata( $post_post );
       $id = $post_post->ID;
       $recomendacoes = get_recomendacoes($id);
       if($recomendacoes['palavra_chave_recomendacao']!=''){
    ?>
   <div class="container-fluid">
     <div class="row">
       <div class="container">
         <div class="col-xs-12 col-sm-12 col-md-12">
           <p id="titulo-color">CONHEÇA AS</p>
           <h2 id="subtitulo-color">RECOMENDAÇÕES DOS NOSSOS CLIENTES</h2>
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
        <?php
            $args_post = array('post_type' => 'recomendacao', 'order' => 'ASC', 'posts_per_page'=>500);
            $myposts_post = get_posts( $args_post );
            foreach ( $myposts_post as $post_post ){
                setup_postdata( $post_post );
                $id2 = $post_post->ID;
                $recomendacoes = get_recomendacoes($id2);
         ?>
         <div class="outer-box"> <!-- caixa criada para que ao mudar o promo-img para position:relative as demais caixas laterais não ficarem sobre a primeira caixa -->
         <div class="col-xs-12 col-md-3 promo-img recomendacao-clientes" style="background-image:url(<?= $recomendacoes['banner']['url'] ?>)">
            <div class="recomenda-cliente">
              <div class="col-xs-3 col-sm-3 col-md-3">
                <img class="img-bordas" src="<?= $recomendacoes['imagem_autor']['url']?>" width="52" height="52">
              </div>
              <div class="col-xs-9 col-sm-9 col-md-9">
                <h5 class="media-nome"><?= $recomendacoes['autor']?>:</h5>
              <h4 class="media-local"><?= strtoupper($recomendacoes['palavra_chave_recomendacao'])?></h4>
              </div>
              <div class="col-xs-12">
                <p class="media-info"><?php
                if (strlen($recomendacoes['recomendacao']) > 100){
                  $recomendacoes['recomendacao'] = substr($recomendacoes['recomendacao'], 0, 300);
                  $recomendacoes['recomendacao'] = trim($recomendacoes['recomendacao']) . "...";
                }
                echo $recomendacoes['recomendacao'];
                ?></p>
              </div>
            </div>
              <div class="rodape-recomendacoes text-center">
              </div>
          </div>
          </div>
      <?php

      }?>
    </div>
    </div>
  </div>
</div>
</section>
