<?php

class Relatorio_model extends Generic_Model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'log';
        
        $BlocoA = ($this->session->userdata('BlocoA')!='')?$this->session->userdata('BlocoA'):('A');
        $BlocoB = ($this->session->userdata('BlocoB')!='')?$this->session->userdata('BlocoB'):('B');
        // print_r($BlocoB);
        $this->LavanderiaA = $this->load->database($BlocoA, TRUE);
        $this->LavanderiaB = $this->load->database($BlocoB, TRUE);
    }

    public function Ativos() {  
        return $this->dBLavanderia
                        ->select("COUNT(1) Qtde")
                        ->get_where('apto a', "a.habilitado = '1'")
                        ->result();
    }

    public function index($tag = null, $ref = null) {
        // $this->output->enable_profiler(true );
        $retorno = $this->LavanderiaA
                        ->select('l.*')
                        ->select('a.nome apto')
                        ->select("CONCAT(
                              CASE WHEN m.lavadora = 1   
                              THEN 'Lavadora ' 
                              ELSE 'Secadora '
                              END,l.maquina_id) maquina")
                        ->select("(timestampdiff(minute,l.data_inicio, l.data_fim))  tempo")
                        ->select("(timestampdiff(minute,l.data_inicio, l.data_fim)* l.preco) preco")
                        ->join('apto a', 'a.id = l.apto_id')
                        ->join('maquina m', 'm.id = l.maquina_id')
                        ->join('rfid r', 'r.apto_id = a.id')
                        ->where("date_format(l.Data_inicio,'%Y-%m')=date_format('" . dataUS('01/' . $ref) . "','%Y-%m')")
                        ->where('r.tag', $tag)
                        ->order_by('(a.nome * 1)')
                        ->order_by('l.data_inicio', 'Desc')
                        ->order_by('m.id')
                        ->get($this->tabela . ' l')
                        ;
        if ($retorno->num_rows() == 0){
                    $retorno = $this->LavanderiaB
                        ->select('l.*')
                        ->select('a.nome apto')
                        ->select("CONCAT(
                              CASE WHEN m.lavadora = 1  
                              THEN 'Lavadora ' 
                              ELSE 'Secadora '
                              END,l.maquina_id) maquina")
                        ->select("(timestampdiff(minute,l.data_inicio, l.data_fim))  tempo")
                        ->select("(timestampdiff(minute,l.data_inicio, l.data_fim)* l.preco) preco")
                        ->join('apto a', 'a.id = l.apto_id')
                        ->join('maquina m', 'm.id = l.maquina_id')
                        ->join('rfid r', 'r.apto_id = a.id')
                        ->where("date_format(l.Data_inicio,'%Y-%m')=date_format('" . dataUS('01/' . $ref) . "','%Y-%m')")
                        ->where('r.tag', $tag)
                        ->order_by('(a.nome * 1)')
                        ->order_by('l.data_inicio', 'Desc')
                        ->order_by('m.id')
                        ->get($this->tabela . ' l')
                        ;
        }
        return $retorno->result();
    }

    public function getTotalizador() {
        return $this->LavanderiaA
                        ->select('a.nome apto')
                        ->select("truncate(sum(timestampdiff(minute,l.data_inicio, l.data_fim)* l.preco),2) preco")
                        ->join('apto a', 'a.id = l.apto_id')
                        ->where("date_format(l.Data_inicio,'%Y-%m')=date_format(now(),'%Y-%m')")
                        ->order_by('preco')
                        ->order_by('(a.nome * 1)')
                        ->order_by('l.data_inicio')
                        ->group_by('a.nome')
                        ->get($this->tabela . ' l')
                        ->result();
    }

    public function find($Cod = null) {
        return $this->LavanderiaA
                        ->where('Cod', $Cod)
                        ->get($this->tabela)
                        ->result();
    }

}
