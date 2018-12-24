<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class JornadaTrabalho_Model extends CI_Model 
{
  function __construct() {
    parent::__construct();           
    //$this->load->model ( "Perfil_Model" );
  } 

  public function getAll() {    
    $this->db->select('*');
    $this->db->from('JornadaTrabalho');
    return $this->db->get()->result();
    
  }

  public function get($id) { 
    $this->db->select('*');
    $this->db->from('JornadaTrabalho');
    $this->db->where('id', $id);
    
    $res = $this->db->get()->result();    
    
  
    return $res;    
  }
}