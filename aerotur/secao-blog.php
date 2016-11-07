<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */

    //PEGANDO AS 3 ÚLTIMAS POSTAGENS DO BLOG DA AEROTUR
    $cont=$cont2=0;
    $args_post = array('post_type' => 'post', 'posts_per_page'=>3, 'order'=>'DESC');
    $myposts_post = get_posts( $args_post );
    foreach ( $myposts_post as $post_post ){
      setup_postdata( $post_post );
      $id_post = $post_post->ID;
      $aerotur[$cont][$cont2] = get_the_date(' j \d\e F \d\e Y',$id_post);
      $cont2++;
      $aerotur[$cont][$cont2] = get_the_title($id_post);
      $cont2++;
      $aerotur[$cont][$cont2] = get_post_permalink($id_post);
      $cont2++;
      $conteudo = wp_strip_all_tags(get_the_content(), false);
      if (strlen($conteudo) > 200){
        $conteudo = substr($conteudo, 0, 200);
        $aerotur[$cont][$cont2] = trim($conteudo) . "...";
        $cont2=0;
      }else{
        $cont2=0;
      }
      $cont++;
    }

    //PEGANDO AS 3 ÚLTIMAS POSTAGENS DO BLOG DA AEROTURTEEN
    $xml = simplexml_load_file('http://www.aeroturteen.com.br/category/blog-blog/feed/');
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Recife');
  ?>
   <div class="container-fluid">
     <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 bg-blogs">
          <div class="container">
            <div class="col-xs-12">
              <div class="col-md-6 side-l-correction">
               <div class="col-xs-12 col-sm-9 col-md-9 bg-textbox-left side-l-correction">
                 <h4>BLOG</h4>
                 <h2>O MELHOR DESTINO</h2>
                 <?php
                 $cont2=0;
                 for($i=0;$i<$cont;$i++){
                  ?>
                 <h5><?= $aerotur[$i][$cont2] ?></h5>
                 <?php $cont2++;?>
                 <h3><?=  $aerotur[$i][$cont2] ?></h3>
                 <?php $cont2++;?>
                 <p><a href="<?= $aerotur[$i][$cont2] ?>" style="color: #fff; !important;"><?php $cont2++; echo $aerotur[$i][$cont2]; ?></a></p>
                 <?php $cont2=0; } ?>
                 <button type="button" class="btn btn-danger btn-lg btn-block btn-posts-red pull-down"><a href="http://aeroturnovo.quadradigital.com.br/blog/" style="color: #fff; !important; text-decoration: none !important;">+ POSTS</a></button>
               </div>
              </div>
              <div class="col-md-6 side-r-correction">
               <div class="col-xs-12 col-sm-9 col-md-9 col-md-offset-3 bg-textbox-right side-r-correction">
                 <h4 class="text-right">BLOG</h4>
                 <h2 class="text-right">AEROTUR DISNEY</h2>
                 <?php
                 for($i=0;$i<$cont;$i++){
                  ?>
                 <h5><?= strftime('%d de %B de %Y', strtotime($xml->channel->item[$i]->pubDate))?></h5>
                 <h3><?= $xml->channel->item[$i]->title?></h3>
                 <p><a class="a-sessao-blog" href="<?= $xml->channel->item[$i]->link?>" style="color: #fff; !important;"><?php
                 $conteudo=$xml->channel->item[$i]->description;
                 if (strlen($conteudo) > 180){
                   $conteudo = substr($conteudo, 0, 180);
                   $conteudo = trim($conteudo) . "...";
                 }
                 echo $conteudo;
                    ?></a></p>
                 <?php } ?>
                 <button type="button" class="btn btn-success btn-lg btn-block btn-posts-green pull-down"><a href="http://www.aeroturteen.com.br/blog/" style="color: #fff; !important; text-decoration: none !important;">+ POSTS</a></button>
               </div>
              </div>
            </div>
           </div>
         </div>
       </div>
     </div>
   </div>