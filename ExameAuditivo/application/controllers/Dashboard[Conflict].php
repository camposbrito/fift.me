<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        verificar_sessao($this->session);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');

        $this->load->view('Dashboard');
        $this->load->view('includes/footer');
        $this->output->enable_profiler(false);
        
    }

    public function login($dados = null) {
        $this->output->enable_profiler(false);
        $this->load->view('includes/header');
        $this->load->view('Login', $dados);
        $this->output->enable_profiler(false);
    }

    public function logar() {
        $Login = $this->input->post('login');
        $Senha = md5($this->input->post('senha'));
        $this->output->enable_profiler(false);
        $this->db->where('senha', $Senha);
        $this->db->where('login', $Login);
        $this->db->where('Ativo', 'S');

        $data['usuario'] = $this->db->get('terceiro')->result();
        if (count($data['usuario']) == 1) {
            $Dados['Nome'] = $data['usuario'][0]->Descricao;
            $Dados['Cod'] = $data['usuario'][0]->Cod;
            $Dados['Login'] = strtolower($data['usuario'][0]->Login);
            $Dados['logado'] = True;
            $Dados['adm'] = $data['usuario'][0]->Administrativo == 'S' ? TRUE : FALSE;
            $this->session->set_userdata($Dados);
            redirect('');
        } else {
            $data['erro'] = 'Verifique usuário e/ou senha.';
            $this->login($data);
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('Dashboard/Login');
    }

}
