<?php
/**
 * The Header template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 * Author: Pedro Schneider [ Web Design / pedro@woones.com ], Ramon Carvalho [ Front-end / ramon@oakz.org ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
 ?>
 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <meta name="description" content="">
     <meta name="author" content="">
     <link rel="icon" href="#">
     <meta name="theme-color" content="#B7986D">

     <title><?php wp_title( '-', true, 'right'); bloginfo() ?></title>

     <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/assets/css/slippry.css">

     <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/assets/css/menutopo.css">

     <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/corporativo/assets/css/jquery.bxslider.css">

     <!-- Bootstrap core CSS -->
     <link href="<?php bloginfo('template_url') ?>/assets/dist/css/bootstrap.css" rel="stylesheet">

     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <link href="<?php bloginfo('template_url') ?>/corporativo/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="<?php bloginfo('template_url') ?>/corporativo/css/style-corporativo.css" rel="stylesheet">

     <link href="<?php bloginfo('template_url') ?>/corporativo/css/fonts.css" rel="stylesheet">

     <link href="<?php //bloginfo('template_url') ?>/assets/css/unificado.css" rel="stylesheet">
     
     <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
     <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
     <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
     <script src="<?php bloginfo('template_url') ?>/corporativo/assets/js/ie-emulation-modes-warning.js"></script>

     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
     <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->

     <!-- FontAwesome -->
     <link href="<?php bloginfo('template_url') ?>/assets/js/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">
     
     <script type="text/javascript" src="https://use.fontawesome.com/570e7354cf.js"></script>

     <link href="<?php bloginfo('template_url') ?>/assets/css/fonteawesome.css" rel="stylesheet">

     <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

   </head>
