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
 <body>

   <!-- Fixed navbar - NÃO EXIBE NO MOBILE -->
   <nav  class="navbar navbar-default navbar-fixed-top line-fixed-top hidden-xs">
     <div class="cont_largura container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand center-block" href="<?= get_site_url(); ?>" id="navbar-logo"></a>
       </div>
       <div id="navbar" class="collapse navbar-collapse navpersonal">
         <ul class="nav navbar-nav navbar-styles">
           <li><a target="_parent" href="/pacotes/" class="viagens-navbar" role="button" aria-haspopup="true" aria-expanded="false">VIAGENS</a></li>
           <li><a target="_parent" href="/corporativo/" class="corp-navbar" role="button" aria-haspopup="true" aria-expanded="false">CORPORATIVO</a></li>           
           <li><a target="_parent" href="http://www.aeroturteen.com.br/" class="teen-navbar" role="button" aria-haspopup="true" aria-expanded="false">TEEN</a></li>
           <li><a target="_parent" href="http://www.viajefacil.aerotur.com.br/" class="viaje-navbar" role="button" aria-haspopup="true" aria-expanded="false">VIAJE FÁCIL</a></li>
           <li><a target="_parent" href="/salinas/" class="salinas-navbar" role="button" aria-haspopup="true" aria-expanded="false">SALINAS</a></li>
         </ul>
       </div><!--/.nav-collapse -->
     </div>
   </nav>
