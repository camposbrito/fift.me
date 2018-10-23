<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();  
         $this->load->model('Login_model', 'login1');
    }

    public function index() {
        log_message('info', 'Carregando view de Login');
        $this->load->view('includes/header');
        $this->load->view('login');         
        $this->load->view('includes/footer');
        log_message('info', 'Carregando view de Login');
       
    }

    public function trocar() {         
        $Dados['lavanderia'] = $this->input->post('lavanderia');
        $Dados['BlocoA'] = 'A';
        $Dados['BlocoB'] = 'B';
        if ($this->session->userdata('login') == 'camposbrito')
        {
            $Dados['BlocoA'] = 'AA';
            $Dados['BlocoB'] = 'BB';
        }
        $this->session->set_userdata($Dados);        
        redirect($this->input->post('controller'));
    }
    public function trocarSenha() {      
        $msg = $this->login1->TrocaSenha();
        $this->session->set_flashdata('msg', $msg);
//        print_r($msg);
//        $this->output->enable_profiler(true );
        redirect($this->input->post('controller'));
    }
    // public function trocarLavanderia($lavanderia = 'A') {         
    //     $Dados['lavanderia'] = $lavanderia;
    //     $this->session->set_userdata($Dados);        
    // }
    public function login($dados = null) {
        $this->load->view('includes/header');
        $this->load->view('Login', $dados);
    }

    public function logar() {         
        $login = $this->input->post('login');         
        $Dados['BlocoA'] = 'A';
        $Dados['BlocoB'] = 'B';
        if ($login == 'camposbrito')
        {
            $Dados['BlocoA'] = 'AA';
            $Dados['BlocoB'] = 'BB';
        }
        $data['usuario'] = $this->login1->Logar();   
        if (count($data['usuario']) == 1) {
            $Dados['id_usuario'] = $data['usuario'][0]->id;
            $Dados['nome'] = $data['usuario'][0]->nome;
            $Dados['logged'] = true;
            $Dados['login'] = strtolower($data['usuario'][0]->login);
            $Dados['data'] = now();
            $Dados['email'] = $data['usuario'][0]->email;
            $Dados['lavanderia'] = $Dados['BlocoA'];
            $this->session->set_userdata($Dados);
            $this->Log_model->save('Usuário <b>'.$Dados['nome'].'</b> autenticado no sistema');    
            redirect('dashboard');
        } else {
            $this->Log_model->save('Falha no login do Usuário <b>'.$login.'</b> no sistema');                            
            $data['erro'] = 'Verifique usuário e/ou senha..!';        
            $this->login($data);
        }
    }

    function logout() {
        $this->Log_model->save('Usuário <b>'.$this->session->userdata('nome').'</b> saiu do  sistema');    
        $this->session->sess_destroy(); 
        redirect('welcome');
    }

}
