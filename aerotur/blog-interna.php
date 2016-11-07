<?php
/**
 * Template Name: blog
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
 ?>
 <!-- AQUI INICIA O CONTEÚDO DO BLOG -->

      <div class="container-fluid">
        <div class="container">
          <div class="col-xs-12 col-sm-12 col-md-12 blog-mobile-titulo">
            <h4 id="titulo-color">BLOG</h4>
            <h2 class="subtitulo-blog" id="subtitulo-color">O MELHOR DESTINO</h2>
          </div>
        </div>
      </div>

      <div class="container-fluid space-down">
        <div class="container">
          <div class="row">
            <div class="col-xs-1 col-sm-8 col-md-8">
              <?php
              //$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

              $paged = get_query_var('paged');


              if($paged == 0){
                $paged = 1;
              }

              if(isset($_GET['tag'])){
                $custom_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'tag' => $_GET['tag'],
                    'paged' => $paged
                  );
              }else if(isset($_GET['categoria'])){
                $custom_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'category_name' => $_GET['categoria'],
                    'paged' => $paged
                  );
              }else{
                $custom_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'paged' => $paged
                  );
              }
              $custom_query = new WP_Query( $custom_args );
              if ( $custom_query->have_posts() ) :
                while ( $custom_query->have_posts() ) : $custom_query->the_post();
                $posttags = get_the_tags();
                $categoria = get_the_category();
                $img_post = wp_get_attachment_image_src( get_post_thumbnail_id(), array(386,285)) ;
              ?>
              <div class="col-xs-12">
                <h2><a style="color: #EDBD7B; !important; text-decoration: none;" href="<?= get_post_permalink(); ?>"><?= get_the_title(); ?></a></h2>
                <div class="col-xs-12 img-lista-posts">
                  <a href="<?= get_post_permalink(); ?>"><img src="<?= $img_post[0]?>" class="pull-left img-blog-responsive"></a>
                  <div class="col-xs-12 meta-post">
                      <a style="color: #333; !important; text-decoration: none;" href="<?= get_post_permalink(); ?>"><span class="meta-data"><p><?= get_the_date('j \d\e F \d\e Y'); ?></p></span></a>
                  </div>
                </div>
                <div class="col-xs-12">
                  <p class="meta-tags"><i class="fa fa-user" aria-hidden="true"></i>
                    <span class="meta-titles">Autor: <span class="meta-info-text"><?= get_the_author(); ?></span></span> <i class="fa fa-tag" aria-hidden="true"></i>
                    <span class="meta-titles">Categorias: <span class="meta-info-text">
                      <?php if ($categoria) {
                        foreach($categoria as $categoria) {
                          ?><a style="text-decoration: none;" href="/blog/?categoria=<?php echo $categoria->slug." ";?>"><?php echo $categoria->name." ";?></a>
                  <?php }
                      }?>
                    </span></span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <span class="meta-titles">Tags: <span class="meta-info-text">
                      <?php if ($posttags) {
                        foreach($posttags as $tag) {
                          ?><a style="text-decoration: none;" href="/blog/?tag=<?php echo $tag->slug." ";?>"><?php echo $tag->name." ";?></a>
                  <?php }
                      }?>
                      </span></span></p>
                      <a style="color: #333; !important; text-decoration: none;" href="<?= get_post_permalink(); ?>"><p style="text-decoration: none;" class="resumo-post"><?= get_the_excerpt(); ?></p></a>
                    </a>
                  <a href="<?= get_post_permalink(); ?>" class="btn btn-danger pull-right">LEIA MAIS</a>
                </div>
              </div>
              <?php
              endwhile;
              ?>
              <ul class="pagination">
                <?php
                if(isset($_GET['tag'])){?>
                  <li>
                     <a style="<?php if($paged == 1){ echo 'pointer-events: none; cursor: default;'; } ?>" href="<?= get_site_url()?>/blog/page/<?= $paged-1 ?>/?tag=<?= $_GET['tag']?>" aria-label="Previous">
                       <span aria-hidden="true">&laquo;</span>
                     </a>
                 </li>
                  <?php }
                else if(isset($_GET['categoria'])){?>
                  <li>
                     <a style="<?php if($paged == 1){ echo 'pointer-events: none; cursor: default;'; } ?>" href="<?= get_site_url()?>/blog/page/<?= $paged-1 ?>/?categoria=<?= $_GET['categoria']?>" aria-label="Previous">
                       <span aria-hidden="true">&laquo;</span>
                     </a>
                 </li>
                  <?php
                }else{?>
                  <li>
                     <a style="<?php if($paged == 1){ echo 'pointer-events: none; cursor: default;'; } ?>" href="<?= get_site_url()."/blog/page/"?><?= $paged-1 ?>" aria-label="Previous">
                       <span aria-hidden="true">&laquo;</span>
                     </a>
                 </li>
               <?php }
                for ($i=1; $i <= $custom_query->max_num_pages; $i++) {
                  if(isset($_GET['tag'])){?>
                    <li><a class="item-<?= $i ?>" href="<?= get_site_url()."/blog/page/".$i."/?tag=".$_GET['tag']?>"><?= $i ?></a></li>
                    <?php }
                  else if(isset($_GET['categoria'])){?>
                    <li><a class="item-<?= $i ?>" href="<?= get_site_url()."/blog/page/".$i."/?categoria=".$_GET['categoria']?>"><?= $i ?></a></li>
                    <?php
                  }else{?>
                    <li><a class="item-<?= $i ?>" href="<?= get_site_url()."/blog/page/"?><?=$i?>"><?= $i ?></a></li>
                    <?php }
                }
                  if(isset($_GET['tag'])){?>
                    <li>
                       <a style="<?php if($paged == $custom_query->max_num_pages){ echo 'pointer-events: none; cursor: default;'; } ?>" href="<?= get_site_url()?>/blog/page/<?= $paged+1 ?>/?tag=<?= $_GET['tag']?>" aria-label="Next">
                         <span aria-hidden="true">&raquo;</span>
                       </a>
                   </li>
                    <?php }
                  else if(isset($_GET['categoria'])){?>
                    <li>
                       <a style="<?php if($paged == $custom_query->max_num_pages){ echo 'pointer-events: none; cursor: default;'; } ?>" href="<?= get_site_url()?>/blog/page/<?= $paged+1 ?>/?categoria=<?= $_GET['categoria']?>" aria-label="Next">
                         <span aria-hidden="true">&raquo;</span>
                       </a>
                   </li>
                    <?php
                  }else{?>
                    <li>
                       <a style="<?php if($paged == $custom_query->max_num_pages){ echo 'pointer-events: none; cursor: default;'; } ?>" href="<?= get_site_url()."/blog/page/"?><?= $paged+1 ?>" aria-label="Next">
                         <span aria-hidden="true">&raquo;</span>
                       </a>
                   </li>
                 <?php } ?>
              </ul>
              <?php
              wp_reset_postdata();
              else:
              ?>
              <p><?php _e( 'Sem Posts.' ); ?></p>
              <?php endif; ?>
            </div>
            <div class="col-xs-1 col-md-4 sidebar_blog_estilo">

              <div id="sidebar_blog_titulo"><h4>CATEGORIAS</h4></div> <!-- TITULO -->

                <ul class="list-unstyled"> <!-- LOOP DENTRO DO UL -->
                  <?php
           				$args = array('child_of' => get_cat_ID('post'), 'hide_empty'=>0, 'orderby' => 'name', 'order' => 'ASC');
           				$categories = get_categories( $args );
           				foreach($categories as $category) {
           			?>
                  <li class="categoria_estilo"><a href="/blog/?categoria=<?= $category->slug ?>"><?= $category->name;?></a></li>
            <?php }?>
                </ul>

              <div id="sidebar_blog_titulo"><h4>MAIS VISTOS</h4></div> <!-- TITULO -->

                <div class="row">
                  <?php
                                $args = array( 'post_type' => 'post', 'posts_per_page'=>3, 'meta_key'=>'_cont_temp','orderby' => 'meta_value_num','order'=> 'DESC');
                                $myposts = get_posts( $args );
                                foreach ( $myposts as $post ){
                                    setup_postdata( $post );
                                    $id = $post->ID;
                                    $img = wp_get_attachment_image_src( get_post_thumbnail_id($id), array(2000,2000)) ;
                                    $views = get_post_meta($id,'_cont_temp');
                  ?>

                  <a href="<?= get_post_permalink();?>">
                    <div class="col-xs-12">
                      <div class="lateral-blog-img" style="background-image:url(<?= $img[0] ?>)"></div>  <!-- INSIRA AQUI DENTRO DA IMAGEM -->
                      <h3 class="l-t-noticia"><?= get_the_title();?></h3>
                      <p class="l-t-info">Visualizações: <span><?= $views[0] ?></span></p>
                      <p class="l-t-info-e"><?= get_the_date('j \d\e F \d\e Y'); ?></p>
                    </div>
                  </a>
<?php }?>
                </div>

              <div id="sidebar_blog_titulo"><h4>TAGS</h4></div> <!-- TITULO -->

                <ul class="list-unstyled"> <!-- LOOP DENTRO DO UL -->
                  <?php
                  $custom_args = array(
                      'post_type' => 'post',
                      'orderby' => 'name',
                      'order' => 'DESC',
                      'posts_per_page' => 5000
                  );
                  $custom_query = new WP_Query( $custom_args );
                  if ( $custom_query->have_posts() ) :
                    while ( $custom_query->have_posts() ) : $custom_query->the_post();
                      $posttags = get_the_tags();
                      if ($posttags) {
                        foreach($posttags as $tag) {
           			?>
                  <li class="categoria_estilo"><a href="/blog/?tag=<?=$tag->slug?>"><?=$tag->name?></a></li>
              <?php }
                  }
                    endwhile;
                    endif;
                  ?>
                </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- /AQUI FINALIZA O CONTEÚDO DO BLOG -->
