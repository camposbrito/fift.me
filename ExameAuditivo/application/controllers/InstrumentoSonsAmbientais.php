<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InstrumentoSonsAmbientais extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {

        verificar_sessao($this->session);

        $dados['equipamentos'] = $this->equipamento->getEquipamentos();
        $dados['tiposReacao'] = $this->db->get_where('tiporeacao', array('Ativo' => 'S'))->result();
        $dados['instrumentossonsambientais'] = $this
                        ->db
                        ->select('a.*, i.Descricao, i.Cod as Instrumento')
                        ->join('instrumentossonsambientais a', ' a.instrumento=i.cod AND a.Consulta = ' . $id . '', 'LEFT')
                        ->order_by('i.Cod')
                        ->get_where('instrumentos i')->result();
        $dados['id'] = $id;
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/instrumentoSonsAmbientais_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function salvar() {
        verificar_sessao($this->session);

//        var_dump($this->input->post('codInstrumentossonsambientais'));
        $this->instrumentossonsambientais->salvar();
//        redirect('InstrumentoSonsAmbientais/' . $this->input->post('Consulta'));
        redirect('Consulta/alterar/' . $this->input->post('Consulta'));
        $this->output->enable_profiler(false);
    }

}
