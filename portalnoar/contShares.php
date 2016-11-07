<?php
/**
 * Template Name: contShares
 * @package portalnoar
 * @subpackage portalnoar
 * @since Portal no AR 1.0
 * Author: Beto Canuto [ Web Design / beto@quadradigital.com.br ], Douglas Boza [ Front-end / douglas@quadradigital.com.br ], Ed Moura [ Back-end / http://thechacal.github.io/ ]
 */
 //echo $_POST['idpost'];

$cont = get_post_meta($_POST['idpost'],'_contShares');
 if (!add_post_meta($_POST['idpost'], '_contShares', '1', true ) ) {
  update_post_meta($_POST['idpost'], '_contShares', $cont[0]+1);
 }

?>
