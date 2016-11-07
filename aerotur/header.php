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

     <!-- CONFIGURAÇÃO DO MAPS -->

      <script async defer
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCF88DKo2KBtZe2VK30w1b9GEefAxuYa2Q&signed_in=true&callback=initMap"></script>

      <script>

     function initMap() {
       var myLatLng = {lat: -5.873102, lng: -35.1800203};

       var map = new google.maps.Map(document.getElementById('maps'), {
         zoom: 17,
         scrollwheel: false,
         draggable: false,
         center: myLatLng
       });

       var marker = new google.maps.Marker({
         position: myLatLng,
         map: map,
         title: 'Av. Engenheiro Roberto Freire,2920 - Ponta Negra'
       });
     }

   </script>

     <!-- EOF~ CONFIGURAÇÃO DO MAPS -->

     <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/assets/css/slippry.css">

     <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/assets/css/menutopo.css">

     <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/assets/css/jquery.bxslider.css">

     <!-- Bootstrap core CSS -->
     <link href="<?php bloginfo('template_url') ?>/assets/dist/css/bootstrap.css" rel="stylesheet">

     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <link href="<?php bloginfo('template_url') ?>/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
     <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

     <!-- Custom styles for this template -->
     <!-- Custom styles for this template -->

    <link href="<?php bloginfo('template_url') ?>/style.css" rel="stylesheet">

     <link href="<?php bloginfo('template_url') ?>/assets/css/fonts.css" rel="stylesheet">

    <link href="<?php bloginfo('template_url') ?>/assets/css/fonteawesome.css" rel="stylesheet">

    <link href="<?php bloginfo('template_url') ?>/assets/css/unificado.css" rel="stylesheet">

     <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
     <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
     <script src="<?php bloginfo('template_url') ?>/assets/js/ie-emulation-modes-warning.js"></script>

     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
     <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->

     <!-- FontAwesome -->
     <link href="<?php bloginfo('template_url') ?>/assets/js/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">
     <script type="text/javascript" src="https://use.fontawesome.com/570e7354cf.js"></script>


     <!-- Busca de passagens ViajeFácil -->

    <link rel="stylesheet" type="text/css" href="https://www.wtsportal.com.br/javascript/jquery.autocomplete.css" />
    <link rel="stylesheet" type="text/css" href="https://www.wtsportal.com.br/javascript/lib/thickbox.css" />
    <link rel="stylesheet" type="text/css" href="https://www.wtsportal.com.br/javascript/lib/jquery.click-calendario-1.0.css" />


    <link href="<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; if ( $actual_link == 'http://aeroturnovo.quadradigital.com.br/') { echo bloginfo("template_url"); } ?>/assets/css/slide.css" rel="stylesheet">

    <script type="text/javascript" src="http://yui.yahooapis.com/combo?2.8.0r4/build/utilities/utilities.js&amp;2.8.0r4/build/container/container-min.js"></script>
    <script type='text/javascript' src='https://www.wtsportal.com.br/javascript/lib/jquery.bgiframe.min.js'></script>
    <script type='text/javascript' src='https://www.wtsportal.com.br/javascript/lib/jquery.ajaxQueue.js'></script>
    <script type='text/javascript' src='https://www.wtsportal.com.br/javascript/jquery.autocomplete.js'></script>
    <script type='text/javascript' src='https://www.wtsportal.com.br/javascript/localdata.js'></script>

     <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

     <script>(function(d, s, id) {
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) return;
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=328210837379610";
     fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));</script>
   </head>
