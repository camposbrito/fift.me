<?php

class Maquina_model extends Generic_model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'maquina';
        
    }

    public function Ativas() {
        return $this->dBLavanderia
                        ->select("COUNT(1) Qtde")
                        ->get_where('maquina m', "m.habilitado = '1'")
                        ->result();
    }

    public function log($ref) {
        
        return $this->dBLavanderia
                        ->select("m.id ,
                              CONCAT(
                              CASE WHEN m.lavadora = 1  
                              THEN 'Lavadora ' 
                              ELSE 'Secadora '
                              END,l.maquina_id) AS maquina,
                              DATE_FORMAT(l.Data_inicio,'%Y-%m-%d') data ,  
                              SUM(timestampdiff(minute,l.data_inicio, l.data_fim))  tempoTotal,
                              SUM(timestampdiff(minute,l.data_inicio, l.data_fim)* l.preco) precoTotal  "
                        )
                        ->join('maquina m', 'm.id = l.maquina_id')
                        ->order_by("date_format(l.Data_inicio,'%Y-%m-%d')")
                        ->order_by("l.maquina_id")
                        ->group_by("l.maquina_id")
                        ->group_by("date_format(l.Data_inicio,'%Y-%m-%d')")
                        ->get_where('log l', "date_format(l.Data_inicio,'%Y-%m') = date_format(DATE_SUB(".(isset($ref)?  "'".dataUS('01/'.$ref)."'":'NOW()').",INTERVAL 0 MONTH),'%Y-%m')")
                        ->result();
    }

    public function index() {
         return $this->dBLavanderia 
                        ->select("m.numero maquina,        
                            CASE WHEN lavadora = 1 
                              THEN 'Lavadora' 
                              ELSE 'Secadora'
                            END tipo,
                            CASE WHEN status = 1
                              THEN 'Ligada'
                              ELSE 'Desligada'
                            END estado,                
                            a.nome apto,
                            CASE WHEN status = 1
                              THEN 180 - (timestampdiff(minute,l.data_inicio, now()))
                              ELSE 0
                            END  tempoRestante,
                            CASE WHEN m.habilitado = 1
                              THEN 'Habilitada'
                              ELSE 'Desabilitada'
                            END condicao,
                            m.habilitado ")
                        ->join('log l', 'l.maquina_id = m.id', 'LEFT')
                        ->join('apto a', 'a.id = l.apto_id', 'INNER')
                        ->order_by('m.id', 'ASC')
                        ->get_where($this->tabela . ' m', 'l.data_inicio = (select max(data_inicio) from log l1 where l1.maquina_id = m.id)')
                        ->result();
    }
    public function indexOtimizado() {
         return $this->dBLavanderia 
                     ->select('m.numero maquina')
                     ->select("CASE 
                                WHEN lavadora = 1 THEN 'Lavadora' 
                                ELSE 'Secadora' 
                              END tipo")
                     ->select("(
                                CASE WHEN m.habilitado = 1 
                                  THEN  (
                                          CASE 
                                            WHEN status = 1 THEN '<i class=\"fa fa-power-off\" style=\"color:blue\"> Ligado</i>' 
                                            ELSE '<i class=\"fa fa-power-off\" style=\"color:red\"> Desligado</i>' 
                                          END     
                                        )
                                  ELSE '<i class=\"fa fa-power-off\" style=\"color:black; text-decoration:line-through\"> Inativa</i> '
                                END 
                              )estado")
                     ->select("(
                                SELECT  a.nome
                                FROM    apto a
                                INNER JOIN  log l   ON a.id = l.apto_id
                                WHERE   l.maquina_id = m.id
                                ORDER   BY l.data_inicio DESC
                                LIMIT   1
                              ) apto")
                     ->select("CASE    
                                WHEN status = 1 THEN 180 -  (TIMESTAMPDIFF(MINUTE, (SELECT max(data_inicio)
                                                                                    FROM  log l
                                                                                    WHERE l.maquina_id = m.id), now()))
                                ELSE 0
                              END AS tempoRestante")
                     ->select("CASE 
                                WHEN m.habilitado = 1 THEN 'Habilitada' 
                                ELSE 'Desabilitada' 
                              END AS condicao")
                     ->select('m.habilitado')
                     ->get_where($this->tabela . ' m')
                     //->order_by('m.id', 'ASC')          
                     
                     ->result();
    }

    public function find($Cod = null) {
          return $this->dBLavanderia->where('Cod', $Cod)->get($this->tabela)->result();
    }
 
    public function save() {
        $habilitacao = $this->input->post('habilitado');        
         foreach ($this->input->post('maquina') as $key => $value) {
            $old_maquina = $this->get($key);
            // _debug($old_maquina);
            $data['habilitado'] = 0;
            if (isset($habilitacao[$key])) {
                $data['habilitado'] = $habilitacao[$key];
            }
            if ($data['habilitado'] <> $old_maquina[0]->habilitado)
            $this->Log_model->save((($data['habilitado'] == 0)?'Desabilitando':'Habilitando').' '. (($old_maquina[0]->lavadora == 1)?'Lavadora':'Secadora').' '.$old_maquina[0]->numero.' do Bloco ' . $this->session->userdata('lavanderia') );    
            $this->dBLavanderia->where(array('id' => $key))->update($this->tabela, $data);
        }
    }
    public function LavadoraFuncionando() {
         return $this->dBLavanderia 
                     ->select("COUNT(1) Qtde")                     
                     ->get_where($this->tabela . ' m',array( "m.lavadora" =>'1', "status"=>1))                                             					           
                     ->result();
    }
    public function LavadoraParada() {
         return $this->dBLavanderia 
                     ->select("COUNT(1) Qtde")                     
                     ->get_where($this->tabela . ' m',array( "m.lavadora" =>'1', "status"=>0, "habilitado"=>1))
                     ->result();
    }
    public function LavadoraManutencao() {
         return $this->dBLavanderia 
                     ->select("COUNT(1) Qtde")                     
                     ->get_where($this->tabela . ' m',array( "m.lavadora" =>'1',"habilitado"=>0))
                     ->result();
    }
    public function SecadoraFuncionando() {
         return $this->dBLavanderia 
                     ->select("COUNT(1) Qtde")                     
                     ->get_where($this->tabela . ' m',array( "m.lavadora" =>'0', "status"=>1))
					            ->result();
    }
    public function SecadoraParada() {
         return $this->dBLavanderia 
                     ->select("COUNT(1) Qtde")                     
                     ->get_where($this->tabela . ' m',array( "m.lavadora" =>'0', "status"=>0, "habilitado"=>1))
					           ->result();
    }    
    public function SecadoraManutencao() {
         return $this->dBLavanderia 
                     ->select("COUNT(1) Qtde")                     
                     ->get_where($this->tabela . ' m',array( "m.lavadora" =>'0',"habilitado"=>0))
					           ->result();
    }    
     public function get($Cod) {
        return $this->dBLavanderia->where('id', $Cod)->get($this->tabela)->result();
    }
}
