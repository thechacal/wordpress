jQuery(document).ready(function($) {

	  if($(window).width() <= 1350){

	  	$('.all_banner_laterais').remove();

	  }


	  if($(window).width() <= 1000){

	  	$('#container_box_banner_topo, #container_box_banner_meio').remove();

	  }

	  if($(window).width() <= 650){

	  	$('.banner_video_topo').remove();

	  }




	 var mobile = false;

	 if($(window).width() <= 950){

    	// $('.item_menu_p').attr('href','javascript:void(0)');
    	$('.item_menu_all').each(function(index, el) {
    			
    			if( $(this).find('.item_submenu_p').html() != null){
    				$(this).find('.item_menu_p').attr('href','javascript:void(0)');	
    			}

    	});


    	mobile = true;
    }

    if(index === true){
			var teste_sc = false;
			


			 $(window).scroll(function(){
			 	

				 	if(($(".faixa_menu_topo").offset().top - (window.scrollY || window.pageYOffset || document.body.scrollTop)) <= 0){
					
						if(teste_sc === false){
							 
									$(".box_pit_topo").css({'position': 'fixed', 'margin-top':'0px' });
									$(".menu_pit_topo").css({'position': 'fixed', 'top':'14px'});
							 		$(".menu_pit_topo").addClass('menu_pit_for_mobile_scrool');
									teste_sc = true;
									
									

						}	

					}else{
						if(teste_sc === true){
							 // if($(window).width() <= 1300){
							 // 		 $(".box_pit_topo").css({'top': '213px' });
								// 	$(".menu_pit_topo").css({'position': 'relative', 'top':'-2px'});
							 // }else{
							 

							 	$(".menu_pit_topo").removeClass('menu_pit_for_mobile_scrool');
								$(".box_pit_topo").css({'position': 'absolute', 'margin-top':'213px' });
								$(".menu_pit_topo").css({'position': 'relative', 'top':'-2px'});
							 // }
								teste_sc = false;	
						}
					}

				
		 //             var topo = $(document).scrollTop();

		 //            if (((topo >= 200) && (mobile === false)) || ((topo <= 100) && (mobile === true))){
		 //            	if(teste_sc === false){
		 //             		teste_sc = true;
		             		

		 //                	$('.topo_scrool').addClass('topo_scrool_go');
		 //             		 setTimeout(function(){ $('.topo_scrool').addClass('topo_scrool_go_after') },1);
		 //            	}
		             	
		 //            }

		 //            if (topo <= $('.faixa_topo').height() ) {
		 //            	if(teste_sc === true){
		 //               		teste_sc = false;
		 //               		  $('.topo_scrool').removeClass('topo_scrool_go');
		 //               		  setTimeout(function(){ $('.topo_scrool').removeClass('topo_scrool_go_after') },1);
		 //            	}

		            	
		 //            }

		     });
	}




// 	$('#slideshow_p_all').cycle({
// 		fx:     'scrollHorz', 
// 		prev: '#slideshow_p_prev',
// 		next: '#slideshow_p_next',
// 		speed:  600,
// 		timeout: 4000,
// 		rev:true,
// 	});


// $('#slideshow_p_all').children().each(function(i) {
//         $('<p >a</p>')
//             .appendTo($('.slideshow_p_const')).click(function() {
//                 $('#slideshow_p_all').cycle(i);
//                 return false;
//             });
//     });

	if(index === true){

		$('#slideshow_p_all').bxSlider({
		  nextSelector: '#slideshow_p_prev',
		  prevSelector: '#slideshow_p_next',
		  nextText: '',
		  prevText: ''
		});

		$('#slideshow_capa_esp_all').bxSlider({
		  nextSelector: '#slideshow_capa_esp_prev',
		  prevSelector: '#slideshow_capa_esp_next',
		  pager: false,
		  nextText: '',
		  prevText: ''
		});



		 if($(window).width() <= 1043){
			
			$('#gentear_all_slider_mobile').bxSlider({
			 nextSelector: '#gentear_slide_p_prev',
			  prevSelector: '#gentear_slide_p_next',
			  nextText: '',
			  prevText: ''
			});

		 }else{
		
			$('#gentear_all_slider').bxSlider({
			 nextSelector: '#gentear_slide_p_prev',
			  prevSelector: '#gentear_slide_p_next',
			  nextText: '',
			  prevText: ''
			});
		 	
		 }



		$('#int_gentear_all_slider').bxSlider({
		 nextSelector: '#int_gentear_slide_p_prev',
		  prevSelector: '#int_gentear_slide_p_next',
		  nextText: '',
		  prevText: ''
		});


		
		$('#editorial_all_id').cycle({
			fx:     'scrollHorz', 
			prev: '#prev_editorial',
			next: '#next_editorial',
			speed:  600,
			timeout: 4000000,
			rev:true,
			// before: function(){
		 //           $(this).parent().find('li.currentedit').removeClass();
		 //     },
		 //    after: function(){
		 //           $(this).addClass('currentedit');
		 //     }
		});



		var galerianoar_all = $('#galerianoar_all').bxSlider({
			  nextSelector: '#galerianoar_slide_p_next',
			  prevSelector: '#galerianoar_slide_p_prev',
			  nextText: '',
			  prevText: '',
			  pager: false,
			});

				$('.slide_total_gente').text(galerianoar_all.getSlideCount());

				$('#galerianoar_slide_p_prev, #galerianoar_slide_p_next').click(function() {
					$('.slide_atual_gente').text(galerianoar_all.getCurrentSlide()+1);
				});
			


	}



	$('.faixa_topo_box').cycle({
		fx:     'scrollHorz', 
		prev: '#slide_topo_prev',
		next: '#slide_topo_next',
		speed:  600,
		timeout: 4000,
		rev:true,
	});

	var testepause = true;
	$('#pausa_topo_pause').click(function() { 
		if(testepause === true){
	    	$('.faixa_topo_box').cycle('pause'); 
	    	
	    	$('#pausa_topo_pause').removeClass('fa-pause-circle-o').addClass('fa-play-circle');

	    	testepause = false;
		}else{
			$('.faixa_topo_box').cycle('resume'); 

			$('#pausa_topo_pause').removeClass('fa-play-circle').addClass('fa-pause-circle-o');

			testepause = true;
		}
	});


	function seta_data_topo(){
		var data = new Date(),
	    dia = data.getDate(),
	    mes = data.getMonth() + 1,
	    ano = data.getFullYear();
	    var mes2 = "";

	    if(mes==1){
	    	mes2 = "Jan";
	    }
	    if(mes==2){
	    	mes2 = "Fev";
	    }
	    if(mes==3){
	    	mes2 = "Mar";
	    }
	    if(mes==4){
	    	mes2 = "Abr";
	    }
	    if(mes==5){
	    	mes2 = "Maio";
	    }
	    if(mes==6){
	    	mes2 = "Jun";
	    }
	    if(mes==7){
	    	mes2 = "Jul";
	    }
	    if(mes==8){
	    	mes2 = "Ago";
	    }
	    if(mes==9){
	    	mes2 = "Set";
	    }
	    if(mes==10){
	    	mes2 = "Out";
	    }
	    if(mes==11){
	    	mes2 = "Nov";
	    }
	    if(mes==12){
	    	mes2 = "Dez";
	    }

	    $('.data_topo').text(dia+" de "+mes2+" de "+ano);
	    $('.hora_topo').text(data.getHours()+':'+data.getMinutes());
	 }

	seta_data_topo();
	
	
	if(index === true){
			// $('.text_noticia').css({
			// 	'min-height': $('.box_veja_tambem').height(),
			// });

			var lar_cont = parseFloat($('.container').width());
			var lar_tot = parseFloat($(window).width());
					
			var larg_box = ((lar_tot - lar_cont)/2)-25;

			$('.box_pit_all').width(larg_box);
			$('.pit_item_submenu_p, .linha_menu_pit_p').css({
				'padding-left': larg_box+'px',
				'margin-left': '-'+larg_box+'px'
			});

			function get_pit_box(box_vez){
				$('.box_pit_all').css({
					'left': '-100%',
				});

				if($('.'+box_vez).css('left') == '0px'){
					$(this).removeClass('menu_pit_rot');	
					$('.'+box_vez).css({
						'left': '-100%',
					});

				}else{
					$(this).addClass('menu_pit_rot');
					$('.'+box_vez).css({
						'left': '0%',
					});

				}
			}

			function get_box_vez(){
				$('.menu_pit_topo').css({'display': 'inline-block'});


				if((($("#principal").offset().top - (window.scrollY || window.pageYOffset || document.body.scrollTop)) < 500) || (($("#capa_especial").offset().top - (window.scrollY || window.pageYOffset || document.body.scrollTop)) < 500)){
					var box_vez = 'box_pit_topo';
					$('.menu_pit_topo').css({'background-color': '#007B85'});
				} 

				if(($("#colunistas_blogs").offset().top - (window.scrollY || window.pageYOffset || document.body.scrollTop)) < 100){
					var box_vez = 'box_pit_colunistas';
					$('.menu_pit_topo').css({'background-color': '#00A585'});
				} 

				if(($("#gentear").offset().top - (window.scrollY || window.pageYOffset || document.body.scrollTop)) < 100){
					var box_vez = 'box_pit_gentear';
					$('.menu_pit_topo').css({'background-color': '#832E62'});
				} 
				
				if(($("#editoriais").offset().top - (window.scrollY || window.pageYOffset || document.body.scrollTop)) < 100){
					var box_vez = 'box_pit_editoriais';
					$('.menu_pit_topo').css({'background-color': '#DB5C1E'});
				}
			
				if(($("#agendacultural").offset().top - (window.scrollY || window.pageYOffset || document.body.scrollTop)) < 100){
					var box_vez = 'box_pit_agendacultural';
					$('.menu_pit_topo').css({'background-color': '#8DC63F'});
				}

				if(($("#tvnoarin").offset().top - (window.scrollY || window.pageYOffset || document.body.scrollTop)) < 10){
					var box_vez = 'box_pit_tvnoarin';
					$('.menu_pit_topo').css({'background-color': '#832E62'});
				}

				if(($("#mais_lidas").offset().top - (window.scrollY || window.pageYOffset || document.body.scrollTop)) < 10){
					$('.menu_pit_topo').css({'display': 'none'});
					var box_vez = 'NADA';
				}




				return box_vez;

			}

			$(window).scroll(function() {
				
				var box_vez = get_box_vez();

				if($('.menu_pit_topo').hasClass('menu_pit_rot')){

					if($('.'+box_vez).css('left') != '0px' ){

						$('.box_pit_all').css({
							'left': '-100%',
						});

						$(this).addClass('menu_pit_rot');
						$('.'+box_vez).css({
							'left': '0%',
						});

					}
				}

			});


			$('.menu_pit_topo').click(function(event) {

				if( $(this).hasClass('menu_pit_rot') ){
					$(this).removeClass('menu_pit_rot');
					 $(this).removeClass('menu_pit_for_mobile');
				}else{
					$(this).addClass('menu_pit_rot');
					 $(this).addClass('menu_pit_for_mobile');
				}

				get_pit_box(get_box_vez());

			});
	
	}
	// $('.menu_pit_colunistas').click(function(event) {

	// 	$('.box_pit_all').css({
	// 		'left': '-100%',
	// 	});

	// 	if($('.box_pit_colunistas').css('left') == '0px'){
	// 		$(this).removeClass('menu_pit_rot');	
	// 		$('.box_pit_colunistas').css({
	// 			'left': '-100%',
	// 		});

	// 	}else{
	// 		$(this).addClass('menu_pit_rot');
	// 		$('.box_pit_colunistas').css({
	// 			'left': '0%',
	// 		});

	// 	}

	// });


	// $('.menu_pit_gentear').click(function(event) {

	// 	$('.box_pit_all').css({
	// 		'left': '-100%',
	// 	});

	// 	if($('.box_pit_gentear').css('left') == '0px'){
	// 		$(this).removeClass('menu_pit_rot');	
	// 		$('.box_pit_gentear').css({
	// 			'left': '-100%',
	// 		});

	// 	}else{
	// 		$(this).addClass('menu_pit_rot');
	// 		$('.box_pit_gentear').css({
	// 			'left': '0%',
	// 		});

	// 	}

	// });


	// $('.menu_pit_editoriais').click(function(event) {

	// 	$('.box_pit_all').css({
	// 		'left': '-100%',
	// 	});

	// 	if($('.box_pit_editoriais').css('left') == '0px'){
	// 		$(this).removeClass('menu_pit_rot');	
	// 		$('.box_pit_editoriais').css({
	// 			'left': '-100%',
	// 		});

	// 	}else{
	// 		$(this).addClass('menu_pit_rot');
	// 		$('.box_pit_editoriais').css({
	// 			'left': '0%',
	// 		});

	// 	}

	// });
	
	if(index === true){
			$('#editorial_all_id li:first').addClass('currentedit');
			
			var option_sel_anterior1 = $('.select_editoria_item1').find(":selected").val().replace(/ /g, '');
			var option_sel_anterior2 = $('.select_editoria_item2').find(":selected").val().replace(/ /g, '');
			var option_sel_anterior3 = $('.select_editoria_item3').find(":selected").val().replace(/ /g, '');

			$('.select_editoria').change(function(event) {



				// $('#editorial_all_id li').removeClass('currentedit');
				// $('#editorial_all_id li:first').addClass('currentedit');


				var option_sel =  $(this).find(":selected").val();
					option_sel = option_sel.replace(/ /g, '');

				var select_editoria_item1 =  $('.select_editoria_item1').find(":selected").val();
				var select_editoria_item2 =  $('.select_editoria_item2').find(":selected").val();
				var select_editoria_item3 =  $('.select_editoria_item3').find(":selected").val();


				var select_editoria_item1_text =  $('.select_editoria_item1').find(":selected").text();
				var select_editoria_item2_text =  $('.select_editoria_item2').find(":selected").text();
				var select_editoria_item3_text =  $('.select_editoria_item3').find(":selected").text();
				document.cookie = "editoria1="+select_editoria_item1_text+"; expires=Thu, 18 Dec 2050 12:00:00 UTC; path=/";
				document.cookie = "editoria2="+select_editoria_item2_text+"; expires=Thu, 18 Dec 2050 12:00:00 UTC; path=/";
				document.cookie = "editoria3="+select_editoria_item3_text+"; expires=Thu, 18 Dec 2050 12:00:00 UTC; path=/";



				$('.select_editoria option').removeAttr('disabled');

				$('.select_editoria_item1 option[value="' + select_editoria_item2 + '"]').attr('disabled', true);
				$('.select_editoria_item1 option[value="' + select_editoria_item3 + '"]').attr('disabled', true);

				$('.select_editoria_item2 option[value="' + select_editoria_item1 + '"]').attr('disabled', true);
				$('.select_editoria_item2 option[value="' + select_editoria_item3 + '"]').attr('disabled', true);

				$('.select_editoria_item3 option[value="' + select_editoria_item1 + '"]').attr('disabled', true);
				$('.select_editoria_item3 option[value="' + select_editoria_item2 + '"]').attr('disabled', true);


				if((select_editoria_item1 != select_editoria_item2) && (select_editoria_item1 != select_editoria_item3) && (select_editoria_item2 != select_editoria_item3 )){

					
					var coluna_sel = $(this).attr('name');

					if(coluna_sel == 'coluna1_editoria'){
							var html_anterior = $(".currentedit .posi_item_edit_1").html();
							var html_novo = $('.cate_'+option_sel).html();
							
							
							$(".currentedit .posi_item_edit_1").css({opacity: '0'});
							
							setTimeout(function(){ 
								$(".currentedit .posi_item_edit_1").html(html_novo);
								$('.cate_'+option_sel).html(html_anterior);

								$('.cate_'+option_sel).removeClass('cate_'+option_sel).addClass('cate_'+option_sel_anterior1);

								$(".currentedit .posi_item_edit_1").removeAttr('class').addClass(' item_editorial ').addClass(' posi_item_edit_1 ').addClass('cate_'+option_sel);	
							}, 500); 
							 
							setTimeout(function(){ 
								$(".currentedit .posi_item_edit_1").css({opacity: '1'});
							}, 600);

							 
					}

					if(coluna_sel == 'coluna2_editoria'){
							var html_anterior = $(".currentedit .posi_item_edit_2").html();
							var html_novo = $('.cate_'+option_sel).html();

							$(".currentedit .posi_item_edit_2").css({opacity: '0'});
							
							setTimeout(function(){ 
								$(".currentedit .posi_item_edit_2").html(html_novo);
								$('.cate_'+option_sel).html(html_anterior);

								$('.cate_'+option_sel).removeClass('cate_'+option_sel).addClass('cate_'+option_sel_anterior2);

								$(".currentedit .posi_item_edit_2").removeAttr('class').addClass(' item_editorial ').addClass(' posi_item_edit_2 ').addClass('cate_'+option_sel);	
							}, 500); 
							 
							setTimeout(function(){ 
								$(".currentedit .posi_item_edit_2").css({opacity: '1'});
							}, 600);

					}

					if(coluna_sel == 'coluna3_editoria'){
							var html_anterior = $(".currentedit .posi_item_edit_3").html();
							var html_novo = $('.cate_'+option_sel).html();

							$(".currentedit .posi_item_edit_3").css({opacity: '0'});
							
							setTimeout(function(){ 
								$(".currentedit .posi_item_edit_3").html(html_novo);
								$('.cate_'+option_sel).html(html_anterior);

								$('.cate_'+option_sel).removeClass('cate_'+option_sel).addClass('cate_'+option_sel_anterior3);

								$(".currentedit .posi_item_edit_3").removeAttr('class').addClass(' item_editorial ').addClass(' posi_item_edit_3 ').addClass('cate_'+option_sel);	
							}, 500); 
							 
							setTimeout(function(){ 
								$(".currentedit .posi_item_edit_3").css({opacity: '1'});
							}, 600);
					}

					 setTimeout(function(){ 
							option_sel_anterior1 = $('.select_editoria_item1').find(":selected").val().replace(/ /g, '');
							option_sel_anterior2 = $('.select_editoria_item2').find(":selected").val().replace(/ /g, '');
							option_sel_anterior3 = $('.select_editoria_item3').find(":selected").val().replace(/ /g, '');
					 }, 700);

					 // setTimeout(function(){ 
					  	$('#editorial_all_id').cycle(0); 
					 // }, 500);		

				}	


				
			});

	}



});	