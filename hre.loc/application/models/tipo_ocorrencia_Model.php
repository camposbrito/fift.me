<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tipo_ocorrencia_Model extends CI_Model {
	
  // função para fazer a paginação
  public function getAll() {    
    $this->db->select('*');
    $this->db->from('TipoOcorrencia');
    return $this->db->get()->result();
    
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