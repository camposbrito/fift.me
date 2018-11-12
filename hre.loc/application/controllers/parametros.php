<?php defined('BASEPATH') OR exit('No direct script access allowed');

class parametros extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		$this->load->model ( "Parametros_Model" );
		// $this->load->model ( "Turno_Model" );
		// $this->load->model ( "Operador_Model" );
		$this->load->model ( "Equipamento_Model" );
		// $this->load->model ( "Estado_Model" );
		$this->load->model ( "Produto_Model" );
		$this->load->model ( "Operacao_Model" );
		
	}
   
	public function get() { 
		$res 			= $this->Parametros_Model->get()[0];

		// $res->Operador 		= $this->Operador_Model->get($res->Operador_id)[0];
		$res->Equipamento 	= $this->Equipamento_Model->get($res->Equipamento_id)[0];
		// $res->Estado 		= $this->Estado_Model->get($res->Estado_id)[0];
		$res->Produto 		= $this->Produto_Model->get($res->Produto_id)[0];
		$res->Operacao 		= $this->Operacao_Model->get($res->Operacao_id)[0];	
		// echo "<pre>";
		// print_r($res);
		// echo "</pre>";
		echo json_encode($res);
	} 
}