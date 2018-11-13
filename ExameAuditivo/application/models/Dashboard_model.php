<?php

class Dashboard_model extends CI_Model {

    public $tabela = null;

    function __construct() {
        parent::__construct();
    }
    function getEmpresaUsuarioLogado(){
        return $this->session->userdata['Empresa_Usuario'][0]->Cod;
    }
    public function obter_estatisticas() {
        
        $Dados['Funcionarios'] =    $this->db   ->select('count(1) count,"Total de Funcionários" as msg')
                                                ->where('t1.Empresa', $this->getEmpresaUsuarioLogado())
                                                ->get('terceiro t1')
                                                ->result();
        
        $Dados['Pacientes'] =       $this->db   ->select('count(1) count,"Total de Paciêntes" as msg')
                                                ->get('paciente')
                                                ->result();
        
        $Dados['Consultas'] =       $this->db   ->select('count(1) count,"Total de Consultas" as msg ')
                                                ->join('terceiro t1', 't1.Cod = c.terceiro', 'inner')                                      
                                                ->where('t1.Empresa', $this->getEmpresaUsuarioLogado())                                                
                                                ->get('consulta c')
                                                ->result();
        
        $Dados['ConsultasAbertas'] = $this->db  ->select('count(1) as count,"Consultas Abertas" as msg')
                                                ->join('terceiro t1', 't1.Cod = c.terceiro', 'inner')      
                                                ->where('Fechamento', 'N')
                                                ->where('Invalido', 'N')
                                                ->where('t1.Empresa', $this->getEmpresaUsuarioLogado())    
                                                ->get('consulta c')
                                                ->result();
        
        $Dados['ConsultasFechadas'] = $this->db ->select('count(1) as count,"Consultas Fechadas" as msg')                
                                                ->join('terceiro t1', 't1.Cod = c.terceiro', 'inner')      
                                                ->where('Fechamento', 'S')
                                                ->where('t1.Empresa', $this->getEmpresaUsuarioLogado())
                                                ->get('consulta c')
                                                ->result();
        
        $Dados['ConsultasInvalidas'] = $this->db->select('count(1) as count,"Consultas Inválidas" as msg')
                                                ->join('terceiro t1', 't1.Cod = c.terceiro', 'inner')      
                                                ->where('Invalido', 'S')
                                                ->where('t1.Empresa', $this->getEmpresaUsuarioLogado())
                                                ->get('consulta c')
                                                ->result();;;
        
        return $Dados;
    }

    public function obter_consultas_por_data($terceiro) {
        return $this->db->select('t1.descricao terceiro,DATE_FORMAT(data,"%Y-%m-%d") Data,COUNT(1) Consultas')
                        ->join('terceiro t1', 't1.Cod = c.terceiro', 'inner')               
                        ->where('data >=DATE_ADD(NOW(), INTERVAL -15 DAY)')
                        ->where('c.terceiro', $terceiro)
                        ->where('t1.Empresa', $this->getEmpresaUsuarioLogado())
                        ->group_by('t1.descricao,data,terceiro')
                        ->order_by('data', 'asc')
                        ->get('consulta c')
                        ->result(); 
    }
    public function obter_consultas_por_data1($terceiro) {
        return $this->db->select('t1.descricao terceiro1,DATE_FORMAT(data,"%Y-%m-%d") Data,COUNT(1) Consultas')
                        ->join('terceiro t1', 't1.Cod = c.terceiro1', 'inner')               
                        ->where('data >=DATE_ADD(NOW(), INTERVAL -15 DAY)')
                        ->where('c.terceiro1', $terceiro)
                        ->where('t1.Empresa', $this->getEmpresaUsuarioLogado())
                        ->group_by('t1.descricao,data,terceiro')
                        ->order_by('data', 'asc')
                        ->get('consulta c')
                        ->result(); 
    }
    public function obter_consultas_total_invalidas() {
        return $this->db->select('t1.descricao terceiro,COUNT(1) Consultas')
                        ->join('terceiro t1', 't1.Cod = c.terceiro', 'inner')
                        ->where('c.Invalido','S')
                        ->where('t1.Empresa', $this->getEmpresaUsuarioLogado())                 
                        ->group_by('c.terceiro')
                        ->order_by('c.terceiro', 'asc')
                        ->get('consulta c')
                        ->result(); 
    } 
        public function obter_consultas_total_fechadas() {
        return $this->db->select('t1.descricao terceiro,COUNT(1) Consultas')
                        ->join('terceiro t1', 't1.Cod = c.terceiro', 'inner')                        
                        ->where('c.Fechamento','S')
                        ->where('t1.Empresa', $this->getEmpresaUsuarioLogado())  
                        ->group_by('c.terceiro')
                        ->order_by('c.terceiro', 'asc')
                        ->get('consulta c')
                        ->result(); 
    }
    
        public function obter_consultas_total_abertas() {
        return $this->db->select('t1.descricao terceiro,COUNT(1) Consultas')
                        ->join('terceiro t1', 't1.Cod = c.terceiro', 'inner')
                        ->where('c.Invalido','N')  
                        ->where('c.Fechamento','N')
                        ->where('t1.Empresa', $this->getEmpresaUsuarioLogado())  
                        ->group_by('c.terceiro')
                        ->order_by('c.terceiro', 'asc')
                        ->get('consulta c')
                        ->result(); 
    }
    
        public function obter_consultas_total_funcionario($Field = '') {
            
        return $this->db->select('t1.descricao terceiro'.$Field.',COUNT(1) Consultas')
                        ->join('terceiro t1', 't1.Cod = c.terceiro'.$Field.'', 'inner')
                        ->where('t1.Empresa', $this->getEmpresaUsuarioLogado())
                        ->group_by('c.terceiro'.$Field.'')
                        ->order_by('c.terceiro'.$Field.'', 'asc')
                        ->get('consulta c')
                        ->result(); 
    }
}
