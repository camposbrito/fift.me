<?php

class Weber_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {

        $dados['Consulta'] = $this->input->post('Consulta');
        $dados['Faixa_500_OE'] = valueOfCheck($this->input->post('Faixa_500_OE'));
        $dados['Faixa_1000_OE'] = valueOfCheck($this->input->post('Faixa_1000_OE'));
        $dados['Faixa_2000_OE'] = valueOfCheck($this->input->post('Faixa_2000_OE'));
        $dados['Faixa_4000_OE'] = valueOfCheck($this->input->post('Faixa_4000_OE'));
        $dados['Faixa_500_OD'] = valueOfCheck($this->input->post('Faixa_500_OD'));
        $dados['Faixa_1000_OD'] = valueOfCheck($this->input->post('Faixa_1000_OD'));
        $dados['Faixa_2000_OD'] = valueOfCheck($this->input->post('Faixa_2000_OD'));
        $dados['Faixa_4000_OD'] = valueOfCheck($this->input->post('Faixa_4000_OD'));

        if ($this->input->post('codWeber') <= 0) {
            $this->db->insert('weber', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codWeber'));
            $this->db->update('weber', $dados);
        }


        $this->output->enable_profiler(false);
    }

    public function getWeber($Consulta) {
        return $this->db->select('w.cod as codWeber, c.*,w.*')->join('weber w', 'w.consulta = c.cod', 'left')->get_where('consulta c', array('c.cod' => $Consulta))->result();
    }

}
