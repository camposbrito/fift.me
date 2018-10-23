<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permissoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $this->load->model('Permissoes_model', 'permissoes');
        $this->load->model('Usuarios_model', 'usuarios');
    }

    public function index($cod = null) {
        $Dados['Permissoes'] = $this->permissoes->index($cod);
        $Dados['Usuario'] = $this->usuarios->get($cod);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('permissoes', $Dados);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $this->permissoes->save();
        redirect(base_url() . "usuarios/");
    }

}
