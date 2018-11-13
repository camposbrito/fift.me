<?php

class Meatoscopia_model extends CI_Model {

    public $tabela = null;

    function __construct() {
        parent::__construct();
        $this->tabela = 'meatoscopia';
    }

    public function find($Cod = null) {
        return $this->db->where('Cod', $Cod)->get($this->tabela)->result();
    }

    public function salvarConsulta() {
        $data_normal['Meatoscopia'] = 4; 
        $data_normal['Consulta'] = $this->input->post('consulta');
        $data_normal['OD'] = valueOfCheck($this->input->post('meatoscopia_normal_OD'));
        $data_normal['OE'] = valueOfCheck($this->input->post('meatoscopia_normal_OE'));
        if (strlen($this->input->post('meatoscopia_normal_Cod')) <= 0) {
            $normal = $this->db->insert('consulta_meatoscopia', $data_normal);
        } else {
            $this->db->where('cod', $this->input->post('meatoscopia_normal_Cod'));
            $normal = $this->db->update('consulta_meatoscopia', $data_normal);
        }
        $data_alterada['Meatoscopia'] = 5;
        $data_alterada['Consulta'] = $this->input->post('consulta');
        $data_alterada['OD'] = valueOfCheck($this->input->post('meatoscopia_alterada_OD'));
        $data_alterada['OE'] = valueOfCheck($this->input->post('meatoscopia_alterada_OE'));
        if ($this->input->post('meatoscopia_alterada_Cod') <= 0) {
            $alterada = $this->db->insert('consulta_meatoscopia', $data_alterada);
        } else {
            $this->db->where('cod', $this->input->post('meatoscopia_alterada_Cod'));
            $alterada = $this->db->update('consulta_meatoscopia', $data_alterada);
        }
        $this->output->enable_profiler(FALSE);
        return $normal && $alterada;
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
