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
      <div class="container-fluid space-down">
        <div class="row">
          <div class="container">
            <div class= "col-xs-12 col-md-12">

              <div class="col-xs-12 col-md-3">
                <span>Filtros:</span>

                <div id="sidebar_blog_titulo"><h4>TIPO</h4></div>

                <div class="checkbox">
                  <label>
                    <input name="evento" class="filtro_pacote" id="allitem" type="checkbox" checked value="">
                    Todos
                  </label>
                </div>
                <?php
                $args_post = array('post_type' => 'filtro_evento', 'posts_per_page'=>400, 'order'=>'ASC');
                $myposts_post = get_posts( $args_post );
                foreach ( $myposts_post as $post_post ){
                    setup_postdata( $post_post );
                    $id = $post_post->ID;
                    $filtro = get_filtro($id);
                ?>
                <div class="checkbox">
                  <label>
                    <input name="evento" class="filtro_pacote" id="<?= str_replace(' ','', $filtro['tipo_evento']) ?>" type="checkbox" value="">
                    <?= $filtro['tipo_evento']?>
                  </label>
                </div>
                <?php }?>

                <div id="sidebar_blog_titulo"><h4>MOEDA</h4></div>

                <div class="checkbox">
                  <label>
                    <input name="moeda" class="filtro_pacote" id="allitem" type="checkbox" checked value="">
                    Todos
                  </label>
                </div>

                <?php
                $args_post = array('post_type' => 'filtro_moeda', 'posts_per_page'=>400, 'order'=>'ASC');
                $myposts_post = get_posts( $args_post );
                foreach ( $myposts_post as $post_post ){
                    setup_postdata( $post_post );
                    $id = $post_post->ID;
                    $filtro = get_filtro($id);
                ?>
                <div class="checkbox">
                  <label>
                    <input name="moeda" class="filtro_pacote" id="<?= str_replace(' ','', $filtro['tipo_moeda']) ?>" type="checkbox" value="">
                    <?= $filtro['tipo_moeda']?>
                  </label>
                </div>
                <?php }?>

                <div id="sidebar_blog_titulo"><h4>PARCELAS A PARTIR DE</h4></div>
                  
                  <div class="checkbox">
                  <label>
                    <input name="preco" class="filtro_pacote_parcela" id="allitem_parcela" type="checkbox" checked value="">
                    Todos
                  </label>
                </div>

                <?php
                $args_post = array('post_type' => 'filtro_preco', 'posts_per_page'=>400, 'order'=>'ASC');
                $myposts_post = get_posts( $args_post );
                foreach ( $myposts_post as $post_post ){
                    setup_postdata( $post_post );
                    $id = $post_post->ID;
                    // $filtro = get_filtro($id);
                    $de = get_field('de',$id);
                    $ate = get_field('ate',$id);
                    $titulo = get_the_title($id);
                ?>
                <div class="checkbox">
                  <label>
                    <input name="preco" class="filtro_pacote_parcela" ate="<?= $ate ?>" de="<?= $de ?>" type="checkbox" value="">
                    <?= $titulo ?>
                  </label>
                </div>
                <?php }?>

                <div id="sidebar_blog_titulo"><h4>LOCALIDADE</h4></div>

                <div class="checkbox">
                  <label>
                    <input name="local" class="filtro_pacote" id="allitem" type="checkbox" checked value="">
                    Todos
                  </label>
                </div>

                <?php
                $args_post = array('post_type' => 'filtro_localidade', 'posts_per_page'=>400, 'order'=>'ASC');
                $myposts_post = get_posts( $args_post );
                foreach ( $myposts_post as $post_post ){
                    setup_postdata( $post_post );
                    $id = $post_post->ID;
                    $filtro = get_filtro($id);
                ?>
                <div class="checkbox">
                  <label>
                    <input name="local" id="<?= str_replace(' ','', $filtro['tipo_localidade']) ?>" class="filtro_pacote"  type="checkbox" value="">
                    <?= $filtro['tipo_localidade']?>
                  </label>
                </div>
                <?php }?>
              </div>
