<?php defined('BASEPATH') OR exit('No direct script access allowed');

class hre extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model("post_model");
	}
	 	
	function index()
	{
		$this->load->view("hre");
	}
}