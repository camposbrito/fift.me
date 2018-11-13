<?php
require_once ("_dbo_mysql.class.php");
require_once ("_iTabela.inc.php");

/**
 * @author Rodrigo de Campos Brito
 *
 */
class generic implements iTabela {
	protected $banco;
	private $resultado;
	protected $tabela = null;

	public function  get_banco(){
		return $this->banco;
		
	}
	
	public function __construct ($tabela=null){
		$this->banco = new DBOMysql();

		if (empty($tabela))
		$this->tabela = get_class($this);
		else
		$this->tabela = $tabela;
	}

	public function inserir($valores,$decode=true,$debug=false){
		return $this->banco->insert($this->tabela,$valores, $decode, $debug);
	}

	public function listar($campos="*", $condicao=null,$join = null, $order = null,$limit = null,$groupBy=null,$debug=false){
		return $this->banco->select($this->tabela,$campos,$condicao,$join,$order,$limit,$groupBy,$debug);
	}
	public function RegistrosAfetados($campos="*", $condicao=null,$join = null, $order = null,$limit = null,$groupBy=null,$debug=false){
		return $this->banco->select_affected($this->tabela,$campos,$condicao,$join,$order,$limit,$groupBy,$debug);
	}
	public function buscar($id,$debug=false){
		return $this->banco->select($this->tabela,"*","id".$this->tabela."='$id'",null,null,null,$debug);
	}
	public function buscarByCondicao($condicao,$debug=false){
		return $this->banco->select($this->tabela,"*",$condicao,null,null,null,null,$debug);
	}

	public function buscarById($id,$campo,$condicaoComplementar=null, $debug=false){
		$condicao = "id".$this->tabela."='$id'";
		if (!empty($condicaoComplementar))
		$condicao .= " and ".$condicaoComplementar." ";

		foreach ($this->banco->select($this->tabela,"*",$condicao,null,null,null,$debug) as $lista)
		return $lista[$campo];
	}

	public function excluir($id, $debug=false){
		$aux = explode(" ",$this->tabela);
		$table = $aux[0];
		return $this->banco->delete($table,"id".$table."='$id'",$debug)  ;
	}

	public function excluirByField($id,$campo, $debug=false){
		return $this->banco->delete($this->tabela,"$campo='$id'",$debug);
	}
	public function excluirByCondicao($Condicao, $debug=false){
		return $this->banco->delete($this->tabela,$Condicao,$debug);
	}

	public function alterar($id, $valores,$decode=true,$debug=false){
		return $this->banco->update($this->tabela,$valores, "id".$this->tabela."='$id'", $decode,$debug);
	}
	public function alterarCondicao($condicao, $valores, $debug = false){
		return $this->banco->update($this->tabela, $valores, $condicao, true,$debug);
	}
	public function __call ($metodo, $parametros) {
		if (substr($metodo, 0, 3) == 'set') {
			$var = substr(strtolower(preg_replace('/([a-z])([A-Z])/', "$1_$2", $metodo)), 4);
			$this->$var = $parametros[0];
		}
		elseif (substr($metodo, 0, 3) == 'get') {
			$var = substr(strtolower(preg_replace('/([a-z])([A-Z])/', "$1_$2", $metodo)), 4);
			return $this->$var;
		}
	}
	public function ListagemBasica($result, $operacoes = True ){
		$config = new Config();
		echo "<div align='center' id='listagem'>";
		echo "<table id='tabela'>";

		echo "<tr> ";
		$seq =0;
		if (count($result) > 0){
			foreach ($result[0] as $key => $linha ){
				if ($seq % 2 != 0){
					echo "<th>";
					echo ($this->banco->comentario_field($this->tabela, $key)!='')?$this->banco->comentario_field($this->tabela, $key): $key;
					echo "</th>";
				}
				$seq++;
					
			}
			if ($operacoes){
				echo "<th>";
				echo "-";
				echo "</th>";
			}
			echo "</tr> ";
			foreach ($result as $key => $linha ){
				echo "<tr> ";
				for ($i = 0; $i < (count($linha)/2); $i++) {
					echo "<td>" ;
					echo $linha[$i];
					echo "</td>";
				}
				if ($operacoes){
					echo "<td>";
					echo "<img src='".$config->dir_html."/_img/editar.png'/>";
					echo "<img src='".$config->dir_html."/_img/excluir.png'/>";
					echo "</td>";
				}
			}
			echo "<tr>";
			echo "<td colspan='".((count($linha)/2)+1)."'>";
			echo "<input type='button' name='btnInserir' id='btnInserir' value='Novo Registro'>  " ;
			echo "</td>";
			echo "</tr>";
			echo "</table>";

		}
		else {
			echo "Nenhum registro encontrado!";
		}
		echo "</div>";
	}

	public function InserirBasico(){
		$estrutura = $this->ListarEstrutura();
		echo "<form class='formulario' name='inserir' method='post'>";
		foreach ($estrutura as $linha){
			echo "<div >";
			echo "<label for='$linha[Field]'>".$linha[Field]."</label>";
			echo "<input type='text' name=" .$linha[Field] ." id=" .$linha[Field] ."/></div> " ;
		}
		echo "<input type='button' name='btnSalvar' id='btnSalvar' value='Salvar'>  " ;
		echo "</form>";
	}

	public function ListarEstrutura(){
		return $this->banco->show_full_table($this->tabela);
	}

}

?>