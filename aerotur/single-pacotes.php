<?php
/**
 * The template for displaying all single posts
 *
 * @package aeroteen
 * @subpackage aeroteen
 * @since Aeroteen 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
?>

<!--start  FOOTER  -->
<?php //get_header(); ?>
<!--end  FOOTER  -->
<!--start HEADER -->
<?php include('pacotes/header.php') ?>
<!--end HEADER -->

      <!--start MENU TOPO -->
      <?php include('menu-topo-superior.php') ?>
      <!--end MENU TOPO -->

      <!--start MENU TOPO -->
      <?php include('pacotes/menu-topo.php') ?>
      <!--end MENU TOPO -->

      <!--start BANNER TOPO -->
      <?php include('banner-topo.php') ?>
      <!--end BANNER TOPO -->

      <!--start MONTE SUA VIAGEM -->
      <?php include('monte-sua-viagem.php') ?>
      <!--end MONTE SUA VIAGEM -->

      <!--start MONTE SUA VIAGEM -->
      <?php include('detalhes-pacote.php') ?>
      <!--end MONTE SUA VIAGEM -->

      <!--start REDES SOCIAIS -->
      <!-- alterei para o arquivo de promoções imperdíveis dentro da pasta pacotes -->
      <?php include('pacotes/promocoes-imperdiveis.php') ?>
      <!--end REDES SOCIAIS -->

      <!--start REDES SOCIAIS -->
      <!-- alterei para o arquivo de promoções imperdíveis dentro da pasta pacotes -->
      <?php include('pacotes/pacotes-relacionados.php') ?>
      <!--end REDES SOCIAIS -->

      <!--start REDES SOCIAIS -->
      <?php include('recomendacoes.php') ?>
      <!--end REDES SOCIAIS -->

      <!--start REDES SOCIAIS -->
      <?php include('facebook.php') ?>
      <!--end REDES SOCIAIS -->

      <!--start NEWSLETTER -->
      <?php  include('pacotes/newsletter.php') ?>
      <!--end NEWSLETTER -->

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
