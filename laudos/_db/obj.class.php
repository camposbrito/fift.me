<?php
require_once 'generic.class.php';
/**
 * Objeto genêrico para listar tabelas do banco de dados
 * @author Rodrigo Brito
 *
 */
class obj extends generic{
	/**
	 * Enter description here ...
	 * @param varchar $tabela
	 */
	public function __construct ($tabela){
		$this->banco = new DBOMysql();
		$this->tabela = $tabela;
	}
}