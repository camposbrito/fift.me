<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mascaramento extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {
        verificar_sessao($this->session);
        $dados['mascaramento'] = $this->mascaramento->get_mascaramento($id);
        $dados['id'] = $id;
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/mascaramento_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function salvar() {
        verificar_sessao($this->session);
        $this->mascaramento->salvar();
        redirect('Mascaramento/' . $this->input->post('Consulta'));
        $this->output->enable_profiler(false);
    }

}
