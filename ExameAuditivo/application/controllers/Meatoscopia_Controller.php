<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Meatoscopia_Controller extends CI_Controller {

    public $titulo = null;
    public $action = null;
    public $actBack = null;
    public $actInsert = null;
    public $actDelete = null;
    public $actAlter = null;
 
    public function __construct() {
        parent::__construct();
        $this->load->model('Meatoscopia_model', 'Meatoscopia');
        $this->titulo = 'Meatoscopia';
        $this->action = base_url('index.php/Meatos/save/');
        $this->actBack = base_url('index.php/Meatos/');
        $this->actInsert = base_url('index.php/Meatos/inserir');
        $this->actDelete= 'index.php/Meatos/Excluir/';
        $this->actAlter='index.php/Meatos/Alterar/';
    }

    public function index() {
        verificar_sessao($this->session);       
        $dados['objs'] = $this->Meatoscopia->ListAll();
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Meatoscopia/list', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function alterar($cod = null) {
        verificar_sessao($this->session);
        $dados['obj'] = $this->Meatoscopia->Find($cod);
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Meatoscopia/alterar', $dados);
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
        $this->load->view('Meatoscopia/inserir', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function save() {
        verificar_sessao($this->session);
        $operacao = $this->input->post('Cod') < 0?'cadastrado':'atualizado';
        if ($this->Meatoscopia->save()) {
            $this->session->set_flashdata('msg', $this->titulo . " ".$operacao." com sucesso");
            redirect('Meatoscopia');
        } else {
            $this->session->set_flashdata('msg', 'Falha ao cadastrar ' . $this->titulo);
            redirect('Meatoscopia');
        }
    }

    public function Excluir($id) {
        verificar_sessao($this->session);

        if ($this->Meatoscopia->delete($id)) {
            $this->session->set_flashdata('msg', $this->titulo . ' removido com sucesso');
            redirect('Meatoscopia');
        } else {
            $this->session->set_flashdata('msg', $dados['msg'] = 'Falha ao remover ' . $this->titulo);
            redirect('Meatoscopia');
        }
        $this->output->enable_profiler(false);
    }

}
