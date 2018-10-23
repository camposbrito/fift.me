<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
           
        // if ($this->session->userdata('logged')) {
        //     $this->load->model('Maquina_model', 'Maquina'); 
        //     $this->load->model('Apartamento_model', 'Apto');
        //     $this->load->model('Parametros_model', 'parametros');
        //     $this->load->model('Utilizacao_model', 'utilizacao');
        // } 
    }

    public function index() {

        // if(!$this->session->userdata('online'))
        // $this->session->set_flashdata('msg', "Lavanderia Bloco ".$this->session->userdata('lavanderia').": Offline 1");
        
        // $Dados['msg'] = 'Lavanderia do bloco A: Online';    
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('welcome_message' );
        $this->load->view('includes/footer');
    }

}
