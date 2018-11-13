<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AudiometriaCampoLivre extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {
        verificar_sessao($this->session);
        
        $dados['campolivre'] = $this->audiometriacampolivre->getCampoLivre($id);
        $dados['equipamentos'] = $this->equipamento->getEquipamentos();      
        $dados['id'] = $id;
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/audiometriaCampoLivre_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }
    public function salvar() {
        verificar_sessao($this->session);
        

        $this->audiometriacampolivre->salvar();
        redirect('AudiometriaCampoLivre/' . $this->input->post('Consulta'));
//        $this->output->enable_profiler(true);
    }
}
