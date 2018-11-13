<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Irf extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {

        verificar_sessao($this->session);

        $dados['id'] = $id;
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $dados['iprf'] = $this->irf->get_iprf($id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/irf_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function Salvar() {
        verificar_sessao($this->session);
        $this->irf->salvar();
        redirect('Irf/' . $this->input->post('Consulta'));
        $this->output->enable_profiler(FALSE);
    }

}
