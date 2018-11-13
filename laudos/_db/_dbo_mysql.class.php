<?php
require '_config.class.php';
require '_iDBOMysql.inc.php';

/**
 * Enter description here ...
 * @author Rodrigo
 *
 */
class DBOMysql extends Config implements iDBOMysql {

	private $connection;
	private $result;

	/**
	 * Construtor chama os métodos necessários quando a classe é instanciada
	 */
	public function __construct() {
		$this->connect();
	}

	public function get_connection(){
		return $this->connection;
	}
	/**
	 * Conecta com o banco de dados utilizando os dados das constantes de configuração
	 */
	public function connect() {
		$this->connection = mysql_connect(parent::DB_HOST,parent::DB_USER,parent::DB_PASS) or die (mysql_error());
		if (mysql_select_db(parent::DB_SCHEMA, $this->connection)) {
			$this->setEnconding();
		}
	}

	/**
	 * Enter description here ...
	 */
	private function setEnconding() {
		$this->query("SET NAMES '" . parent::DB_ENCODING."'");
	}

	/**
	 * Enter description here ...
	 * @param unknown_type $sql
	 * @return resource
	 */
	private function query($sql) {
		return mysql_query($sql,$this->connection);
	}

	/**
	 * Enter description here ...
	 * @param String $sql
	 */
	public function debug($sql){
		if (parent::DEBUG == true){
		echo '<script type="text/javascript">';
		echo 'console.log("'.$sql.'")';
		echo "</script>";	
		}
	}
	
	public function _debug($sql){
		echo "<pre>";
		print_r($sql);
		echo "</pre>";
	}
	/**
	 * Enter description here ...
	 * @param unknown_type $sql
	 * @return number
	 */
	private function query_with_inserted_id($sql, $debug) {
		mysql_query($sql,$this->connection);
		if ($this->ErrorMsg()!= "" ){
			$this->descreverErro($debug, $sql);
		}
		return mysql_insert_id($this->connection);
	}
	/**
	 * Returns the ID generated from the previous INSERT operation.
	 *
	 * @param unknown_type $source
	 * @return in
	 */
	function lastInsertId($source = null) {
		$id = mysqli_insert_id($this->connection);
		if ($id) {
			return $id;
		}

		$data = $this->fetchAll('SELECT LAST_INSERT_ID() as id From '.$source);
		if ($data && isset($data[0]['id'])) {
			return $data[0]['id'];
		}
	}

	/**
	 * Executa uma query de inserção no banco de dados
	 *
	 * @param string $table nome da tabela
	 * @param array $fields array com os campos e valores a serem inseridos
	 */
	public function insert($table,$fields,$decode=true,$debug=false) {

		$columns = $values = array();
		foreach ($fields as $column => $value) {
			$columns[] = mysql_real_escape_string($column);
			if($decode)
			$values[] = utf8_decode(mysql_real_escape_string($value));
			else
			$values[] = (mysql_real_escape_string($value));
		}

		$sql  = "INSERT INTO ".mysql_real_escape_string($table)." ";
		$sql .= "(".join(',',$columns).") ";
		$sql .= "VALUES ('".join("','",$values)."')";
		if($debug){
			$this->debug($sql);
		}
		return $this->query_with_inserted_id ($sql,$debug);


	}

	/**
	 * Executa uma query de atualização no banco de dados
	 *
	 * @param string $table nome da tabela
	 * @param array $fields array com os campos e valores a serem inseridos
	 */
	public function update($table,$fields,$conditions=null, $decode=true, $debug=false) {

		$columns = $values = array();
		foreach ($fields as $column => $value) {
			if ($decode)
			$itens[] = mysql_real_escape_string($column)."='".utf8_decode(mysql_real_escape_string($value))."'";
			else
			$itens[] = mysql_real_escape_string($column)."='".(mysql_real_escape_string($value))."'";
		}

		$sql  = 'UPDATE '.mysql_real_escape_string($table).' ';
		$sql .= 'SET '.join(',',$itens).' ';

		if ($conditions != null)
		$sql .= 'WHERE '.($conditions);
		//		$sql .= 'WHERE '.mysql_real_escape_string($conditions);

		/*if ($this->ErrorMsg()!= "" ){
			$this->DescreverErro($debug,$sql);
			}
			else{
			if ($debug == true)
			$this->debug($sql);

			}*/
		if ($debug == true)
		$this->debug($sql);


		return $this->query($sql) or die($this->ErrorMsg());

	}


