<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

//    public function verificar_sessao() {
//        if ($this->session->userdata['logado'] == false) {
//            redirect('dashboard/login');
//        }
//    }

    public function index($paciente = NULL, $indice = NULL) {
        verificar_sessao($this->session);
        $this->consulta->atualiza_status();
        $dados['consultas'] = $this->consulta->get_consultas_by_paciente($paciente);
        $dados['paciente'] = $this->paciente->get_paciente($paciente);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->tratarMsgs($indice);
        $this->load->view('consulta/listar_consulta', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(FALSE);
    }

    public function cadastro($paciente = null) {
        verificar_sessao($this->session);
        $dados['tecnicasutilizadas']= $this->tecnicasUtilizadas->listActive();       
        $dados['terceiros']         = $this->terceiro->listFonoaudiologos();
        $dados['tiposexame']        = $this->tipoExame->listActive();
        $dados['classificacoes']    = $this->classificacao->listActive();
        $dados['paciente']          = $this->paciente->get_paciente($paciente);
        $dados['cod_consulta']      = $paciente;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/cadastrar_consulta', $dados);
        $this->load->view('includes/footer', $dados);
    }

    public function salvar() {
        verificar_sessao($this->session);
        $CodConsulta = $this->consulta->salvar();

        if ($CodConsulta > 0) {
            redirect('Consulta/alterar/' . $CodConsulta);
        }
    }

    public function excluir($id) {
        verificar_sessao($this->session);
        $this->db->where('Cod', $id);
        if ($this->db->delete('consulta')) {
            redirect('Consulta/3');
        } else {
            redirect('Consulta/4');
        }
    }

    public function alterar($id = null, $indice = null) {
        verificar_sessao($this->session);
        $dados['tecnicasutilizadas_has_consulta']   = $this->tecnicasutilizadas_has_consulta->get_consulta_tecnicasutilizadas($id);
        $dados['tecnicasutilizadas']                = $this->tecnicasutilizadas_has_consulta->get_tecnicasutilizadas();
        $dados['terceiros']                         = $this->terceiro->listFonoaudiologos();
        $dados['tiposexame']                        = $this->tipoExame->listActive();
        $dados['classificacoes']                    = $this->classificacao->listActive();

        $dados['consulta'] = $this->consulta->get_consulta($id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('consulta/alterar_consulta', $dados);
        $this->load->view('includes/footer', $dados);
        $this->output->enable_profiler(FALSE);
    }

    function tratarMsgs($indice = NULL) {
        if ($indice == 1) {
            $dados['msg'] = "Consulta cadastrado com sucesso";
            $this->load->view('includes/msg_sucesso', $dados);
        } else if ($indice == 2) {
            $dados['msg'] = "Não foi possível cadastrar a Consulta";
            $this->load->view('includes/msg_erro', $dados);
        } else if ($indice == 3) {
            $dados['msg'] = "Paciente excluido com sucesso!";
            $this->load->view('includes/msg_sucesso', $dados);
        } else if ($indice == 4) {
            $dados['msg'] = "Não foi possível excluir o Paciente";
            $this->load->view('includes/msg_erro', $dados);
        } else if ($indice == 5) {
            $dados['msg'] = "Paciente atualizado com sucesso!";
            $this->load->view('includes/msg_sucesso', $dados);
        } else if ($indice == 6) {
            $dados['msg'] = "Não foi possível atualizar o Paciente";
            $this->load->view('includes/msg_erro', $dados);
        }
    }

}
