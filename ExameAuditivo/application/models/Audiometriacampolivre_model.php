<?php

class AudiometriaCampoLivre_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {
        //Mascaramento
        $dados['Consulta'] = $this->input->post('Consulta');
        $dados['Equipamento'] = valueOfInteger($this->input->post('Equipamento'));

        $dados['Freq025'] = valueOfInteger($this->input->post('Freq025'));
        $dados['Freq05'] = valueOfInteger($this->input->post('Freq05'));
        $dados['Freq1'] = valueOfInteger($this->input->post('Freq1'));
        $dados['Freq2'] = valueOfInteger($this->input->post('Freq2'));
        $dados['Freq4'] = valueOfInteger($this->input->post('Freq4'));
        $dados['Freq8'] = valueOfInteger($this->input->post('Freq8'));
        $dados['LDF'] = valueOfInteger($this->input->post('LDF'));
        $dados['LRF'] = valueOfInteger($this->input->post('LRF'));
        $dados['IRF_MONO'] = valueOfInteger($this->input->post('IRF_MONO'));
        $dados['IRF_DISSI'] = valueOfInteger($this->input->post('IRF_DISSI'));

        if ($this->input->post('codAudiometriaCampoLivre') <= 0) {
            $this->db->insert('audiometriacampolivre', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codAudiometriaCampoLivre'));
            $this->db->update('audiometriacampolivre', $dados);
        }

//        var_dump($this->input->post());
        $this->output->enable_profiler(FALSE);
    }

    public function getCampoLivre($consulta) {
        return $this
                        ->db
                        ->join('audiometriacampolivre a', 'a.Consulta = c.Cod', 'LEFT')
                        ->get_where('consulta c', array('c.Cod' => $consulta))->result()
        ;
    }

}
