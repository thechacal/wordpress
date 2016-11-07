jQuery(document).ready(function(){
  jQuery('#slippry-demo').slippry({
  	controls: false
  	//pager: false // remove o pager do slider
  })
});

jQuery(document).ready(function(){
  jQuery('#slider-topo').slippry({
  	controls: false,
  	pager: false,
  	controls: true
  	//pager: false // remove o pager do slider
  })
});

jQuery(document).ready(function(){
  
  $('input[type="checkbox"]').on('change', function() {
      $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  });


      $('.filtro_pacote').change(function() {
          var arr = [];
          var cont = 0;
          $('.filtro_pacote').each(function() {

                      var id = $(this).attr('id');
                      var chec = document.getElementById(id).checked;
                    
                      if(chec === true){
                          arr[cont] = id;
                          cont = cont +1;

                      }

           });

           var lista_id = "";

           for (var i = 0; i < arr.length; i++) {          
                lista_id = lista_id + '.'+arr[i]+'_div_pacote';
           };
           
           $('.allitem_div_pacote').hide('slow').removeClass('pacote_ativo');

          $(''+lista_id+'').each(function() {
            
                  var has = $(this).hasClass('preco_ativo');

                  if( has === true){
                    // console.log('hassa');
                      
                      $(this).show('slow').addClass('pacote_ativo');

                  }

           });
                
      });


      $('.filtro_pacote_parcela').change(function(){ 
         
          var id3 = $(this).attr('id');
          var de = parseInt($(this).attr('de'));
          var ate = parseInt($(this).attr('ate'));

          if(id3 == 'allitem_parcela'){
            // console.log('aa');

            $('.allitem_div_pacote').each(function() {  

                  var has2 = $(this).hasClass('pacote_ativo');

                  if( has2 === true ){
                       
                       $(this).show('slow').addClass('preco_ativo'); 
                  }

            });


          }else{

             
              $('.allitem_div_pacote').each(function() {
                     var id2 = $(this).attr('id');
                     var valor = parseInt($('.parcela_'+id2).text().replace(".", ""));
                     
                     // console.log('de '+de);
                     // console.log('ate '+ate);
                     // console.log('valor '+valor);
                     
                     var has = $('#'+id2+'').hasClass('pacote_ativo');
                         if( has === true){

                           if((valor >= de) && (valor <= ate)){
                                $('#'+id2).show('slow');
                               
                                $('#'+id2).addClass('preco_ativo');

                              
                           }else{
                                $('#'+id2).hide('slow');
                                 $('#'+id2).removeClass('preco_ativo');
                           }
                      }
               });

          }


      });


      // $('.monte-box-form-footer').mouseover(function() {

      //     $('.outer-form').css({ opacity: '1'});

      // }); 

      // $('.monte-box-form-footer').mouseout(function() {

      //     $('.outer-form').css({ opacity: '0'});

      // }); 


});


      jQuery(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });


      jQuery(document).ready(function(){
       
        $('.btn_tenho_int').click(function(){
              $('html, body').animate({scrollTop: $('#sessao_contato').offset().top -120});
          });

        $('#btncontato').click(function(){
              $('html, body').animate({scrollTop: $('#sessao_contato').offset().top -120});
          });

        

        $('#btnlojas').click(function(){
              $('html, body').animate({scrollTop: $('#sessao_lojas').offset().top -120});
          });

        $('#btnempresa').click(function(){
              $('html, body').animate({scrollTop: $('#sessao_empresa').offset().top -580});
          });





        $('.monte-box-form-footer').mouseover(function() {

              $('.outer-form').show();
              $('.outer-form').css({
                opacity: '1'
              });
        });


          $('.container_testehover').mouseenter(function() {
                  $('.outer-form').css({
                      opacity: '0' //0
                    });
          });


        $('.monte-box-form-footer').mouseleave(function() {

                  //    console.log($('.outer-div').is(":hover"));
            

                  // console.log('=='+$('.monte-box-form-footer').is(":hover"));
                  
      

              if($('.outer-div').is(":hover")){
                  
                   // console.log('aqui');
                      // console.log('éé'+$('.outer-form').is(":hover"));
              }else{
                    $('.outer-form').css({
                      opacity: '0' //0
                    });

                    $('.outer-form').hide();
                   // console.log('aqui2');
              }
        });

        $('.outer-form').mouseleave(function() {

              if(! ($('.monte-box-form-footer').is(":hover")) ){
                    $('.outer-form').css({
                      opacity: '0'
                    });

                    $('.outer-form').hide();
              }
        });

      });
       


        $(document).ready(function(){
        $('selector').slippry();

         $('#slippry').slippry({
          controls: false,
          prevClass: 'nullprev',
          nextClass: 'nullnext'
        });

         $('#slippry50anos').slippry();

        });
        


        $(document).ready(function(){

          // adicionando a paginação da página aberta do blog como ativa

          var str = $(location).attr('href');
          var segments = str.split( '/' );
          var page = segments[5];

          var page2 = segments[0] + "//" + segments[2] + "/" + segments[3] + "/";

          if (str === page2)
          {
            $('a.item-1').parent().addClass("active");
          }

          $('a.item-'+page).parent().addClass("active");

        });


        $(document).ready(function(){
          var str = $(location).attr('href');
          var segments = str.split( '/' );
          var page = segments[3];
          var categoria = segments[4];

          if (page === 'pacotes')
          {
            $('#m-logo-t').css("background-image", "url(http://aeroturnovo.quadradigital.com.br/wp-content/themes/aerotur/assets/img/logo_aerotur.png)");
            $('.menuviagens').css('background','#9B0D1C');
            $('.m-viagens-t').css('color','#FFF');
            /*
            $('.menuviagens span').text('GRUPO');
            $('.m-viagens-t').css('color','#B7986D');
            $('.menuviagens').css('border-top', '3px solid #B7986D');
            $('#link-pacotes').attr('href', segments[0] + "//" + segments[2] + "/");
            $('.menuviagens').hover(function(){
              $('.m-viagens-t').css('color','#FFF');
              $(this).css('background','#B7986D');
            }, function(){
              $('.m-viagens-t').css('color','#B7986D');
              $(this).css('background','#FFF');
            });
            */
            if (categoria === '?cat=cruzeiros') {
              $('#allitem').click();
              $('#Cruzeiros').click();
            } else if (categoria === '?cat=internacionais') {
              $('#allitem').click();
              $('#PacotesInternacionais').click();
            } else if (categoria === '?cat=nacionais') {
              $('#allitem').click();
              $('#PacotesNacionais').click();
            }
          } else if (page === '' || page == 'blog') {
            $('#m-logo-t').css("background-image", "url(http://aeroturnovo.quadradigital.com.br/wp-content/themes/aerotur/assets/img/logo_aerotur.png)");
          } else if (page === 'corporativo') {
            $('#m-logo-t').css("background-image", "url(http://aeroturnovo.quadradigital.com.br/wp-content/themes/aerotur/assets/img/logo_aerotur.png)");
            
            $('.menucorp').css('background','#195e85');
            $('.m-corp-t').css('color','#FFF');
            /*
            $('.menucorp span').text('GRUPO');
            $('.m-corp-t').css('color','#B7986D');
            $('.menucorp').css('border-top', '3px solid #B7986D');
            $('#link-corp').attr('href', segments[0] + "//" + segments[2] + "/");
            $('.menucorp').hover(function(){
              $('.m-corp-t').css('color','#FFF');
              $(this).css('background','#B7986D');
            }, function(){
              $('.m-corp-t').css('color','#B7986D');
              $(this).css('background','#FFF');
            });
            */
          } else if (page === 'salinas') {
            $('#m-logo-t').css("background-image", "url(http://aeroturnovo.quadradigital.com.br/wp-content/themes/aerotur/assets/img/logo_aerotur.png)");
            $('#btnempresa').css('display', 'none');
            $('#btnblog').css('display', 'none');
            $('.menusalinas').css('background','#3abfba');
            $('.m-salinas-t').css('color','#FFF');
          } else {
            $('#m-logo-t').css("background-image", "url(http://aeroturnovo.quadradigital.com.br/wp-content/themes/aerotur/assets/img/logo_aerotur.png)");
          }
        });


        $(document).ready(function(){
          var endereco = window.location.href;
          if (endereco === 'http://aeroturnovo.quadradigital.com.br/') {
            $('.tit_raz').css('color','#9b0d1a');
          }
        });


        $(document).ready(function(){
         /*
          $('div.infoBox p').css('color', '#FFF');
          $('div.infoBox p').css('font-weight', '700');
          $('div.infoBox p').css('margin-top', '10px');
          $('.infoBox').css('background-color', '#b7986d');
          $('.infoBox').css('border', '1px solid #b7986d');
          */
        });

        $(document).ready(function(){
          // JQUERY MASK PLUGIN
          $('.inputTelefone').mask('(00) 0000-0000');
          $('#inputCelular').mask('(00) 00000-0000');
          $('#inputIDA').mask('00/00/0000');
          $('#inputVolta').mask('00/00/0000');
        }); 


        $(document).ready(function(){
          // Add smooth scrolling to all links
          $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
              // Prevent default anchor click behavior
              //event.preventDefault();

              // Store hash
              var hash = this.hash;

              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top
              }, 800, function(){
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
              });
            } // End if
          });
        });

        $(document).ready(function(){

          // Menu Pacotes

          $('#A').mouseover(function(event){
            event.preventDefault();
            $('#li_nac li.nav').css('background', '#e5e5e5');
            $('#A').addClass('in active');
            $('#B').removeClass('in active');
            $('#C').removeClass('in active');
          });
          $('#B').mouseover(function(event){
            event.preventDefault();
            $('#li_int li.nav').css('background', '#e5e5e5');
            $('#B').addClass('in active');
            $('#A').removeClass('in active');
            $('#C').removeClass('in active');
          });
          $('#C').mouseover(function(event){
            event.preventDefault();
            $('#li_cru li.nav').css('background', '#e5e5e5');
            $('#C').addClass('in active');
            $('#A').removeClass('in active');
            $('#B').removeClass('in active');
          });

          $('#A').mouseleave(function(event){
            event.preventDefault();
            $('#li_nac li.nav').css('background', 'rgba(255, 255, 255, 0)');
            $('#A').removeClass('in active');
            $('#C').removeClass('in active');
          });
          $('#B').mouseleave(function(event){
            event.preventDefault();
            $('#li_int li.nav').css('background', 'rgba(255, 255, 255, 0)');
            $('#C').removeClass('in active');
            $('#A').removeClass('in active');
            $('#B').removeClass('in active');
          });
          $('#C').mouseleave(function(event){
            event.preventDefault();
            $('#li_cru li.nav').css('background', 'rgba(255, 255, 255, 0)');
            $('#C').removeClass('in active');
            $('#B').removeClass('in active');
          });

          $('#li_nac li.nav').mouseover(function(event){
            event.preventDefault();
            $('#A').addClass('in active');
            $('#B').removeClass('in active');
            $('#C').removeClass('in active');
          });
          $('#li_int li.nav').mouseover(function(event){
            event.preventDefault();
            $('#B').addClass('in active');
            $('#A').removeClass('in active');
            $('#C').removeClass('in active');
          });
          $('#li_cru li.nav').mouseover(function(event){
            event.preventDefault();
            $('#C').addClass('in active');
            $('#B').removeClass('in active');
            $('#A').removeClass('in active');
          });

          $('#li_nac li.nav').mouseleave(function(event){
            event.preventDefault();
            $('#B').removeClass('in active');
            $('#C').removeClass('in active');
            $('#A').removeClass('in active');
          });
          $('#li_int li.nav').mouseleave(function(event){
            event.preventDefault();
            $('#A').removeClass('in active');
            $('#C').removeClass('in active');
            $('#B').removeClass('in active');
          });
          $('#li_cru li.nav').mouseleave(function(event){
            event.preventDefault();
            $('#B').removeClass('in active');
            $('#A').removeClass('in active');
            $('#C').removeClass('in active');
          });

          // Menu A Empresa

          $('li#mm_historia').mouseover(function(){
            $('div#mm_historia').css('display','block');
            $('div#mm_equipe').css('display','none');
            $('div#mm_missao').css('display','none');
          });
          $('li#mm_equipe').mouseover(function(){
            $('div#mm_equipe').css('display','block');
            $('div#mm_missao').css('display','none');
            $('div#mm_historia').css('display','none');
          });
          $('li#mm_missao').mouseover(function(){
            $('div#mm_missao').css('display','block');
            $('div#mm_historia').css('display','none');
            $('div#mm_equipe').css('display','none');
          });

        });