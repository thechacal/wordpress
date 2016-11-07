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
       <p id="titulo-color">NOSSA</p>
       <h2 id="subtitulo-color">EQUIPE</h2>
     </div>
   </div>
 </div> <!-- FIM row -->
 </div> <!-- FIM container-fluid -->

 <div class="container-fluid space-down">
 <div class="row">
     <div class="container-fluid">
       <div class="row">
         <div class="container">
           <div class="col-xs-12 col-sm-12 col-md-12">
             <ul id="slippry-demo">
               <li class="li_slide_equipe">
                 <?php
                 $aux=0;
                 $aux2=FALSE;
                 $args_post = array('post_type' => 'equipe_corporativo', 'posts_per_page'=>500);
                 $myposts_post = get_posts( $args_post );
                 foreach ( $myposts_post as $post_post ){
                   $aux++;
                   if($aux2){
                     echo "<li>";
                     $aux2=FALSE;
                   }
                   setup_postdata( $post_post );
                   $id = $post_post->ID;
                   $equipe = get_equipe($id);
                  ?>
                     <div class="div_equipe">
                         <div class="div_equipe_img" style="background-image:url(<?= $equipe['foto']['url']?>) !important"></div>
                         <div class="div_equipe_texto">
                           <h3><?= $equipe['nome']?></h3>
                           <p><?= $equipe['cargo']?></p>
                         </div>
                     </div>
                  <?php
                  if($aux==6){
                      echo "</li>";
                      $aux=0;
                      $aux2=TRUE;
                  }
                }
                if(!$aux2){
                  echo "</li>";
                }
               ?>
             </ul>
           </div>
         </div>
       </div>
     </div>
 </div>
 </div>
