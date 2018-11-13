<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Instrumentos_Controller extends CI_Controller {

    public $titulo = null;
    public $action = null;
    public $actBack = null;
    public $actInsert = null;
    public $actDelete = null;
    public $actAlter = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('Instrumentos_model', 'Instrumentos');
        $this->titulo = 'Instrumentos';
        $this->action = base_url('index.php/Instrumentos/save/');
        $this->actBack = base_url('index.php/Instrumentos/');
        $this->actInsert = base_url('index.php/Instrumentos/inserir');
        $this->actDelete = 'index.php/Instrumentos/Excluir/';
        $this->actAlter = 'index.php/Instrumentos/Alterar/';
    }

    public function index() {
        verificar_sessao($this->session);
        $dados['objs'] = $this->Instrumentos->ListAll();
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Instrumentos/list', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function alterar($cod = null) {
        verificar_sessao($this->session);
        $dados['obj'] = $this->Instrumentos->Find($cod);
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Instrumentos/alterar', $dados);
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
        $this->load->view('Instrumentos/inserir', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function save() {
        verificar_sessao($this->session);
        $operacao = $this->input->post('Cod') < 0 ? 'cadastrado' : 'atualizado';
        if ($this->Instrumentos->save()) {
            $this->session->set_flashdata('msg', $this->titulo . " " . $operacao . " com sucesso");
            redirect('Instrumentos');
        } else {
            $this->session->set_flashdata('msg', 'Falha ao cadastrar ' . $this->titulo);
            redirect('Instrumentos');
        }
    }

    public function Excluir($id) {
        verificar_sessao($this->session);

        if ($this->Instrumentos->delete($id)) {
            $this->session->set_flashdata('msg', $this->titulo . ' removido com sucesso');
            redirect('Instrumentos');
        } else {
            $this->session->set_flashdata('msg', $dados['msg'] = 'Falha ao remover ' . $this->titulo);
            redirect('Instrumentos');
        }
        $this->output->enable_profiler(false);
    }

}
