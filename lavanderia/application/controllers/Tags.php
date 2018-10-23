<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $this->load->model('Rfid_model', 'rfid');
        $this->load->model('Apartamento_model', 'apto');
    }

    public function index($id = null) {
        // $this->output->enable_profiler(true );s
        if ($id == null)
            redirect ('apartamentos/');
        else {
         $Dados['tags'] = $this->rfid->index($id);
        $Dados['apto'] = $id;
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('tags', $Dados);
        $this->load->view('includes/footer');
        }
    }
 
    public function inserir($id) {
        $Dados['apto'] = $this->apto->get($id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('tags_inserir', $Dados);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        
        $this->rfid->save();
        // _debug($this->session);
        // $this->output->enable_profiler(TRUE);
        redirect(base_url() . "tags/" . $this->input->post('apto'));
    }

}
