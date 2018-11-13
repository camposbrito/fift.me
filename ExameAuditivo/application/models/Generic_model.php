<?php

class Generic_model extends CI_Model {

    public $tabela = null;

    function __construct() {
        parent::__construct();
    }

    public function setTabela($table) {
        $this->tabela = $table;
    }

    public function Find($Cod = null) {
        
    }

    public function Save() {
        
    }

    public function Alter() {
        
    }

    public function Delete() {
        
    }

    public function Insert() {
        
    }

    public function ListAll() {
        return $this->db->get($tabela);
    }

}
