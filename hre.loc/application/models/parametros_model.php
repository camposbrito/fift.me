<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Parametros_Model extends CI_Model {
	
  // função para fazer a paginação
  public function get() {    
    $this->db->select('*');
    $this->db->from('Parametros');
    return $this->db->get()->result();
    
  }
  
  public function save() {
     
    $id                               = $this->input->post('id');
    $data['Equipamento_id']           = $this->input->post('Equipamento_id');
    $data['Produto_id']               = $this->input->post('Produto_id');
    $data['Operacao_id']              = $this->input->post('Operacao_id');
    $data['PecasPorCiclo']            = $this->input->post('PecasPorCiclo');
    $data['TempoMaximoCiclo']         = $this->input->post('TempoMaximoCiclo');
    $data['QuantidadePrevistaTurno']  = $this->input->post('QuantidadePrevistaTurno');
    $data['TempoCargaDescarga']       = $this->input->post('TempoCargaDescarga');
    $data['MargemTolerancia']         = $this->input->post('MargemTolerancia');
    $data['TempoMinimoCiclo']         = $this->input->post('TempoMinimoCiclo');    
    // return = 
    $this->db-> where(array('id' => $id))
             -> update('parametros', $data);
        
   
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