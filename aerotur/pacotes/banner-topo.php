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
       <ul id="slider-topo">

        <div class="busca-passagens">
          <iframe width="280"

          height="360"

          scrolling="yes"

          frameborder="0"

          src="http://compra.portaldaagencia.com.br/viajefacilaerotur"

          noresize="">

          </iframe>
        </div>

         <?php
         $args_post = array('post_type' => 'banner_topo', 'posts_per_page'=>400);
         $myposts_post = get_posts( $args_post );
         foreach ( $myposts_post as $post_post ){
           setup_postdata( $post_post );
           $id2 = $post_post->ID;
           $banner_topo = get_banner_topo($id2);
           if(!empty($banner_topo['banner']['url']&&$banner_topo['local']=='Outras Páginas')){
         ?>
            <li class="slide_topo_banner" style="background-image:url(<?= $banner_topo['banner']['url']?>);">
              <!-- <img class="img-responsive" src="<?= $banner_topo['banner']['url']?>"> -->
            </li>

            
         <?php }
       } ?>
       </ul>
     </div>
   </div>
