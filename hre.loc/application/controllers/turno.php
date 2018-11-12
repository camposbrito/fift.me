<?php defined('BASEPATH') OR exit('No direct script access allowed');

class turno extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		$this->load->model ( "Turno_Model" );
		// $this->load->model ( "Operador_Model" );
		// $this->load->model ( "Equipamento_Model" );
		// $this->load->model ( "Estado_Model" );
		// $this->load->model ( "Produto_Model" );
		// $this->load->model ( "Operacao_Model" );
		
	}
	public function save()
	{
		$this->Turno_Model->save();
	} 
	public function getAtual() { 
		// $res 			= $this->Turno_Model->getAtual()[0];

		// $res->Operador 		= $this->Operador_Model->get($res->Operador_id)[0];
		// $res->Equipamento 	= $this->Equipamento_Model->get($res->Equipamento_id)[0];
		// $res->Estado 		= $this->Estado_Model->get($res->Estado_id)[0];
		// $res->Produto 		= $this->Produto_Model->get($res->Produto_id)[0];
		// $res->Operacao 		= $this->Operacao_Model->get($res->Operacao_id)[0];	
		// // echo "<pre>";
		// // print_r($res);
		// // echo "</pre>";
		// echo json_encode($res);
	} 
	public function inProgress() { 
		// $this->output->enable_profiler(true);
		
		$res			= array('progress' => $this->Turno_Model->inProgress());	
		// $res->Operador 		= $this->Operador_Model->get($res->Operador_id)[0];
		// $res->Equipamento 	= $this->Equipamento_Model->get($res->Equipamento_id)[0];
		// $res->Estado 		= $this->Estado_Model->get($res->Estado_id)[0];
		// $res->Produto 		= $this->Produto_Model->get($res->Produto_id)[0];
		// $res->Operacao 		= $this->Operacao_Model->get($res->Operacao_id)[0];	
		// echo "<pre>";
		// print_r($res);
		// echo "</pre>";
		echo json_encode($res);
	} 
}