<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Maquinas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $this->load->model('Maquina_model', 'maquina');
    }
 
    public function index() {      
        $bloco = $this->session->userdata('lavanderia');
        $Dados['lavanderia'] = isset($bloco)?$bloco:$this->session->userdata('BlocoA') ; 
        $Dados['Maquinas'] = $this->maquina->indexOtimizado();        
        // $this->output->enable_profiler(true );
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('maquinas', $Dados);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $this->maquina->save();
        redirect(base_url() . "maquinas/");
    }

}
