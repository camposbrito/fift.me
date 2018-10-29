<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Produto_Model extends CI_Model {
	
  // função para fazer a paginação
  public function get($id) { 
    $this->db->select('*');
    $this->db->from('Produto');
    $this->db->where('id', $id);
    return $this->db->get()->result();
    
  }

}