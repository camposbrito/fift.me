<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        $this->load->model('Log_model', 'logs');
    }

    function cd_list() {
        $results = $this->logs->get_cd_list();
        echo json_encode($results);
    }

    public function indexJSON($id = null) {
        $results = $this->logs->index();
        echo json_encode($results);
    }
    
    public function ajax_list()
       {
           $list = $this->logs->get_datatables();
           $data = array();
           $no = isset($_POST['start']) ? $_POST['start'] :0;
           foreach ($list as $Logs) {
               $no++;
               $row = array();
               $row[] = $no;
               $row[] = dataHoraBR( $Logs->Data);
               $row[] = $Logs->Mensagem;
               $row[] = $Logs->IP;
               $row[] = $Logs->browser;
               $row[] = $Logs->Usuario;
               

               $data[] = $row;
           }

           $output = array(
                           "draw" => (isset($_POST['draw'])?$_POST['draw']:1),
                           "recordsTotal" => $this->logs->count_all(),
                           "recordsFiltered" => $this->logs->count_filtered(),
                           "data" => $data,
                   );
           //output to json format
           echo json_encode($output);
       }

    public function index($id = null) {

        $Dados['log'] = $this->logs->index();
//        $Dados['JSON'] = $this->indexJSON();    
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('log', $Dados);
//        $this->load->view('log');
        $this->load->view('includes/footer');
    }

//    public function inserir() {        
//        $Dados['fechamentos'] = $this->fechamento->getUltimoFechamento();        
//        $this->load->view('includes/header');
//        $this->load->view('includes/menu');
//        $this->load->view('fechamento_inserir',$Dados);
//        $this->load->view('includes/footer');
//    }
//
//    public function salvar() {
//        $this->fechamento->save();
//        redirect(base_url() . "fechamentos/");
//    }
}
