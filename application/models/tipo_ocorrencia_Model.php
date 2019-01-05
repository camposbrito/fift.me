<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tipo_ocorrencia_Model extends CI_Model {
	
  public function get($id) {    
    $this->db->select('*');
    $this->db->from('TipoOcorrencia');
    $this->db->where(array('id' =>  $id));
    return $this->db->get()->result();
    
  }

  public function getAll() {    
    $this->db->select('*');
    $this->db->from('TipoOcorrencia');
    return $this->db->get()->result();
    
  }

  public function getByOcorrencia($Ocorrencia) {    
    $this->db->select('t.*');
    $this->db->select('o.TipoOcorrencia_id');
    $this->db->from('TipoOcorrencia t');
    $this->db->join(' Ocorrencia o', 'o.TipoOcorrencia_id = t.id AND o.Id = ' . $Ocorrencia, 'LEFT');
    return $this->db->get()->result();
    
  }

   
}