<?php
/**
 * Enter description here ...
 * @author Rodrigo
 *
 */
interface iDBOMysql {
	public function __construct();
	public function connect();
	public function insert($table, $fields, $debug=false);
	public function update($table, $fields, $debug=false);
	public function delete($table, $conditions, $debug=false);
	public function select($table, $fields='*', $conditions=null, $joining=null, $order=null, $limit=null, $groupBy=null, $debug=false);
	public function show_full_table($table);
}
?>