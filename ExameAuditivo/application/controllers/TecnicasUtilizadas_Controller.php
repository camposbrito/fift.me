<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classificacao_Controller extends CI_Controller {

    public $titulo = null;
    public $action = null;
    public $actBack = null;
    public $actInsert = null;
    public $actDelete = null;
    public $actAlter = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('Classificacao_model', 'Classificacao');
        $this->titulo = 'Classificação';
        $this->action = base_url('index.php/Classificacao/save/');
        $this->actBack = base_url('index.php/Classificacao/');
        $this->actInsert = base_url('index.php/Classificacao/inserir');
        $this->actDelete= 'index.php/Classificacao/Excluir/';
        $this->actAlter='index.php/Classificacao/Alterar/';
    }

    public function index() {
        verificar_sessao($this->session);       
        $dados['objs'] = $this->Classificacao->ListAll();
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Classificacao/list', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function alterar($cod = null) {
        verificar_sessao($this->session);
        $dados['obj'] = $this->Classificacao->Find($cod);
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Classificacao/alterar', $dados);
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
        $this->load->view('Classificacao/inserir', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function save() {
        verificar_sessao($this->session);
        $operacao = $this->input->post('Cod') < 0?'cadastrado':'atualizado';
        if ($this->Classificacao->save()) {
            $this->session->set_flashdata('msg', $this->titulo . " ".$operacao." com sucesso");
            redirect('Classificacao');
        } else {
            $this->session->set_flashdata('msg', 'Falha ao cadastrar ' . $this->titulo);
            redirect('Classificacao');
        }
    }

    public function Excluir($id) {
        verificar_sessao($this->session);

        if ($this->Classificacao->delete($id)) {
            $this->session->set_flashdata('msg', $this->titulo . ' removido com sucesso');
            redirect('Classificacao');
        } else {
            $this->session->set_flashdata('msg', $dados['msg'] = 'Falha ao remover ' . $this->titulo);
            redirect('Classificacao');
        }
        $this->output->enable_profiler(false);
    }

}
