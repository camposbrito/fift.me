<?php defined('BASEPATH') OR exit('No direct script access allowed');

class operacao extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		$this->load->model ( "operacao_Model" ); 	
	}
   
	public function getAll() { 
		$res  = $this->operacao_Model->getAll();		
		echo json_encode($res);
	} 
	
}