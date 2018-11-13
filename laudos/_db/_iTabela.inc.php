<?php
/**
 * Enter description here ...
 * @author rodrigo
 *
 */
interface iTabela{
	/**
	 * Enter description here ...
	 * @param unknown_type $valores
	 */
	public function inserir($valores);
	/**
	 * Enter description here ...
	 */
	public function listar($campos="*", $condicao=null,$join = null, $order = null,$limit = null,$groupBy=null,$debug=false);
	/**
	 * Enter description here ...
	 * @param unknown_type $Valor
	 */
	public function buscar($Valor);
	/**
	 * Enter description here ...
	 */
	public function excluir($id);
	/**
	 * Enter description here ...
	 */
	public function alterar($id, $valores);

	public function alterarCondicao($condicao, $valores);
}
?>