	/**
	 * Executa uma query para excluir registros do banco
	 *
	 * @param string $table nome da table
	 * @param string $conditions condições de exclusão (opcional)
	 */
	public function delete($table,$conditions, $debug=false) {

		$sql  = 'DELETE FROM '.mysql_real_escape_string($table).' ';
		if ($conditions != null)
		$sql .= 'WHERE '.($conditions);
		//		$sql .= 'WHERE '.mysql_real_escape_string($conditions);
		if ($debug == true)
		$this->debug($sql);
		return $this->query($sql) or die (mysql_error());

	}

	/**
	 * Executa uma query para selecionar registros no banco de dados
	 *
	 * @param string $table
	 * @param array $fields
	 * @param string $conditions
	 * @param string $order
	 * @param string $limit
	 */

	public function select($table,$fields='*',$conditions=null, $joining=null,$order=null,$limit=null, $groupBy=null, $debug=false) {

		$sql  = 'SELECT ';
		$sql .= (is_array($fields)) ? join(',',$fields) : $fields;
		$sql .= ' FROM '.($table).' ';

		if ($joining != null && is_array($joining)){
			foreach ($joining as $linha){
				$sql .= ' '.  $linha;
			}
		}
		if (trim($conditions) != null && trim($conditions) !="")
		$sql .= '  WHERE '.($conditions);

		if ($groupBy != null)
		$sql .= ' GROUP BY '.($groupBy);

		if ($order != null)
		$sql .= ' ORDER BY '.($order);


		if ($limit != null)
		$sql .= ' LIMIT '. ($limit);

		$results = $this->query($sql);
		$fetch = array();

		if (empty($fetch) && $this->ErrorMsg()!= "" ){
			$this->DescreverErro($debug,$sql);
		}
		else{
			if ($debug == true)
			$this->debug($sql);
			while ( $loop = mysql_fetch_array($results) ) {
				$fetch[] = $loop;
			}
			return $fetch;
		}

	}
	
/**
	 * Executa uma query para retorna registros afetados
	 *
	 * @param string $table
	 * @param array $fields
	 * @param string $conditions
	 * @param string $order
	 * @param string $limit
	 */

	public function select_affected($table,$fields='*',$conditions=null, $joining=null,$order=null,$limit=null, $groupBy=null, $debug=false) {

		$sql  = 'SELECT ';
		$sql .= (is_array($fields)) ? join(',',$fields) : $fields;
		$sql .= ' FROM '.($table).' ';

		if ($joining != null && is_array($joining)){
			foreach ($joining as $linha){
				$sql .= ' '.  $linha;
			}
		}
		if (trim($conditions) != null && trim($conditions) !="")
		$sql .= '  WHERE '.($conditions);

		if ($groupBy != null)
		$sql .= ' GROUP BY '.($groupBy);

		if ($order != null)
		$sql .= ' ORDER BY '.($order);


		if ($limit != null)
		$sql .= ' LIMIT '. ($limit);

		$results = $this->query($sql);
		$fetch = array();

		if (empty($fetch) && $this->ErrorMsg()!= "" ){
			$this->DescreverErro($debug,$sql);
		}
		else{
			if ($debug == true)
			$this->debug($sql);
			while ( $loop = mysql_fetch_array($results) ) {
				$fetch[] = $loop;
			}
			return mysql_affected_rows($this->connection);
		}

	}

	/**
	 * Executa uma query para selecionar registros no banco de dados
	 *
	 * @param string $table
	 * @param array $fields
	 * @param string $conditions
	 * @param string $order
	 * @param string $limit
	 */
	public function executar($sql,$debug=False) {
		$results = $this->query($sql);
		$fetch = array();

		while ( $loop = mysql_fetch_array($results) ) {
			$fetch[] = $loop;
		}
		if ($debug)
		$this->debug($sql);
		return $fetch;

	}
	/**
	 * Enter description here ...
	 * @return string
	 */
	function errorMsg() {
		return mysql_error();

	}
	function descreverErro($debug, $sql){
		echo "<b><center><br><u>";
		echo $this->ErrorMsg();
		//		if ($debug == true)
		echo "</u><br>".$sql;
		echo "<br><br></center></b>";
	}

	public function show_full_table($table, $debug=false){
		return $this->executar("SHOW FULL COLUMNS FROM " . $table, $debug);
	}

	public function show_full_table_field($table,$field, $debug=false){
		return $this->executar("SHOW FULL COLUMNS FROM " . $table . " where field = '$field'", $debug);
	}

	public function comentario_field($table, $field, $debug=false){
		$result = $this->show_full_table_field($table, $field);
		return $result[0]['Comment'];
	}

}
?>