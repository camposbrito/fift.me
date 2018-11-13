<?php

class Ldf_lrf_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {
        //ldf        
        $dados['Consulta'] = $this->input->post('Consulta');
        $dados['OE_dB'] = valueOfInteger($this->input->post('ldfOE_dB'));
        $dados['OD_dB'] = valueOfInteger($this->input->post('ldfOD_dB'));
        $dados['OE_Masc'] = valueOfCheck($this->input->post('ldfOE_Masc'));
        $dados['OD_Masc'] = valueOfCheck($this->input->post('ldfOD_Masc'));
        if ($this->input->post('codLdf') <= 0) {
            $this->db->insert('ldf', $dados);
        } else {

            $this->db->where('cod', $this->input->post('codLdf'));
            $this->db->update('ldf', $dados);
        }
        //lrf
        unset($dados);
        $dados['Consulta'] = valueOfInteger($this->input->post('Consulta'));
        $dados['OE_dB'] = valueOfInteger($this->input->post('lrfOE_dB'));
        $dados['OD_dB'] = valueOfInteger($this->input->post('lrfOD_dB'));
        $dados['OE_Masc'] = valueOfCheck($this->input->post('lrfOE_Masc'));
        $dados['OD_Masc'] = valueOfCheck($this->input->post('lrfOD_Masc'));
        if ($this->input->post('codLrf') <= 0) {
            $this->db->insert('lrf', $dados);
        } else {

            $this->db->where('cod', $this->input->post('codLrf'));
            $this->db->update('lrf', $dados);
        }
        $this->output->enable_profiler(FALSE);
    }

    public function get_ldf($consulta) {
        return $this
                        ->db
                        ->select('i.cod AS codLdf, i.*')
                        ->join('ldf i', 'i.Consulta = c.Cod', 'LEFT')
                        ->get_where('consulta c', array('c.cod' => $consulta))
                        ->result();
    }

    public function get_lrf($consulta) {
        return $this
                        ->db
                        ->select('i.cod AS codLrf, i.*')
                        ->join('lrf i', 'i.Consulta = c.Cod', 'LEFT')
                        ->get_where('consulta c', array('c.cod' => $consulta))
                        ->result();
    }

}
