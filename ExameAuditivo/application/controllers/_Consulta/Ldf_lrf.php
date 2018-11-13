<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ldf_lrf extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {

        verificar_sessao($this->session);      

        $dados['ldf'] = $this->ldf_lrf->get_ldf($id);
        $dados['lrf'] = $this->ldf_lrf->get_lrf($id);

        $dados['consulta'] = $this->consulta->get_consulta($id);
        $dados['id'] = $id;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/ldf_lrf_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(FALSE);
    }

    public function Salvar() {
        verificar_sessao($this->session);
        $this->ldf_lrf->salvar();
        redirect('Ldf_lrf/' . $this->input->post('Consulta'));
        $this->output->enable_profiler(FALSE);
    }

}
