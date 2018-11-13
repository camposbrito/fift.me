<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas_Controller extends CI_Controller {

    public $titulo = null;
    public $action = null;
    public $actBack = null;
    public $actInsert = null;
    public $actDelete = null;
    public $actAlter = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('Empresas_model', 'Empresas');
        $this->titulo = 'Empresas';
        $this->action = base_url('index.php/Empresas/save/');
        $this->actBack = base_url('index.php/Empresas/');
        $this->actInsert = base_url('index.php/Empresas/inserir');
        $this->actDelete = 'index.php/Empresas/Excluir/';
        $this->actAlter = 'index.php/Empresas/Alterar/';
    }

    public function getEmpresas() {
        return $this
                        ->db
                        ->get_where('empresa', array('Ativo' => 'S'))
                        ->result();
    }

    public function index() {
        verificar_sessao($this->session);
        $dados['objs'] = $this->Empresas->ListAll();
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Empresas/list', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function alterar($cod = null) {
        verificar_sessao($this->session);
        $dados['obj'] = $this->Empresas->Find($cod);
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->output->enable_profiler(false);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Empresas/alterar', $dados);
        $this->load->view('includes/footer', $dados);
    }

    public function inserir() {
        verificar_sessao($this->session);

        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->output->enable_profiler(false);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Empresas/inserir', $dados);
        $this->load->view('includes/footer', $dados);
    }

    public function save() {
        verificar_sessao($this->session);
        $operacao = $this->input->post('Cod') < 0 ? 'cadastrado' : 'atualizado';
        if ($this->Empresas->save()) {
            $this->session->set_flashdata('msg', $this->titulo . " " . $operacao . " com sucesso");
            redirect('Empresas');
        } else {
            $this->session->set_flashdata('msg', 'Falha ao cadastrar ' . $this->titulo);
            redirect('Empresas');
        }
        $this->output->enable_profiler(false);
    }

    public function Excluir($id) {
        verificar_sessao($this->session);

        if ($this->Empresas->delete($id)) {
            $this->session->set_flashdata('msg', $this->titulo . ' removido com sucesso');
            redirect('Empresas');
        } else {
            $this->session->set_flashdata('msg', $dados['msg'] = 'Falha ao remover ' . $this->titulo);
            redirect('Empresas');
        }
        $this->output->enable_profiler(false);
    }

}
