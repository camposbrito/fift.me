<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sessao_Model extends CI_Model {
	
  // função para fazer a paginação
  public function get() {
    $this->db->select('*');
    $this->db->from('sessao');
    return $this->db->get()->result();
  }

  public function getOperador() {
    $this->db->select("'Rodrigo' as Nome, 'A' as Turno");
    $this->db->from('sessao');
    return $this->db->get()->result();
  }

  public function getQuantidade() {
    $this->db->select('0 as qtde');
    $this->db->from('sessao');
    return $this->db->get()->result();
  }

//  public function post($itens){
//    $res = $this->db->insert('items', $itens);
//    if($res){
//      return $this->get();
//    }else{
//      return FALSE;
//    }
//  }
}