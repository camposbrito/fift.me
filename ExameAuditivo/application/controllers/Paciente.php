<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pagination');
    }

    public function index() {
        verificar_sessao($this->session);
        $data['terceiros']      = $this->terceiro->listFonoaudiologosFiltros();
        $data['paciente']       = $this->session->userdata['paciente'];
        $data['dataNascimento'] = $this->session->userdata['dataNascimento'];
        $data['periodoInicial'] = $this->session->userdata['periodoInicial'];
        $data['periodoFinal']   = $this->session->userdata['periodoFinal'];
        $data['profissional']   = $this->session->userdata['profissional'];
        $data['Empresa']        = $this->session->userdata['Empresa'];

        $config = array();
        $config["base_url"] = base_url() . "index.php/Paciente/Pesquisar";
        $total_row = $this->paciente->record_count();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = false;
        $config['num_links'] = 10;
        $config['cur_tag_open'] = '&nbsp;<span class="current" disabled>';
        $config['cur_tag_close'] = '</a>&nbsp;';
        $config['next_link'] = '>';
        $config['prev_link'] = '<';
        $config['first_link'] = '<<';
        $config['last_link'] = '>>';

        $this->pagination->initialize($config);

        if ($this->uri->segment(3)) {
            $page = ($this->uri->segment(3));
        } else {
            $page = 0;
        }


        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

        $data['pacientes'] = $this->paciente->get_pacientes(true, $config["per_page"], $page);
//        $this->output->enable_profiler(true);
 
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('paciente/FormBusca_', $data);
        $this->load->view('paciente/listar', $data);
        $this->load->view('includes/footer');
    }

    public function pesquisar() {
        verificar_sessao($this->session);
        $data['terceiros'] = $this->db->get_where('terceiro', array('Ativo' => 'S'))->result();

        $data['paciente'] = $this->input->post('paciente');
        $data['dataNascimento'] = $this->input->post('dataNascimento');
        $data['periodoInicial'] = $this->input->post('periodoInicial');
        $data['periodoFinal'] = $this->input->post('periodoFinal');
        $data['profissional'] = $this->input->post('profissional');
        $data['Empresa'] = $this->input->post('Empresa');
        $this->session->set_userdata($data);
        $config = array();
        $config["base_url"] = base_url() . "index.php/Paciente/Pesquisar";
        $total_row = $this->paciente->record_count();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = false;
        $config['num_links'] = 10;
        $config['cur_tag_open'] = '&nbsp;<span class="current" disabled>';
        $config['cur_tag_close'] = '</a>&nbsp;';
//        $config['next_link'] = 'Próximo';
//        $config['prev_link'] = 'Anterior';
//        $config['first_link'] = 'Primeiro';
//        $config['last_link'] = 'Último';
        $config['next_link'] = '>';
        $config['prev_link'] = '<';
        $config['first_link'] = '<<';
        $config['last_link'] = '>>';
        $this->pagination->initialize($config);

        if ($this->uri->segment(3)) {
            $page = ($this->uri->segment(3));
        } else {
            $page = 0;
        }

        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

        $data['pacientes'] = $this->paciente->get_pacientes(true, $config["per_page"], $page);
//        $this->output->enable_profiler(true);
//        $this->load->view('includes/header');
//        $this->load->view('includes/menu');
//        $this->tratarMsgs($indice);
        
        $this->load->view('paciente/listarAJAX', $data);
//        $this->load->view('includes/footer');
    }

    public function cadastro() {
        verificar_sessao($this->session);
        $dados['pacientes'] = $this->paciente->get_pacientes();
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('paciente/cadastrar', $dados);

        $this->load->view('includes/footer');
    }

    public function cadastrar() {
        verificar_sessao($this->session);
        $data['Descricao'] = $this->input->post('nome');
        $data['DataNascimento'] = dataUS($this->input->post('dataNascimento'));
        $data['Sexo'] = $this->input->post('sexo');
        $data['EstadoCivil'] = $this->input->post('estadoCivil');
        $data['RG'] = $this->input->post('rg');
        $data['Funcao'] = $this->input->post('funcao');
        $data['Empresa'] = $this->input->post('empresa');
        $data['Empresa_Usuario'] = $this->session->userdata['Empresa_Usuario'][0]->Cod;
        
        $data['Nacionalidade'] = $this->input->post('nacionalidade');
        $data['Ativo'] = $this->input->post('ativo');

        if ($this->db->insert('paciente', $data)) {
            redirect('Consulta/cadastro/'.$this->db->insert_id());
        } else {
            redirect('Paciente/2');
        }
    }

    public function excluir($id) {
        verificar_sessao($this->session);
        $this->db->where('Cod', $id);
        if ($this->db->delete('paciente')) {
            redirect('Paciente/3');
        } else {
            redirect('Paciente/4');
        }
    }

    public function alterar($id = null, $indice = null) {
        verificar_sessao($this->session);
        $this->db->where('cod', $id);
        $data['paciente'] = $this->db->get('paciente')->result();
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('paciente/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function atualizar() {
        verificar_sessao($this->session);
        $data['Descricao'] = $this->input->post('nome');
        $data['DataNascimento'] = dataUS($this->input->post('dataNascimento'));
        $data['Sexo'] = $this->input->post('sexo');
        $data['EstadoCivil'] = $this->input->post('estadoCivil');
        $data['RG'] = $this->input->post('rg');
        $data['Funcao'] = $this->input->post('funcao');
        $data['Empresa'] = $this->input->post('empresa');
        $data['Nacionalidade'] = $this->input->post('nacionalidade');
        $data['Ativo'] = $this->input->post('ativo');
        $this->db->where('cod', $this->input->post('Cod'));
        if ($this->db->update('paciente', $data)) {
            redirect('Paciente/5');
        } else {
            redirect('Paciente/6');
        }
    }

    function tratarMsgs($indice = NULL) {
        if ($indice == 1) {
            $data['msg'] = "Paciente cadastrado com sucesso";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Não foi possível cadastrar o Paciente";
            $this->load->view('includes/msg_erro', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Paciente excluido com sucesso!";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 4) {
            $data['msg'] = "Não foi possível excluir o Paciente";
            $this->load->view('includes/msg_erro', $data);
        } else if ($indice == 5) {
            $data['msg'] = "Paciente atualizado com sucesso!";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 6) {
            $data['msg'] = "Não foi possível atualizar o Paciente";
            $this->load->view('includes/msg_erro', $data);
        }
    }

}
