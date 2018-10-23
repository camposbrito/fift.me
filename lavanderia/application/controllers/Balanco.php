<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Balanco extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());        
        $this->load->model('Fechamento_model', 'fechamento');
//        $this->load->model('Utilizacao_model', 'utilizacao');
    }

    public function index($id = null) {
        
        $Dados['fechamentos'] = $this->fechamento->index();   
        
        $bloco = $this->session->userdata('lavanderia');
        
        $Dados['lavanderia'] = $this->session->userdata('BlocoA');
        $this->session->set_userdata($Dados); 
        $this->load->model('Utilizacao_model', 'utilizacaoA');
        
        $Dados['lavanderia'] = $this->session->userdata('BlocoB');
        $this->session->set_userdata($Dados); 
        $this->load->model('Utilizacao_model', 'utilizacaoB');
        foreach ($Dados['fechamentos'] as $key => $Fechamento) {

            $Dados['lavanderiaA'][$key] = $this->utilizacaoA->getTotalizadorFechamento(dataBR($Fechamento->dataini),dataBR($Fechamento->datafin));
            $Dados['lavanderiaB'][$key] = $this->utilizacaoB->getTotalizadorFechamento(dataBR($Fechamento->dataini),dataBR($Fechamento->datafin));
        }
        $Dados['lavanderia'] = $bloco;
        $this->session->set_userdata($Dados);  
//        echo "<pre>";
//        print_r($Dados );
//        echo "</pre>";
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('fechamento', $Dados);
        $this->load->view('includes/footer');
        
    }

    public function inserir() {        
        $Dados['fechamentos'] = $this->fechamento->getUltimoFechamento();        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('fechamento_inserir',$Dados);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $this->fechamento->save();
        redirect(base_url() . "fechamentos/");
    }

}
