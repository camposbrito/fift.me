<?php

class Empresas_model extends CI_Model {

    public $tabela = null;

    function __construct() {
        parent::__construct();
        $this->tabela = 'empresa';
        $this->output->enable_profiler(false);
    }

    public function find($Cod = null) {
        $this->output->enable_profiler(false);
        return $this->db->where('Cod', $Cod)->get($this->tabela)->result();
    }

    public function save() {
        $this->output->enable_profiler(false);
        $data['Descricao'] = $this->input->post('Descricao');
        $data['Obs'] = $this->input->post('Obs');
        $data['Ativo'] = $this->input->post('Ativo') == 'S' ? 'S' : 'N';
        $this->output->enable_profiler(false);
        if ($this->input->post('Cod') < 0) {
            return ($this->db->insert($this->tabela, $data));
        } else {
            $this->db->where('cod', $this->input->post('Cod'));
            return $this->db->update($this->tabela, $data);
        }
    }

    public function getEquipamentos() {
        $this->output->enable_profiler(false);
        return $this
                        ->db
                        ->get_where($this->tabela, array('Ativo' => 'S'))
                        ->result();
    }

    public function delete($Cod) {
        $this->output->enable_profiler(false);
        return $this->db->where('Cod', $Cod)->delete($this->tabela);
    }

    public function listAll() {
        $this->output->enable_profiler(false);
        return $this->db->get($this->tabela)->result();
        
    }

}
