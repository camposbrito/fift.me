<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TipoTDT_Controller extends CI_Controller {

    public $titulo = null;
    public $action = null;
    public $actBack = null;
    public $actInsert = null;
    public $actDelete = null;
    public $actAlter = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('TipoTDT_model', 'TipoTDT');
        $this->titulo = 'Tipo TDT';
        $this->action = base_url('index.php/TipoTDT/save/');
        $this->actBack = base_url('index.php/TipoTDT/');
        $this->actInsert = base_url('index.php/TipoTDT/inserir');
        $this->actDelete = 'index.php/TipoTDT/Excluir/';
        $this->actAlter = 'index.php/TipoTDT/Alterar/';
    }

    public function index() {
        verificar_sessao($this->session);
        $dados['objs'] = $this->TipoTDT->ListAll();
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('TipoTDT/list', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function alterar($cod = null) {
        verificar_sessao($this->session);
        $dados['obj'] = $this->TipoTDT->Find($cod);
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('TipoTDT/alterar', $dados);
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
        $this->load->view('TipoTDT/inserir', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function save() {
        verificar_sessao($this->session);
        $operacao = $this->input->post('Cod') < 0 ? 'cadastrado' : 'atualizado';
        if ($this->TipoTDT->save()) {
            $this->session->set_flashdata('msg', $this->titulo . " " . $operacao . " com sucesso");
            redirect('TipoTDT');
        } else {
            $this->session->set_flashdata('msg', 'Falha ao cadastrar ' . $this->titulo);
            redirect('TipoTDT');
        }
    }

    public function Excluir($id) {
        verificar_sessao($this->session);

        if ($this->TipoTDT->delete($id)) {
            $this->session->set_flashdata('msg', $this->titulo . ' removido com sucesso');
            redirect('TipoTDT');
        } else {
            $this->session->set_flashdata('msg', $dados['msg'] = 'Falha ao remover ' . $this->titulo);
            redirect('TipoTDT');
        }
        $this->output->enable_profiler(false);
    }

}
