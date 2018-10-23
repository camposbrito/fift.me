<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parametros extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $this->load->model('Parametros_model', 'parametros');
    }

    public function index() {
        foreach ($this->parametros->index() as $param) {
            $Dados[$param->parametro] = $param->valor;
        }
        $bloco = $this->session->userdata('lavanderia');
        $Dados['lavanderia'] = isset($bloco)?$bloco:$this->session->userdata('BlocoA') ;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('parametros', $Dados);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $this->parametros->save();
        // $this->output->enable_profiler(true);
        redirect(base_url() . "parametros/");
        
    }

}
