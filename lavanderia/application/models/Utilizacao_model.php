<?php

class Utilizacao_model extends Generic_model{

    function __construct() {
        parent::__construct();        
        $this->tabela = 'log';        
    }

    public function Ativos() {        
        return $this->dBLavanderia
                        ->select("COUNT(1) Qtde")
                        ->get_where('apto a', "a.habilitado = '1'")
                        ->result();
    }

    public function index( $Cod = null, $DataI = null, $DataF = null) {
        
        $Cod = ($Cod == 'index')?null:$Cod;
        return $this->dBLavanderia
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
                        ->where("date_format(l.Data_inicio,'%Y-%m-%d')>=date_format('" . dataUS($DataI) . "','%Y-%m-%d')")
                        ->where("date_format(l.Data_inicio,'%Y-%m-%d')<=date_format('" . dataUS( $DataF) . "','%Y-%m-%d')")
                        ->where('a.nome = ' . (strlen($Cod) > 0 ? $Cod : 'a.nome'))
                        ->order_by('(a.nome * 1)')
                        ->order_by('l.data_inicio', 'ASC')
                        ->order_by('m.id')
                        ->get($this->tabela . ' l')
                        ->result();
    }

    public function getTotalizador($ref=null) {
        
        return $this->dBLavanderia
                        ->select('a.nome apto')
                        ->select("truncate(sum(timestampdiff(minute,l.data_inicio, l.data_fim)* l.preco),2) preco")
                        ->join('apto a', 'a.id = l.apto_id')
                        ->where("date_format(l.Data_inicio,'%Y-%m')=date_format(".(isset($ref)?  "'".dataUS('01/'.$ref)."'":'NOW()').",'%Y-%m')")
                        ->order_by('preco')
                        ->order_by('(a.nome * 1)')
                        ->order_by('l.data_inicio')
                        ->group_by('a.nome')
                        ->get($this->tabela . ' l')
                        ->result();
    }

     public function getTotalizadorIntervalo($DataI, $DataF) {
        
        return $this->dBLavanderia
                         
                        ->select("truncate(sum(timestampdiff(minute,l.data_inicio, l.data_fim)* l.preco),2) preco")
                        ->join('apto a', 'a.id = l.apto_id','inner')
                        ->where("date_format(l.Data_inicio,'%Y-%m-%d')>=date_format('" . dataUS($DataI) . "','%Y-%m-%d')")
                        ->where("date_format(l.Data_inicio,'%Y-%m-%d')<=date_format('" . dataUS( $DataF) . "','%Y-%m-%d')")
                        ->order_by('preco')
                        ->order_by('(a.nome * 1)')
                        ->order_by('l.data_inicio')
                        ->group_by('a.nome')
                        ->get($this->tabela . ' l')
                        ->result();
    }
    
         public function getTotalizadorFechamento($DataI, $DataF) {
        
        return $this->dBLavanderia
                         
                        ->select("truncate(sum(timestampdiff(minute,l.data_inicio, l.data_fim)* l.preco),2) preco")
                        ->join('apto a', 'a.id = l.apto_id','inner')
                        ->where("date_format(l.Data_inicio,'%Y-%m-%d')>=date_format('" . dataUS($DataI) . "','%Y-%m-%d')")
                        ->where("date_format(l.Data_inicio,'%Y-%m-%d')<=date_format('" . dataUS( $DataF) . "','%Y-%m-%d')")
                        ->order_by('preco')
                        ->order_by('(a.nome * 1)')
                        ->order_by('l.data_inicio')
                        //->group_by('a.nome')
                        ->get($this->tabela . ' l')
                        ->result();
    }
    public function getTotalizadorApto($ref=null) {
        
        return $this->dBLavanderia
                        ->select('a.nome apto')
                        ->select("truncate(sum(timestampdiff(minute,l.data_inicio, l.data_fim)* l.preco),2) preco")
                        ->join('apto a', 'a.id = l.apto_id','INNER')
                        ->where("date_format(l.Data_inicio,'%Y-%m')=date_format(".(isset($ref)?  "'".dataUS('01/'.$ref)."'":'NOW()').",'%Y-%m')")
                        ->order_by('preco')
                        ->order_by('(a.nome * 1)')
                        ->order_by('l.data_inicio')
                        ->group_by('a.nome')
                        ->get($this->tabela . ' l')
                        ->result();
    }

     public function getTotalizadorTempoApto($ref=null) {
        
        return $this->dBLavanderia
                        ->select("date_format(l.Data_inicio, '%Y-%m-%d') Data")
                        ->select("SUM(timestampdiff(minute, `l`.`data_inicio`, l.data_fim)) sum")
                        ->select("min(timestampdiff(minute, `l`.`data_inicio`, l.data_fim)) min")
                        ->select("avg(timestampdiff(minute, `l`.`data_inicio`, l.data_fim)) avg")
                        ->select("max(timestampdiff(minute, `l`.`data_inicio`, l.data_fim)) max")
                        ->join('apto a', 'a.id = l.apto_id','INNER')
                        ->join('maquina m', '`m`.`id` = `l`.`maquina_id`','INNER')
                        ->where("date_format(l.Data_inicio,'%Y-%m')=date_format(".(isset($ref)?  "'".dataUS('01/'.$ref)."'":'NOW()').",'%Y-%m')")
                        ->where("(timestampdiff(minute, `l`.`data_inicio`, l.data_fim)) > 0")
              
                        ->order_by("date_format(l.Data_inicio, '%Y-%m-%d')")
//                        ->order_by('(a.nome * 1)')
//                        ->order_by('l.data_inicio')
//                        ->order_by('`l`.`maquina_id`')
//                        ->group_by('a.nome');
//                        ->group_by('`l`.`maquina_id`')
                        ->group_by("date_format(l.Data_inicio, '%Y-%m-%d')")
                        ->get($this->tabela . ' l')
                        ->result();
    }
 
    
    public function find($Cod = null) {
        
        return $this->dBLavanderia
                        ->where('Cod', $Cod)
                        ->get($this->tabela)
                        ->result();
    }

}
 