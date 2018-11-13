<?php
/**
 * Enter description here ...
 * @author Rodrigo
 *
 */
class Config {
	const DB_HOST = 'mysql.exameauditivo.com.br';
	const DB_USER = 'exameauditivo01';
	const DB_PASS = 'campos25';
	const DB_SCHEMA = 'exameauditivo01';
	const DB_ENCODING = 'ISO-8859-1'; 
	const root = '';	
	const DEBUG = true;
	function __construct() {
		
	}
	function GetHost(){
		return self::DB_HOST;
	}
	function GetUser(){
		return self::DB_USER;
	}
	function GetPass(){
		return self::DB_PASS;
	}
	function GetDB(){
		return self::DB_SCHEMA;
	}
}
?>