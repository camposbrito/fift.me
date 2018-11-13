<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Audiometrico extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {
        verificar_sessao($this->session);
        $dados['equipamentos'] = $this->equipamento->getEquipamentos();
        $dados['audiometrico'] = $this->audiometrico->get_consulta_audiometrico($id);

        $dados['iprf'] = $this->irf->get_iprf($id);
        $dados['ldf'] = $this->ldf_lrf->get_ldf($id);
        $dados['lrf'] = $this->ldf_lrf->get_lrf($id);
        $dados['mascaramento'] = $this->mascaramento->get_mascaramento($id);
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $dados['id'] = $id;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/audiometrico_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(FALSE);
    }

    public function salvar() {
        verificar_sessao($this->session);
        $this->audiometrico->salvar();
//        redirect('Audiometrico/' . $this->input->post('Consulta'));
        redirect('Consulta/alterar/' . $this->input->post('Consulta'));
        $this->output->enable_profiler(FALSE);
    }
        
   
    public function AudiometricoJSON($id = NULL) {

        verificar_sessao($this->session);        
        $dados['VALD'] = $this->audiometrico->get_audiometricoJSON($this->input->post('Consulta'),1);
        $dados['VALE'] = $this->audiometrico->get_audiometricoJSON($this->input->post('Consulta'),2);
        $dados['VAMLD'] = $this->audiometrico->get_audiometricoJSON($this->input->post('Consulta'),5);
        $dados['VAMLE'] = $this->audiometrico->get_audiometricoJSON($this->input->post('Consulta'),6);
        
        $LimiarTonal['Audiometrico']['D'][500]   = (($dados['VALD'][0]->Valor_050 == null)?($dados['VAMLD'][0]->Valor_050):$dados['VALD'][0]->Valor_050 );
        $LimiarTonal['Audiometrico']['D'][1000]  = (($dados['VALD'][0]->Valor_1 == null)?($dados['VAMLD'][0]->Valor_1):$dados['VALD'][0]->Valor_1);
        $LimiarTonal['Audiometrico']['D'][2000]  = (($dados['VALD'][0]->Valor_2 == null)?($dados['VAMLD'][0]->Valor_2):$dados['VALD'][0]->Valor_2);
        $LimiarTonal['Audiometrico']['D'][4000]  = (($dados['VALD'][0]->Valor_4 == null)?($dados['VAMLD'][0]->Valor_4):$dados['VALD'][0]->Valor_4);
        
        $LimiarTonal['Audiometrico']['E'][500]   = (($dados['VALE'][0]->Valor_050 == null)?($dados['VAMLE'][0]->Valor_050):$dados['VALE'][0]->Valor_050 );
        $LimiarTonal['Audiometrico']['E'][1000]  = (($dados['VALE'][0]->Valor_1 == null)?($dados['VAMLE'][0]->Valor_1):$dados['VALE'][0]->Valor_1);
        $LimiarTonal['Audiometrico']['E'][2000]  = (($dados['VALE'][0]->Valor_2 == null)?($dados['VAMLE'][0]->Valor_2):$dados['VALE'][0]->Valor_2);
        $LimiarTonal['Audiometrico']['E'][4000]  = (($dados['VALE'][0]->Valor_4 == null)?($dados['VAMLE'][0]->Valor_4):$dados['VALE'][0]->Valor_4);
     
        echo json_encode($LimiarTonal['Audiometrico']);
    }


}
