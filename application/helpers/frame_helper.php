<?php 
function frame($controlador, $rutaVista, $datos = []) {
	if (session_status () == PHP_SESSION_NONE) {session_start ();}
	if (isset ( $_SESSION ['usuario'] )) {
	    $datos ['header'] ['usuario'] ['nombre'] = $_SESSION ['usuario'] -> nombre ;
	}
	else {
	    $datos ['header'] ['usuario'] ['nombre'] = 'desconocido' ;
	}
	$controlador->load->view ( '_templates/head',$datos );
	$controlador->load->view ( '_templates/header', $datos );
	$controlador->load->view ( '_templates/nav', $datos );
	$controlador->load->view ( $rutaVista, $datos );
	$controlador->load->view ( '_templates/footer', $datos );
	$controlador->load->view ( '_templates/end' );
}
?>