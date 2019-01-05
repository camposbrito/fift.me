<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Turno_Model extends CI_Model {
  function __construct() {
    parent::__construct();            
    $this->load->model ( "Funcionario_Model" );
  } 
  
  public function getAtual() {  
    $this->db->select('IFNULL(MAX(id), -1) id');
    $this->db->from('Turno T');
    $this->db->where('t.DataFin IS NULL');
    $res = $this->db->get()->result();  
    
    $this->session->set_userdata('turno', $res[0]->id);
    return $res;    
  }

  public function get($id) {
    $this->db->select('*');
    $this->db->from('Turno T');
    $this->db->where('id', $id);
    $res = $this->db->get()->result();
    return $res;    
  }

  public function getResultadoAtual($Turno) { 
    $this->db->select('*');
    $this->db->from('Turno T');
    $this->db->join('Parametros p', 'p.id = t.paramgeral_id', 'INNER');
    $this->db->where('t.id', $Turno);
    return $this->db->get()->result();
  }

  public function EmAndamento() {    
    $this->db->select('*');
    $this->db->from('Turno');
    $this->db->where('dataFin is null'); 
    return $this->db->get()->num_rows() > 0; 
  }

  public function concluir_turno() { 
    $data['PecasProducao']   = $this->input->post('Pecas_Producao');
    $data['RefugosProducao'] = $this->input->post('Refugo_Producao');
    $data['RefugosFundicao'] = $this->input->post('Refugo_Fundicao');    
    return ( $this->db->where(array('DataFin' => null))->update('Turno', $data));
  }

  public function encerrar_turno() { 
    date_default_timezone_set("America/Sao_Paulo");
    $data['DataFin'] = date('Y-m-d H:i:s', now());    
    return ( $this->db->where(array('DataFin' => null))->update('Turno', $data));
  }
  
  public function save() { 
    $TAG = $this->input->post('TAG');
    $Jornada = $this->input->post('Jornada');
    $resFuncionario = $this->Funcionario_Model->getFuncionarioByTag($TAG);
    date_default_timezone_set("America/Sao_Paulo");
    $data['DataIni'] = date('Y-m-d H:i:s', now());
    $data['ParamGeral_id'] = 1;
    $data['Estado_id'] = 1;
    $data['Operador_id'] = $resFuncionario[0]->id;
    $data['JornadaTrabalho_id'] = $Jornada;
    $data['PecasProducao'] = 0;
    $data['RefugosProducao'] = 0;
    $data['RefugosFundicao'] = 0;    
    return ($this->db->insert('turno', $data));
  }
}