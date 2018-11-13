<?php

class Consulta_Audiometrico_model extends CI_Model {

    public $tabela = null;

    function __construct() {
        parent::__construct();
        $this->tabela = 'consulta_has_exameaudiometrico';
    }

    public function getByConsulta($Consulta = null) {
        return $this->db->where('Consulta', $Consulta)->get($this->tabela)->result();
    }

    public function save() {
//        $this->output->enable_profiler(false);
//        $data['Descricao'] = $this->input->post('Descricao');
//        $data['Ativo'] = $this->input->post('Ativo') == 'S' ? 'S' : 'N';
//        if ($this->input->post('Cod') < 0) {
//            return ($this->db->insert($this->tabela, $data));
//        } else {
//            $this->db->where('cod', $this->input->post('Cod'));
//            return $this->db->update($this->tabela, $data);
//        }
    }

    public function delete($Cod) {
//        return $this->db->where('Cod', $Cod)->delete($this->tabela);
    }

    public function listAll() {
//        return $this->db->get($this->tabela)->result();
    }

    public function BuscarByTipoParecer($TipoParecer = NULL) {
//        return $this->
//                        db->
//                        select('m.*')->
//                        join('tipoparecer r', 'r.cod = mr.TipoParecer', 'INNER')->
//                        join('modelo m', ' m.cod = mr.Modelo', 'INNER')->
//                        order_by('m.Ordem')->
//                        get_where('modelo_has_tipoparecer mr', array('r.Descricao' => $TipoParecer))->result();
    }

}
