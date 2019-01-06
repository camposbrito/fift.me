<?php defined('BASEPATH') OR exit('No direct script access allowed');

class produto extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		$this->load->model ( "produto_Model" );	
	}
   
	public function getAll() { 
		$res  = $this->produto_Model->getAll();		
		echo json_encode($res);
	} 
	
}