<?php defined('BASEPATH') OR exit('No direct script access allowed');

class tipo_ocorrencia extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		$this->load->model ( "tipo_ocorrencia_Model" );
	}
   
	public function getAll() { 
		$res = $this->tipo_ocorrencia_Model->getAll();
		echo json_encode($res);
	} 
}