<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Meatoscopia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('consulta_model', 'consulta');
        $this->load->model('paciente_model', 'paciente');
        $this->load->model('meatoscopia_model', 'meatoscopia');
    }

    public function index($id = NULL) {
        verificar_sessao($this->session);

        $dados['equipamentos'] = $this->equipamento->getEquipamentos();          
        $dados['meatoscopia_normal'] = $this->db->order_by('meatoscopia', 'ASC')->join('consulta_meatoscopia cm', 'cm.consulta = c.cod and meatoscopia = 4', 'left')->get_where('consulta c ', array('c.cod' => $id))->result();
        $dados['meatoscopia_alterada'] = $this->db->order_by('meatoscopia', 'ASC')->join('consulta_meatoscopia cm', 'cm.consulta = c.cod and meatoscopia = 5', 'left')->get_where('consulta c ', array('c.cod' => $id))->result();
        $dados['id'] = $id;
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/meatoscopia_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(FALSE);
    }

    public function salvar() {  
        verificar_sessao($this->session);
        $this->meatoscopia->salvar();
        redirect('Meatoscopia/' . $this->input->post('consulta'));
//        redirect('Consulta/alterar/' . $this->input->post('consulta'));   
        $this->output->enable_profiler(FALSE);
    }

}
