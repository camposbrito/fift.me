<?php

class Modelos_model extends CI_Model {

    public $tabela = null;

    function __construct() {
        parent::__construct();
        $this->tabela = 'modelo';
    }

    public function find($Cod = null) {
        return $this->db->where('Cod', $Cod)->get($this->tabela)->result();
    }

    public function save() {
        $this->output->enable_profiler(true);
        $data['Descricao'] = $this->input->post('Descricao');
        $data['Ordem'] = $this->input->post('Ordem');
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

        return  $this   ->db
                        ->get($this->tabela)
                        ->result();
    }

}
