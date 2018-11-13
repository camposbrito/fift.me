<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Audiometria_aasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {
        verificar_sessao($this->session);

        $dados['equipamentos'] = $this->equipamento->getEquipamentos();
        $dados['aasi_OD'] = $this->db->join('audiometriacomaasiod a', 'a.Consulta = c.Cod', 'LEFT')->get_where('consulta c', array('c.Cod' => $id))->result();
        $dados['aasi_OE'] = $this
                        ->db
                        ->join('audiometriacomaasioe a', 'a.Consulta = c.Cod', 'LEFT')
                        ->get_where('consulta c', array('c.Cod' => $id))->result();
        $dados['aasi_OEOD'] = $this
                        ->db
                        ->join('audiometriacomaasioeod a', 'a.Consulta = c.Cod', 'LEFT')
                        ->get_where('consulta c', array('c.Cod' => $id))->result();
        $dados['id'] = $id;
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/audiometriaAASI_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }
        public function salvar() {
        verificar_sessao($this->session);        
        $this->audiometria_aasi->salvar();
        redirect('Audiometria_aasi/' . $this->input->post('Consulta'));
        $this->output->enable_profiler(false);
    }

}
