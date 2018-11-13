<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Equipamentos_Controller extends CI_Controller {

    public $titulo = null;
    public $action = null;
    public $actBack = null;
    public $actInsert = null;
    public $actDelete = null;
    public $actAlter = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('Equipamentos_model', 'Equipamentos');
        $this->titulo = 'Equipamentos';
        $this->action = base_url('index.php/Equipamentos/save/');
        $this->actBack = base_url('index.php/Equipamentos/');
        $this->actInsert = base_url('index.php/Equipamentos/inserir');
        $this->actDelete = 'index.php/Equipamentos/Excluir/';
        $this->actAlter = 'index.php/Equipamentos/Alterar/';
    }

    public function getEquipamentos() {
        return $this
                        ->db
                        ->get_where('equipamento', array('Ativo' => 'S'))
                        ->result();
    }

    public function index() {
        verificar_sessao($this->session);
        $dados['objs'] = $this->Equipamentos->ListAll();
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Equipamentos/list', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function alterar($cod = null) {
        verificar_sessao($this->session);
        $dados['obj'] = $this->Equipamentos->Find($cod);
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Equipamentos/alterar', $dados);
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
        $this->load->view('Equipamentos/inserir', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function save() {
        verificar_sessao($this->session);
        $operacao = $this->input->post('Cod') < 0 ? 'cadastrado' : 'atualizado';
        if ($this->Equipamentos->save()) {
            $this->session->set_flashdata('msg', $this->titulo . " " . $operacao . " com sucesso");
            redirect('Equipamentos');
        } else {
            $this->session->set_flashdata('msg', 'Falha ao cadastrar ' . $this->titulo);
            redirect('Equipamentos');
        }
    }

    public function Excluir($id) {
        verificar_sessao($this->session);

        if ($this->Equipamentos->delete($id)) {
            $this->session->set_flashdata('msg', $this->titulo . ' removido com sucesso');
            redirect('Equipamentos');
        } else {
            $this->session->set_flashdata('msg', $dados['msg'] = 'Falha ao remover ' . $this->titulo);
            redirect('Equipamentos');
        }
        $this->output->enable_profiler(false);
    }

}
