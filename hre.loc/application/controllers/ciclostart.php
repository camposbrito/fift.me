<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ciclostart extends CI_Controller {
	
    public function __construct() {
		parent::__construct (); 
		$this->load->model ( "CicloStart_Model" );	
	}
	public function save()
	{
		$this->CicloStart_Model->save();
	} 

}