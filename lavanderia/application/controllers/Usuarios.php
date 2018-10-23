<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->titulo = 'Usuário';
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $this->load->model('Usuarios_model', 'usuarios');
    }

    public function index() {
        $Dados['Usuarios'] = $this->usuarios->index();
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('usuarios', $Dados);
        $this->load->view('includes/footer');
    }

    public function inserir() {
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('usuarios_inserir');
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $this->usuarios->save();
        $this->session->set_flashdata('msg', $this->titulo . " salvo com sucesso");
        redirect(base_url() . "usuarios/");
    }

}
