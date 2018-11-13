<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parecer_Controller extends CI_Controller {

    public $titulo = null;
    public $action = null;
    public $actBack = null;
    public $actInsert = null;
    public $actDelete = null;
    public $actAlter = null;

    public function __construct() {
        parent::__construct();

        $this->titulo = 'Parecer';
        $this->action = base_url('index.php/Parecer/save/');
        $this->actBack = base_url('index.php/Consulta/alterar/');
        $this->actInsert = base_url('index.php/Parecer/inserir');
        $this->actDelete = 'index.php/Parecer/Excluir/';
        $this->actAlter = 'index.php/Parecer/Alterar/';
    }

    public function index($id) {
        verificar_sessao($this->session);
        $dados['obj'] = $this->parecer->getParecer($id);
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $dados['titulo'] = $this->titulo;
        $dados['action'] = $this->action;
        $dados['actBack'] = $this->actBack;
        $dados['actInsert'] = $this->actInsert;
        $dados['actAlter'] = $this->actAlter;
        $dados['actDelete'] = $this->actDelete;
        $dados['timpanograma'] = $this->timpanograma->listAll();
        $dados['meatoscopia'] = $this->meatoscopia->listAll();
        $dados['complacencia'] = $this->complacencia->listAll();
        $dados['monitoramento'] = $this->monitoramento->listAll();

        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('Parecer/alterar', $dados);
        $this->load->view('includes/footer', $dados);
//        $this->output->enable_profiler(false);
    }

    public function save() {
        verificar_sessao($this->session);
        $operacao = $this->input->post('Cod') < 0 ? 'cadastrado' : 'atualizado';
        if ($this->parecer->save()) {
            $this->session->set_flashdata('msg', $this->titulo . " " . $operacao . " com sucesso");
            redirect('Consulta/Alterar/'.$this->input->post('Consulta'));
        } else {
            $this->session->set_flashdata('msg', 'Falha ao cadastrar ' . $this->titulo);
            redirect('Consulta/Alterar/'.$this->input->post('Consulta'));
        }
    }

}
