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
 <div class="menu_2_redes col-xs-12 col-sm-3 col-md-3 pull-right social-top-icons hidden-xs">
   <ul class="list-unstyled list-inline pull-right">
     <?php
         $args_post = array('post_type' => 'redes_sociais', 'posts_per_page'=>400);
         $myposts_post = get_posts( $args_post );
         foreach ( $myposts_post as $post_post ){
           setup_postdata( $post_post );
           $id2 = $post_post->ID;
           $redessociais = get_redes_sociais($id2);
           if(!empty($redessociais['facebook'])){
           ?>
           <li><span class="box-small-c"><a href="<?= $redessociais['facebook']?>" target="_blank"><i class="fa fa-facebook fa-small" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a></span></li>
          <?php }
          if(!empty($redessociais['instagram'])){
          ?>
          <li><span class="box-small-c"><a href="<?= $redessociais['instagram']?>" target="_blank"><i class="fa fa-instagram fa-small" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Instagram"></i></a></span></li>
          <?php }
          if(!empty($redessociais['twitter'])){
          ?>
          <li><span class="box-small-c"><a href="<?= $redessociais['twitter']?>" target="_blank"><i class="fa fa-twitter fa-small" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a></span></li>
          <?php }
          if(!empty($redessociais['vimeo'])){
          ?>
          <li><span class="box-small-c"><a href="<?= $redessociais['vimeo']?>" target="_blank"><i class="fa fa-vimeo fa-small" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vimeo"></i></a></span></li>
          <?php }
          if(!empty($redessociais['flickr'])){
          ?>
          <li><span class="box-small-c"><a href="<?= $redessociais['flickr']?>" target="_blank"><i class="fa fa-flickr fa-small" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Flickr"></i></a></span></li>
           <?php }
         }?>
   </ul>
 </div>
