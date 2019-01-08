<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ocorrencia_Model extends CI_Model {
	
  // função para fazer a paginação
  public function getAll() { 
    $pageno = $_GET['pageno']; 
    $Turno = $_GET['Turno_Id']; 
    //1h 30min 20s
    $this->db->select('o.id');
    $this->db->select('o.TipoOcorrencia_id');
    $this->db->select('CONCAT(DATE_FORMAT(DataIni,\'%H:%i:%s -  %d/%m/%Y\'),\' -  \' , TIMEDIFF(DataFin, DataIni)) DataIni');
    
    $this->db->order_by('o.DataIni, id');
    // $this->db->select('TIMESTAMPDIFF(HOUR,DataIni, DataFin) Hora');
    // $this->db->select('TIMESTAMPDIFF(Minute,DataIni, DataFin) - (TIMESTAMPDIFF(HOUR,DataIni, DataFin) *60 ) Minutos');
    // $this->db->select('TIMESTAMPDIFF(SECOND,DataIni, DataFin) - (TIMESTAMPDIFF(Minute,DataIni, DataFin) * 60) Segundos');
    if ($pageno  > 1){
      $this->db->limit(1, $pageno-1);
    }
    else {
      $this->db->limit($pageno);
    }
    $this->db->where(array( 'Turno_id' => $Turno));
    $this->db->from('ocorrencia o');
    
    $res = $this->db->get()->result();
    return $res;
    
  }
  public function saveOcorrenciaCicloStart($Turno_id, $DataIni, $DataFin ) 
  {
    $data['Turno_id']                 = $Turno_id;
    $data['DataIni']                  = $DataIni;
    $data['DataFin']                  = $DataFin;
    $this->db->insert('Ocorrencia', $data);
  }
  public function save() {    
    $data['Turno_id']                 = $this->input->post('turno');
    $data['TipoOcorrencia_id']        = $this->input->post('TipoOcorrencia');
    $data['DataIni']                  = date('Y-m-d H:i:s', now());
    $data['Descricao']                = '';    
    $this->db->insert('Ocorrencia', $data);
  }  
  public function LiberarMaquina($Turno) {
    // $Turno                            = $this->input->post('Turno');    
    $data['DataFin']                  = date('Y-m-d H:i:s', now());
    $this->db->where(array( 'Turno_id' => $Turno, 'DataFin' => null));        
    $this->db->update('Ocorrencia', $data);  
  }

  public function GetOcorrenciaAberto() {
    $Turno = $_GET['Turno_Id']; 
    $this->db->select("*");
    $this->db->where(array( 'Turno_id' => $Turno, 'DataFin' => null));
    $this->db->from('ocorrencia');
    return $this->db->get()->result();
  }

  public function ocorrencias_ciclo_count() {
    $Turno = $_GET['Turno_Id']; 
    $this->db->select("COUNT(1) Registros");
    $this->db->where(array( 'Turno_id' => $Turno, 'TipoOcorrencia_id' => null));
    $this->db->from('ocorrencia');
    return $this->db->get()->result();
  }

  public function Count() {
    $Turno = $_GET['Turno_Id']; 
    $this->db->select("COUNT(1) AS Registros");
    $this->db->where(array( 'Turno_id' => $Turno));
    $this->db->from('ocorrencia');
    return $this->db->get()->result();
  }

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