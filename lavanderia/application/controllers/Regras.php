<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
    }

    public function index() {
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('regras');
        $this->load->view('includes/footer');
    }

}
