<?php

class Instrumentos_model extends CI_Model {

    public $tabela = null;

    function __construct() {
        parent::__construct();       
        $this->tabela = 'instrumentos';
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

}
