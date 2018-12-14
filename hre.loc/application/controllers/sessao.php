<?php defined('BASEPATH') OR exit('No direct script access allowed');

class sessao extends CI_Controller {
	
    public function __construct() {
		parent::__construct ();
		$this->load->model ( "sessao_model" );
		
	}  
	public function get() {
		$res = $this->sessao_model->get()[0];
		echo json_encode($res);
	} 
	public function getQuantidade() {
		$res = $this->sessao_model->getQuantidade()[0];
		echo json_encode($res);
	} 
	public function getTermino() {
		$res = $this->sessao_model->getTermino()[0];
		echo json_encode($res);
	} 
	public function getResultado() {
		$res = $this->sessao_model->getResultado()[0];
		echo json_encode($res);
	} 
	public function getOperador() {
		$res = $this->sessao_model->getOperador()[0];
		echo json_encode($res);
	} 

}