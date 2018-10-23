<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apartamentos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $this->load->model('Apartamento_model', 'apto');        
    }

    public function index() {
        $bloco = $this->session->userdata('lavanderia');
        $Dados['lavanderia'] = isset($bloco)?$bloco:$this->session->userdata('BlocoA') ;
        $Dados['Apartamentos'] = $this->apto->Index();        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('apartamentos', $Dados);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        
        $this->apto->save();
        redirect(base_url() . "apartamentos/"); 
         
    }

}
