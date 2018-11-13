<?php
	$log = new generic('acessos');
	unset($valor);
	$valor['ip'] = $_SERVER['REMOTE_ADDR'];
	$valor['data'] = date('Y-m-d');
	$valor['hora'] = date('H:i:s');
	$valor['script'] = $_SERVER['SCRIPT_NAME'];
	$valor['navegador'] = detectar_Browser($_SERVER['HTTP_USER_AGENT']);
	if( preg_match ( '/id=/',$_SERVER['QUERY_STRING']) )
	{
		$aux = explode("&", $_SERVER['QUERY_STRING']);
		if (isset($aux[1]))
		$valor['parametros'] = substr($aux[1] ,strpos($aux[1], "=")+1, strlen($aux[1]));
	}
	$log->inserir($valor,null,null);
?>