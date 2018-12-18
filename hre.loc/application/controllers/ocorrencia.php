<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ocorrencia extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		// $this->load->model ( "Parametros_Model" );
		// $this->load->model ( "Equipamento_Model" );
		$this->load->model ( "tipo_ocorrencia_Model" );
		$this->load->model ( "Ocorrencia_Model" );
			
		// $this->output->enable_profiler(true); 	
	}
   
	public function getAll() { 
		$res 					= $this->Ocorrencia_Model->getAll();
		$res->TipoOcorrencia	= $this->tipo_ocorrencia_Model->getByOcorrencia($res->id);	
		echo json_encode($res);
	} 
	public function Count() { 
		$res 					= $this->Ocorrencia_Model->Count()[0];
		echo json_encode($res);
	} 
}