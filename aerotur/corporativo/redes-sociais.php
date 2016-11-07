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
 <div class="container-fluid" id="bg-footer-zero">
 <div clss="row">
   <div class="container">
     <div class="footer-zero">
       <div class="col-xs-4 col-md-4 coluna-social-footer-titulo" id="coluna-esquerda-footer-zero">
         <p id="titulo-red">AEROTUR NAS</p>
         <h2 id="titulo-redes">REDES SOCIAIS</h2>
       </div>
       <div class="col-xs-4 col-md-4" id="coluna-esquerda-footer-zero">
         <ul class="list-unstyled list-inline coluna-social-footer" id="social-icons">
           <?php
             $args_post = array('post_type' => 'redes_sociais', 'posts_per_page'=>400);
              $myposts_post = get_posts( $args_post );
              foreach ( $myposts_post as $post_post ){
                setup_postdata( $post_post );
                $id = $post_post->ID;
                 $redessociais = get_redes_sociais($id);
                 if(!empty($redessociais['facebook'])){
                 ?>
                 <li><span class="box-c"><a href="<?= $redessociais['facebook']?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a></span></li>
                 <?php }
                 if(!empty($redessociais['instagram'])){
                 ?>
                 <li><span class="box-c"><a href="<?= $redessociais['instagram']?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Instagram"></i></a></span></li>
                 <?php }
                 if(!empty($redessociais['twitter'])){
                 ?>
                 <li><span class="box-c"><a href="<?= $redessociais['twitter']?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a></span></li>
                 <?php }
                 if(!empty($redessociais['vimeo'])){
                 ?>
                 <li><span class="box-c"><a href="<?= $redessociais['vimeo']?>" target="_blank"><i class="fa fa-vimeo" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vimeo"></i></a></span></li>
                 <?php }
                 if(!empty($redessociais['flickr'])){
                 ?>
                 <li><span class="box-c"><a href="<?= $redessociais['flickr']?>" target="_blank"><i class="fa fa-flickr" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Flickr"></i></a></span></li>
              <?php }
            }?>
           </ul>
         </div>
       </div> <!-- FIM footer-zero -->
     </div>
   </div> <!-- FIM row -->
 </div> <!-- FIM container-fluid -->
