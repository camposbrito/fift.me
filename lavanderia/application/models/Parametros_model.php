<?php

class Parametros_model extends Generic_Model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'parametros';
        $BlocoA = ($this->session->userdata('BlocoA')!='')?$this->session->userdata('BlocoA'):('A');
        // $BlocoB = ($this->session->userdata('BlocoB')!='')?$this->session->userdata('BlocoB'):('B');
        // print_r($BlocoB);
        // $this->LavanderiaA = $this->load->database($BlocoA, TRUE);
        // $this->LavanderiaB = $this->load->database($BlocoB, TRUE);
        $this->dBLavanderia = $this->load->database($BlocoA, TRUE);
        
    }

    public function save() {
        
        foreach ($this->input->post() as $key => $value) {
            $data['valor'] = $value;
            $this->dBLavanderia->where(array('parametro' => $key))->update($this->tabela, $data);
        }
        // $this->output->enable_profiler(true);
    }

    public function Ativos() {
        return $this->dBLavanderia
                        ->select("COUNT(1) Qtde")
                        ->get_where('apto a', "a.habilitado = '1'")
                        ->result();
    }

    public function index() {
        return $this->dBLavanderia->get($this->tabela)->result();
    }

    public function find($Cod = null) {
        return $this->dBLavanderia->where('Cod', $Cod)->get($this->tabela)->result();
    }

}
 