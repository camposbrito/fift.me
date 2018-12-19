<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ocorrencia_Model extends CI_Model {
	
  // função para fazer a paginação
  public function getAll() { 
    $pageno = $_GET['pageno']; 
 
    $this->db->select('o.id');
    $this->db->select('o.TipoOcorrencia_id');
    $this->db->select('DATE_FORMAT(DataIni,\'%H:%i %d/%m/%Y\') DataIni');
    $this->db->select('IFNULL(STR_TO_DATE(concat(TIMESTAMPDIFF(HOUR, `DataIni`, DataFin),\',\',TIMESTAMPDIFF(Minute, `DataIni`, DataFin) - (TIMESTAMPDIFF(HOUR, `DataIni`, DataFin) *60 ), \',\',TIMESTAMPDIFF(SECOND, `DataIni`, DataFin) - (TIMESTAMPDIFF(Minute, `DataIni`, DataFin) * 60)), \'%h,%i,%s\' ), STR_TO_DATE(concat(TIMESTAMPDIFF(Minute, `DataIni`, DataFin) - (TIMESTAMPDIFF(HOUR, `DataIni`, DataFin) *60 ), \',\',TIMESTAMPDIFF(SECOND, `DataIni`, DataFin) - (TIMESTAMPDIFF(Minute, `DataIni`, DataFin) * 60)), \'%i,%s\')) as Hora');
    $this->db->order_by('DataIni, id');
    // $this->db->select('TIMESTAMPDIFF(HOUR,DataIni, DataFin) Hora');
    // $this->db->select('TIMESTAMPDIFF(Minute,DataIni, DataFin) - (TIMESTAMPDIFF(HOUR,DataIni, DataFin) *60 ) Minutos');
    // $this->db->select('TIMESTAMPDIFF(SECOND,DataIni, DataFin) - (TIMESTAMPDIFF(Minute,DataIni, DataFin) * 60) Segundos');
    if ($pageno  > 1){
      $this->db->limit(1, $pageno-1);
    }
    else {
      $this->db->limit($pageno);
    }
    $this->db->from('ocorrencia o');
    
    return $this->db->get()->result()[0];
    
  }

  public function Count() {
    $this->db->select("COUNT(1) AS Registros");
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