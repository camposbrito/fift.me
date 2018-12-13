<?php defined('BASEPATH') OR exit('No direct script access allowed');

class turno extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		$this->load->model ( "Turno_Model" );
		$this->load->model ( "Funcionario_Model" );
		$this->load->model ( "JornadaTrabalho_Model" );
		$this->load->model ( "CicloStart_model" );
		$this->load->model ( "Produto_Model" );
		$this->load->model ( "Parametros_Model" );
		
	}
	public function save()
	{
		$this->Turno_Model->save();
	} 
	public function concluir_turno()
	{
		$this->Turno_Model->concluir_turno();
	} 
	public function getAtual() { 
 

		$res 					= $this->Turno_Model->getAtual()[0];
		$res->Operador 			= $this->Funcionario_Model->get($res->Operador_id)[0];
		$res->JornadaTrabalho 	= $this->JornadaTrabalho_Model->get($res->JornadaTrabalho_id)[0];		
		$res->QtdPecas			= $this->CicloStart_model->getAtual($res->id, $res->ParamGeral_id)[0]->QtdPecas;
		$res->Parametros 		= $this->Parametros_Model->get($res->ParamGeral_id)[0];
		// $res->Produto 			= $this->Produto_Model->get($res->Parametros->Produto_id)[0];
		// $res->Operacao 			= $this->Operacao_Model->get($res->Operacao_id)[0];	
		// $res
		// echo "<pre>";
		// print_r($res);
		// echo "</pre>";
		echo json_encode($res);
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