<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Modelos_Controller extends CI_Controller {

    public $titulo = null;
    public $action = null;
    public $actBack = null;
    public $actInsert = null; 
    public $actDelete = null;
    public $actAlter = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('Modelos_model', 'Modelos');
        $this->load->model('Modelo_has_TipoParecer_Controller', 'Modelo_has_TipoParecer');
        
        $this->titulo = 'Modelos';
        $this->action = base_url('index.php/Modelos/save/');
        $this->actBack = base_url('index.php/Modelos/');
        $this->actInsert = base_url('index.php/Modelos/inserir');
        $this->actDelete = 'index.php/Modelos/Excluir/';
        $this->actAlter = 'index.php/Modelos/Alterar/';
    }

    public function index() {
        verificar_sessao($this->session);
        $dados['objs'] = $this->Modelos->ListAll();
        
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Modelos/list', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function alterar($cod = null) {
        verificar_sessao($this->session);
        $dados['obj'] = $this->Modelos->Find($cod);
        $dados['TipoParecer'] = $this->Modelo_has_TipoParecer->BuscarByModelo($cod);
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Modelos/alterar', $dados);
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
        $this->load->view('Modelos/inserir', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function save() {
        verificar_sessao($this->session);
        $this->output->enable_profiler(true);
        $operacao = $this->input->post('Cod') < 0 ? 'cadastrado' : 'atualizado';
        if ($this->Modelos->save()) {
            $this->Modelo_has_TipoParecer->delete($this->input->post('Cod'));
            foreach ($_POST['checkboxes']  as $value) {
                $this->Modelo_has_TipoParecer->insert($this->input->post('Cod'), $value);
            }
            $this->session->set_flashdata('msg', $this->titulo . " " . $operacao . " com sucesso");
            redirect('Modelos');
        } else {
            $this->session->set_flashdata('msg', 'Falha ao cadastrar ' . $this->titulo);
            redirect('Modelos');
        }
    }

    public function Excluir($id) {
        verificar_sessao($this->session);

        if ($this->Modelos->delete($id)) {
            $this->session->set_flashdata('msg', $this->titulo . ' removido com sucesso');
            redirect('Modelos');
        } else {
            $this->session->set_flashdata('msg', $dados['msg'] = 'Falha ao remover ' . $this->titulo);
            redirect('Modelos');
        }
        $this->output->enable_profiler(false);
    }

}
