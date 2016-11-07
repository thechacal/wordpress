<?php
/**
 * The Footer template for our theme
 *
 * @package aerotur
 * @subpackage aerotur
 * @since Aerotur 1.0
 */
    $rodape = get_ativar();
 ?>
 <section style="<?php if($rodape['ativar_footer'] == false){echo 'display:none;';} ?>" id="footer">

</section>

 <div class="container-fluid">
   <div class="row">
     <div class="footer-five">
       <a href="#"><img src="<?php bloginfo('template_url') ?>/imgs/logoquadra.png" height="60" width="128" class="img-responsive center-block"></a>
     </div> <!-- FIM footer-five -->
   </div> <!-- FIM row -->
 </div> <!-- FIM container-fluid -->
</footer> <!-- FIM footer -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php bloginfo('template_url') ?>/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="<?php bloginfo('template_url') ?>/assets/dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<script src="<?php bloginfo('template_url') ?>/assets/js/infobox.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/markerclusterer.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/mapa.js"></script>

<script src="<?php bloginfo('template_url') ?>/assets/js/ie10-viewport-bug-workaround.js"></script>

<script src="<?php bloginfo('template_url') ?>/assets/js/slippry.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/scripts.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/r.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/jquery.bxslider.min.js"></script>

<script>
 $(document).ready(function(){
   $('selector').slippry()
 });
</script>

<script>
  $(document).ready(function(){
    $('.slider4').bxSlider({
      slideWidth: 365,
      minSlides: 1,
      maxSlides: 3,
      moveSlides: 1,
      pager: false,
      slideMargin: 10
    });
  });
  </script>

  <script>
        $('#form_contato').submit(function() {
          var dados = $('#form_contato').serialize();
          $.ajax({
          type: 'POST',
          dataType: 'html',
          url: 'http://aeroturnovo.quadradigital.com.br/wp-content/themes/aerotur/envia_pagina_contato.php',
          async: true,
          data: dados,
/*
    error: function(enviado) {
        alert(dados);
        },
*/
    success: function(enviado) {
        alert("enviado para contas@quadradigital.com.br");
        }

        });
          return false;
        });
   </script>

   <script type="text/javascript">

      var thumbs = jQuery('#thumbnails').slippry({
        // general elements & wrapper
        slippryWrapper: '<div class="slippry_box thumbnails" />',
        // options
        transition: 'horizontal',
        pager: false,
        auto: false,
        onSlideBefore: function (el, index_old, index_new) {
          jQuery('.thumbs a img').removeClass('active');
          jQuery('img', jQuery('.thumbs a')[index_new]).addClass('active');
        }
      });

      jQuery('.thumbs a').click(function () {
        thumbs.goToSlide($(this).data('slide'));
        return false;
      });

    </script>
</body>

</html>
