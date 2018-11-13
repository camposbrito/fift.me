<?php

class Classificacao_model extends CI_Model {

    public $tabela = null;

    function __construct() {
        parent::__construct();
        $this->tabela = 'classificacao';
    }

    public function find($Cod = null) {
        return $this->db->where('Cod', $Cod)->get($this->tabela)->result();
    }

    public function get_classificacoes() {
        return $this->db->get_where($this->tabela, array('Ativo' => 'S'))->result();
    }

    public function get_classificacao_report($id) {
        return    $this
                        ->db
                        ->select("concat( CASE ifnull(c.Cod,0) 
								    WHEN 0 THEN '(&nbsp;&nbsp;&nbsp;)'
								    ELSE '( x )' END,'   ', IFNULL(cc.Descricao,'')) as Selecionado ")
                        ->join('consulta c', "cc.cod = c.classificacao and   c.cod = ".$id."", 'LEFT')
                        ->get_where('classificacao cc'  )->result();
    }

    public function save() {
        $this->output->enable_profiler(false);
        $data['Descricao'] = $this->input->post('Descricao');
        $data['Ativo'] = $this->input->post('Ativo') == 'S' ? 'S' : 'N';
        if ($this->input->post('Cod') < 0) {
            return ($this->db->insert($this->tabela, $data));
        } else {
            $this->db->where('cod', $this->input->post('Cod'));
            return $this->db->update($this->tabela, $data);
        }
    }

    public function delete($Cod) {
        return $this->db->where('Cod', $Cod)->delete($this->tabela);
    }

    public function listAll() {

        return $this->db->get($this->tabela)->result();
    }

    public function listActive() {
        return $this->db->get_where($this->tabela, array('Ativo' => 'S'))->result();
    }

}
