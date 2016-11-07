<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
    //$grupo_aerotur = get_grupo_aerotur();
    $grupo_aerotur = get_ativar();
 ?>

 <section style="<?php if($grupo_aerotur['ativar_grupo'] == false){echo 'display:none;';} ?>" id="grupo">
   <div id="grupo"></div>

<div class=container-fluid id="bg-footer-two">
  <div class="row">
    <div class="container">
      <div class="footer-two" id="footer-two">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <p class="">GRUPO AEROTUR</p>
        </div>
      </div> <!-- FIM footer-two -->
    </div>
  </div> <!-- FIM row -->
</div> <!-- FIM container-fluid -->

<div class="container-fluid">
  <div class="row">
    <div class="footer-three">
      <div class="container">
        <?php
        $cont=0;
        $args_post = array('post_type' => 'grupo_aerotur', 'posts_per_page'=>400);
    		$myposts_post = get_posts( $args_post );
    		foreach ( $myposts_post as $post_post ){
          $cont+=1;
    			setup_postdata( $post_post );
    			$id2 = $post_post->ID;
          $grupo_aerotur = get_grupo_aerotur($id2);
          if(!empty($grupo_aerotur['logo']['url'])){
            if($cont==1){
            ?>
              <div class="col-xs-12 col-sm-2 col-md-2 col-md-offset-1">
              <a href="<?= $grupo_aerotur['linklogo']?>" target="_blank"><img src="<?= $grupo_aerotur['logo']['url']?>" height="54" width="181" class="img-responsive center-block"></a>
              </div>
        <?php }else{
          ?>
          <div class="col-xs-12 col-sm-2 col-md-2">
          <a href="<?= $grupo_aerotur['linklogo']?>" target="_blank"><img src="<?= $grupo_aerotur['logo']['url']?>" height="54" width="181" class="img-responsive center-block"></a>
          </div>
        <?}
        }
      }?>
      </div>
    </div> <!-- FIM footer-three -->
  </div> <!-- FIM row -->
</div> <!-- FIM container-fluid -->
</section>
