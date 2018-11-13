<?php

class Mascaramento_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_mascaramento($consulta) {
        return $this
                        ->db
                        ->select('i.cod AS codMascaramento, i.*')
                        ->join('mascaramento i', 'i.Consulta = c.Cod', 'LEFT')
                        ->get_where('consulta c', array('c.cod' => $consulta))
                        ->result();
    }

    public function salvar() {
        //Mascaramento
        $dados['Consulta'] = $this->input->post('Consulta');
        $dados['VA'] = valueOfInteger($this->input->post('mascaramentoVA'));
        $dados['VOOD'] = valueOfInteger($this->input->post('mascaramentoVOOD'));
        $dados['VOOE'] = valueOfInteger($this->input->post('mascaramentoVOOE'));
        $dados['COR_VAR'] = $this->input->post('Cor');
        if ($this->input->post('codMascaramento') <= 0) {
            $this->db->insert('mascaramento', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codMascaramento'));
            $this->db->update('mascaramento', $dados);
        }
        $this->output->enable_profiler(FALSE);
    }

}
