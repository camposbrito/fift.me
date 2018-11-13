<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Generic_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TipoTDT_model', 'TipoTDT');
    }

    public function index() {
        verificar_sessao($this->session);
        $dados['equipamentos'] = $this->TipoTDT->ListAll();
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/generic_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(FALSE);
    }

}
