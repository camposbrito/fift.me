<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CicloStart_model extends CI_Model 
{
  function __construct() {
    parent::__construct();           
    $this->load->model("CicloStart_Model");
    $this->load->model("Turno_Model");
  } 

  public function getAtual() {
    $Turno = $this->session->turno;   
    if (!isset($Turno))
    {
      $Turno					= $this->Turno_Model->getAtual()[0]->id;
    }
    $this->db->select('IFNULL(COUNT(c.id) * p.PecasPorCiclo, 0) as QtdPecas');
    $this->db->from('Turno t');
    $this->db->join('CicloStart c', 'c.turno_id = t.id', 'INNER');
    $this->db->join('Parametros p', 'p.id = t.paramgeral_id', 'INNER');
    $this->db->where('t.id', $Turno);
    // $this->db->group_by('p.PecasPorCiclo'); 
    $res = $this->db->get();    
    return $res->result();    
  }
  public function save()
	{
    $Turno = $this->session->turno;   
    if (!isset($Turno))
    {
      $Turno					= $this->Turno_Model->getAtual()[0]->id;
    }  
    date_default_timezone_set("America/Sao_Paulo");
    $Dados = $this->input->post('Dados');  
    if (strpos($Dados, 'true')  == true)
    {
      $data['DataIni'] = date("Y-m-d H:i:s");
      $data['Turno_id'] = $Turno;
      $data[socket_id] = $this->input->post('socket_id');
      $this->db->insert('ciclostart', $data);
    }
    else
    {
      $data['DataFin'] = date("Y-m-d H:i:s");
      $this->db->where(array('DataFin' => null, 'Turno_id' => $Turno))->update('ciclostart', $data);
    }   
  }
}