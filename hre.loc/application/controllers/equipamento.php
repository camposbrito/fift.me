<?php defined('BASEPATH') OR exit('No direct script access allowed');

class equipamento extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		$this->load->model ( "equipamento_Model" ); 	
	}
   
	public function getAll() { 
		$res  = $this->equipamento_Model->getAll();		
		echo json_encode($res);
	} 
	
}