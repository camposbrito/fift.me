<?php

class Iprf_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {
        //Iprf         
        $dados['Consulta'] = $this->input->post('Consulta');
        $dados['OE_dB'] = valueOfInteger($this->input->post('iprfOE_dB'));
        $dados['OD_dB'] = valueOfInteger($this->input->post('iprfOD_dB'));

        $dados['OD_Dissil'] = valueOfInteger($this->input->post('iprfOD_Dissil'));
        $dados['OE_Dissil'] = valueOfInteger($this->input->post('iprfOE_Dissil'));
        $dados['OD_Mono'] = valueOfInteger($this->input->post('iprfOD_Mono'));
        $dados['OE_Mono'] = valueOfInteger($this->input->post('iprfOE_Mono'));

        $dados['OE_Masc'] = valueOfCheck($this->input->post('iprfOE_Masc'));
        $dados['OD_Masc'] = valueOfCheck($this->input->post('iprfOD_Masc'));
        if ($this->input->post('codIprf') <= 0) {
            $this->db->insert('iprf', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codIprf'));
            $this->db->update('iprf', $dados);
        }

        $this->output->enable_profiler(FALSE);
    }

    public function get_iprf($consulta) {
        return $this->db
                        ->select('i.cod AS codIprf, i.*')
                        ->join('iprf i', 'i.Consulta = c.Cod', 'LEFT')
                        ->get_where('consulta c', array('c.cod' => $consulta))
                        ->result();
    }

}
