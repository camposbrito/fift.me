<?php defined('BASEPATH') OR exit('No direct script access allowed');

class hre extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	 	
	function index()
	{
		$this->load->view('includes/includes');
		$this->load->view("hre");
	}
}