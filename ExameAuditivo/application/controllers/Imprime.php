<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Imprime extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id) {
        $dados['id'] = $id;
        $this->load->view('consulta/Imprime', $dados);
        $this->output->enable_profiler(FALSE);
    }

}
