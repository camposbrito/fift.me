<?php

class Apartamento_model extends Generic_model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'apto';        
    } 

    public function save() {
        // $this->output->enable_profiler(true );
        $habilitacao = $this->input->post('habilitado');
        foreach ($this->input->post('email') as $key => $value) {
            $data['email'] = $value;
            $data['habilitado'] = 0;
            $old = $this->get($key);
            $old_apto = $old[0]; 
            $i = 0;
            $data['habilitado'] = (isset($habilitacao[$key])) ? $habilitacao[$key] : 0;
            if (($old_apto->habilitado != $data['habilitado']) || (isset($data['email']) && ($old_apto->email != $data['email']))) {
                if ($old_apto->habilitado != $data['habilitado']) {
                    $Habilitacao = $data['habilitado'] == 1 ? 'Habilitado' : 'Desabilitado';
                    $this->Log_model->save($Habilitacao . ' apartamento ' . $old_apto->nome . ' ' . $this->session->userdata('lavanderia'));
                }
                if (isset($data['email']) && ($old_apto->email != $data['email'])) {
                    $Habilitacao = $data['habilitado'] == 1 ? 'Habilitado' : 'Desabilitado';
                    $this->Log_model->save('Atualizado email do apartamento ' . $old_apto->nome . ' ' . $this->session->userdata('lavanderia') . ' de ' . $old_apto->email . ' para ' . $data['email']);
                }
                
                $this->dBLavanderia->where(array('id' => $key))->update($this->tabela, $data);
            }
        }
    }

    public function Ativos() {
        return $this->dBLavanderia
                        ->select("COUNT(1) Qtde")
                        ->get_where('apto a', "a.habilitado = '1'")
                        ->result();
    }
 
    public function index() {

        return $this->dBLavanderia->order_by('(nome * 1)')->get($this->tabela)->result();
    }

    public function get($Cod) {
        return $this->dBLavanderia->where('id', $Cod)->get($this->tabela)->result();
    }

}
