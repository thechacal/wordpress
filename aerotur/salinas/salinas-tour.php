<?php
/*
  * Template Name: Salinas
  * @package aerotur
  * @subpackage aerotur
  * @since Aerotur 1.0
  * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
  */
  $salinas_tour = get_ativar();
 ?>
 <section style="<?php if($salinas_tour['ativar_salinas_tour'] == false){echo 'display:none;';} ?>" id="salinas_tour">
   <?php
   $args_post = array('post_type' => 'secao_salinas_tour', 'posts_per_page'=>1);
   $myposts_post = get_posts( $args_post );
   foreach ( $myposts_post as $post_post ){
       setup_postdata( $post_post );
       $id2 = $post_post->ID;
       $salinas_tour = get_salinas_tour($id2);
     }
    ?>
    <div class="container-fluid space-down">
      <div class='row'>
      </div>
    </div>


 <div class="container-fluid space-down">
   <div class="row">
      <div class="container">
       <div class="col-xs-12 col-sm-6 col-md-8" id="titulo-recomendacoes">
         <p id="titulo-color"><?= $salinas_tour['texto_superior'] ?></p>
         <h2 id="subtitulo-color"><?= $salinas_tour['texto_inferior'] ?></h2>
            <p><?= $salinas_tour['descricao_secao'] ?></p>
       </div>
       <div class="col-xs-1 col-sm-6 col-md-4">
         <img src="<?= $salinas_tour['logo_salinas_tour']['url']?>" class="center-block">
       </div>
     </div>
   </div> <!-- FIM row -->
 </div> <!-- FIM container-fluid -->
</section>
