<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ocorrencia extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		// $this->load->model ( "Parametros_Model" );
		// $this->load->model ( "Equipamento_Model" );
		// $this->load->model ( "Produto_Model" );
		$this->load->model ( "Ocorrencia_Model" );
			
		// $this->output->enable_profiler(true); 	
	}
   
	public function getAll() { 
		$res 				= $this->Ocorrencia_Model->getAll()[0];
		// $res->Equipamento 	= $this->Equipamento_Model->get($res->Equipamento_id)[0];
		// $res->Produto 		= $this->Produto_Model->get($res->Produto_id)[0];
		// $res->Operacao 		= $this->Operacao_Model->get($res->Operacao_id)[0];	
		echo json_encode($res);
	} 
}