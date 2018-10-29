<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Operador_Model extends CI_Model {
  function __construct() {
    parent::__construct();
    $this->tabela = 'apto';        
    $this->load->model ( "Perfil_Model" );
  } 
  // função para fazer a paginação
  public function get($id) { 
    $this->db->select('*');
    $this->db->from('Operador');
    $this->db->where('id', $id);
    $res = $this->db->get()->result();
    $res[0]->Perfil = $this->Perfil_Model->get($res[0]->Perfil_id)[0];
    // echo "<pre>";
    // print_r($res);
    // echo "</pre>";
    return $res;    
  }
}