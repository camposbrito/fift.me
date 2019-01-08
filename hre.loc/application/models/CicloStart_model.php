<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CicloStart_model extends CI_Model 
{
  function __construct() {
    parent::__construct();           
    $this->load->model("CicloStart_Model");
    $this->load->model("Ocorrencia_Model");
    $this->load->model("Parametros_Model");
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
    $this->db->where('TIMESTAMPDIFF(SECOND,c.DataIni, c.DataFin) >', 4);
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
      //recuperar o id
      $this->db->select('*')->from('ciclostart')->where('DataFin', null)->where( 'Turno_id', $Turno);
      $res = $this->db->get();
      if ($res->num_rows() > 0){
        foreach ($res->result() as $row)
		    {
          $id = $row->id;  
          $data['DataIni'] = $row->DataIni;
          echo $id;
          //atualizar data final
          $data['DataFin'] = date("Y-m-d H:i:s");
          $this->db->where(array('DataFin' => null, 'Turno_id' => $Turno, 'id' => $id))->update('ciclostart', $data);
          //Verificar se o tempo deu mais que 4s, caso positivo returns true
          $this->db->select('TIMESTAMPDIFF(SECOND,DataIni, DataFin) AS Tempo')->from('ciclostart')->where( array('Turno_id' => $Turno, 'id' => $id));
          $res = $this->db->get()->result();
          $Tempo = $res[0]->Tempo;
          $ContouPeca = $Tempo > 4;
          echo 'Tempo: ' . $Tempo;
          echo 'ContouPeca: ' . $ContouPeca;
          if ($ContouPeca)
          { 
            //Recuperar os tempos da param geral para salvar ocorrencia ou nao
            $resParam =  $this->Parametros_Model->get()[0];
            $TempoMaximoCiclo = $resParam->TempoMaximoCiclo;
            $TempoCargaDescarga = $resParam->TempoCargaDescarga;
            $MargemTolerancia = $resParam->MargemTolerancia;
            // Verificar se a diferença de tempo - (TempoMaximoCiclo - TempoCarga e Descarga) - Superior à Margem de Tolerancia.
            $DiferencaTempo = $Tempo - ($TempoMaximoCiclo + $TempoCargaDescarga);
            //Caso positivo, criar ocorrencia.
            if ( $DiferencaTempo > $MargemTolerancia )
            {
              $this->Ocorrencia_Model->saveOcorrenciaCicloStart($Turno, $data['DataIni'], $data['DataFin']);
            }

          }           
        }
      }
    }   
  }
}