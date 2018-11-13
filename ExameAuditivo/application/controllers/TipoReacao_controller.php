<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TipoReacao_Controller extends CI_Controller {

    public $titulo = null;
    public $action = null;
    public $actBack = null;
    public $actInsert = null;
    public $actDelete = null;
    public $actAlter = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('TipoReacao_model', 'TipoReacao');
        $this->titulo = 'Tipo de Reação';
        $this->action = base_url('index.php/TipoReacao/save/');
        $this->actBack = base_url('index.php/TipoReacao/');
        $this->actInsert = base_url('index.php/TipoReacao/inserir');
        $this->actDelete = 'index.php/TipoReacao/Excluir/';
        $this->actAlter = 'index.php/TipoReacao/Alterar/';
    }

    public function index() {
        verificar_sessao($this->session);
        $dados['objs'] = $this->TipoReacao->ListAll();
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('TipoReacao/list', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function alterar($cod = null) {
        verificar_sessao($this->session);
        $dados['obj'] = $this->TipoReacao->Find($cod);
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('TipoReacao/alterar', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function inserir() {
        verificar_sessao($this->session);

        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('TipoReacao/inserir', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function save() {
        verificar_sessao($this->session);
        $operacao = $this->input->post('Cod') < 0 ? 'cadastrado' : 'atualizado';
        if ($this->TipoReacao->save()) {
            $this->session->set_flashdata('msg', $this->titulo . " " . $operacao . " com sucesso");
            redirect('TipoReacao');
        } else {
            $this->session->set_flashdata('msg', 'Falha ao cadastrar ' . $this->titulo);
            redirect('TipoReacao');
        }
    }

    public function Excluir($id) {
        verificar_sessao($this->session);

        if ($this->TipoReacao->delete($id)) {
            $this->session->set_flashdata('msg', $this->titulo . ' removido com sucesso');
            redirect('TipoReacao');
        } else {
            $this->session->set_flashdata('msg', $dados['msg'] = 'Falha ao remover ' . $this->titulo);
            redirect('TipoReacao');
        }
        $this->output->enable_profiler(false);
    }

}
