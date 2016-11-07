<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
   $banner_topo = get_ativar();
 ?>
<section style="<?php if($banner_topo['ativar_banner_topo'] == false){echo 'display:none;';} ?>" id="topo">
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

           // print_r($banner_topo);

           $moeda = get_field('Moeda',$id2);

           if(!empty($banner_topo['banner']['url']&&$banner_topo['local']=='Outras Páginas')){
         ?>

            <li class="slide_topo_banner" style="background-image:url(<?= $banner_topo['banner']['url']?>);">
              <!-- <img class="img-responsive" src="<?= $banner_topo['banner']['url']?>"> -->

            <?php

            if ($banner_topo['frase_avulsa'] != null) {

            	echo '<div class="frase_avulsa"><p>'.$banner_topo['frase_avulsa'].'</p></div>';

            } else {

	            if ($banner_topo['linha1'] == null || $banner_topo['linha2'] == null || $banner_topo['parcela'] == null || $banner_topo['valor'] == null || $banner_topo['centavos'] == null || $moeda == null) {

	            } else {

	              echo '

	            <div class="info_foto_banner">
	              <p class="linha_um"><span class="bnn-titulo">'.$banner_topo['linha1'].'</span></p>
	              <p class="linha_dois"><span class="bnn-lugar">'.$banner_topo['linha2'].'</span></p>
	              <p class="linha_tres"><span class="bnn-apartir">A PARTIR DE <span class="bnn-parcela">'.$banner_topo['parcela'].'</span> DE</span></p>
	              <p class="linha_quatro"><span class="bnn-moeda">'.$moeda.'</span><span class="bnn-vlr">'.$banner_topo['valor'].'</span><span class="bnn-centavos">,'.$banner_topo['centavos'].'</span></p>

	              <button type="button" class="btn_tenho_int btn btn-danger btn-info-banner pull-down"><a  href="#sessao_contato" style="color: #fff; !important; text-decoration: none !important;">TENHO INTERESSE</a></button>
	            </div>

	            ';

	            }

            }

            ?>

            </li>


            <li class="slide_topo_banner" style="background-image:url(<?= $banner_topo['banner']['url']?>);">
              <!-- <img class="img-responsive" src="<?= $banner_topo['banner']['url']?>"> -->

              <?php

            if ($banner_topo['linha1'] == null || $banner_topo['linha2'] == null || $banner_topo['parcela'] == null || $banner_topo['valor'] == null || $banner_topo['centavos'] == null || $moeda == null) {

            } else {

              echo '

            <div class="info_foto_banner">
              <p class="linha_um"><span class="bnn-titulo">'.$banner_topo['linha1'].'</span></p>
              <p class="linha_dois"><span class="bnn-lugar">'.$banner_topo['linha2'].'</span></p>
              <p class="linha_tres"><span class="bnn-apartir">A PARTIR DE <span class="bnn-parcela">'.$banner_topo['parcela'].'</span> DE</span></p>
              <p class="linha_quatro"><span class="bnn-moeda"><?= $moeda ?></span><span class="bnn-vlr">'.$banner_topo['valor'].'</span><span class="bnn-centavos">,'.$banner_topo['centavos'].'</span></p>

              <button type="button" class="btn_tenho_int btn btn-danger btn-info-banner pull-down"><a href="#sessao_contato" style="color: #fff; !important; text-decoration: none !important;">TENHO INTERESSE</a></button>
            </div>

            ';

            }

            ?>

            </li>


         <?php }
       } ?>
       </ul>
     </div>
   </div>
</section>
