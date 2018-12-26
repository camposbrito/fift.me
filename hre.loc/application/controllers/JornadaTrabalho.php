<?php defined('BASEPATH') OR exit('No direct script access allowed');

class jornadatrabalho extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		$this->load->model ( "jornadatrabalho_Model" );
		// $this->output->enable_profiler(true); 	
	}
   
	public function getAll() { 
		$res 					= $this->jornadatrabalho_Model->getAll();		
		echo json_encode($res);
	} 
	
}