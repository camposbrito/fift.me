<?php

class InstrumentoSonsAmbientais_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {
        //Mascaramento
        $this->output->enable_profiler(false);
        foreach ($this->input->post('codInstrumentossonsambientais') as $key => $codInstrumentossonsambientais) {
            //var_dump($key) ;
            $dados['Consulta'] = valueOfInteger($this->input->post('Consulta'));
            $dados['Instrumento'] = valueOfInteger($this->input->post('Instrumento[' . $key . ']'));
            $dados['Reagiu'] = valueOfCheck($this->input->post('Reagiu[' . $key . ']'));
            $dados['Forte'] = valueOfCheck($this->input->post('Forte[' . $key . ']'));
            $dados['Media'] = valueOfCheck($this->input->post('Media[' . $key . ']'));
            $dados['Fraca'] = valueOfCheck($this->input->post('Fraca[' . $key . ']'));
            $dados['TipoReacao'] = valueOfInteger($this->input->post('TipoReacao[' . $key . ']'));
            $dados['Equipamento'] = valueOfInteger($this->input->post('Equipamento[' . $key . ']'));
            if ($codInstrumentossonsambientais <= 0) {
                $this->db->insert('instrumentossonsambientais', $dados);
            } else {
                $this->db->where('cod', $codInstrumentossonsambientais);
                $this->db->update('instrumentossonsambientais', $dados);
            }
        }



//        var_dump($this->input->post());
    }

}
