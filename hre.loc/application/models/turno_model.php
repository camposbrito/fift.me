<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Turno_Model extends CI_Model {
	
  // função para fazer a paginação
  public function getAtual() {  
    // $this->output->enable_profiler(true); 
    $this->db->select('*');
    $this->db->from('Turno T');
    $this->db->where( 't.DataFin IS NULL');
    return $this->db->get()->result();
    
  }
  public function getResultadoAtual() {  
    // $this->output->enable_profiler(true); 
    $this->db->select('*');
    $this->db->from('Turno T');
    $this->db->join('Parametros p', 'p.id = t.paramgeral_id', 'INNER');
    $this->db->where( 't.DataFin IS NULL');
    return $this->db->get()->result();
    
  }

  public function inProgress() {    
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
    $this->output->enable_profiler(true);
  }

  public function encerrar_turno() { 
    date_default_timezone_set("America/Sao_Paulo");
    $data['DataFin'] = date('Y-m-d H:i:s', now());    
    return ( $this->db->where(array('DataFin' => null))->update('Turno', $data));    
    $this->output->enable_profiler(true);
  }
  
  public function save() { 
    echo $this->input->post('TAG');
    date_default_timezone_set("America/Sao_Paulo");
    $data['DataIni'] = date('Y-m-d H:i:s', now());
    $data['ParamGeral_id'] = 1;
    $data['Estado_id'] = 1;
    $data['Operador_id'] = 1;
    $data['JornadaTrabalho_id'] = 1;
    $data['PecasProducao'] = 0;
    $data['RefugosProducao'] = 0;
    $data['RefugosFundicao'] = 0;    
    return ($this->db->insert('turno', $data));
    $this->output->enable_profiler(true);
  }
}