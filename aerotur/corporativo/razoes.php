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
       <div class="col-xs-12 col-sm-12 col-md-12">
         <p id="titulo-color">RAZÕES PARA</p>
         <h2 id="subtitulo-color">ESCOLHER A AEROTUR</h2>
       </div>
     </div>
   </div> <!-- FIM row -->
 </div> <!-- FIM container -->

 <div class="razoes_all container-fluid space-down">
 <div class="row">
     <div class="container-fluid">
       <div class="row">
         <div class="container">
           <div class="col-xs-12 col-sm-12 col-md-12">
             <ul id="slippry">
                 <?php
                 $cont=1;
                 $args_post = array('post_type' => 'razoes_corporativo', 'posts_per_page'=>500, 'order'=>'ASC');
                 $myposts_post = get_posts( $args_post );
                 foreach ( $myposts_post as $post_post ){
                   setup_postdata( $post_post );
                   $id = $post_post->ID;
                   $razoes_corp = get_razoes_corp($id);
                  ?>
                  <li class="li_slide_razoes">
                     <div class="div_razoes">
                         <img src="<?= $razoes_corp['imagem']['url']?>">
                     </div>
                     <div class="div_razoes">
                       <span><?= $cont;?></span>
                       <p class="tit_raz"><?= $razoes_corp['texto_superior']?></p>
                       <p class="desc_raz"><?= $razoes_corp['texto_inferior']?></p>
                     </div>
                  </li>
               <?php
               $cont++;
              } ?>
             </ul>
           </div>
         </div>
         <div id="sessao_contato"></div>
       </div>
     </div>
 </div>
 </div>
