<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CicloStart_model extends CI_Model 
{
  function __construct() {
    parent::__construct();           
    $this->load->model ( "CicloStart_Model" );
  } 
  // função para fazer a paginação
  public function getAtual($Turno_id, $ParamGeral_id) { 
    // $this->output->enable_profiler(TRUE);

    $this->db->select('IFNULL(COUNT(c.id) * p.PecasPorCiclo, 0) as QtdPecas');
    $this->db->from('Turno t');
    $this->db->join('CicloStart c', 'c.turno_id = t.id', 'INNER');
    $this->db->join('Parametros p', 'p.id = t.paramgeral_id', 'INNER');
    $this->db->where( 't.DataFin IS NULL');
    // $this->db->group_by('p.PecasPorCiclo'); 
    $res = $this->db->get()->result();
    
    return $res;    
  }
  public function save()
	{
    
    // $this->output->enable_profiler(TRUE);
    date_default_timezone_set("America/Sao_Paulo");
    $Dados = $this->input->post('Dados');  
    if (strpos($Dados, 'true')  == true)
    {
      $data['DataIni'] = date("Y-m-d H:i:s");
      $data['Turno_id'] = 1;
      $this->db->insert('ciclostart', $data);
    }
    else
    {
      $data['DataFin'] = date("Y-m-d H:i:s");
      $this->db->where(array('DataFin' => null, 'Turno_id' => 1))->update('ciclostart', $data);
    }
   
  }
}