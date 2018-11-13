<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TipoExame_Controller extends CI_Controller {

    public $titulo = null;
    public $action = null;
    public $actBack = null;
    public $actInsert = null;
    public $actDelete = null;
    public $actAlter = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('TipoExame_model', 'TipoExame');
        $this->titulo = 'Tipo de Exame';
        $this->action = base_url('index.php/TipoExame/save/');
        $this->actBack = base_url('index.php/TipoExame/');
        $this->actInsert = base_url('index.php/TipoExame/inserir');
        $this->actDelete = 'index.php/TipoExame/Excluir/';
        $this->actAlter = 'index.php/TipoExame/Alterar/';
    }

    public function index() {
        verificar_sessao($this->session);
        $dados['objs'] = $this->TipoExame->ListAll();
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('TipoExame/list', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function alterar($cod = null) {
        verificar_sessao($this->session);
        $dados['obj'] = $this->TipoExame->Find($cod);
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('TipoExame/alterar', $dados);
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
        $this->load->view('TipoExame/inserir', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function save() {
        verificar_sessao($this->session);
        $operacao = $this->input->post('Cod') < 0 ? 'cadastrado' : 'atualizado';
        if ($this->TipoExame->save()) {
            $this->session->set_flashdata('msg', $this->titulo . " " . $operacao . " com sucesso");
            redirect('TipoExame');
        } else {
            $this->session->set_flashdata('msg', 'Falha ao cadastrar ' . $this->titulo);
            redirect('TipoExame');
        }
    }

    public function Excluir($id) {
        verificar_sessao($this->session);

        if ($this->TipoExame->delete($id)) {
            $this->session->set_flashdata('msg', $this->titulo . ' removido com sucesso');
            redirect('TipoExame');
        } else {
            $this->session->set_flashdata('msg', $dados['msg'] = 'Falha ao remover ' . $this->titulo);
            redirect('TipoExame');
        }
        $this->output->enable_profiler(false);
    }

}
