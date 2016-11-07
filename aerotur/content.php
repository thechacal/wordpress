<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package aeroteen
 * @subpackage aeroteen
 * @since Aeroteen 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array(2000,2000));
?>
      <div class="container-fluid space-down">
        <div class="row">
          <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 blog-box-img">
              <h4 id="titulo-color">BLOG</h4>
              <h2 class="subtitulo-blog" id="subtitulo-color">O MELHOR DESTINO</h2>
              <div style="background-image:url(<?= $img[0]?>)" class="size-img-blog">

              </div>
                  <div class="col-xs-12 col-sm-7 col-md-7 blog-box-bg-l">
                    <div class="col-xs-12 col-sm-2 col-md-2">
                      <article class="col">
                        <div class="spacer"></div>
                          <div class="blog-circulo center-block">
                            <p class="text-center blog-data-dia"><?php the_time('j'); ?></p>
                            <p class="text-center blog-data-mes"><?php the_time('F'); ?></p>
                          </div>
                      </article>
                    </div>
                    <div class="col-xs-12 col-sm-10 col-md-10 div-blog-titulo-img">
                      <p class="blog-titulo-img"><?php the_title(); ?></p>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-5 col-md-5 blog-box-bg-r">

                    <div class="col-xs-4 col-sm-3 col-md-3 box-social-twitter">
                      <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    <div class="col-xs-4 col-sm-3 col-md-3 box-social-facebook">
                      <?php
                        $link = "https://www.facebook.com/plugins/like.php?href=".get_site_url().$_SERVER ['REQUEST_URI'];
                        echo "<iframe src=\"".$link."&width=69&layout=button_count&action=like&size=small&show_faces=true&share=false&height=21&appId\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowTransparency=\"true\"></iframe>";
                      ?>
                    </div>
                  </div>

              <div class="col-xs-12 col-sm-7 col-md-7 col-md-offset-1 content-blog">
                <p><?php the_content(get_the_ID()); ?></p>
              </div>

              <div class="col-xs-12 col-sm-4 col-md-4 content-blog-sidebar">
                <h4 class="text-right titulo-sidebar">Você também vai gostar de ler:</h4>

                <?
                $args_post = array('post_type' => 'post', 'posts_per_page'=>4, 'order'=>'DESC');
                $myposts_post = get_posts( $args_post );
                foreach ( $myposts_post as $post_post ){
                  setup_postdata( $post_post );
                  $id_post = $post_post->ID;
                  $titulo_post = get_the_title($id_post);
                  $conteudo_post = wp_strip_all_tags(get_the_content(), false);
                  $link_post = get_post_permalink($id_post);
                  $img_post = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), array(386,285)) ;
                  if(get_the_ID()!=$id_post){
                ?>

                <a href="<?= $link_post ?>"><div class="sidebar-posts-extra" style="background-image:url(<?= $img_post[0]?>)">
                  <div class="sidebar-img-dados">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                      <div class="sidebar-circulo center-block">
                        <p class="text-center sidebar-data-dia"><?= get_the_date('j',$id_post); ?></p>
                        <p class="text-center blog-data-mes"><?= get_the_date('F',$id_post); ?></p>
                      </div>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 sidebar-img-text">
                      <?php 
                        if( strlen($titulo_post) > 64 ) {
                          $new_ttl = str_split($titulo_post,60);
                          echo $new_ttl[0].' [...]';
                        } else {
                          echo $titulo_post;
                        }
                      ?>
                    </div>
                    <div class="resumo-blog-post">
                    <p><?= get_the_excerpt(); ?></p>
                    </div>
                  </div>
                </div>
              </a>
                <?php }
              }?>
              </div>



              <!--

              <div class="col-xs-12">
                  <div class="sidebar-posts-extra" style="background-image:url(<?= $img_post[0]?>)">
                    <div class="sidebar-img-dados">
                      <div class="col-xs-2 sidebar-circulo center-block">
                        <p class="text-center sidebar-data-dia"><?= get_the_date('j',$id_post); ?></p>
                        <p class="text-center blog-data-mes"><?= get_the_date('F',$id_post); ?></p>
                      </div>
                      <div class="col-xs-10 col-sm-10 col-md-10 sidebar-img-text">
                        <a href="<?= $link_post ?>"><?= $titulo_post ?></a>
                      </div>
                    </div>
                  </div>
                </div>



              -->




              <!-- INÍCIO COMENTÁRIOS
              <div class="col-xs-12 col-sm-7 col-md-7 col-md-offset-1 content-blog-comentario">
                <h4>Deixe seu comentário</h4>

                <div class="row">
                  <form>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                          <label class="sr-only" for="inputNome">Nome</label>
                          <input type="text" class="form-control input-lg" id="inputNome" placeholder="Nome">
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                          <label class="sr-only" for="inputEmail">Email</label>
                          <input type="email" class="form-control input-lg" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-xs-12 col-sm-10 col-md-10">
                          <textarea class="form-control input-lg" rows="3" placeholder="Digite seu comentário"></textarea>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2 comentarios-botao">
                          <button type="submit" class="btn btn-danger btn-lg">OK</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div> /FIM COMENTÁRIOS -->
            </div>
          </div> <!-- /FIM container -->
        </div> <!-- /FIM row -->
      </div>  <!-- /FIM container-fluid -->
<?php include('facebook.php') ?>
