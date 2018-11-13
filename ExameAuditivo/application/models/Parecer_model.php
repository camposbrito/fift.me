<?php

class Parecer_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'parecer';
    }

    function getParecer($id) {

        return  $this
                        ->db
                        ->select(' c.cod AS CodConsulta, a.*')
                        ->join('parecer a', 'a.Consulta = c.Cod', 'LEFT')
                        ->get_where('consulta c', array('c.Cod' => $id))->result();
    }

    public function save() {
        $this->output->enable_profiler(false);
        $data['Timpanogramas_OD'] = $this->input->post('Timpanogramas_OD');
        $data['Timpanogramas_OE'] = $this->input->post('Timpanogramas_OE');
        $data['Consulta'] = $this->input->post('Consulta');
        $data['Descricao'] = $this->input->post('Descricao');
        $data['Classificacao'] = $this->input->post('Classificacao');
        $data['ComplacenciaOE'] = $this->input->post('ComplacenciaOE');
        $data['ComplacenciaOD'] = $this->input->post('ComplacenciaOD');
        $data['ReflexosEstapedianos'] = $this->input->post('ReflexosEstapedianos');
        $data['DadosAnamnese'] = $this->input->post('DadosAnamnese');
        $data['ProteseOD'] = $this->input->post('ProteseOD');
        $data['ProteseOE'] = $this->input->post('ProteseOE');
        $data['ObservacaoCampolivre'] = $this->input->post('ObservacaoCampolivre');
        $data['ObsProtese'] = $this->input->post('ObsProtese');
        $data['MonitoramentoAudiologico'] = $this->input->post('MonitoramentoAudiologico');
        $data['MeatoscopiaOD'] = $this->input->post('MeatoscopiaOD');
        $data['MeatoscopiaOE'] = $this->input->post('MeatoscopiaOE');
        
        if ($this->input->post('Cod') == '') {
            return ($this->db->insert($this->tabela, $data));
        } else {
            $this->db->where('cod', $this->input->post('Cod'));
            return $this->db->update($this->tabela, $data);
        }
    }
}
