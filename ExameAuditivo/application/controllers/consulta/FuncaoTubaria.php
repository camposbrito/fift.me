<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FuncaoTubaria extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id = NULL) {
        verificar_sessao($this->session);
        $dados['equipamentos'] = $this->equipamento->getEquipamentos();
        $dados['id'] = $id;
        $dados['consulta'] = $this->consulta->get_consulta($id);
        $dados['funcaotubariaod'] = $this
                        ->db
                        ->select(' fechamento, invalido,  a.Cod, a.Consulta, 0degl as degl0, 1degl  as degl1, 2degl  as degl2, 3degl as degl3, 4degl as degl4, 5degl as degl5, 6degl as degl6, 7degl as degl7, 8degl as degl8')
                        ->join('funcaotubariaod a', 'a.Consulta = c.Cod', 'LEFT')
                        ->get_where('consulta c', array('c.Cod' => $id))->result();
        $dados['funcaotubariaoe'] = $this
                        ->db
                        ->select(' fechamento, invalido, a.Cod, a.Consulta, 0degl as degl0, 1degl  as degl1, 2degl  as degl2, 3degl as degl3, 4degl as degl4, 5degl as degl5, 6degl as degl6, 7degl as degl7, 8degl as degl8')
                        ->join('funcaotubariaoe a', 'a.Consulta = c.Cod', 'LEFT')
                        ->get_where('consulta c', array('c.Cod' => $id))->result();

        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/funcaoTubaria_view', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(false);
    }

    public function salvar() {
        verificar_sessao($this->session);
        $this->funcaotubaria->salvar();
        redirect('FuncaoTubaria/' . $this->input->post('Consulta'));
    }

}
