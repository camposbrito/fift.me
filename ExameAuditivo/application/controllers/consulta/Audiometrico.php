<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Audiometrico extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {

        verificar_sessao($this->session);
        $dados['equipamentos'] = $this->equipamento->getEquipamentos();
        $dados['audiometrico'] = $this->audiometrico->get_consulta_audiometrico($id);
//
        $dados['iprf'] = $this->irf->get_iprf($id);
        $dados['ldf'] = $this->ldf_lrf->get_ldf($id);
        $dados['lrf'] = $this->ldf_lrf->get_lrf($id);
        $dados['mascaramento'] = $this->mascaramento->get_mascaramento($id);
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $dados['id'] = $id;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/audiometrico_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(FALSE);
    }

    public function salvar() {
        verificar_sessao($this->session);
        $this->audiometrico->salvar();
        redirect('Audiometrico/' . $this->input->post('Consulta'));
        $this->output->enable_profiler(FALSE);
    }

}
