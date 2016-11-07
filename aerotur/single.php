<?php
/**
 * The template for displaying all single posts
 *
 * @package aeroteen
 * @subpackage aeroteen
 * @since Aeroteen 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
 $id = $post->ID;
 $cont = get_post_meta($post->ID,'_cont_temp');
  if (!add_post_meta($post->ID, '_cont_temp', '1', true ) ) {
    update_post_meta($post->ID, '_cont_temp', $cont[0]+1);
  }
?>

<!--start  HEADER  -->
<?php get_header(); ?>
<!--end  HEADER  -->

      <!--start MENU TOPO -->
      <?php include('menu-topo-superior.php') ?>
      <!--end MENU TOPO -->

      <!--start MENU TOPO -->
      <?php include('menu-topo.php') ?>
      <!--end MENU TOPO -->

      <!--start BANNER TOPO -->
      <?php include('banner-topo.php') ?>
      <!--end BANNER TOPO -->

      <!--start MONTE SUA VIAGEM -->
      <?php include('monte-sua-viagem.php') ?>
      <!--end MONTE SUA VIAGEM -->

			<!--start TEMPLATE CONTENDO O POST ÚNICO -->
			<?php
        while ( have_posts() ) : the_post();
          get_template_part( 'content' );
        endwhile;
      ?>
      <!--end TEMPLATE CONTENDO O POST ÚNICO -->

			<!--start CONTATO -->
      <?php include('form-contato.php') ?>
      <!--end CONTATO -->

      <!--start MAPA -->
      <?php include('mapa.php') ?>
      <!--end MAPA -->

      <!--start REDES SOCIAIS -->
      <?php include('redes-sociais.php') ?>
      <!--end REDES SOCIAIS -->

      <!--start ENDEREÇOS -->
      <?php include('enderecos.php') ?>
      <!--end ENDEREÇOS -->

      <!--start GRUPO AEROTUR -->
      <?php include('grupo-aerotur.php') ?>
      <!--end GRUPO AEROTUR -->

<!--start  FOOTER  -->
<?php get_footer(); ?>
<!--end  FOOTER  -->
