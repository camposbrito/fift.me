<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $this->load->model('Maquina_model', 'Maquina');
        $this->load->model('Apartamento_model', 'Apto');
        $this->load->model('Parametros_model', 'parametros');
        $this->load->model('Utilizacao_model', 'utilizacao');
    }

    public function index() {    
        $ref = $this->input->post('ref');      
        $date = date_create(date("d-m-Y"));
        $Dados['Maquinas'][$this->session->userdata('lavanderia')] = $this->Maquina->indexOtimizado($this->session->userdata('lavanderia'));
        $Dados['LogMaquinas'][$this->session->userdata('lavanderia')] = $this->Maquina->log($ref);
        $Dados['MaquinasAtivas'][$this->session->userdata('lavanderia')] = $this->Maquina->Ativas($this->session->userdata('lavanderia'));
        $Dados['SecadoraFuncionando'][$this->session->userdata('lavanderia')] = $this->Maquina->SecadoraFuncionando($this->session->userdata('lavanderia'));
        $Dados['SecadoraParada'][$this->session->userdata('lavanderia')] = $this->Maquina->SecadoraParada($this->session->userdata('lavanderia'));
        $Dados['SecadoraManutencao'][$this->session->userdata('lavanderia')] = $this->Maquina->SecadoraManutencao($this->session->userdata('lavanderia'));
        $Dados['LavadoraFuncionando'][$this->session->userdata('lavanderia')] = $this->Maquina->LavadoraFuncionando($this->session->userdata('lavanderia'));
        $Dados['LavadoraParada'][$this->session->userdata('lavanderia')] = $this->Maquina->LavadoraParada($this->session->userdata('lavanderia'));
        $Dados['LavadoraManutencao'][$this->session->userdata('lavanderia')] = $this->Maquina->LavadoraManutencao($this->session->userdata('lavanderia'));
        $Dados['AptosAtivos'][$this->session->userdata('lavanderia')] = $this->Apto->Ativos($this->session->userdata('lavanderia'));
        $Dados['utilizacaoTotalizador'][$this->session->userdata('lavanderia')] = $this->utilizacao->getTotalizador($ref);
        $Dados['utilizacaoAptoTotalizador'] = $this->utilizacao->getTotalizadorTempoApto($ref);
        $Dados['ref'] = (isset($ref) ? date_format(date_create(dataUS('01/' . $ref)), "m/Y") : date_format($date, "m/Y"));
        foreach ($this->parametros->index($this->session->userdata('lavanderia')) as $param) {
            $Dados[$param->parametro][$this->session->userdata('lavanderia')] = $param->valor;
        }
  
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('dashboard', $Dados);
        $this->load->view('includes/footer');
    }

}
