<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tipo_ocorrencia_Model extends CI_Model {
	
  public function getAll() {    
    $this->db->select('*');
    $this->db->from('TipoOcorrencia');
    return $this->db->get()->result();
    
  }

   
}