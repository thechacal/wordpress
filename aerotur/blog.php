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
 <!--start  HEADER  -->
 <?php //get_header(); ?>
 <!-- Apontando para o header personalizado da página com listagem de posts  -->
 <?php include('blog-header.php') ?>
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

       <!-- start LISTAGEM COM AS POSTAGENS DO BLOG -->
       <?php include('blog-interna.php') ?>
       <!-- end LISTAGEM COM AS POSTAGENS DO BLOG -->

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
