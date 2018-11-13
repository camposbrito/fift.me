<?php

class Audiometria_aasi_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {
        //Mascaramento
        $dados['Consulta'] = valueOfInteger($this->input->post('Consulta'));
        $dados['Freq025'] = valueOfInteger($this->input->post('Freq025OEOD'));
        $dados['Freq05'] = valueOfInteger($this->input->post('Freq05OEOD'));
        $dados['Freq1'] = valueOfInteger($this->input->post('Freq1OEOD'));
        $dados['Freq2'] = valueOfInteger($this->input->post('Freq2OEOD'));
        $dados['Freq4'] = valueOfInteger($this->input->post('Freq4OEOD'));
        $dados['LRF'] = valueOfInteger($this->input->post('LRFOEOD'));
        $dados['LDF'] = valueOfInteger($this->input->post('LDFOEOD'));
        $dados['IPRF'] = valueOfInteger($this->input->post('IPRFOEOD'));
        $dados['IPRF_DISS'] = valueOfInteger($this->input->post('IPRF_DISSOEOD'));
        $dados['IRF_MONO'] = valueOfInteger($this->input->post('IRF_MONOOEOD'));
        $dados['IRF_DISSI'] = valueOfInteger($this->input->post('IRF_DISSIOEOD'));
        if ($this->input->post('CodAASIOEOD') <= 0) {
            $this->db->insert('audiometriacomaasioeod', $dados);
        } else {
            $this->db->where('cod', $this->input->post('CodAASIOEOD'));
            $this->db->update('audiometriacomaasioeod', $dados);
        }

        $dados['Consulta'] = valueOfInteger($this->input->post('Consulta'));
        $dados['Freq025'] = valueOfInteger($this->input->post('Freq025OE'));
        $dados['Freq05'] = valueOfInteger($this->input->post('Freq05OE'));
        $dados['Freq1'] = valueOfInteger($this->input->post('Freq1OE'));
        $dados['Freq2'] = valueOfInteger($this->input->post('Freq2OE'));
        $dados['Freq4'] = valueOfInteger($this->input->post('Freq4OE'));
        $dados['LRF'] = valueOfInteger($this->input->post('LRFOE'));
        $dados['LDF'] = valueOfInteger($this->input->post('LDFOE'));
        $dados['IPRF'] = valueOfInteger($this->input->post('IPRFOE'));
        $dados['IPRF_DISS'] = valueOfInteger($this->input->post('IPRF_DISSOE'));
        $dados['IRF_MONO'] = valueOfInteger($this->input->post('IRF_MONOOE'));
        $dados['IRF_DISSI'] = valueOfInteger($this->input->post('IRF_DISSIOE'));
        if ($this->input->post('CodAASIOE') <= 0) {
            $this->db->insert('audiometriacomaasioe', $dados);
        } else {
            $this->db->where('cod', $this->input->post('CodAASIOE'));
            $this->db->update('audiometriacomaasioe', $dados);
        }


        $dados['Consulta'] = valueOfInteger($this->input->post('Consulta'));
        $dados['Freq025'] = valueOfInteger($this->input->post('Freq025OD'));
        $dados['Freq05'] = valueOfInteger($this->input->post('Freq05OD'));
        $dados['Freq1'] = valueOfInteger($this->input->post('Freq1OD'));
        $dados['Freq2'] = valueOfInteger($this->input->post('Freq2OD'));
        $dados['Freq4'] = valueOfInteger($this->input->post('Freq4OD'));
        $dados['LRF'] = valueOfInteger($this->input->post('LRFOD'));
        $dados['LDF'] = valueOfInteger($this->input->post('LDFOD'));
        $dados['IPRF'] = valueOfInteger($this->input->post('IPRFOD'));
        $dados['IPRF_DISS'] = valueOfInteger($this->input->post('IPRF_DISSOD'));
        $dados['IRF_MONO'] = valueOfInteger($this->input->post('IRF_MONOOD'));
        $dados['IRF_DISSI'] = valueOfInteger($this->input->post('IRF_DISSIOD'));
        if ($this->input->post('CodAASIOD') <= 0) {
            $this->db->insert('audiometriacomaasiod', $dados);
        } else {
            $this->db->where('cod', $this->input->post('CodAASIOD'));
            $this->db->update('audiometriacomaasiod', $dados);
        }

        $this->output->enable_profiler(FALSE);
    }

}
