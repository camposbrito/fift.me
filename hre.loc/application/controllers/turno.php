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
	
	public function encerrar_turno()
	{
		$this->Turno_Model->encerrar_turno();
	} 
	public function getAtual() { 
		$res 					= $this->Turno_Model->getAtual()[0];
		$res->Operador 			= $this->Funcionario_Model->get($res->Operador_id)[0];
		$res->JornadaTrabalho 	= $this->JornadaTrabalho_Model->get($res->JornadaTrabalho_id)[0];		
		$res->QtdPecas			= $this->CicloStart_model->getAtual($res->id, $res->ParamGeral_id)[0]->QtdPecas;
		$res->Parametros 		= $this->Parametros_Model->get($res->ParamGeral_id)[0];
		echo json_encode($res);
	} 
	public function getResultadoAtual() { 
		$res 					= $this->Turno_Model->getResultadoAtual()[0];	
		$res->QtdPecas			= $this->CicloStart_model->getAtual($res->id, $res->ParamGeral_id)[0]->QtdPecas;
		echo json_encode($res);
	} 
	public function inProgress() { 
		$res			= array('progress' => $this->Turno_Model->inProgress());
		echo json_encode($res);
	} 
}