<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReflexoEstapediano extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {

        verificar_sessao($this->session);
        $dados['equipamentos'] = $this->equipamento->getEquipamentos();
        $dados['reflexoEstapediano'] = $this->reflexoestapediano->getReflexoEstapediano($id);
        $dados['VALD'] = $this->audiometrico->get_audiometricoJSON($id,1);
        $dados['VALE'] = $this->audiometrico->get_audiometricoJSON($id,2);
        $dados['VAMLD'] = $this->audiometrico->get_audiometricoJSON($id,5);
        $dados['VAMLE'] = $this->audiometrico->get_audiometricoJSON($id,6);

        $dados['id'] = $id;
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/reflexoEstapediano_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(FALSE);
//        echo "<pre>";
//        print_r($dados, FALSE);
//        echo "</pre>";
    }

    public function salvar() {
        verificar_sessao($this->session);


        $this->reflexoestapediano->salvar();
        //redirect('ReflexoEstapediano/' . $this->input->post('Consulta'));
        redirect('Consulta/alterar/' . $this->input->post('Consulta'));
//        $this->output->enable_profiler(false);
    }

}