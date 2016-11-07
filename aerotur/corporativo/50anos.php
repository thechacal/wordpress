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
 <?php
 $args_post = array('post_type' => '50anos_corporativo', 'posts_per_page'=>1);
 $myposts_post = get_posts( $args_post );
 foreach ( $myposts_post as $post_post ){
 setup_postdata( $post_post );
 $id = $post_post->ID;
 $aerotur50 = get_aerotur50($id);
 }
 ?>
 <!-- -->
 <div class="container-fluid space-down">
 <div class="row">
   <div class="container">
    <img class="img_50anos" src="<?php bloginfo('template_url') ?>/corporativo/imgs/aerot50.png"/>

     <p class="texto_50anos"><?= $aerotur50['historia']?></p>

   </div>
 </div>
 </div>

 <div id="anos_all50" class="container-fluid space-down">
 <div class="row">
     <div class="container-fluid">
       <div class="row">
         <div class="container">
           <div class="col-xs-12 col-sm-12 col-md-12">
             <ul id="slippry50anos">
               <li class="li_slide_50anos">
                     <div style="background-image:url('<?php bloginfo('template_url') ?>/corporativo/imgs/img_missao.png')" class="div_50anos div_50anosimg">
                     </div>

                     <div class="div_50anos">
                       <span>Nossa</span>
                       <p class="tit_50anos">Missão</p>
                       <p class="desc_50anos"><?= $aerotur50['missao']?></p>
                     </div>
               </li>
               <li>
                     <div style="background-image:url('<?php bloginfo('template_url') ?>/corporativo/imgs/img_missao.png')" class="div_50anos div_50anosimg">
                     </div>

                     <div class="div_50anos">
                       <span>Nossa</span>
                       <p class="tit_50anos">Visão</p>
                       <p class="desc_50anos"><?= $aerotur50['visao']?></p>
                     </div>

               </li>
               <li>
                     <div style="background-image:url('<?php bloginfo('template_url') ?>/corporativo/imgs/img_missao.png')" class="div_50anos div_50anosimg">
                     </div>

                     <div class="div_50anos">
                       <span>Nossos</span>
                       <p class="tit_50anos">Valores</p>
                       <p class="desc_50anos"><?= $aerotur50['valores']?></p>
                     </div>

               </li>
               <li>
                     <div style="background-image:url('<?php bloginfo('template_url') ?>/corporativo/imgs/img_missao.png')" class="div_50anos div_50anosimg">
                     </div>

                     <div class="div_50anos">
                       <span>Nossa</span>
                       <p class="tit_50anos">Motivação</p>
                       <p class="desc_50anos"><?= $aerotur50['motivacao']?></p>
                     </div>

               </li>
             </ul>
           </div>
         </div>
       </div>
     </div>
 </div>
 <div id="nossa_equipe"></div>
 </div>
