<?php
$cidadePadrao = "natal";
?>
<!doctype html>
<html>
<head>
	<title>Portal no Ar</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://fonts.googleapis.com/css?family=Raleway:900" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet"/>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:600" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet"/>

	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/plugins/ilya-birman-likely-2.1.3/likely.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/jquery.bxslider.css"/>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/font-awesome-4.6.3/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/style-footer.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/plugins/weather-icons-master/css/weather-icons.css">

	<script src="<?php bloginfo('template_url') ?>/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url') ?>/js/jquery.bxslider.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url') ?>/js/cycle.all.js" type="text/javascript"></script>


	<script src="<?php bloginfo('template_url') ?>/plugins/ilya-birman-likely-2.1.3/likely.js"></script>

	<script>
		var index = false;
	</script>
</head>

<body>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '247762908958034',
	      xfbml      : true,
	      version    : 'v2.7'
	    });
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>

	<header>
		<div class="faixa_topo display_none_mobile">
			<div class="container">
				<p class="cor1 titulo_faixa_topo">últimas notícias</p>

				<div class="faixa_topo_box">
					<?php
					$args_header = array(
												'post_type' => 'post',
												'posts_per_page'=>10,
												'meta_key'=>'_contViews',
												'orderby' => 'meta_value_num',
												'order'=> 'DESC',
					);
					$posts_header = get_posts( $args_header );
					foreach ( $posts_header as $post_header ){
						setup_postdata( $post_header );
						$id_header = $post_header->ID;
						if(!get_field('listar_noticia',$id_header)){
							$excluir_ids[]=$id_header;
						}
					}
					$args_header = array(
												'post_type' => 'post',
												'posts_per_page'=>5,
												'meta_key'=>'_contViews',
												'orderby' => 'meta_value_num',
												'order'=> 'DESC',
												'post__not_in' => $excluir_ids
											);
					$posts_header = get_posts( $args_header );
					foreach ( $posts_header as $post_header ){
						setup_postdata( $post_header );
						$id_header = $post_header->ID;
					?>
					<li class="faixa_topo_box_item">
						<i class="fa fa-circle" aria-hidden="true"></i>
							<a class="faixa_topo_box_nottit" href="<?= get_permalink($id_header) ?>">
								<p class="cor0 faixa_topo_box_not_p"><?= cutText(get_the_title($id_header),80) ?></p>
								 <span class="faixa_topo_hora"><?= get_the_date('H:i:s'); ?></span>
							</a>
					</li>
		<?php } ?>
				</div>
				<div class="faixa_topo_contr">
					<i id="slide_topo_prev" class="fa fa-backward" aria-hidden="true"></i>
					<i id="pausa_topo_pause" class="fa fa-pause-circle-o" aria-hidden="true"></i>
					<i id="slide_topo_next" class="fa fa-forward" aria-hidden="true"></i>
				</div>


			</div>
		</div>

		<div class="faixa_topo_sec">

			<div class="container">
				<a href="http://dev.portalnoar.com.br/"><i class="fa fa-home" aria-hidden="true"></i></a>

				<div class="menu_sec">
					<nav>
						<a href="http://dev.portalnoar.com.br/expediente/"> <li>expediente</li></a><i class="fa fa-circle" aria-hidden="true"></i>
						<li class="bt_envie_noticia">Envie sua Notícia</li><i class="fa fa-circle" aria-hidden="true"></i>
						<a href="http://dev.portalnoar.com.br/blogs/"> <li>blogs</li></a><i class="fa fa-circle" aria-hidden="true"></i>
						<a href=""> <li>Opinião</li></a><i class="fa fa-circle" aria-hidden="true"></i>
						<a href=""> <li>contato</li></a>

					</nav>
				</div>
				<div class="cambio_tempo">
					<?php
					//cotação do dollar e do euro
					$cotacoes = getQuotes();
					if(!empty($cotacoes)){
					?>
					<p class="ct_titulo">câmbio:</p>
							<span class="ct_span_values"><?= $cotacoes[0]['moeda']?> R$ <?= $cotacoes[2]['cotacao']?></span>
							<span class="ct_span_values cambio_euro"><?= $cotacoes[4]['moeda']?> R$ <?= $cotacoes[5]['cotacao']?></span>
					<?php
					}
					$clima = getWeatherForecast(strtoupper(getWithoutAccentsSpaces($cidadePadrao)));
					if(!empty($clima)){
					?>
							<p class="ct_titulo">Tempo, <?= $cidadePadrao?>:</p>

							<?php
							// https://erikflowers.github.io/weather-icons/
								$icone_tempo = $clima['tempo'];

								if($icone_tempo == 'Breezy'){
									$icone_tempo = '<i class="wi wi-day-windy"></i>';
								}
								if($icone_tempo == 'Windy'){
									$icone_tempo = '<i class="wi wi-day-windy"></i>';
								}
								if($icone_tempo == 'Mostly Sunny'){
									$icone_tempo = '<i class="wi wi-day-sunny-overcast"></i>';
								}


							?>

							<span class="ct_span_values"><?= $icone_tempo ?> <?= $clima['temperatura'] ?>°C</span>
					<?php }?>
				</div>

			</div>


		</div>

		<div class='topo_scrool'>
				<div class="faixa_topo_logo">
					<div class="container">

						<div class="faixa_logo_box1 display_none_mobile">
							<span class="data_topo"></span>
							<span class="all_hora_topo"><i class="fa fa-clock-o" aria-hidden="true"></i> <span class="hora_topo"></span> </span>
						</div>

						<div class="faixa_logo_box2">
							<a href="http://dev.portalnoar.com.br/"><img src="<?php bloginfo('template_url') ?>/imgs/logo.png"></a>
						</div>

						<div class="faixa_logo_box3 display_none_mobile">

							 <!-- <img src="<?php bloginfo('template_url') ?>/imgs/redes_com.png"> -->

							 <i class="fa fa-whatsapp whatsapp_rede_btn_index" aria-hidden="true"></i>
							 <p class="desc_reds_blog_index whatsapp_rede_index">Envie sua notícia: 848448484848</p>
							 <a href="https://pt-br.facebook.com/PortalNoArBR/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							 <a href="https://twitter.com/portalnoarbr"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							 <a href="https://plus.google.com/105605278984900938670"><i class="fa fa-google-plus" aria-hidden="true"></i></a>

							 <!-- <i class="fa fa-envelope email_rede_btn_index" aria-hidden="true"></i> -->
							 <!-- <p class="desc_reds_blog_index email_rede_index">asdasdasdasd</p> -->



						</div>

					</div>

				</div>

				<label for="mobile_menu_input" class="icone_mobile_menu">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</label>
				<input type="checkbox" id="mobile_menu_input">


				<div class="faixa_menu_topo">
					<div class="container">

							<nav>
									<i class="fa fa-bars menu_pit_topo menu_pit_all" aria-hidden="true"></i>

						<?php

						  $menu = wp_get_nav_menu_object(9);
						  $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

						?>


						    <?php

						    	$arr_menu;
						    	$cont = -1;
						    	$subs = 0;
						    	$submenu = -1;
						    foreach( $menuitems as $item ):
						        $link = $item->url;
						        $title = $item->title;
						        $url = $item->url;

						        // print_r($item);

						        if($item->menu_item_parent == 0){
						        	$cont = $cont+1;
						        	// echo "principal: ".$title.'<br>';
						        	$id_p = $item->ID;
						        	$arr_menu[$cont]['titulo'] = $title;
						        	$arr_menu[$cont]['url'] = $url;
						        	$submenu = -1;
						        }

						        if($item->menu_item_parent == $id_p){
						        	$submenu = $submenu+1;
						        	// echo " submenu ".$title."<br>";
						        	$id_sub = $item->ID;
						        	$arr_menu[$cont]['submenu'][$submenu] = $title;
						        	$arr_menu[$cont]['submenuurl'][$submenu] = $url;
						        	$subs =0;
						        }

						        if($item->menu_item_parent == $id_sub){
						        	// echo " submenu do sub ".$title."<br>";
						        	// $id_sub = $item->ID;
						        	// echo $submenu;
						        	$arr_menu[$cont]['submenu_sub'][$submenu][$subs] = $title;
						        	$arr_menu[$cont]['submenu_suburl'][$submenu][$subs] = $url;
						        	$subs = $subs+1;
						        }
							endforeach;

							 ?>

							 <?php
							 	    // print_r($arr_menu);

							 	 for ($i=0; $i < count($arr_menu); $i++) {
							 ?>

							  <ul class="item_menu_all">
								<a href="<?= $arr_menu[$i]['url'] ?>" class="item_menu_p"><?= $arr_menu[$i]['titulo'] ?></a><i class="fa fa-circle menu_p_sep" aria-hidden="true"></i>

								<?php if( $arr_menu[$i]['submenu'] != "" ){?>

								<div class="item_submenu_p">
									<?php
										for ($y=0; $y < count($arr_menu[$i]['submenu']) ; $y++) {
									?>

									<div class="box<?= $y+1 ?>_menu">
										<?php
											if($y == 1){
										?>
												<p><?= $arr_menu[$i]['submenu'][$y] ?></p>
										<?php
											}else{
										?>
												<li class="for_mobile_menu"><a href="<?= $arr_menu[$i]['submenuurl'][$y] ?>"><?= $arr_menu[$i]['submenu'][$y] ?></a></li>
										<?php
											}
										 ?>

										<?php
											for ($j=0; $j < count($arr_menu[$i]['submenu_sub'][$y]) ; $j++) {

										 ?>
												<li><a href="<?= $arr_menu[$i]['submenu_suburl'][$y][$j] ?>"><?= $arr_menu[$i]['submenu_sub'][$y][$j] ?> </a></li>

										<?php
											}
										 ?>

									</div>


									<?php
									  }
									 ?>



								</div>

								<?php
									 }
								 ?>

							</ul>



							 <?php
							 	}
							  ?>




						</nav>


						<form action="<?= get_site_url(); ?>/noticias" class="form_search display_none_mobile">
							<input type="text" name="busca"><i class="fa fa-search" aria-hidden="true"></i>
						</form>

					</div>
				</div>
		</div>

		<div class="mobile_top_header">

			<div class="faixa_logo_box1 faixa_logo_box1_mobile">
					<span class="data_topo"></span>
					<span class="all_hora_topo"><i class="fa fa-clock-o" aria-hidden="true"></i> <span class="hora_topo"></span> </span>
			</div>

			<form  action="<?= get_site_url(); ?>/noticias" class="form_search form_search_mobile">
					<input type="text" name="busca"><i class="fa fa-search" aria-hidden="true"></i>
			</form>

		</div>


	</header>

	<div class="box_pit_all box_pit_topo">
					<div class="faixa_topo_pit_box"></div>

				<!-- <div class="box_topo_menu"> 	 -->
					<div class="box_topo_menu_list_ul">
						 <?php
						 	  // print_r($arr_menu);

						 	 for ($i=0; $i < count($arr_menu); $i++) {
						 ?>

						  <ul class="pit_item_menu_all">
							<div class="linha_menu_pit_p">
								<i class="fa fa-circle menu_p_sep" aria-hidden="true"></i><a href="<?= $arr_menu[$i]['url'] ?>" class="pit_item_menu_p"><?= $arr_menu[$i]['titulo'] ?></a>
							</div>

							<?php if( $arr_menu[$i]['submenu'] != "" ){?>

							<div class="pit_item_submenu_p">
								<?php
									for ($y=0; $y < count($arr_menu[$i]['submenu']) ; $y++) {
								?>

								<div class="pit_box<?= $y+1 ?>_menu">

										<p><?= $arr_menu[$i]['submenu'][$y] ?></p>

									<?php
										for ($j=0; $j < count($arr_menu[$i]['submenu_sub'][$y]) ; $j++) {

									 ?>
											<li><a href="<?= $arr_menu[$i]['submenu_suburl'][$y][$j] ?>"><?= $arr_menu[$i]['submenu_sub'][$y][$j] ?> </a></li>

									<?php
										}
									 ?>

								</div>

							<!-- 	<div class="box2_menu">
									<p>Blogs</p>
									<li><a href="">Blog 1</a></li>
									<li><a href="">Blog 3</a></li>
								</div> -->


								<?php
								  }
								 ?>



							</div>

							<?php
								 }
							 ?>

						</ul>


						 <?php
						 	}
						  ?>
					</div>
			</div>

	<!-- </div> -->


<?php
//	include('anuncios/banner_topo.php');
 ?>

 <?php
	//include('anuncios/lateral_200_446.php');
 ?>

 <?php
	// include('anuncios/mini_300_100.php');
 ?>
