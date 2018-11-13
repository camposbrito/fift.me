<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Impedanciometria extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {

        verificar_sessao($this->session);
        $dados['equipamentos'] = $this->equipamento->getEquipamentos();      
        $dados['meatoscopias'] = $this->db->get_where('meatoscopia', array('Ativo' => 'S'))->result();
        $dados['impedanciometria'] = $this->impedanciometria->getImpedanciometria($id);
        $dados['id'] = $id;
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/impedanciometria_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(FALSE);
    }

    public function salvar() {
        verificar_sessao($this->session);
        

        $this->impedanciometria->salvar();
        redirect('Impedanciometria/' . $this->input->post('Consulta'));
//        $this->output->enable_profiler(true);
    }

//    public function get_consulta_weber($consulta) {;
//        return $this->db->select('i.cod AS codMascaramento, i.*')->join('mascaramento i', 'i.Consulta = c.Cod', 'LEFT')->get_where('Consulta c', array('c.cod' => $consulta))->result()[0];
//    }
}
