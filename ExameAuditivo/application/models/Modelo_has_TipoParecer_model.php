<?php

class Modelo_has_TipoParecer_model extends CI_Model {

    public $tabela = null;

    function __construct() {
        parent::__construct();
       $this->tabela = 'modelo_has_tipoparecer';
    }

    public function find($Cod = null) {
        //        return $this->db->where('Cod', $Cod)->get($this->tabela)->result();
            }
    // public function find($Cod = null) {
    //     return $this->db->where('Cod', $Cod)->get($this->tabela)->result();
    // }
    public function insert($Modelo, $TipoParecer){
        $data['Modelo'] = $Modelo        ;
        $data['TipoParecer'] = $TipoParecer;
        //      
        return ($this->db->insert($this->tabela, $data));

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

    public function delete($Modelo) {
        return $this->db->where('modelo', $Modelo)->delete($this->tabela);
    }

    public function listAll() {
//        return $this->db->get($this->tabela)->result();
    }

    public function BuscarByTipoParecer($TipoParecer = NULL) {
        return $this->
               db->
               select('m.*')->
               join('tipoparecer r', 'r.cod = mr.TipoParecer', 'INNER')->
               join('modelo m', ' m.cod = mr.Modelo', 'INNER')->
               order_by('m.Ordem')->
               get_where('modelo_has_tipoparecer mr', array('r.Descricao' => $TipoParecer))->result();
    }
    public function BuscarByModelo($Modelo = NULL) {
        return $this->
               db->
               select(' tp.*, mht.cod as 	modelo_has_tipoparecer')
               ->join('	modelo_has_tipoparecer mht', 'mht.tipoparecer = tp.cod and modelo = ' . $Modelo, 'LEFT')->               
               order_by('tp.cod')->
               get_where('tipoparecer tp')->result();
    }

}
