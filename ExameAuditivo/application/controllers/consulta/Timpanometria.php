<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Timpanometria extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {
        verificar_sessao($this->session);
        $dados['timpanometria']['OD'] = $this->timpanometria->getTimpanometriaOD($id);
        $dados['timpanometria']['OE'] = $this->timpanometria->getTimpanometriaOE($id);
        $dados['id'] = $id;
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/timpanometria_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function salvar() {
        verificar_sessao($this->session);
        $this->timpanometria->salvar();
        redirect('Timpanometria/' . $this->input->post('Consulta'));
        $this->output->enable_profiler(false);
    }

}
