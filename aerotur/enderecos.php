<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
    $enderecos = get_ativar();
 ?>
 <section style="<?php if($enderecos['ativar_enderecos'] == false){echo 'display:none;';} ?>" id="enderecos">
 <div class="container-fluid" id="bg-footer-one">
   <div class="row">
     <div  class="container">
       <div class="footer-one" id="footer-one">
         <?php
           $args_post = array('post_type' => 'endereco', 'posts_per_page'=>400, 'order'=>'ASC');
     		   $myposts_post = get_posts( $args_post );
     		   foreach ( $myposts_post as $post_post ){
     			     setup_postdata( $post_post );
     			       $id2 = $post_post->ID;
                 $enderecos = get_enderecos($id2);
         ?>
         <div class="col-xs-12 col-sm-3 col-md-3">
           <div id="footer-one-local">
             <p><?= $enderecos['texto_loja']?></p>
           </div>
           <div id="footer-one-tel">
             <p><span id="ddd-tel"><?= $enderecos['ddd']?></span><?= $enderecos['telefone']?></p>
           </div>
           <hr class="endereco"></hr>
           <div id="footer-one-endereco">
             <p><?= $enderecos['endereco_loja']?></p>
           </div>
         </div>
         <?php } ?>
       </div> <!-- FIM footer-one -->
     </div> <!-- FIM container -->
   </div> <!-- FIM row -->
 </div> <!-- FIM container-fluid -->
</section>
