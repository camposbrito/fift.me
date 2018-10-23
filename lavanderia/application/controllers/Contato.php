<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $this->load->model('Contato_model', 'contato');
        $this->load->library('recaptcha');
    }

    public function index() {
        $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
        $data['page'] = 'contato/index';
        $data['nome'] = '';
        $data['email'] = '';
        $data['apto'] = '';
        $data['mensagem'] = '';
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('contato', $data);
        $this->load->view('includes/footer');
    }

    public function relatorio() {
        $dados['livro'] = $this->contato->index();
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('contato_livro', $dados);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $this->recaptcha->recaptcha_check_answer();
        if ($this->recaptcha->getIsValid()) {
            $this->contato->save();
            $data['nome'] = '';
            $data['email'] = '';
            $data['apto'] = '';
            $data['mensagem'] = '';
            $this->session->set_flashdata('msg', "Mensagem enviada com sucesso!");
        } else {
            $data['nome'] = $this->input->post('nome');
            $data['apto'] = $this->input->post('apto');
            $data['email'] = $this->input->post('email');
            $data['mensagem'] = $this->input->post('mensagem');
            $this->session->set_flashdata('msg', "Não foi possível verificar o recaptcha!");
        }
        $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
        $data['page'] = 'contato/index';
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('contato', $data);
        $this->load->view('includes/footer');
    }

}
