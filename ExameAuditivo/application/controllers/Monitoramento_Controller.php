<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoramento_Controller extends CI_Controller {

    public $titulo = null;
    public $action = null;
    public $actBack = null;
    public $actInsert = null;
    public $actDelete = null;
    public $actAlter = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('Monitoramento_model', 'Monitoramento');
        $this->titulo = 'Classificação';
        $this->action = base_url('index.php/Monitoramento/save/');
        $this->actBack = base_url('index.php/Monitoramento/');
        $this->actInsert = base_url('index.php/Monitoramento/inserir');
        $this->actDelete= 'index.php/Monitoramento/Excluir/';
        $this->actAlter='index.php/Monitoramento/Alterar/';
    }

    public function index() {
        verificar_sessao($this->session);       
        $dados['objs'] = $this->Monitoramento->ListAll();
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Monitoramento/list', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function alterar($cod = null) {
        verificar_sessao($this->session);
        $dados['obj'] = $this->Monitoramento->Find($cod);
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Monitoramento/alterar', $dados);
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
        $this->load->view('Monitoramento/inserir', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function save() {
        verificar_sessao($this->session);
        $operacao = $this->input->post('Cod') < 0?'cadastrado':'atualizado';
        if ($this->Monitoramento->save()) {
            $this->session->set_flashdata('msg', $this->titulo . " ".$operacao." com sucesso");
            redirect('Monitoramento');
        } else {
            $this->session->set_flashdata('msg', 'Falha ao cadastrar ' . $this->titulo);
            redirect('Monitoramento');
        }
    }

    public function Excluir($id) {
        verificar_sessao($this->session);

        if ($this->Monitoramento->delete($id)) {
            $this->session->set_flashdata('msg', $this->titulo . ' removido com sucesso');
            redirect('Monitoramento');
        } else {
            $this->session->set_flashdata('msg', $dados['msg'] = 'Falha ao remover ' . $this->titulo);
            redirect('Monitoramento');
        }
        $this->output->enable_profiler(false);
    }

}
