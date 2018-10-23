<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Metodos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $this->load->model('metodos_model', 'metodos');
    }

    public function index() {
        $Dados['Metodos'] = $this->metodos->index();
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('metodos', $Dados);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $this->metodos->save();
        redirect(base_url() . "metodos/");
    }

}
