<?php

class Fechamento_model extends Generic_Model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'fechamento';
        $this->load->helper('common_helper');
    }

    public function save() {
        $operacao = $this->input->post('operacao');
//        _debug($this->input->post());
        if ($operacao == 'alterar') {
            $descricao  = $this->input->post('descricao');
            $dataini    = $this->input->post('dataini');
            $datafin    = $this->input->post('datafin');

            foreach ($descricao as $key => $value) {
                $data['descricao'] = $value;
                $data['dataini'] = dataUS($dataini[$key]);
                $data['datafin'] = dataUS($datafin[$key]);                
                $this->db->where(array('id' => $key))->update($this->tabela, $data);
            }
        } else if ($operacao == 'inserir') {
            $data['descricao'] = $this->input->post('descricao');
            $data['dataini'] = dataUS($this->input->post('dataini'));
            $data['datafin'] = dataUS($this->input->post('datafin'));            
            $this->db->insert($this->tabela, $data);
//            $this->output->enable_profiler(TRUE);
        }
    }
//
//    public function Ativos() {
//        return $this->dBLavanderia
//                        ->select("COUNT(1) Qtde")
//                        ->get_where('apto a', "a.habilitado = '1'")
//                        ->result();
//    }

    public function index() {
        return $this->db
                    ->order_by('dataini', 'desc')
                    ->get($this->tabela . ' r')  
                    ->result();
    }

    public function getUltimoFechamento() {
        return $this->db
                    ->select('descricao')
                    ->select('dataini')
                    ->select('datafin')
                    ->select('ADDDATE( datafin, INTERVAL 1 DAY) proxdataini')
                    ->where("descricao not like '%TOTAL%'")
                    ->limit(1)
                    ->order_by('dataini', 'desc')                    
                    ->get($this->tabela)
                    ->result();
    }

}
