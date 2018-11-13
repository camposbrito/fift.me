<?php 
	header("Content-Type: text/html; charset=ISO-8859-1",true);
	require_once './../_db/_autoload.php';
	require_once 'function.php';
	$menu = new obj('menu');
	$hashtag = $menu->buscarByCondicao("hashtag = '".$_GET['page']."'");
	$obj = new obj($hashtag[0]['tabela']);
	$obj->ListagemBasica($obj->listar(), True);
	
	debug($_GET);
	
?>