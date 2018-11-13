<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model('Funcionario_model', 'Funcionarios');
         $this->load->model('Empresas_model', 'Empresas');
    }

    public function index($indice = NULL) {
        verificar_sessao($this->session);
        $this->db->select('*');
        $dados['funcionarios'] = $this->Funcionarios->ListAll();
        
 
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->tratarMsgs($indice);
        $this->load->view('funcionario/listar', $dados);
        $this->load->view('includes/footer');
    }

    public function insert() {
        verificar_sessao($this->session);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('funcionario/cadastrar');
        $this->load->view('includes/footer');
    }

    public function save() {
        verificar_sessao($this->session);
        $this->load->model('funcionario_model', 'funcionario');

        if ($this->funcionario->save()) {
            redirect('Funcionario/1');
        } else {
            redirect('Funcionario/2');
        }
    }

    public function delete($id) {
        verificar_sessao($this->session);
        $this->db->where('Cod', $id);
        if ($this->db->delete('terceiro')) {
            redirect('Funcionario/3');
        } else {
            redirect('Funcionario/4');
        }
    }

    public function alter($id = null, $indice = null) {
        verificar_sessao($this->session);
        $this->output->enable_profiler(false);
        $data['funcionario'] = $this->Funcionarios->find($id) ;
        $data['Empresas'] = $this->Empresas->listAll();
//        echo "<pre>";
//        var_dump($data);
//        echo "</pre>";
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        if ($indice == 1) {
            $data['msg'] = "Senha Atualizada com sucesso";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Não foi possível atualizar a senha";
            $this->load->view('includes/msg_erro', $data);
        }
        $this->load->view('funcionario/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        verificar_sessao($this->session);
        $this->load->model('funcionario_model', 'funcionario');

        if ($this->funcionario->salvar()) {
            redirect('Funcionario/5');
        } else {
            redirect('Funcionario/6');
        }
    }

    public function atualizar_senha() {
        verificar_sessao($this->session);
        $id = $this->input->post('Cod');
        $senha_atual = md5($this->input->post('password_atual'));
        $senha_nova = md5($this->input->post('password_nova'));
        $this->db->select('Senha');
        $this->db->where('Cod', $id);
        $data['Senha'] = $this->db->get('terceiro')->result();
        $dados['senha'] = $senha_nova;
        if ($data['Senha'][0]->Senha == $senha_atual) {
            $this->db->where('Cod', $id);
            $this->db->update('terceiro', $dados);
            redirect('Funcionario/alter/' . $id . '/1');
        } else {
            redirect('Funcionario/alter/' . $id . '/2');
        }
    }

    public function atualizar_senha_dashboard() {
        verificar_sessao($this->session);
        $this->output->enable_profiler(false);
        $id = $this->input->post('Cod');
        $senha_atual = md5($this->input->post('password_atual'));
        $senha_nova = md5($this->input->post('password_nova'));
        $this->db->select('Senha');
        $this->db->where('Cod', $id);
        $data['Senha'] = $this->db->select('Cod, Senha')->get('terceiro')->result();
        $dados['senha'] = $senha_nova;

        if ($data['Senha'][0]->Senha == $senha_atual) {
            $this->db->where('Cod', $id);
            $this->db->update('terceiro', $dados);
            $this->session->set_flashdata('msg', 'Senha Atualizada com sucesso');
            redirect('');
        } else {
            $this->session->set_flashdata('msg', 'Não foi possível atualizar a senha, verifique senha atual');
            redirect('');
        }
    }

    function tratarMsgs($indice = NULL) {
        if ($indice == 1) {
            $data['msg'] = "Funcionário cadastrado com sucesso";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Não foi possível cadastrar o Funcionário";
            $this->load->view('includes/msg_erro', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Funcionário excluido com sucesso!";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 4) {
            $data['msg'] = "Não foi possível excluir o Funcionário";
            $this->load->view('includes/msg_erro', $data);
        } else if ($indice == 5) {
            $data['msg'] = "Funcionário atualizado com sucesso!";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 6) {
            $data['msg'] = "Não foi possível atualizar o Funcionário";
            $this->load->view('includes/msg_erro', $data);
        }
    }

}
