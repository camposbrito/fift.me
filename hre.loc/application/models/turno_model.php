<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Turno_Model extends CI_Model {
	
  // função para fazer a paginação
  public function getAtual() {  
    // $this->output->enable_profiler(true); 
    $this->db->select('*');
    $this->db->from('Turno');
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
    
    return ($this->db->insert('turno', $data));
    
    $this->output->enable_profiler(true);
  }

  public function save() { 
    echo $this->input->post('TAG');
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
  // public function getOperador() {
  //   $this->db->select("'Rodrigo' as Nome, 'A' as Turno");
  //   $this->db->from('sessao');
  //   return $this->db->get()->result();
  // }

  // public function getQuantidade() {
  //   $this->db->select('0 as qtde');
  //   $this->db->from('sessao');
  //   return $this->db->get()->result();
  // }
  // public function getTermino() {
  //   $this->db->select('4 as atual');
  //   $this->db->from('sessao');
  //   return $this->db->get()->result();
  // }
  // public function getResultado() {
  //   $this->db->select('4 as producao, 1 as refugos, 3 as realizado, 4 as previsto, 1 as diferenca, 90 as oee ');
  //   $this->db->from('sessao');
  //   return $this->db->get()->result();
  // }

//  public function post($itens){
//    $res = $this->db->insert('items', $itens);
//    if($res){
//      return $this->get();
//    }else{
//      return FALSE;
//    }
//  }
}