<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
 ?>
 <div class="container-fluid">
 <div class="row">
 <div class="container">
   <div class="col-xs-12 col-sm-12 col-md-12" id="titulo-recomendacoes">
     <p id="titulo-color">A</p>
     <h2 id="subtitulo-color">EMPRESA</h2>
    </div>
 </div>
 </div> <!-- FIM row -->
 </div> <!-- FIM container-fluid -->
 <?php
 $args_post = array('post_type' => 'empresa_corporativo', 'posts_per_page'=>1);
 $myposts_post = get_posts( $args_post );
 foreach ( $myposts_post as $post_post ){
 setup_postdata( $post_post );
 $id = $post_post->ID;
 $empresa = get_empresa($id);
 }
 ?>
 <div class="empresa_bg continer-fluid space-down">
 <div class="container list-side-left">
     <h3 class="titulo_empresa"><?= $empresa['texto_superior']?></h3>
     <p class="texto_empresa"><?= $empresa['texto_inferior']?></p>
 </div>

 </div>
