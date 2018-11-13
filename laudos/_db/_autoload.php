<?php

/**
 * Enter description here ...
 * @param String $class_name
 */
require_once ("_dbo_mysql.class.php");
function __autoload($class_name){
	$configuracao = new Config();
	$classe = $class_name;
	$filename = "./_db/$classe.class.php";
	if (file_exists($filename)) {
		require_once($filename);
	}else {
		echo "<p><center>".
			 "O arquivo '$filename' não existe. ; </b>".
			 "</center></p><br><br>";
		exit;
	}
}
?>