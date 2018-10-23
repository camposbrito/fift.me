<?php

class Metodos_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'metodos';
    }

    public function save() {
        $this->db->update($this->tabela, array('Privado' => 0));
        foreach ($this->input->post('privado') as $key => $value) {
            $data['id'] = $key;
            $this->db->set('privado', 1, FALSE)->where('id', $key)->update($this->tabela);
        }
    }

    public function Ativas() {
        return $this->db
                        ->select("COUNT(1) Qtde")
                        ->get_where('maquina m', "m.habilitado = '1'")
                        ->result();
    }

    public function log() {
        return $this->db
                        ->select("m.id ,
                              CONCAT(
                              CASE WHEN m.lavadora = 1  
                              THEN 'Lavadora ' 
                              ELSE 'Secadora '
                              END,l.maquina_id) AS Maquina,
                              DATE_FORMAT(l.Data_inicio,'%Y-%m-%d') Data ,  
                              SUM(timestampdiff(minute,l.data_inicio, l.data_fim))  TempoTotal,
                              SUM(timestampdiff(minute,l.data_inicio, l.data_fim)* l.preco) PrecoTotal  "
                        )
                        ->join('maquina m', 'm.id = l.maquina_id')
                        ->order_by("date_format(l.Data_inicio,'%Y-%m-%d')")
                        ->order_by("l.maquina_id")
                        ->group_by("l.maquina_id")
                        ->group_by("date_format(l.Data_inicio,'%Y-%m-%d')")
                        ->get_where('log l', "date_format(l.Data_inicio,'%Y-%m') = date_format(DATE_SUB(NOW(),INTERVAL 1 MONTH),'%Y-%m')")
                        ->result();
    }

    public function index() {
        return $this->db
                        ->order_by('m.identificacao', 'ASC')
                        ->get($this->tabela . ' m')
                        ->result();
    }

    public function find($Cod = null) {
        return $this->db->where('Cod', $Cod)->get($this->tabela)->result();
    }

}
