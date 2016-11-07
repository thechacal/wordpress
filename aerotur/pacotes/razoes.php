<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
    $razoes = get_ativar();
 ?>
 <section style="<?php if($razoes['ativar_razao'] == false){echo 'display:none;';} ?>" id="razoes">
   <div id="razoes"></div>
<div class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <p id="titulo-color">3 RAZÕES PARA</p>
        <h2 id="subtitulo-color">ESCOLHER A AEROTUR</h2>
      </div>
    </div>
  </div> <!-- FIM row -->
</div> <!-- FIM container -->

<div class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <ul id="slippry-demo">
          <?php
          $args_post = array('post_type' => 'razoes_aerotur', 'posts_per_page'=>400);
        	$myposts_post = get_posts( $args_post );
        	foreach ( $myposts_post as $post_post ){
        		setup_postdata( $post_post );
        		$id2 = $post_post->ID;
            $razoes = get_razoes($id2);
            if(!empty($razoes['banner']['url'])){
            ?>
            <li>
              <img src="<?= $razoes['banner']['url']?>">
            </li>
          <?php }
        } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
 </section>
